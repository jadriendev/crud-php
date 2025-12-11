<?php
include 'connection.php';
session_start();
$role = isset($_SESSION['role']) ? $_SESSION['role'] : 'Guest';

$showSuccess = false;

if(isset($_POST['save']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];

        $conn->query("INSERT INTO tblcrud (name, email) VALUES ('$name', '$email')");
        $showSuccess = true;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Add New User | CRUD System</title>
</head>
<body class="bg-gray-100 h-screen overflow-y-hidden" style="font-family: 'Inter';">
    <nav class="flex items-center justify-between bg-white shadow-lg px-10 py-4">
        <div class="">
            <h1 class="text-3xl font-bold tracking-wide">CRUD</h1>
        </div>
        
        <div class="relative">
            <button onclick="toggleDropdown()" class="flex items-center gap-2 text-lg font-medium cursor-pointer select-none">
                Hi, <?= $role?>
                <i class="fa-solid fa-caret-down text-sm"></i>
            </button>

            <div class="hidden absolute right-0 mt-2 w-32 bg-white border rounded-lg shadow-lg p-2" id="dropdownMenu">
                <a href="index.php" class="block px-3 py-2">
                    Logout
                </a>
            </div>
        </div>
    </nav>    

    <div class="h-full flex items-center justify-center">
        <main class="w-full max-w-md">
            <form method="POST" class="bg-white shadow-md px-6 py-6 flex flex-col items-center justify-center gap-3 rounded-lg text-gray-600">
                <h1 class="text-3xl font-bold tracking-wide">Add New User</h1>
                <hr class="border-t-1 border-gray-300 w-full my-3">

                <div class="relative w-full">
                    <i class="fa-solid fa-user text-xl text-gray-500 absolute left-3 top-1/2 -translate-y-1/2"></i>
                    <input type="text" name="name" placeholder="Name" class="border border-1 border-gray-300 p-3 pl-10 rounded w-full text-sm">
                </div>
                
                <div class="relative w-full">
                    <i class="fa-solid fa-envelope text-xl text-gray-500 absolute left-3 top-1/2 -translate-y-1/2"></i>
                    <input type="text" name="email" placeholder="Email" class="border border-1 border-gray-300 p-3 pl-10 rounded w-full text-sm">
                </div>

                <div class="flex items-center w-full gap-2">
                    <a href="home.php" class="flex items-center justify-center tracking-wide bg-blue-600 text-white p-3 w-full rounded hover:bg-blue-700 transition text-sm font-medium cursor-pointer"><i class="fa fa-arrow-left pr-2"></i>Back</a>
                    <input type="submit" name="save" value="Add" class="tracking-wide bg-blue-600 text-white p-3 w-full rounded hover:bg-blue-700 transition text-sm font-medium cursor-pointer">
                </div>
            </form>
        </main>
    </div>
    <?php if($showSuccess): ?>
        <div id="toast" class="fixed top-20 right-5 bg-green-500 text-white px-4 py-3 rounded shadow-lg flex items-center gap-2">
            <i class="fa-solid fa-circle-check"></i>
            <span>User Added Successfully!</span>
            <button onclick="document.getElementById('toast').remove()" class="ml-4 text-white font-bold">X</button>
        </div>

<script>
    setTimeout(() => {
        const toast = document.getElementById('toast');
        if(toast) toast.remove();
    }, 3000);
</script>
<?php endif; ?>

</body>
</html>