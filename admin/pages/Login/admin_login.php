<?php
session_start();
require_once "../../../ConnectDatabase/connectionDb.inc.php";
$cmd = isset($_POST['__cmd']) ? $_POST['__cmd'] : '';

// $message = '';
if ('login' == $cmd) {

    $user_name = getIsset('username');
    $password = getIsset('password');

    $chk_login = $conn->select('user', array('username' => $user_name,'password' => $password), true);

    if ($chk_login != null) {

          $_SESSION["userid"] =$chk_login["userid"];
          $_SESSION["fullname"] =$chk_login["name"];

            // $session = array(
            //     "userid" => $chk_login["userid"],
            //     "fullname" => $chk_login["name"]);

              // redirectTo(ROOTPATH . '/pages/Index/index.php');
              header("location:../Index/index.php");
        } else {
        // $message = generate_action_tag('error', 'Username หรือ Password ผิดพลาด กรุณาตรวจสอบ');
        alertMassage("ชื่อผู้ใช้งาน หรือ รหัสผ่านไม่ถูกต้อง");
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
<body class="hold-transition login-page">

  <div class="login-box">
    <div class="login-logo">
      ชานนท์ by chanon
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">เข้าสู่ระบบ</p>

      <form method="post">
        <input type="hidden" name="__cmd" value="login">

        <div class="form-group has-feedback">
          <input type="text" class="form-control" name="username" placeholder="ชื่อผู้ใช้งาน" required=required>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control"  name="password" placeholder="รหัสผ่าน" required=required>
        </div>
        <div class="row">
          <div class="col-xs-8">

          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat" name="btnLogin">เข้าสู่ระบบ</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-box-body -->
  </div>


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
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass   : 'iradio_square-blue',
      increaseArea : '20%' // optional
    })
  })
</script>
</body>
</html>
