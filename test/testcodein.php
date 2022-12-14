<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="qrcode.php" method="POST">
        <?php if (isset($_GET["msg"])) {
            echo $_GET["msg"];
        } ?>
        <div>
            <label for="">code</label>
            <input type="text" name="cname">
        </div>
        <div>
        <button type="submit">test</button>
        </div>
    </form>
    <table>
  <tr>
    <th>nomer</th>
    <th>code</th>
    <th>image</th>
  </tr>
  <?php
  require_once "./config/connect.php";

  $no = "1";
  $query = mysqli_query($conn, "SELECT * FROM test");
  while ($data = mysqli_fetch_array($query)) { ?>

  <tr>
    <td><?php echo $no++; ?></td>
    <td><?php echo $data["code"]; ?></td>
    <td><img src="<?php echo $data["img"]; ?>" alt=""></td>
  </tr>
  <?php }
  ?>
</table>
    
</body>
</html>