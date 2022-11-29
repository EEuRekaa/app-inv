<?php

	session_start();
	session_unset();
	session_destroy();

	header("Location: ../A_admin_login/admin_login.php");

?>