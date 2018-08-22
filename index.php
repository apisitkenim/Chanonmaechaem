<?php
session_start();
require_once "ConnectDatabase/connectionDb.inc.php";

//ข่าวสารกิจกรรม
$sql = "SELECT *  from news ";

$select_allNews = $conn->queryRaw($sql);

$totalNews = sizeof($select_allNews);

$sql = "SELECT * FROM products ORDER BY RAND() LIMIT 10";
$tbl_products = $conn->queryRaw($sql);

?>





<!DOCTYPE html>
<html lang="th">
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
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/lightbox2/css/lightbox.min.css">
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

	<!-- Slide1 -->
	<section class="slide1">
		<div class="wrap-slick1">
			<div class="slick1">
				<div class="item-slick1 item1-slick1" style="background-image: url(images/slide.jpg); -moz-background-size: cover; background-repeat: no-repeat;  background-size: 100% 100%;">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
							<!-- Women Collection 2018 -->
						</span>

						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
							<!-- New arrivals -->
						</h2>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">

							<!-- <a href="product.html" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Shop Now
							</a> -->
						</div>
					</div>
				</div>

				<div class="item-slick1 item2-slick1" style="background-image: url(images/slide2.jpg);  -moz-background-size: cover; background-repeat: no-repeat;  background-size: 100% 100%;">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rollIn">
							<!-- Women Collection 2018 -->
						</span>

						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="lightSpeedIn">
							<!-- New arrivals -->
						</h2>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="slideInUp">

							<!-- <a href="product.html" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Shop Now
							</a> -->
						</div>
					</div>
				</div>

				<div class="item-slick1 item2-slick1" style="background-image: url(images/slide3.jpg);  -moz-background-size: cover; background-repeat: no-repeat;  background-size: 100% 100%;">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rollIn">
							<!-- Women Collection 2018 -->
						</span>

						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="lightSpeedIn">
							<!-- New arrivals -->
						</h2>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="slideInUp">

							<!-- <a href="product.html" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Shop Now
							</a> -->
						</div>
					</div>
				</div>

				<div class="item-slick1 item2-slick1" style="background-image: url(images/slide4.jpg);  -moz-background-size: cover; background-repeat: no-repeat;  background-size: 100% 100%;">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rollIn">
							<!-- Women Collection 2018 -->
						</span>

						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="lightSpeedIn">
							<!-- New arrivals -->
						</h2>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="slideInUp">

							<!-- <a href="product.html" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Shop Now
							</a> -->
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>

  <!-- New Product -->
	<section class="newproduct bg5 p-t-45 p-b-105">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					ผลิตภัณฑ์ที่น่าสนใจ
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">

					<?php

											$index =0;
															foreach ($tbl_products as $row) {
																	$index++;

																	?>

					<div class="item-slick2 p-l-15 p-r-15">
						<!-- Block2 -->
						<div class="block2">
							<!-- <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew"> -->
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
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">
										<!-- Button -->
										<a href="product-detail.php?id=<?php echo $row["productid"];?>">
										<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
											ดูรายละเอียดสินค้า
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
			</div>

		</div>
	</section>

	<!-- Blog -->
	<section class="blog bgwhite p-t-94 p-b-65">
		<div class="container">
			<div class="sec-title p-b-52">
				<h3 class="m-text5 t-center">
					ข่าวสาร / กิจกรรม
				</h3>
			</div>

			<div class="row">

				<?php

										$index =0;
														foreach ($select_allNews as $row) {
																$index++;

																?>

				<div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
					<!-- Block3 -->
					<div class="block3">
						<a href="news-detail.php?id=<?php echo $row['newsid']; ?>" class="block3-img dis-block hov-img-zoom">
							<img src="images/<?php echo $row['photo']; ?>" alt="IMG-BLOG">
						</a>

						<div class="block3-txt p-t-14">
							<h4 class="p-b-7">
								<a href="news-detail.php?id=<?php echo $row['newsid']; ?>"  class="m-text11">
									<!-- Black Friday Guide: Best Sales & Discount Codes -->
									<?php echo $row['topic']; ?>
								</a>
							</h4>

							<p class="s-text8 p-t-16">
								 <?php echo substr($row['message'],0,300) ?>... 	<a href="news-detail.php?id=<?php echo $row['newsid']; ?>">อ่านต่อ</a>
								<!-- Duis ut velit gravida nibh bibendum commodo. Sus-pendisse pellentesque mattis augue id euismod. Inter-dum et malesuada fames -->
							</p>
						</div>
					</div>
				</div>

				<?php
									 }
							 ?>
			</div>
		</div>
	</section>

	<!-- Shipping -->
	<section class="shipping bgwhite p-t-62 p-b-46">
		<div class="flex-w p-l-15 p-r-15">
			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
				<h4 class="m-text12 t-center">
					ขนส่งสินค้า
				</h4>

				<a href="#" class="s-text11 t-center">
					บริการขนส่งสินค้าทั่วทุกจังหวัด
				</a>
			</div>

			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 bo2 respon2">
				<h4 class="m-text12 t-center">
					คืนเงินเมื่อเกิดข้อผิดพลาด
				</h4>

				<span class="s-text11 t-center">
					เมื่อเกิดข้อผิดพลาดระหว่างการสั่งซื้อสินค้า ทางเราจะคืนเงินให้ท่าน 100%
				</span>
			</div>

			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
				<h4 class="m-text12 t-center">
					ตอบกลับภายใน 24 ขั่วโมง
				</h4>

				<!-- <span class="s-text11 t-center">
					Shop open from Monday to Sunday
				</span> -->
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

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>


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
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/lightbox2/js/lightbox.min.js"></script>
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
	<script src="js/main.js"></script>

</body>
</html>
