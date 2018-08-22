<?php

session_start();
require_once "../../../ConnectDatabase/connectionDb.inc.php";

$id = getIsset("id");
$cmd = getIsset("__cmd");

if (intval($id) > 0){

  $tbl_order = $conn->select('orders', array('orderid' => getIsset('id')), true);

  if($tbl_order != null){
      $refid = $tbl_order["refid"];
      $idcus = $tbl_order["id_cus"];
      $date = convertDateThaiFormatToUtc($tbl_order["data"]);
      $paystatus = $tbl_order["paystatus"];
      $statusnow = $tbl_order["statusnow"];
      $transport = $tbl_order["transport"];
      $sentrate = $tbl_order["sent_rate"];
  }

  $tbl_member = $conn->select('member', array('memberid' => $idcus), true);
  if($tbl_member != null){
      $name = $tbl_member["name"];
      $address = $tbl_member["address"];
      $phone = $tbl_member["phone"];
      $zipcode = $tbl_member["zipcode"];
  }

  $tbl_payment = $conn->select('payment', array('name' => $refid), true);
  if($tbl_payment != null){
      $datepay = $tbl_payment["datepay"];
      $timepay = $tbl_payment["timepay"];
      $price = $tbl_payment["price"];
      $slip = $tbl_payment["slip"];

      $slipPhoto = "../../../images/$slip";
  }

  // $tb_orderDetail = $conn->select('orderdetails', array('orderid' => $id), true);
  $sql = "SELECT * FROM orderdetails WHERE orderid = $id";
  $tb_orderDetail = $conn->queryRaw($sql);

  if ($cmd == 'save'){
    updateStatusConfirm($id);
    alertMassageAndRedirect('บักทึกข้อมูลเรียบร้อยแล้ว','orderList.php');
  }else if ($cmd == 'transport'){
    updateStatusConfirmTransport($id,getIsset("_transport"));
    alertMassageAndRedirect('บักทึกข้อมูลเรียบร้อยแล้ว','orderList.php');
  }
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
              <h3 class="box-title">เลขที่ใบสั่งซื้อ : <?php echo $refid; ?></h3>
              <h3 class="box-title pull-right text-red">สถานะ : <?php echo $statusnow; ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <!-- <input type="hidden" name="__cmd" value="save"> -->

              <div class="box-body">

                <div class="col-sm-12">
                <div class="col-sm-6">
                  <h4>ข้อมูลการสั่งซื้อ</h4>
                  <div class="panel panel-default">
                    <div class="panel-body">
                      <div class="col-sm-12">
                        <h5>วันที่สั่งซื้อ : <?php echo $date; ?></h5>
                      </div>
                        <div class="col-sm-12">
                          <h5>ชื่อ-สกุล : <?php echo $name; ?></h5>
                        </div>
                        <div class="col-sm-12">
                          <h5>ที่อยู่ : <?php echo $address; ?></h5>
                        </div>

                        <div class="col-sm-12">
                          <h5>รหัสไปรษณีย์ : <?php echo $phone; ?></h5>
                        </div>

                        <div class="col-sm-12">
                          <h5>เบอร์โทร : <?php echo $zipcode; ?></h5>
                        </div>
                        <div class="col-sm-12">
                          <h5>วิธีการจัดส่ง: <?php echo $transport; ?></h5>
                        </div>
                        <?php if($statusnow === 'จัดส่งสินค้าเรียบร้อยแล้ว') { ?>
                        <div class="col-sm-12">
                          <h5>หมายเลขติดตาม : <?php echo $sentrate; ?></h5>
                        </div>
                      <?php }

                      if ($statusnow === 'รอจัดส่งสินค้า') { ?>
                      <div class="col-sm-12">
                        <h5>หมายเลขติดตาม : <?php echo $sentrate; ?></h5>
                      </div>
                      <div class="col-sm-12">
                      <input type="text" class="form-control" id="inputEmail3" name="_transport" placeholder="" value="" required=required>

                      </div>
                    <?php } ?>
                    </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <h4>ข้อมูลการชำระเงิน</h4>
                  <div class="panel panel-default">
                    <div class="panel-body">
                      <div class="col-sm-12">
                        <h5>ยอดที่โอน: <?php echo $price; ?></h5>
                      </div>

                      <div class="col-sm-12">
                        <h5>วันที่โอน: <?php echo $datepay; ?></h5>
                      </div>

                      <div class="col-sm-12">
                        <h5>เวลา : <?php echo $timepay; ?></h5>
                      </div>

                      <div class="col-sm-12">
                        <h5>สลิป : </h5>
                        <a href="showimage.php?id=<?php echo $refid; ?>" target="_blank" >
                        <img id="img-upload" width="200" height="200" src="<?php echo $slipPhoto ?>" />
                        </a>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-12">
                <h4>รายการสินค้า</h4>
                <!-- <div class="panel panel-default"> -->
                  <!-- <div class="panel-body"> -->
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>ลำดับ</th>
                          <th>รหัสสินค้า</th>
                          <th>ชื่อสินค้า</th>
                          <th>ไซส์</th>
                          <th>ราคาต่อหน่วย</th>
                          <th>จำนวน</th>
                          <th>รวม</th>
                      </tr>
                      </thead>
                      <tbody>

                             <?php
                              $index =0;
                                  foreach ($tb_orderDetail as $row) {
                                          $index++;
                            $objResult = $conn->select('products', array('productid' => $row['productid']), true);
                            $SumTotal = $SumTotal + $row['total'];
                            ?>

                           <tr>
                             <td><?php echo $index; ?></td>
                             <td><?php echo $objResult['productscode']; ?></td>
                             <td><?php echo $objResult['productsname']; ?></td>
                            <td><?php echo $row['size']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                             <td><?php echo $row['qty']; ?></td>
                             <td><?php echo $row['total']; ?></td>

                           </tr>

                           <?php
                                      }
                                  ?>
                           </tbody>
                           <tfoot>
                             <tr style="background-color: #f8f8f8">
     	                         <td colspan="7" style="text-align: right;">
     							                รวมราคาสินค้า <font size="3"><b> <?php echo $SumTotal; ?> </b></font>บาท
     	                          </td>
     	                       </tr>
                             <tr style="background-color: #f8f8f8">
                                <td colspan="7" style="text-align: right;">
                                  <?php if ($transport == 'POST'){
                                    $transportRate = 30;
                                  }else if ($transport == 'EMS'){
                                    $transportRate = 80;
                                  }else{
                                    $transportRate = 80;
                                  } ?>
                                   ค่าขนส่ง <font size="3"><b> <?php echo $transportRate; ?> </b></font>บาท
                                 </td>
                              </tr>
                              <tr style="background-color: #f8f8f8">
                                <td colspan="7" style="text-align: right;">
                                  <?php
                                    $sum = $transportRate + $SumTotal;
                                  ?>
                                   ยอดรวมที่ต้องชำระ <font size="3"><b> <?php echo $sum; ?> </b></font>บาท
                                 </td>
                              </tr>
                           </tfoot>
                    </table>
                  <!-- </div> -->
                <!-- </div> -->
              </div>


                <input type="hidden" name="id" value="<?php echo $id ?>">

              <!-- /.box-body -->
              <div class="box-footer">
                <center>
                  <?php if ($statusnow == "ชำระเงินแล้ว"){ ?>
                  <button type="submit" class="btn btn-info" name="__cmd" value="save">ยืนยันการชำระเงิน</button>
                <?php } ?>
                  <?php if ($statusnow == "รอจัดส่งสินค้า"){ ?>
                <button type="submit" class="btn btn-success" name="__cmd" value="transport">ยืนยันจัดส่งสินค้า</button>
              <?php } ?>
                <button type="reset" class="btn btn-default" onclick="cancelOnclick()">กลับ</button>
              </center>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
        </div>
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


<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">กรุณากรอกหมายเลขติดตาม</h4>
      </div>
      <div class="modal-body">
        <div class="box-body">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-4 control-label">หมายเลขติดตาม</label>

          <div class="col-sm-8">
            <input type="text" class="form-control" id="inputEmail3" name="_name" placeholder="หมายเลขติดตาม" value="" required=required>
          </div>
        </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">ปิด</button>
        <button type="button" class="btn btn-primary">บันทึก</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


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

$(document).on('keypress', '.txtNumber ', function (event) {
    console.log(event.charCode);
    event = (event) ? event : window.event;
    var charCode = (event.which) ? event.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 46) {
        return false;
    }
    return true;
});

  function cancelOnclick() {
      window.location = 'orderList.php';
  }
</script>
</body>
</html>
