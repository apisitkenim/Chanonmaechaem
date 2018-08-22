<?php
	session_start();
	session_destroy();
	header("location:../Login/admin_login.php");
?>
