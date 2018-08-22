<?php
session_start();
$_SESSION["lang"] = $_GET["lang"];
session_write_close();

header("location:./register.php");
?>
