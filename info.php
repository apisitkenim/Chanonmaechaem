<?php
session_start();

require_once "ConnectDatabase/connectionDb.inc.php";

$id = getIsset("id");

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

      if ($conn->update("member", $value, array("memberid" => $id))) {
          alertMassageAndRedirect('บันทึกข้อมูลเรียบร้อยแล้ว','index.php');
      }else{
          alertMassage("ไม่สามารถบันทึกข้อมูลได้");
      }

	// $chk_isnew = $conn->select('member', array('username' => getIsset('_username')), true);
 //
 // if($chk_isnew == null){
	// 	 if($conn->create("member",$value)){
	// 			alertMassageAndRedirect('สมัครสมาชิกเรียบร้อยแล้ว','index.php');
	// 	 }else{
	// 			alertMassage("ไม่สามารถสมัครสมาชิกได้");
	// 	 }
 // }else{
	//  alertMassage('ชื่อผู้ใช้งานนี้มีอยู่ในระบบแล้ว');
 // }
}

  $tbl_member = $conn->select('member', array('memberid' => $id), true);

  if($tbl_member != null){
    $name = $tbl_member["name"];
    $address = $tbl_member["address"];
    $zipcode = $tbl_member["zipcode"];
    $phone = $tbl_member["phone"];
    $email = $tbl_member["email"];
    $username = $tbl_member["username"];
    $password = $tbl_member["password"];
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
							ข้อมูลส่วนตัว
						</h4>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="_name" placeholder="ชื่อ - สกุล" required="required" max="255" value=<?php echo $name;?>>
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22 txtNumber" type="number" name="_phone" placeholder="เบอร์โทร" required="required" maxlength="10"value=<?php echo $phone;?>>
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="email" name="_email" placeholder="อีเมล์" maxlength="50" value=<?php echo $email;?>>
						</div>

						<textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="_address" placeholder="ที่อยู่" required="required" maxlength="255"><?php echo $address;?></textarea>

            <div class="bo4 of-hidden size15 m-b-20">
              <input class="sizefull s-text7 p-l-22 p-r-22 txtNumber" type="number" name="_zipcode" placeholder="รหัสไปรษณีย์" required="required" maxlength="5" value=<?php echo $zipcode;?>>
            </div>
            <div class="bo4 of-hidden size15 m-b-20">
              <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="_username" placeholder="ชื่อผู้ใช้งาน" required="required" maxlength="20" value=<?php echo $username;?>>
            </div>
            <div class="bo4 of-hidden size15 m-b-20">
              <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="_password" placeholder="รหัสผ่าน" required="required" maxlength="20" value=<?php echo $password;?>>
            </div>
            <div class="m-text26 p-b-36 p-t-15" align="center">
						<div class="w-size25">
							<!-- Button -->
							<button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" name="btnregis" value="true">
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
