<?php

session_start();
require_once "ConnectDatabase/connectionDb.inc.php";

$_SESSION["intLine"] = "";
$_SESSION["strProductID"] = "";
$_SESSION["strQty"] = "";

 header("location:cart.php");

}


?>
