<?php
session_start();
include 'connection.php';

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['pass'];

    $result = $conn->query("SELECT * FROM tbllogin WHERE email = '$email' AND password = '$password'");

    if($result->num_rows > 0)
    {
        $user = $result->fetch_assoc();

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];

        header("Location: home.php");
        exit;
    }
    else
    {
        echo "<script>
                alert('Invalid Email or Password');
              </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login | CRUD System</title>
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-100">
    <main class="w-full max-w-md">
        <form method="POST" class="bg-white shadow-md px-6 py-6 flex flex-col items-center justify-center gap-3 rounded-lg text-gray-600">
            <img src="images/PHP-logo.svg.png" alt="PHP Logo" class="h-[100px]">
            <h1 class="text-3xl font-bold tracking-wide">CRUD System</h1>
            <hr class="border-t-1 border-gray-300 w-full my-3">

            <div class="relative w-full">
                <i class="fa-solid fa-user text-xl text-gray-500 absolute left-3 top-1/2 -translate-y-1/2"></i>
                <input type="text" name="email" placeholder="Email/Username" class="border border-1 border-gray-300 p-3 pl-10 rounded w-full text-sm">
            </div>
            
            <div class="relative w-full">
                <i class="fa-solid fa-lock text-xl text-gray-500 absolute left-3 top-1/2 -translate-y-1/2"></i>
                <input type="password" name="pass" placeholder="Password" id="password" class="border border-1 border-gray-300 p-3 pl-10 rounded w-full text-sm">
                <i id="togglePassword" class="fa-solid fa-eye-slash text-gray-500 absolute right-3 top-1/2 -translate-y-1/2 cursor-pointer"></i>
            </div>

            <input type="submit" name="login" value="Login" class="tracking-wide bg-blue-600 text-white p-3 w-full rounded hover:bg-blue-700 transition text-sm font-medium cursor-pointer">
        </form>
    </main>
    <script>
        const togglePassword = document.getElementById("togglePassword");
        const password = document.getElementById("password");
        togglePassword.addEventListener("click", () => {
            const type = password.type === "password" ? "text" : "password";
            password.type = type;
            togglePassword.classList.toggle("fa-eye-slash");
            togglePassword.classList.toggle("fa-eye");
        });
    </script>
</body>
</html>