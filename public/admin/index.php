<?php

session_start();
if($_SESSION['level']=="") {
    header("Location: ../admin/index.php");
}

elseif ($_SESSION['level']=="user") {
    header("Location: ../user/index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-900">
        <div class="container flex flex-wrap items-center justify-between mx-auto">
            <a href="https://flowbite.com/" class="flex items-center">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-6 mr-3 sm:h-9" alt="Flowbite Logo" />
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Kurang Tw</span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                <a href="#" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white" aria-current="page">Home</a>
                </li>
                <li>
                <a href="#" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About</a>
                </li>
                <li>
                <a href="#" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Services</a>
                </li>
                <li>
                <a href="#" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Pricing</a>
                </li>
                <li>
                <a href="#" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contact</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    <h1>yeah</h1>
    <a href="logout.php"><button>logout</button></a>
    
    

    <div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <table class="min-w-full border text-center">
                <thead class="border-b">
                    <tr>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                        #
                    </th>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                        First
                    </th>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                        Last
                    </th>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                        Handle
                    </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 border-r">1</td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                            Mark
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                            Otto
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            @mdo
                        </td>
                        </tr>
                        <tr class="bg-white border-b">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 border-r">2</td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                            Jacob
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                            Thornton
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            @fat
                        </td>
                    </tr>                    
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>