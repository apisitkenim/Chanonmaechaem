
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

         <style>
         .container{
       margin-top:20px;
   }
   .image-preview-input {
       position: relative;
   	overflow: hidden;
   	margin: 0px;
       color: #333;
       background-color: #fff;
       border-color: #ccc;
   }
   .image-preview-input input[type=file] {
   	position: absolute;
   	top: 0;
   	right: 0;
   	margin: 0;
   	padding: 0;
   	font-size: 20px;
   	cursor: pointer;
   	opacity: 0;
   	filter: alpha(opacity=0);
   }
   .image-preview-input-title {
       margin-left:2px;
   }

   /* .img{
  max-width:100px;
  height:100px;
  margin-top:20px;
}
.input{
    margin-top:20px;
} */

    </style>
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

                                        <img id="img-upload1" width="200" height="200" src="<?php echo $productsphoto ?>" />

                                        <img id="img-upload" width="200" height="200" src="<?php echo $productsphoto ?>" />
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
                                            <!-- image-preview-filename input [CUT FROM HERE]-->
                                            <div class="container">
    	<div class="row">
    		<input type='file' onchange="readURL(this);" class="form-control"/>

    	</div>
    	<img id="blah" src="http://placehold.it/180" alt="your image" width="200" height="200"/>
    </div>
                                            <!-- /input-group image-preview [TO HERE]-->
                                        </div>


                                        <div class="container">
                                      <div class="row">
                                      <input type='file' onchange="readURL1(this);" class="form-control"/>

                                      </div>
                                      <img id="blah" src="http://placehold.it/180" alt="your image" width="200" height="200"/>
                                      </div>


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

    $(document).on('click', '#close-preview', function () {
            $('.image-preview').popover('hide');
            // Hover befor close the preview
            $('.image-preview').hover(
                function () {
                    $('.image-preview').popover('show');
                },
                 function () {
                     $('.image-preview').popover('hide');
                 }
            );
        });

        $(function () {
            // Create the close button
            var closebtn = $('<button/>', {
                type: "button",
                text: 'x',
                id: 'close-preview',
                style: 'font-size: initial;',
            });
            closebtn.attr("class", "close pull-right");
            // Set the popover default content
            $('.image-preview').popover({
                trigger: 'manual',
                html: true,
                title: "<strong>Preview</strong>" + $(closebtn)[0].outerHTML,
                content: "ไม่มีรูปภาพ",
                placement: 'bottom'
            });
            // Clear event
            $('.image-preview-clear').click(function () {
                $('.image-preview').attr("data-content", "").popover('hide');
                $('.image-preview-filename').val("");
                $('.image-preview-clear').hide();
                $('.image-preview-input input:file').val("");
                $('#img-upload').attr('src', "../../../images/bigImgDefault.jpg");
                $(".image-preview-input-title").text("เลือก");
            });
            // Create the preview image
            $(".image-preview-input input:file").change(function () {
                var img = $('<img/>', {
                    id: 'dynamic',
                    width: 250,
                    height: 200
                });
                var file = this.files[0];
                var reader = new FileReader();
                // Set preview image into the popover data-content
                reader.onload = function (e) {
                    $(".image-preview-input-title").text("เปลี่ยน");
                    $(".image-preview-clear").show();
                    $(".image-preview-filename").val(file.name);
                    img.attr('src', e.target.result);
                    $('#img-upload').attr('src', e.target.result);
                    //$(".image-preview").attr("data-content", $(img)[0].outerHTML).popover("show");
                }
                reader.readAsDataURL(file);
            });
        });

        function readURL(input) {
                   if (input.files && input.files[0]) {
                       var reader = new FileReader();

                       reader.onload = function (e) {
                           $('#img-upload')
                               .attr('src', e.target.result);
                       };

                       reader.readAsDataURL(input.files[0]);
                   }
               }

               function readURL1(input) {
                          if (input.files && input.files[0]) {
                              var reader = new FileReader();

                              reader.onload = function (e) {
                                  $('#img-upload1')
                                      .attr('src', e.target.result);
                              };

                              reader.readAsDataURL(input.files[0]);
                          }
                      }

</script>
</body>
</html>
