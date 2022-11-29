<?php

session_start();
include '../../config/connect.php';

if (isset($_POST['login'])) 
{
	$email = addslashes(trim($_POST['email']));
	$password = md5($_POST['password']);

	$query = mysqli_query($conn, "SELECT * FROM account WHERE email='$email' AND password='$password' ");
	if (mysqli_num_rows($query) && ['is_verified']==1) 
	{
		echo "<script>alert('Email atau Password yang Anda masukan salah !!!');document.location.href='index.php'</script>/n";
	}else{
		
			$row = mysqli_fetch_assoc($query);
		
			$_SESSION['username'] = $row['username'];
			$_SESSION['level'] = $row['level'];
			
			if($row['level'] == "admin")
			{	
				echo "<script>alert('Welcome To Admin page');document.location.href='../admin/index-1.php'</script>/n";
			}
			else if($row['level'] =="user")
			{
				echo "<script>alert('Welcome To User !');document.location.href='../user/index.php'</script>/n";
			}
			else
			{
				echo "<script>alert('Login Gagal !!!');document.location.href='../login/index.php'</script>/n";
			}
		
	}
}else{
	echo "<script>alert('Anda belum mengisi Form !!!');document.location.href='index.php'</script>/n";
}

?>