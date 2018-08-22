<?php

session_start();
require_once "ConnectDatabase/connectionDb.inc.php";

$xs = getIsset("xs");
$s = getIsset("s");
$m = getIsset("m");
$l = getIsset("l");
$xl = getIsset("xl");
$xxl= getIsset("xxl");
$size = getIsset("size");
$count = getIsset("num-product") ? : 0;

if(!isset($_SESSION["intLine"]))
{

	$tbl_ = $conn->select('products', array('productid' => $_GET["ProductID"]), true);

	if($tbl_ != null){
		$amount = $tbl_["amount"];

		if (intval($count) <= intval($amount)){

			$_SESSION["intLine"] = 0;
			$_SESSION["strProductID"][0] = $_GET["ProductID"];
			$_SESSION["strQty"][0] = $count;
			$_SESSION["strSize"][0] = $size;

				 header("location:cart.php");
		 }else{
			 alertMassageAndRedirect('จำนวนสินค้าในสต๊อคไม่เพียงพอ','product.php');
		 }
	 } else{
		 $_SESSION["intLine"] = 0;
		 $_SESSION["strProductID"][0] = $_GET["ProductID"];
		 $_SESSION["strQty"][0] = $count;
		 $_SESSION["strSize"][0] = $size;

				 header("location:cart.php");
	}
}
else
{
	$tbl_ = $conn->select('products', array('productid' => $_GET["ProductID"]), true);

	if($tbl_ != null){
		$amount = $tbl_["amount"];

		if (intval($count) <= intval($amount)){

				$key = array_search($_GET["ProductID"], $_SESSION["strProductID"]);
				if((string)$key != "")
				{
					 $_SESSION["strQty"][$key] = $_SESSION["strQty"][$key] + $count;
					 $_SESSION["strSize"][$key] = $size;
				}

				else
				{
					 $_SESSION["intLine"] = $_SESSION["intLine"] + 1;
					 $intNewLine = $_SESSION["intLine"];
					 $_SESSION["strProductID"][$intNewLine] = $_GET["ProductID"];
					 $_SESSION["strQty"][$intNewLine] = $count;
			 	 	 $_SESSION["strSize"][$intNewLine] = $size;
				}

				 header("location:cart.php");
 		 }else{
			 $id = $_GET["ProductID"];
			 alertMassageAndRedirect('จำนวนสินค้าในสต๊อคไม่เพียงพอ','product.php');
		 }
	 } else{
				$key = array_search($_GET["ProductID"], $_SESSION["strProductID"]);
				if((string)$key != "")
				{
					 $_SESSION["strQty"][$key] = $_SESSION["strQty"][$key] + $count;
					 $_SESSION["strSize"][$key] = $size;
				}

				else
				{
					 $_SESSION["intLine"] = $_SESSION["intLine"] + 1;
					 $intNewLine = $_SESSION["intLine"];
					 $_SESSION["strProductID"][$intNewLine] = $_GET["ProductID"];
					 $_SESSION["strQty"][$intNewLine] = $count;
			 	 	 $_SESSION["strSize"][$intNewLine] = $size;
				}

				 header("location:cart.php");
	}
}


?>
