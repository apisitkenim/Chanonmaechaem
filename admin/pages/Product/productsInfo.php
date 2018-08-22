<?php

session_start();
require_once "../../../ConnectDatabase/connectionDb.inc.php";

$id = getIsset("id");
$cmd = getIsset("__cmd");

$sql = "SELECT *  from productstype ";

$tbl_productstype = $conn->queryRaw($sql);

$total = sizeof($tbl_productstype);


if (intval($id) > 0){
  $tbl_product = $conn->select('products', array('productid' => getIsset('id')), true);

    if($tbl_product != null){
        $productsphoto= $tbl_product["productsphoto"];
        $productsphoto2= $tbl_product["productsphoto2"];
        $productsphoto3= $tbl_product["productsphoto3"];
        $productsphoto4= $tbl_product["productsphoto4"];
        $productscode= $tbl_product["productscode"];
        $productsname = $tbl_product["productsname"];
        $productsprice = $tbl_product["productsprice"];
        $productsdetail = $tbl_product["productsdetail"];
        $amount = $tbl_product["amount"];
        // $status = $tbl_product["status"];
        $readprd = $tbl_product["readprd"];
        $productstypecode = $tbl_product["productstypecode"];

        //size
        // $s= $tbl_product["s"];
        // $m= $tbl_product["m"];
        // $l= $tbl_product["l"];
        // $xl= $tbl_product["xl"];
        // $xxl= $tbl_product["xxl"];

        $productsphoto = "../../../images/$productsphoto";
        $productsphoto2 = "../../../images/$productsphoto2";
        $productsphoto3 = "../../../images/$productsphoto3";
        $productsphoto4 = "../../../images/$productsphoto4";
      }

      $title = 'แก้ไขข้อมูลสินค้า';
}else{
  $title = 'เพิ่มสินค้า';
  $productsphoto = "../../../images/bigImgDefault.jpg";
  $productsphoto2 = "../../../images/bigImgDefault.jpg";
  $productsphoto3 = "../../../images/bigImgDefault.jpg";
  $productsphoto4 = "../../../images/bigImgDefault.jpg";
}

