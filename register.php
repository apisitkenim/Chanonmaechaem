<?php
session_start();

require_once "ConnectDatabase/connectionDb.inc.php";

		if($_REQUEST[btnregis])	{

			$value = array(
					"name"=>getIsset('_name')
					 ,"address"=>getIsset('_address')
					 ,"zipcode"=>getIsset('_zipcode')
					 ,"phone"=>getIsset('_phone')
					 ,"email"=>getIsset('_email')
					 ,"username"=>getIsset('_username')
					 ,"password"=>getIsset('_password')
					 ,"isActive"=>true
			);

	$chk_isnew = $conn->select('member', array('username' => getIsset('_username')), true);

 if($chk_isnew == null){
		 if($conn->create("member",$value)){
				alertMassageAndRedirect('Success','index.php');
		 }else{
				alertMassage("Can not Use !");
		 }
 }else{
	 alertMassage('Can not Use ! ');
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
					<form class="leave-comment" method="post">
						<h4 class="m-text26 p-b-36 p-t-15" align="center">
							สมัครสมาชิก
						</h4>

  					<p>ชื่อ - สกุล</p>
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="_name" placeholder="" required="required" max="255">
						</div>

						<p>เบอร์โทร</p>
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22 txtNumber" type="number" name="_phone" placeholder="" required="required" maxlength="10">
						</div>

							<p>อีเมล์</p>
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="email" name="_email" placeholder="" maxlength="50">
						</div>

							<p>ที่อยู่</p>
						<textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="_address" placeholder="" required="required" maxlength="255"></textarea>

							<p>รหัสไปรษณีย์</p>
            <div class="bo4 of-hidden size15 m-b-20">
              <input class="sizefull s-text7 p-l-22 p-r-22 txtNumber" type="number" name="_zipcode" placeholder="" required="required" maxlength="5">
            </div>

							<p>ชื่อผู้ใช้งาน</p>
            <div class="bo4 of-hidden size15 m-b-20">
              <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="_username" placeholder="" required="required" maxlength="20">
            </div>

							<p>รหัสผ่าน</p>
            <div class="bo4 of-hidden size15 m-b-20">
              <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="_password" placeholder="" required="required" maxlength="20">
            </div>
            <div class="m-text26 p-b-36 p-t-15" align="center">
						<div class="w-size25">
							<!-- Button -->
							<button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" name="btnregis" value="true">
								สมัครสมาชิก
							</button>
						</div></div>
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
