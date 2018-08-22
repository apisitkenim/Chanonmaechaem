<?php
session_start();

require_once "ConnectDatabase/connectionDb.inc.php";

		if($_REQUEST[btnLogin])	{

			$user_name = getIsset('username');
			$password = getIsset('password');

			$chk_login = $conn->select('member', array('username' => $user_name,'password' => $password), true);

			if ($chk_login != null) {

							$_SESSION["isLogin"] = true;

							$_SESSION["memberid"] = $chk_login["memberid"];
							$_SESSION["memberName"] = $chk_login["name"];
							$_SESSION["memberAddress"] = $chk_login["address"];
							$_SESSION["memberZipcode"] = $chk_login["zipcode"];
							$_SESSION["memberPhone"] = $chk_login["phone"];
							$_SESSION["isLogin"] = true;

							session_write_close();

								// redirectTo($_SERVER["SERVER_PORT"] . '/index.php');
							header('Location: ./index.php');

					} else {
					// $message = generate_action_tag('error', 'Username หรือ Password ผิดพลาด กรุณาตรวจสอบ');
					alertMassage("Invalid User Account !");
			}

// 				$sql = "SELECT * FROM member where username='".$_REQUEST[username]."' and password='".$_REQUEST[password]."' and isActive = '1'";
// 				$result = $conn->query($sql);
//
//
// 				if ($result->num_rows > 0) {
//
// while($row = $result->fetch_assoc()) {
//   $_SESSION["userID"] = $row['memberid'];
//    // echo "<script> alert('". $row['name'] ."');location.href='index.php';</script>";
// }
//           $_SESSION["username"] = $_REQUEST[username];
//           //
//
// 				 echo "<script> alert('". $result->num_rows   ."');location.href='index.php';</script>";
// 				} else {
//
// 		echo "<script> alert('Please check username and password'); history.back(); </script>";
// 	}
//
// $conn->close();

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
						เข้าสู่ระบบ
						</h4>

							<p>ชื่อผู้ใช้งาน</p>
            <div class="bo4 of-hidden size15 m-b-20">
              <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="username" placeholder="" required="required" maxlength="20">
            </div>

							<p>รหัสผ่าน</p>
            <div class="bo4 of-hidden size15 m-b-20">
              <input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="password" placeholder="" required="required" maxlength="20">
            </div>
            <div class="m-text26 p-b-36 p-t-15" align="center">
						<div class="w-size25">
							<!-- Button -->
							<button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" name="btnLogin" value="true">
								เข้าสู่ระบบ
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

</body>
</html>
