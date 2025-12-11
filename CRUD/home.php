<?php
session_start();
include 'connection.php';

$role = isset($_SESSION['role']) ? $_SESSION['role'] : 'Guest';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Home | CRUD System</title>
</head>
<body class="bg-gray-100" style="font-family: 'Inter'">
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
    
    <main class="p-10">
        <div class="flex items-center justify-between mb-3">
            <h1 class="font-bold text-4xl">User List</h1>
            <a href="add.php" class="bg-blue-600 p-2 text-white rounded-md">Add New User</a>
        </div>
        <div class="overflow-hidden rounded-t-xl shadow-md">
            <table class="bg-white w-full text-center" cellpadding="20">
                <tr class="border-b-[0.5px]">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
                <?php
                    $result = $conn->query("SELECT * FROM tblcrud");
                    while($row = $result->fetch_assoc()):
                ?>
                <tr>
                    <td class="border-b-[0.5px]"><?= $row['id']; ?></td>
                    <td class="border-b-[0.5px]"><?= $row['name']; ?></td>
                    <td class="border-b-[0.5px]"><?= $row['email']; ?></td>
                    <td class="border-b-[0.5px]">
                        <div class="w-full max-w-lg flex items-center justify-center gap-3">
                            <a href="edit.php?id=<?= $row['id']; ?>" class="bg-blue-600 p-2 text-white flex-1 max-w-[120px] rounded-md transform transform-transition duration-300 hover:bg-blue-700">Edit</a>
                            <a href="delete.php?id=<?= $row['id']; ?>" onclick="return confirm('Delete this User?');" class="bg-blue-600 p-2 text-white flex-1 max-w-[120px] rounded-md transform transform-transition duration-300 hover:bg-blue-700" onclick="Return Confirm('Delete this User?');">Delete</a>
                        </div>
                    </td>
                </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </main>
</body>
<script src="script.js"></script>
</html>