if($cmd == 'delete'){
  //delete
    if($conn->delete("products",array("productid"=>$id))){
        alertMassageAndRedirect('ลบข้อมูลเรียบร้อยแล้ว','productsList.php');
    }else{
    alertMassageAndRedirect('ไม่สามารถลบข้อมูลได้','productsList.php');
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
            <form class="form-horizontal" action="product_insert.php" method="post" enctype="multipart/form-data" >
              <!-- <input type="hidden" name="__cmd" value="save"> -->

              <div class="box-body">
                <input type="hidden" name="_id" value="<?php echo $id ?>">
                <div class="form-group">
                                        <center>
                                        <img id="img-upload" width="200" height="200" src="<?php echo $productsphoto ?>" />
                                        <img id="img-upload2" width="200" height="200" src="<?php echo $productsphoto2 ?>" />
                                        <img id="img-upload3" width="200" height="200" src="<?php echo $productsphoto3 ?>" />
                                        <img id="img-upload4" width="200" height="200" src="<?php echo $productsphoto4 ?>" />

                                        </center>
                                    </div>
                                    <div class="form-group">
                                                            <center>
                                      <span class="text-red">*** ขนาดรูปภาพ 720x960 px. </span>
                                    </center>
                                                                      </div>
                <div class="form-group">
                   <label for="inputPassword3" class="col-sm-2 control-label">รูปภาพ</label>
                      <div class="col-sm-10">
                        <?php if ($id == "0") { ?>
                          <input type="file" onchange="readURL(this);" class="form-control" name="_image" required >
                        <?php } else { ?>
                          <input type="file" onchange="readURL(this);" class="form-control" name="_image" >
                        <?php }  ?>

                      </div>
                </div>

                <div class="form-group">
                   <label for="inputPassword3" class="col-sm-2 control-label">รูปภาพ</label>
                      <div class="col-sm-10">
                          <input type="file" onchange="readURL2(this);" class="form-control" name="_image2" >
                      </div>
                </div>

                <div class="form-group">
                   <label for="inputPassword3" class="col-sm-2 control-label">รูปภาพ</label>
                      <div class="col-sm-10">
                          <input type="file" onchange="readURL3(this);" class="form-control" name="_image3" >
                      </div>
                </div>

                <div class="form-group">
                   <label for="inputPassword3" class="col-sm-2 control-label">รูปภาพ</label>
                      <div class="col-sm-10">
                          <input type="file" onchange="readURL4(this);" class="form-control" name="_image4" >
                      </div>
                </div>


                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">รหัสสินค้า</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" name="_code" placeholder="รหัสสินค้า" value="<?php echo $productscode ?>" required=required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">ชื่อสินค้า</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" name="_name" placeholder="ชื่อสินค้า" value="<?php echo $productsname ?>" required=required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">ประเภทสินค้า</label>

                  <div class="col-sm-10">
                    <!-- <input type="text" class="form-control" id="inputEmail3" name="_name" placeholder="ประเภทสินค้า" value="<?php echo $name ?>"> -->
                    <select class="form-control" name="_type" required=required >
                      <option value="">เลือกประเภทสินค้า</option>

                      <?php

                                  $index =0;
                                          foreach ($tbl_productstype as $row) {
                                              $index++;

                                              ?>
                      <option value="<?php echo $row['productstypeid'];?>" <?php echo ($row['productstypeid']==  $productstypecode) ? ' selected="selected"' : '';?>><?php echo $row['productstypename'];?></option>

                      <?php
                                 }
                             ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">จำนวน</label>

                  <div class="col-sm-10">
                    <input type="number" class="form-control txtNumber" id="inputEmail3" name="_amount" placeholder="จำนวน" value="<?php echo $amount ?>" required=required>
                  </div>
                </div>
                <!-- <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">XS</label>

                  <div class="col-sm-10">
                    <input type="number" class="form-control txtNumber" id="inputEmail3" name="_xs" placeholder="จำนวน" value="<?php echo $xs ?>" required=required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">S</label>

                  <div class="col-sm-10">
                    <input type="number" class="form-control txtNumber" id="inputEmail3" name="_s" placeholder="จำนวน" value="<?php echo $s ?>" required=required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">M</label>

                  <div class="col-sm-10">
                    <input type="number" class="form-control txtNumber" id="inputEmail3" name="_m" placeholder="จำนวน" value="<?php echo $m ?>" required=required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">L</label>

                  <div class="col-sm-10">
                    <input type="number" class="form-control txtNumber" id="inputEmail3" name="_l" placeholder="จำนวน" value="<?php echo $l ?>" required=required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">XL</label>

                  <div class="col-sm-10">
                    <input type="number" class="form-control txtNumber" id="inputEmail3" name="_xl" placeholder="จำนวน" value="<?php echo $xl ?>" required=required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">XXL</label>

                  <div class="col-sm-10">
                    <input type="number" class="form-control txtNumber" id="inputEmail3" name="_xxl" placeholder="จำนวน" value="<?php echo $xxl ?>" required=required>
                  </div>
                </div> -->
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">ราคา</label>

                  <div class="col-sm-10">
                    <input type="number" class="form-control txtNumber" id="inputEmail3" name="_price" placeholder="ราคา" value="<?php echo $productsprice ?>" required=required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">หมวดสินค้า</label>

                  <div class="col-sm-10">
                    <!-- <input type="text" class="form-control" id="inputEmail3" name="_name" placeholder="สินค้าใหม่/ปกติ" value="<?php echo $name ?>"> -->
                    <select class="form-control" name="_typeProduct" required=required>
                      <option value="1" <?php echo ('1'==  $readprd) ? ' selected="selected"' : '';?>>สินค้าใหม่</option>
                      <option value="2" <?php echo ('2'==  $readprd) ? ' selected="selected"' : '';?>>สินค้าลดราคา</option>
                      <option value="3" <?php echo ('3'==  $readprd) ? ' selected="selected"' : '';?>>สินค้าปกติ</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">รายละเอียด</label>

                  <div class="col-sm-10">
                    <!-- <input type="text" class="form-control" id="inputEmail3" name="_detail" placeholder="รายละเอียด" value="<?php echo $name ?>"> -->
                    <textarea
                                    name="_detail"
                                    class="form-control"
                                    rows="4"
                                    placeholder="รายละเอียด"
                                  ><?php echo htmlspecialchars($productsdetail); ?></textarea>
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
      window.location = 'productsList.php';
  }

  function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
            $('#img-upload').attr('src', e.target.result);
          };

          reader.readAsDataURL(input.files[0]);
        }
    }

    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
              $('#img-upload2').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
          }
      }

      function readURL3(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                  $('#img-upload3').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
              }
          }

          function readURL4(input) {
              if (input.files && input.files[0]) {
                  var reader = new FileReader();

                  reader.onload = function (e) {
                    $('#img-upload4').attr('src', e.target.result);
                  };

                  reader.readAsDataURL(input.files[0]);
                }
            }

</script>
</body>
</html>
