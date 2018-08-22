<?php

session_start();
require_once "../../../ConnectDatabase/connectionDb.inc.php";

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
					 ,"Name"=>$_SESSION["fullname"]
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
              <h3 class="box-title">กระทู้<?php echo $Question ; ?></h3>
            </div>
            <form class="form-horizontal">
              <br>
              <div class="form-group">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                  <div class="panel panel-default">
                    <!-- คำถาม -->
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
                </div>
              </div>
              <?php

                          $index =0;
                                  foreach ($tbl_reply as $row) {
                                      $index++;

                                      ?>

              <div class="form-group">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                  <div class="panel panel-default">
                    <!-- คำตอบ -->
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
                </div>
              </div>
              <?php
                         }
                     ?>

                       <!-- ตอบกลับ -->
                       <div class="form-group">
                         <div class="col-sm-1">

                           <input type="hidden" name="id" value="<?php echo $id ?>">
                         </div>
                         <div class="col-sm-10">
                           <div class="panel panel-default">
                             	<div class="panel-heading"><h4><i>Re: <?php echo $Question ; ?></i></h4></div>
                             <!-- คำถาม -->
                             <div class="panel-body">
                   						<div class="form-group">
                   							<textarea id="replyDetail" name="replyDetail" rows="10" class="form-control" required></textarea>
                   						</div>
                   					</div>
                            <div class="panel-footer">
                              <!-- <div class="box-footer"> -->
                         <center>
                           <button type="submit" class="btn btn-info" name="btnsave" value="true">ตกลง</button>
                         <button type="reset" class="btn btn-default" onclick="cancelOnclick()">ยกเลิก</button>
                       </center>
                       <!-- </div> -->
                            </div>
                           </div>

                         </div>
                       </div>


            </form>
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
      window.location = 'Webboard.php';
  }
</script>
</body>
</html>
