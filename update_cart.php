<?php
require_once "ConnectDatabase/connectionDb.inc.php";
session_start();

$cmd = getIsset("__cmd");

if ($cmd == 'product'){
  	header("location:product.php");
}else if ($cmd == 'save_product'){
  if ($_SESSION["isLogin"]){
    header("location:confirm.php");
  }else{
    alertMassageAndRedirect('กรุณาลงชื่อเข้าใช้งาน','login.php');
    	// header("location:login.php");
  }

}else{

  for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
  {

	  if($_SESSION["strProductID"][$i] != "")
	  {
      $tbl_ = $conn->select('products', array('productid' => $_SESSION["strProductID"][$i]), true);

    	if($tbl_ != null){
    		$amount = $tbl_["amount"];
        $count = $_POST["txtQty".$i];

    	   if (intval($count) <= intval($amount)){
           $_SESSION["strQty"][$i] = $_POST["txtQty".$i];
         }
         else{
          alertMassageAndRedirect('จำนวนสินค้าในสต๊อคไม่เพียงพอ','cart.php');
          exit();
        }
      } else{
        $_SESSION["strQty"][$i] = $_POST["txtQty".$i];
         header("location:cart.php");
       }
      }
    }

    header("location:cart.php");
}

?>
