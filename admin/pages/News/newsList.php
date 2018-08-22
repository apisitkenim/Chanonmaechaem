<?php

session_start();
require_once "../../../ConnectDatabase/connectionDb.inc.php";

$sql = "select * from news ";

$select_all = $conn->queryRaw($sql);

$total = sizeof($select_all);

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ร้านชานนท์ by chanon</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
  <?php include "../Menu/navbar.php" ?>
  </header>
  <!-- Left side column. contains the logo and sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php include "../Menu/SidebarMenu.php" ?>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">ข่าวสาร/กิจกรรม</h3>
              <div class="box-tools pull-right">
                                <a id="body_btnAdd" class="btn btn-search btn-primary btn-sm" href="newsInfo.php?id=0"><i class="fa fa-plus xs"></i>&nbsp;&nbsp;เพิ่มข่าวสาร/กิจกรรม</a>
                            </div>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ลำดับ</th>
                    <th>หัวข้อ</th>
                    <th>วันที่</th>
                    <th>แก้ไข</th>
                    <th>ลบ</th>
                </tr>
                </thead>
                <tbody>

                       <?php

                                   $index =0;
                                           foreach ($select_all as $row) {
                                               $index++;

                                               ?>
                     <tr>
                       <td><?php echo $index; ?></td>
                       <td><?php echo $row['topic']; ?></td>
                         <td><?php echo $row['datenews']; ?></td>
                         <td align="center">
                         <a onclick="editOnclick(<?php echo $row['newsid']; ?>)"><i class="fa fa-edit md"></i></a>
                       </td>
                         <td align="center">
                         <a onclick="DelOnclick(<?php echo $row['newsid']; ?>)"><i class="fa fa-remove md"></i></a>
                       </td>
                     </tr>

                     <?php
                                }
                            ?>
                     </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<script>
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
