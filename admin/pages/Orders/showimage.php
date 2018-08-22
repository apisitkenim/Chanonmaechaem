<?php

session_start();
require_once "../../../ConnectDatabase/connectionDb.inc.php";

$refid = getIsset("id");

if (intval($refid) > 0){

  $tbl_payment = $conn->select('payment', array('name' => $refid), true);
  if($tbl_payment != null){
      $datepay = $tbl_payment["datepay"];
      $timepay = $tbl_payment["timepay"];
      $price = $tbl_payment["price"];
      $slip = $tbl_payment["slip"];

      $slipPhoto = "../../../images/$slip";
  }

}
?>

<html>
<head>
  <title>ร้านชานนท์ by chanon</title>
</head>
<body>
<center>
<img id="img-upload" width="800" height="800" src="<?php echo $slipPhoto ?>" />
</center>
</body>
</html>
