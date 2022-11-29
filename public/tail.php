<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>
<body>
    <div class="table-responsive right-96">
    <table class="table">
        <thead>
          <tr class="text-center">
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
            <th scope="col">Handle</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody>
            <?php
                        
                        include "../config/connect.php";

                        $no="1";
                        $query = mysqli_query($conn, "SELECT * FROM account ORDER BY id_account DESC");
                        while ($data=mysqli_fetch_array($query)) {                 
                        
                        
                        ?>
          <tr class="text-center">
            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r"><?php echo $no++;?></td>
                                <td ><?php echo $data['username']?></td>
                                <td ><?php echo $data['email']?></td>
                                <td ><?php echo $data['password']?></td>
                                <td ><?php echo $data['level']?></td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                                    <a class="w-full px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out" href="edit.php?id_account=<?php echo $data['id_account'];?>">Edit</a>
                                    <a class="w-full px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out" href="hapus.php?id_account=<?php echo $data['id_account'];?>" onclick="return confirm('apakah anda yakin ingin menghapus pengguna ini?')">Delete</a>
                                </td>
                                <?php } ?>
          </tr>
          
        </tbody>
    </table>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>