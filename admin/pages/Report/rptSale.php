<?php

session_start();
require_once "../../../ConnectDatabase/connectionDb.inc.php";

$datenow = date("Y-m-d");

$cmd = getIsset("__cmd");
$startdate = getIsset("_startdate");
$enddate = getIsset("_enddate");

if ($cmd == 'save'){
  $sql = "SELECT * , sum(qty) as qtys , sum(total) as totals FROM orders INNER JOIN orderdetails  ON orders.orderid = orderdetails.orderid  WHERE data BETWEEN '$startdate' AND '$enddate' AND  paystatus = 'ชำระเงินแล้ว' group by productid ";

  $select_all = $conn->queryRaw($sql);

  $total = sizeof($select_all);
}
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

        <!-- DataTables -->
      <script src="../../bower_components/datatables/jquery.dataTables.min.js"></script>
      <script src="../../bower_components/datatables/dataTables.bootstrap.min.js"></script>
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
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">รายงานข้อมูลการขาย</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <!-- <input type="hidden" name="__cmd" value="save"> -->

              <div class="box-body">

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">ระหว่างวันที่</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" name="_startdate" value="<?php echo $datenow;?>" required=required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">ถึงวันที่</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" name="_enddate"  value="<?php echo $datenow;?>" required=required>
                  </div>
                </div>

                <div class="box-footer">
                  <center>
                    <button type="submit" class="btn btn-info" name="__cmd" value="save">ตกลง</button>
                </center>
                </div>

                <?php if ($cmd == 'save') { ?>
                  <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อสินค้า</th>
                        <th>ราคา</th>
                        <th>จำนวน</th>
                        <th>รวม</th>
                      </tr>
                      </thead>
                      <tbody>

                             <?php
                              $index =0;
                                  foreach ($select_all as $row) {
                                          $index++;
                            $objResult = $conn->select('products', array('productid' => $row['productid']), true);

                            $SumCount = $SumCount + $row['qtys'];
                            $SumTotal = $SumTotal + $row['totals'];
                            ?>

                           <tr>
                             <td><?php echo $index; ?></td>
                             <td><?php echo $objResult['productsname']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                            <td><?php echo $row['qtys']; ?></td>
                             <td><?php echo $row['totals']; ?></td>

                           </tr>

                           <?php
                                      }
                                  ?>
                           </tbody>
                           <tfoot>
                             <tr style="background-color: #BEBEBE">
										            <td colspan="3" class="text-center">
											             รวมทั้งสิ้น
										            </td>
                                <td>
                                  <?php echo $SumCount; ?>
                                </td>
                                <td>
                                  <?php echo sprintf('%0.2f', $SumTotal); ?>
                                </td></tr>

                           </tfoot>
                    </table>
                  <?php } ?>
                  <!-- </div> -->
                <!-- </div> -->
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>

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
<!-- <script> -->
<script type="text/javascript">
    $(document).ready(function () {
        // $("#example1").DataTable({
        //     "oLanguage": {
        //         "sLengthMenu": "แสดง _MENU_ เร็คคอร์ด ต่อหน้า",
        //         "sZeroRecords": "ไม่พบข้อมูลที่ค้นหา",
        //         "sInfo": "แสดง _START_ ถึง _END_ ของ _TOTAL_ เร็คคอร์ด",
        //         "sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 เร็คคอร์ด",
        //         "sInfoFiltered": "(จากเร็คคอร์ดทั้งหมด _MAX_ เร็คคอร์ด)",
        //         "sSearch": "ค้นหา :",
        //         "oPaginate": {
        //             "sFirst": "เิริ่มต้น",
        //             "sPrevious": "ก่อนหน้า",
        //             "sNext": "ถัดไป",
        //             "sLast": "สุดท้าย"
        //         }
        //     }
        // });
    });

  function editOnclick(id) {
      window.location = 'productstypeInfo.php?id=' + id;
  }

  function DelOnclick(id) {
    		if(confirm('คุณต้องการลบข้อมูล ใช่ หรือ ไม่?')==true)
    		{
    			window.location = 'productstypeInfo.php?id=' + id +'&__cmd=delete';
    		}
  }
</script>
</body>
</html>
