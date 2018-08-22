<?php
session_start();

require_once "ConnectDatabase/connectionDb.inc.php";

$id = getIsset("id");

if (intval($id) > 0){
  $tbl_webboard = $conn->select('webboard', array('QuestionID' => getIsset('id')), true);

    if($tbl_webboard != null){
        $QuestionID = $tbl_webboard["QuestionID"];
        $CreateDate = $tbl_webboard["CreateDate"];
        $Question = $tbl_webboard["Question"];
        $Details = $tbl_webboard["Details"];
        $Name = $tbl_webboard["Name"];
        $View = $tbl_webboard["View"];
        $Reply = $tbl_webboard["Reply"];
      }

  $sql = "select * from reply where QuestionID = $id ";
  $tbl_reply = $conn->queryRaw($sql);


}

if($_REQUEST[btnsave])	{
		$valueReply = array(
					"QuestionID"=>$id
					 ,"Details"=>getIsset('replyDetail')
					 ,"Name"=>$_SESSION["memberName"]
					 ,"CreateDate"=>date("Y-m-d H:i:s")
			);

		if($conn->create("reply",$valueReply)){

       $countReply= intval($Reply) + 1;
       $conn = getDbConnection()->getConnection();
       $sql = "UPDATE webboard SET Reply = $countReply WHERE QuestionID = $id";
       $conn->query($sql);

				alertMassageAndRedirect('ตอบกลับกระทู้เรียบร้อยแล้ว','Webboard.php');
		 }else{
				alertMassage("ไม่สามารถตอบกลับกระทู้ได้");
		 }
 }else{
   //update View
   $countView = intval($View) + 1;
   $conn1 = getDbConnection()->getConnection();
   $sql = "UPDATE webboard SET View = $countView WHERE QuestionID = $id";
   $conn1->query($sql);
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
	<!-- <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css"> -->
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
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="vendor/datatables.net-bs/css/dataTables.bootstrap.min.css">
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
						<h4 class="m-text26 p-b-36 p-t-15" align="center">
							กระทู้<?php echo $Question ; ?>
						</h4>
						<div class="bo4 of-hidden m-b-20">
            				<div class="panel-body">
            					<h3><?php echo $Question ; ?></h3><hr>
            					<table width="100%">
            						<tr valign="middle">
            							<td width="180px"><strong><i class="fa fa-clock-o"></i> <?php echo $CreateDate ; ?></strong>
            							<td><strong><i class="fa fa-user"></i> <?php echo $Name ; ?> </strong>
            							<td width="60px">
            															<td width="60px">
            													</table>
            					<br><br>
            					<p><?php echo $Details ; ?></p>
            				</div>
          </div>

          <?php

                      $index =0;
                              foreach ($tbl_reply as $row) {
                                  $index++;

                                  ?>

                                  <div class="bo4 of-hidden m-b-20">
                                          <div class="panel-body">
                                            <h3>ตอบกลับ#<?php echo $index;?>
                                             <?php echo $Question ; ?></h3>
                                              <hr>

                                            <table width="100%">
                                              <tr valign="middle">
                                                <td width="180px"><strong><i class="fa fa-clock-o"></i> <?php echo $row['CreateDate'] ; ?></strong>
                                                <td><strong><i class="fa fa-user"></i> <?php echo $row['Name'] ; ?> </strong>
                                                <td width="60px">
                                                                <td width="60px">
                                                            </table>
                                            <br><br>
                                            <p><?php echo $row['Details'] ; ?></p>
                                          </div>
                                </div>
                                  <?php
                                             }
                                         ?>
	<?php if ($_SESSION["isLogin"] == '1') { ?>
          	<form class="leave-comment" method="post">
          				<div class="panel panel-default">
          					<div class="panel-heading"><h4><i>Re: <?php echo $Question ; ?></i></h4></div>
          					<div class="panel-body">

          						<script src="bower_components/ckeditor/ckeditor.js"></script>
          						<div class="form-group">
          							<textarea id="replyDetail" name="replyDetail" rows="10" class="form-control" required></textarea>
          						</div>
          					</div>
                    <div class="m-text26 p-b-36 p-t-15" align="center">
                    <div class="w-size25">
                      <!-- Button -->
                      <button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" name="btnsave" value="true">
                        บันทึก
                      </button>
                    </div></div>
          				</div>
					</form>
        <?php } ?>
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
	<!-- <script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script> -->
	<!-- <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script> -->
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
