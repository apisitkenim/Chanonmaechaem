<?php

session_start();
require_once "ConnectDatabase/connectionDb.inc.php";

//select all producttype
$sql = "SELECT *  from productstype ";

$select_all = $conn->queryRaw($sql);

$total = sizeof($select_all);


$typeid = getIsset("type");
$search = getIsset("__cmd");
$keyword = getIsset("_searchProduct");

if ($search == 'search'){
  $sql = "SELECT *  from products WHERE productsname LIKE '%$keyword%'";
  $tbl_products = $conn->queryRaw($sql);
}
else if (intval($typeid) > 0){
  $sql = "SELECT *  from products WHERE productstypecode = $typeid";
  $tbl_products = $conn->queryRaw($sql);
}else{
  $sql = "SELECT *  from products ";
  $tbl_products = $conn->queryRaw($sql);
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

	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
					<div class="leftbar p-r-20 p-r-0-sm">
						<!--  -->
						<h4 class="m-text14 p-b-7">
							ประเภทสินค้า
						</h4>

						<ul class="p-b-54">
               <li class="p-t-4">
                <a href="product.php" class="s-text13 active1">
                  ทั้งหมด
                </a>
              </li>
							<?php

													$index =0;
																	foreach ($select_all as $row) {
																			$index++;

																			?>
							<li class="p-t-4">
								<a href="product.php?type=<?php echo $row['productstypeid']; ?>" class="s-text13 active1">
									<?php echo $row['productstypename']; ?>
								</a>
							</li>
							<?php
												 }
										 ?>
						</ul>

						<!--  -->
						<h4 class="m-text14 p-b-32">
							ค้นหา
						</h4>


						<div class="search-product pos-relative bo4 of-hidden">
							<input class="s-text7 size6 p-l-23 p-r-50" type="text" name="_searchProduct" placeholder="Search...">

							<button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4" onclick="searchOnClick()">
								<i class="fs-12 fa fa-search" aria-hidden="true"></i>
							</button>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					<!--  -->


					<!-- Product -->
					<div class="row">

            <?php

                        $index =0;
                                foreach ($tbl_products as $row) {
                                    $index++;

                                    ?>

						<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
							<!-- Block2 -->
							<div class="block2">
                <?php if ($row["readprd"] == '1'){ ?>
								<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                <?php } ?>
                <?php if ($row["readprd"] == '2'){ ?>
								<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelsale">
                <?php } ?>
                <?php if ($row["readprd"] == '3'){ ?>
								<div class="block2-img wrap-pic-w of-hidden pos-relative">
                <?php } ?>
									<!-- <img src="images/item-02.jpg" alt="IMG-PRODUCT"> -->
                  <img src="images/<?php echo $row["productsphoto"];?>" alt="IMG-PRODUCT" width="270" height="360">

									<div class="block2-overlay trans-0-4">
										<div class="block2-btn-addcart w-size1 trans-0-4">
											<!-- Button -->
                      	<a href="product-detail.php?id=<?php echo $row["productid"];?>">
											<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
												ดูรายละเอียด
											</button>
                    </a>
										</div>
									</div>
								</div>

								<div class="block2-txt p-t-20">
									<a href="product-detail.php?id=<?php echo $row["productid"];?>" class="block2-name dis-block s-text3 p-b-5">
										<?php echo $row["productsname"]; ?>
									</a>

									<span class="block2-price m-text6 p-r-5">
										฿	<?php echo $row["productsprice"]; ?> บาท
									</span>
								</div>
							</div>
						</div>

            <?php
                       }
                   ?>
					</div>

					<!-- Pagination -->
					<!-- <div class="pagination flex-m flex-w p-t-26">
						<a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
						<a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
					</div> -->
				</div>
			</div>
		</div>
	</section>


	<!-- Footer -->
	<?php
include "footer_bar.php";
?>


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
				// swal(nameProduct, "is added to cart !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				// swal(nameProduct, "is added to wishlist !", "success");
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
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
