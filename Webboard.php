<?php
session_start();

require_once "ConnectDatabase/connectionDb.inc.php";

$sql = "select * from webboard ";

$select_allwebboard = $conn->queryRaw($sql);

$totalwebboard = sizeof($select_allwebboard);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>ร้านชานนท์เสื้อผ้าพื้นเมือง</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- ===============================================================================================-->
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
<!--=============================================================================================== -->
<!-- DataTables -->
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
							เว็บบอร์ด
						</h4>
						<?php if ($_SESSION["isLogin"] == '1') { ?>
             <div class="box-tools pull-right">
                                <a id="body_btnAdd" class="btn btn-search btn-primary btn-sm" href="NewQuestion.php?id=0"><i class="fa fa-plus xs"></i>&nbsp;&nbsp;ตั้งกระทู้ใหม่</a>
                            </div>
                            <br>  <br>   <br>  <br>
													<?php } ?>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>ลำดับ</th>
                  <th>หัวข้อ</th>
                  <th>โดย</th>
                  <th>วัน/เวลา</th>
                  <th>อ่าน</th>
                    <th>ตอบ</th>
              </tr>
              </thead>
              <tbody>
                <?php

                            $index =0;
                                    foreach ($select_allwebboard as $row) {
                                        $index++;

                                        ?>

                   <tr>
                     <td><div align="center"><?php echo $index; ?></div></td>
                     <td><a href="ViewWebboard.php?id=<?php echo $row['QuestionID']; ?>"><?php echo $row['Question']; ?></a></td>
                     <td><?php echo $row['Name']; ?></td>
                     <td><div align="center"><?php echo $row['CreateDate']; ?></div></td>
                     <td align="right"><?php echo $row['View']; ?></td>
                     <td align="right"><?php echo $row['Reply']; ?></td>
                   </tr>
                   <?php
                              }
                          ?>
                   </tbody>
            </table>
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

  <!-- Bootstrap 3.3.7 -->
  <script src="admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- DataTables -->
  <script src="vendor/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

  <!-- page script -->
	<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script> -->





  <script type="text/javascript">
  $(document).ready(function () {
      $("#example1").DataTable({
          "oLanguage": {
              "sLengthMenu": "แสดง _MENU_ เร็คคอร์ด ต่อหน้า",
              "sZeroRecords": "ไม่พบข้อมูลที่ค้นหา",
              "sInfo": "แสดง _START_ ถึง _END_ ของ _TOTAL_ เร็คคอร์ด",
              "sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 เร็คคอร์ด",
              "sInfoFiltered": "(จากเร็คคอร์ดทั้งหมด _MAX_ เร็คคอร์ด)",
              "sSearch": "ค้นหา :",
              "oPaginate": {
                  "sFirst": "เิริ่มต้น",
                  "sPrevious": "ก่อนหน้า",
                  "sNext": "ถัดไป",
                  "sLast": "สุดท้าย"
              }
          }
      });
  });


    function editOnclick(id) {
        window.location = 'newsInfo.php?id=' + id;
    }

    function DelOnclick(id) {
      		if(confirm('คุณต้องการลบข้อมูล ใช่ หรือ ไม่?')==true)
      		{
      			window.location = 'newsInfo.php?id=' + id +'&__cmd=delete';
      		}
    }
  </script>

</body>
</html>
