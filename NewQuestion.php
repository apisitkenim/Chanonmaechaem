<?php
session_start();

require_once "ConnectDatabase/connectionDb.inc.php";

		if($_REQUEST[btnsave])	{

			$value = array(
					"Question"=>getIsset('_question')
					 ,"Details"=>getIsset('_detail')
					 ,"Name"=>$_SESSION["memberName"]
					 ,"CreateDate"=>date("Y-m-d H:i:s")
					 ,"View"=>0
					 ,"Reply"=>0
			);

		 if($conn->create("webboard",$value)){
				alertMassageAndRedirect('ตั้งกระทู้เรียบร้อยแล้ว','Webboard.php');
		 }else{
				alertMassage("ไม่สามารถตั้งกระทู้ได้");
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
							ตั้งกระทู้ใหม่
						</h4>
						<div class="bo4 of-hidden size15 m-b-20">

							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="_question" placeholder="หัวข้อ" required="required" max="255">
						</div>

						<div class="bo4 of-hidden m-b-20">
							<!-- <input class="sizefull s-text7 p-l-22 p-r-22 txtNumber" type="number" name="_phone" placeholder="เบอร์โทร" required="required" maxlength="10"> -->
              <textarea
                              name="_detail"
                              class="form-control"
                              rows="10"
                              placeholder="รายละเอียด"
                           required  ><?php echo htmlspecialchars($productsdetail); ?></textarea>
            </div>

            <div class="m-text26 p-b-36 p-t-15" align="center">
						<div class="w-size25">
							<!-- Button -->
							<button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" name="btnsave" value="true">
								บันทึก
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
	<!-- Bootstrap 3.3.7 -->
	<script src="admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

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
