<?php

session_start();
require_once "../../../ConnectDatabase/connectionDb.inc.php";

// $id = getIsset("id") ? id : 0;
$id = getIsset("id");
$cmd = getIsset("__cmd");


$title = '';
$name = '';
$code = '';
// $message = '';

// $message = generate_action_tag('error', 'Username หรือ Password ผิดพลาด กรุณาตรวจสอบ');

if (intval($id) > 0){
  //Update
  if ($cmd == 'save') {

    $value = array(
        "productstypecode"=>getIsset('_code')
         ,"productstypename"=>getIsset('_name')
    );

                 if ($conn->update("productstype", $value, array("productstypeid" => $id))) {
                     alertMassageAndRedirect('บันทึกข้อมูลเรียบร้อยแล้ว','productstypeList.php');
                 }else{
                     alertMassage("ไม่สามารถบันทึกข้อมูลได้");
                 }


  }else{

    $tbl_productstype = $conn->select('productstype', array('productstypeid' => getIsset('id')), true);

    if($tbl_productstype != null){
      $code = $tbl_productstype["productstypecode"];
      $name = $tbl_productstype["productstypename"];

    }
  }

  $title = 'แก้ไขประเภทสินค้า';
}else{
  //Insert
  if ($cmd == 'save') {

    // $password = getIsset('_password')
    // $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

    $value = array(
        "productstypecode"=>getIsset('_code')
         ,"productstypename"=>getIsset('_name')
    );

  $chk_isnew = $conn->select('productstype', array('productstypecode' => getIsset('_code')), true);

 if($chk_isnew == null){
     if($conn->create("productstype",$value)){
        alertMassageAndRedirect('บันทึกข้อมูลเรียบร้อยแล้ว','productstypeList.php');
     }else{
        alertMassage("ไม่สามารถบันทึกข้อมูลได้");
     }
 }else{
   alertMassage('รหัสนี้มีการใช้งานแล้ว');
 }

  }
    $title = 'เพิ่มประเภทสินค้า';
}

if($cmd == 'delete'){
  //delete
    if($conn->delete("productstype",array("productstypeid"=>$id))){
        alertMassageAndRedirect('ลบข้อมูลเรียบร้อยแล้ว','productstypeList.php');
    }else{
    alertMassageAndRedirect('ไม่สามารถลบข้อมูลได้','productstypeList.php');
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
              <h3 class="box-title"><?php echo $title ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <!-- <input type="hidden" name="__cmd" value="save"> -->

              <div class="box-body">
                <input type="hidden" name="id" value="<?php echo $id ?>">

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">รหัส</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" name="_code" placeholder="รหัส" value="<?php echo $code ?>" required=required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">ประเภทสินค้า</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" name="_name" placeholder="ประเภทสินค้า" value="<?php echo $name ?>" required=required>
                  </div>
                </div>

              <!-- /.box-body -->
              <div class="box-footer">
                <center>
                  <button type="submit" class="btn btn-info" name="__cmd" value="save">ตกลง</button>
                <button type="reset" class="btn btn-default" onclick="cancelOnclick()">ยกเลิก</button>
              </center>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
          <?php echo $message; ?>
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

  function cancelOnclick() {
      window.location = 'productstypeList.php';
  }
</script>
</body>
</html>
