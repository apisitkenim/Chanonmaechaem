<?php

session_start();
require_once "ConnectDatabase/connectionDb.inc.php";

$id = getIsset("id");

if (intval($id) > 0){

  $tbl_products = $conn->select('products', array('productid' => getIsset('id')), true);

    if($tbl_products != null){
        $productid = $tbl_products["productid"];
        $productstypecode = $tbl_products["productstypecode"];
        $productsocde = $tbl_products["productsocde"];
        $productsname = $tbl_products["productsname"];
        $productsprice = $tbl_products["productsprice"];
        $productsdetail = $tbl_products["productsdetail"];
        $productsphoto = $tbl_products["productsphoto"];
        $productsphoto2 = $tbl_products["productsphoto2"];
        $productsphoto3 = $tbl_products["productsphoto3"];
        $productsphoto4 = $tbl_products["productsphoto4"];
        $readprd = $tbl_products["readprd"];

        $amount = $tbl_products["amount"];

        $tbl_productstype = $conn->select('productstype', array('productstypeid' => $productstypecode), true);
        $typeName = $tbl_productstype["productstypename"];

        if ($typeName == 'กระเป๋า' || $typeName == 'กระเป๋าพื้นเมือง' || $typeName == 'ย่ามทอมือ' || $typeName == 'ผ้าซิ่นตีนจก'|| $typeName == 'กางเกงสดอ'|| $typeName == 'กระโปรงม้ง'  )
        {
          $isBag = true;
        }else {
          $isBag = false;
        }

        //size
        // $xs = $tbl_products["xs"];
        // $s = $tbl_products["s"];
        // $m = $tbl_products["m"];
        // $l = $tbl_products["l"];
        // $xl = $tbl_products["xl"];
        // $xxl = $tbl_products["xxl"];

      }
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>ร้านชานนท์เสื้อผ้าพื้นเมือง</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
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
	<link rel="stylesheet" type="text/css" href="vendor/noui/nouislider.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
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

  <!-- Product Detail -->
	<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					<div class="wrap-slick3-dots"></div>

					<div class="slick3">
						<div class="item-slick3" data-thumb="images/<?php echo $productsphoto;?>">
							<div class="wrap-pic-w">
								<img src="images/<?php echo $productsphoto;?>" alt="IMG-PRODUCT">
							</div>
						</div>
            <?php if ($productsphoto2 != ""){?>
						<div class="item-slick3" data-thumb="images/<?php echo $productsphoto2;?>">
							<div class="wrap-pic-w">
								<img src="images/<?php echo $productsphoto2;?>" alt="IMG-PRODUCT">
							</div>
						</div>
            <?php }?>
              <?php if ($productsphoto3 != ""){?>
						<div class="item-slick3" data-thumb="images/<?php echo $productsphoto3;?>">
							<div class="wrap-pic-w">
								<img src="images/<?php echo $productsphoto3;?>" alt="IMG-PRODUCT">
							</div>
						</div>
          <?php }?>
            <?php if ($productsphoto4 != ""){?>
            <div class="item-slick3" data-thumb="images/<?php echo $productsphoto4;?>">
              <div class="wrap-pic-w">
                <img src="images/<?php echo $productsphoto4;?>" alt="IMG-PRODUCT">
              </div>
            </div>
          <?php }?>
					</div>
				</div>
			</div>

			<div class="w-size14 p-t-30 respon5">
				<h4 class="product-detail-name m-text16 p-b-13">
					<?php echo $productsname ; ?>
				</h4>


				<span class="m-text17">
					฿ <?php echo $productsprice;?> บาท
				</span>



				<p class="s-text8" style="color:black;">
					<!-- <?php echo htmlspecialchars($productsdetail);?> -->
          <textarea
                          name="_detail"
                          class="form-control input-disabled"
                          rows="7"
                          style="border: none"
                        ><?php echo htmlspecialchars($productsdetail); ?></textarea>

				</p>


				<!--  -->
				<div class="p-t-33 p-b-60">

					<div class="flex-r-m flex-w p-t-10">
						<div class="w-size16 flex-m flex-w">

              <form method="post" action="add_order.php?ProductID=<?php echo $productid;?>">

              <div class="p-t-33 p-b-60">
                  <?php if ($amount > 0){

                    // if ($typeName != 'กระเป๋า' || $typeName != 'กระเป๋าพื้นเมือง') {
                    if( $isBag == null ) {?>
                <div class="flex-m flex-w p-b-10">
                  <div class="s-text15 w-size15 t-center">
                    ขนาด
                  </div>

                  <div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
                    <select class="selection-2" name="size" id="size" required>
                      <option value="">เลือกขนาด</option>
                      <option value="S">S</option>
                      <option value="M">M</option>
                      <option value="L">L</option>
                      <option value="XL">XL</option>
                      <option value="XXL">XXL</option>
                    </select>


                  </div>



                </div>
              <?php }
            }
             ?>
                <div class="s-text15 w-size40 t-center">

                  <?php if ($amount > 0){ ?>
                    <p><font color="blue">จำนวนสินค้าที่มี <?php echo $amount ; ?> ชิ้น</font></p>
                  <?php } else { ?>
                    <p><font color="red">สินค้าหมดชั่วคราว</font></p>
                  <?php } ?>
                  </div>

                <div class="flex-m flex-w">

                <div class="flex-r-m flex-w p-t-10">
                  <div class="w-size16 flex-m flex-w">
                    <div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
                        <?php if ($amount > 0){ ?>
                      <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                        <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                      </button>

                      <input class="size8 m-text18 t-center num-product" type="number" id="num-product" name="num-product" value="1">
                      <!-- <input class="size8 m-text18 t-center num-product" type="number" id="count-product" name="count-product" value="<?php echo $amount ; ?>" hidden> -->

                      <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                        <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                      </button>
                    <?php } ?>
                    </div>
                    <div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
                      <!-- Button -->
                      <!-- <a href="add_order.php?ProductID=<?php echo $productid;?>"> -->
                        <?php if ($amount > 0){ ?>
                      <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
      									หยิบใส่ตะกร้า
      								</button>
                    <?php } ?>
                    <!-- </a> -->
                    </div>
                  </div>
                </div>
              </div>

            </form>
						</div>
					</div>
				</div>

				<!--  -->
				<!-- <div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Description
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
						</p>
					</div>
				</div> -->
	     </div>
			</div>
		</div>
	</div>

	<!-- Footer -->
	<?php
include "footer_bar.php";
?>

  <!-- <input type="hidden" name="id" id="xs" value="<?php echo $xs ?>">
  <input type="hidden" name="id" id="s" value="<?php echo $s ?>">
  <input type="hidden" name="id" id="m" value="<?php echo $m ?>">
  <input type="hidden" name="id" id="l" value="<?php echo $l ?>">
  <input type="hidden" name="id" id="xl" value="<?php echo $xl ?>">
  <input type="hidden" name="id" id="xxl" value="<?php echo $xxl ?>"> -->

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
	<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
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
	<script type="text/javascript" src="vendor/daterangepicker/moment.min.js"></script>
	<script type="text/javascript" src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>

<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/noui/nouislider.min.js"></script>
	<script type="text/javascript">
		/*[ No ui ]
	    ===========================================================*/
	    var filterBar = document.getElementById('filter-bar');

	    noUiSlider.create(filterBar, {
	        start: [ 50, 200 ],
	        connect: true,
	        range: {
	            'min': 50,
	            'max': 200
	        }
	    });

	    var skipValues = [
	    document.getElementById('value-lower'),
	    document.getElementById('value-upper')
	    ];

	    filterBar.noUiSlider.on('update', function( values, handle ) {
	        skipValues[handle].innerHTML = Math.round(values[handle]) ;
	    });

      function searchOnClick(){
        window.location = 'product.php?__cmd=search&_searchProduct='+document.getElementsByName("_searchProduct")[0].value;
      }

      function selectSizeOnClick(){


        var selectSize = document.getElementById('size').value;

        if (selectSize === "xs"){
            document.getElementById('stock').innerHTML = "จำนวนสินค้าที่มี " + document.getElementById('xs').value + " ชิ้น";
        }else if (selectSize === "S"){
            document.getElementById('stock').innerHTML = "จำนวนสินค้าที่มี " + document.getElementById('s').value + " ชิ้น";
        }else if (selectSize === "M") {
            document.getElementById('stock').innerHTML = "จำนวนสินค้าที่มี " + document.getElementById('m').value + " ชิ้น";
        }
        else if (selectSize === "L") {
            document.getElementById('stock').innerHTML = "จำนวนสินค้าที่มี " + document.getElementById('l').value + " ชิ้น";
        }
        else if (selectSize === "XL") {
            document.getElementById('stock').innerHTML = "จำนวนสินค้าที่มี " + document.getElementById('xl').value + " ชิ้น";
        }
        else if (selectSize === "XXL") {
            document.getElementById('stock').innerHTML = "จำนวนสินค้าที่มี " + document.getElementById('xxl').value + " ชิ้น";
        }

      }


      // function AddProduct(productID){
      //   //จำนวนที่เลือก
      //   var numProduct = document.getElementById('num-product');
      //   //จำนวนคงเหลือ
      //   var count = document.getElementById('count-product');
      //   var size = document.getElementById('size');
      //
      //   if (numProduct.value <= count.value){
      //     window.location = 'add_order.php?ProductID='+ productID+'&num-product='+numProduct.value+'size='+size.value;
      //   }else{
      //     window.alert('จำนวนสินค้าในสต๊อกไม่เพียงพอ');
      //   }
      // }

	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
