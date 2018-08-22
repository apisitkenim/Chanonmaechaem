<?php
session_start();

require_once "ConnectDatabase/connectionDb.inc.php";

$date = date("Y-m-d");
$time = date("h:i");

$refid = getIsset("_refid");

if($_REQUEST[btnsave])	{
	$statusname = 'สั่งซื้อสินค้า';
	$chk_refid= $conn->select('orders', array('refid' => $refid,'statusnow' => $statusname), true);

 if($chk_refid == null){
	 alertMassage("ไม่พบเลขที่ใบสั่งซื้อ กรุณาตรวจสอบเลขที่สั่งซื้อ");
 }else{

	 if ($_FILES['_slip']['name'] != '') {
	     $path = $_FILES['_slip']['name'];
	     $ext = pathinfo($path, PATHINFO_EXTENSION);
	     $new_image_name = 'img_'.uniqid().".".$ext;
	     $image_path = "images/";
	     $upload_path = $image_path.$new_image_name;

	     //upload to database
	      $isUpload = move_uploaded_file($_FILES['_slip']['tmp_name'], $upload_path);

			}

if ($isUpload==true){
			$value = array(
					"name"=>$refid
					 ,"datepay"=>getIsset('_paydate')
					 ,"timepay"=>getIsset('_paytime')
					 ,"price"=>getIsset('_amount')
					 ,"slip"=>$new_image_name
			);
				 if($conn->create("payment",$value)){
					 	updateStatusOrder($refid,"ชำระเงินแล้ว");
						alertMassageAndRedirect('บันทึกข้อมูลเรียบร้อยแล้ว','history.php');
				 }else{
						alertMassage("ไม่สามารถบันทึกข้อมูลได้");
				 }
 }
else{
	alertMassage("ไม่สามารถอัพโหลดสลิปได้");
}
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>ร้านชานนท์เสื้อผ้าพื้นเมือง</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">

  <!-- Header -->
  <header class="header1">
    <!-- Header desktop -->
    <?php
  include "Header.php";
  ?>


      <div class="wrap_header">

              <?php
            include "menu.php";
            ?>


    </div>

  </header>


	<!-- content page -->
	<section class="bgwhite p-t-66 p-b-60">
		<div class="container">
			<div class="row">

				<div class="col-md-12 p-b-30">
					<form class="leave-comment" method="post" enctype="multipart/form-data">
						<h4 class="m-text26 p-b-36 p-t-15" align="center">
							การชำระเงิน
						</h4>

            <div align="center">
              <img src="images/PromptPay.jpg" alt="IMG-BLOG" width="80" height="60"/>

              <h4 class="p-b-7 m-text11">
              พร้อมเพย์ 0995413486
              </h4>
                ชื่อบัญชี สุริยา ปาน้อย
              <br>
              <br>
              <img src="images/kbank.png" alt="IMG-BLOG" width="100" height="80"/>
              <h4 class="p-b-7 m-text11">
                กสิกรไทย 0171175941
              </h4>

              ชื่อบัญชี สุริยา ปาน้อย
          </div>
					</form>
				</div>
			</div>
		</div>
	</section>


	<!-- Footer -->
  <?php
include "footer_bar.php";
?>


	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>



<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});

		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});
	</script>
<!--===============================================================================================-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
	<script src="js/map-custom.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

	<script>

	$(document).on('keypress', '.txtNumber ', function (event) {
	    console.log(event.charCode);
	    event = (event) ? event : window.event;
	    var charCode = (event.which) ? event.which : event.keyCode;
	    if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 46) {
	        return false;
	    }
	    return true;
	});
	</script>

</body>
</html>
