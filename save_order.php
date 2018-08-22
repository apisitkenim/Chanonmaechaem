<?php

require_once "ConnectDatabase/connectionDb.inc.php";
session_start();

$transfer = $_POST['transfer'];

$refid = substr(date("Y"),2,2).date("md").rand(1000,10000); //Format ปี 2 หลัก เดือนวัน แล้ว random 4 หลัก


$value = array(
    "refid"=>$refid
     ,"id_cus"=>$_SESSION["memberid"]
     ,"data"=>date("Y-m-d H:i:s")
     ,"paystatus"=>'รอชำระเงิน'
     ,"statusnow"=>'สั่งซื้อสินค้า'
     ,"sent_rate"=>''
     ,"transport"=>$transfer
);

if($conn->create("orders",$value)){
  $lastID = $conn->getLastInsertId();

    for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
    {
  	  if($_SESSION["strProductID"][$i] != "")
  	  {
        $strProductID = $_SESSION["strProductID"][$i] ;
        $objResult = $conn->select('products', array('productid' => $strProductID), true);

        $Total = $_SESSION["strQty"][$i] * $objResult["productsprice"];
        $SumTotal = $SumTotal + $Total;

        //insert detail
        inserOrderDetail($lastID,$_SESSION["strProductID"][$i],$_SESSION["strQty"][$i],$objResult["productsprice"],$Total,$_SESSION["strSize"][$i]);

        //update stock
        $countStock = $objResult["amount"] - $_SESSION["strQty"][$i];
        updateStock($_SESSION["strProductID"][$i],$countStock);
  	  }
    }

   unset($_SESSION['intLine']);
   unset($_SESSION['strProductID']);
   unset($_SESSION['strQty']);

  header("location:order_detail.php?id=$lastID");
}

?>
