<?php

error_reporting(0);
session_start();
if($_SESSION['level']=="admin") {
    header("Location: ../admin/index.php");
}

elseif ($_SESSION['level']=="petugas") {
    header("Location: ../user/index.php");
}

?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="../css/style.css">
</head>
<body>    
        <form action="send.php" method="post">            
            <div class="flex items-center justify-center h-screen w-screen">
                <div class="w-4/12 border border-gray-200 rounded p-10 shadow-lg">
                <h5 class="text-center mb-4">SIGN IN</h5>
                    <div class="mb-4">
                        <label for="" class="block text-gray-700 text-base font-bold mb-2">Username</label>                
                        <input type="text" name="username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-800 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>          
                    <div class="mb-4">
                        <label for="" class="block text-gray-700 text-base font-bold mb-2">Password</label>
                        <input type="password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-800 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div>
                        <button type="submit" name="login" class="w-full px-6 py-2.5 bg-sky-400 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:text-sky-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-sky-600 active:shadow-lg transition duration-150 ease-in-out">Sign In</button>                                             
                    </div>
                    <p class="text-gray-800 mt-6 text-center">Not a member? <a href="../register/index.php" class="text-blue-600 hover:text-sky-300 focus:text-sky-600 transition duration-200 ease-in-out">Sign Up</a></p>
                    <p class="text-gray-800 mt-6 text-center"><a href="forget.php" class="text-blue-600 hover:text-sky-300 focus:text-sky-600 transition duration-200 ease-in-out">Forgot Password</a></p>
                </div>   
            </div>         
        </form>                    
</body>
</html>