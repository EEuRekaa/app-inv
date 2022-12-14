<?php

session_start();
session_unset();
session_destroy();

header("Location: ../A_admin_register/admin_register.php");

?>
