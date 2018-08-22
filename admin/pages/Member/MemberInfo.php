<?php

session_start();
require_once "../../../ConnectDatabase/connectionDb.inc.php";

// $id = getIsset("id") ? id : 0;
$id = getIsset("id");
$cmd = getIsset("__cmd");


$title = '';
$name = '';
$address = '';
$zipcode = '';
$phone = '';
$email = '';
$username = '';
$password = '';



if (intval($id) > 0){
  //Update
  if ($cmd == 'save') {

    $value = array(
        "name"=>getIsset('_name')
         ,"address"=>getIsset('_address')
         ,"zipcode"=>getIsset('_zipcode')
         ,"phone"=>getIsset('_phone')
         ,"email"=>getIsset('_email')
         ,"username"=>getIsset('_username')
         ,"password"=>getIsset('_password')
    );

                 if ($conn->update("member", $value, array("memberid" => $id))) {
                     alertMassageAndRedirect('บันทึกข้อมูลเรียบร้อยแล้ว','MemberList.php');
                 }else{
                     alertMassage("ไม่สามารถบันทึกข้อมูลได้");
                 }


  }else{

    $tbl_member = $conn->select('member', array('memberid' => getIsset('id')), true);

    if($tbl_member != null){
      $name = $tbl_member["name"];
      $address = $tbl_member["address"];
      $zipcode = $tbl_member["zipcode"];
      $phone = $tbl_member["phone"];
      $email = $tbl_member["email"];
      $username = $tbl_member["username"];
      $password = $tbl_member["password"];
    }
  }

  $title = 'แก้ไขข้อมูลสมาชิก';
}else{
  //Insert
  if ($cmd == 'save') {

    // $password = getIsset('_password')
    // $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

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
        alertMassageAndRedirect('บันทึกข้อมูลเรียบร้อยแล้ว','MemberList.php');
     }else{
        alertMassage("ไม่สามารถบันทึกข้อมูลได้");
     }
 }else{
   alertMassage('ชื่อผู้ใช้งานนี้มีอยู่ในระบบแล้ว');
 }

  }
    $title = 'เพิ่มข้อมูลสมาชิก';
}

if($cmd == 'delete'){
  //delete
    if($conn->delete("member",array("memberid"=>$id))){
        alertMassage("ลบสำเร็จ");
    }else{
        alertMassage("ลบไม่สำเร็จ");
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
                  <label for="inputEmail3" class="col-sm-2 control-label">ชื่อ-สกุล</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" name="_name" placeholder="ชื่อ-สกุล" value="<?php echo $name ?>" required=required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">ที่อยู่</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" name="_address" placeholder="ที่อยู่" value="<?php echo $address ?>" required=required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label txtNumber">รหัสไปรษณีย์</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control txtNumber" id="inputEmail3" name="_zipcode" placeholder="รหัสไปรษณีย์" value="<?php echo $zipcode ?>" required=required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label txtNumber">เบอร์โทร</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" name="_phone" placeholder="เบอร์โทร" value="<?php echo $phone ?>" required=required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">อีเมล์</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" name="_email" placeholder="อีเมล์" value="<?php echo $email ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">ชื่อผู้ใช้งาน</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" name="_username" placeholder="ชื่อผู้ใช้งาน" value="<?php echo $username ?>" required=required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">รหัสผ่าน</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" name="_password" placeholder="รหัสผ่าน" value="<?php echo $password ?>" required=required>
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
      window.location = 'MemberList.php';
  }
</script>
</body>
</html>
