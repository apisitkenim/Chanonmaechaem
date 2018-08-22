<?php
session_start();
require_once "ConnectDatabase/connectionDb.inc.php";

if(!isset($_SESSION["intLine"]))
{
	// echo "Cart empty";
	alertMassageAndRedirect('cart is empty !','product.php');
	exit();
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
	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<form action="update_cart.php" method="post">
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<h4 class="m-text26 p-b-36 p-t-15" align="center">
						ตะกร้าสินค้า
					</h4>

					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="column-1"></th>
							<th class="column-2">สินค้า</th>
								<th class="column-2">ไซส์</th>
							<th class="column-3">ราคา</th>
							<th class="column-4 p-l-70">จำนวน</th>
							<th class="column-5">รวม</th>
              	<th class="column-6">ลบ</th>
						</tr>

            <?php
              $Total = 0;
              $SumTotal = 0;

              for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
              {
            	  if($_SESSION["strProductID"][$i] != "")
            	  {
                  $strProductID = $_SESSION["strProductID"][$i] ;
                  $objResult = $conn->select('products', array('productid' => $strProductID), true);

            		$Total = $_SESSION["strQty"][$i] * $objResult["productsprice"];
            		$SumTotal = $SumTotal + $Total;
            	  ?>


                <tr class="table-row">
    							<td class="column-1">
    								<div class="cart-img-product b-rad-4 o-f-hidden">
    									<img src="images/<?php echo $objResult["productsphoto"]; ?>" alt="IMG-PRODUCT">
    								</div>
    							</td>
    							<td class="column-2"><?php echo $objResult["productsname"];?></td>
									<td class="column-2"><?php echo $_SESSION["strSize"][$i];?></td>
    							<td class="column-3">฿<?php echo $objResult["productsprice"]; ?></td>
    							<td class="column-4">
    								<div class="flex-w bo5 of-hidden w-size17">
    									<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
    										<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
    									</button>

    									<input class="size8 m-text18 t-center num-product" type="number" name="txtQty<?php echo $i;?>" value="<?php echo $_SESSION["strQty"][$i]; ?>">


    									<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
    										<i class="fs-12 fa fa-plus" aria-hidden="true"></i>

    								</div>
    							</td>
    							<td class="column-5">฿<?php echo $Total; ?></td>
                  <td class="column-6"><a href="delete_car.php?Line=<?php echo $i;?>"><i class="fa  fa-trash-o md"></i></a></td>
    						</tr>

            	  <?php
            	  }
              }
              ?>
					</table>
				</div>
			</div>




			<!-- Total -->
			<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
				<h5 class="m-text20 p-b-24">
					ราคารวมทั้งหมด
				</h5>

				<!--  -->
				<div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						ยอดเงินที่ต้องชำระ :
					</span>

					<span class="m-text21 w-size20 w-full-sm">
						&nbsp; <?php echo number_format($SumTotal,2);?> บาท
					</span>
				</div>

				<!--  -->
				<div class="flex-w flex-sb bo10 p-t-15 p-b-20">
					<span class="s-text18 w-size19 w-full-sm">

					</span>
					<div class="w-size20 w-full-sm">

					<div class="size14 trans-0-4 m-b-10">
								<!-- Button -->
								<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" name="__cmd" value="product">
									เลือกสินค้าเพิ่ม
								</button>
							</div>
							<!-- <br> -->
						<div class="size14 trans-0-4 m-b-10">
								<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
									คำนวณราคาสินค้าใหม่
								</button>
							</div>
							<!-- <br> -->
						<div class="size14 trans-0-4 m-b-10">
								<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" name="__cmd" value="save_product">
									สั่งซื้อสินค้า
								</button>
							</div>

					</div>
				</div>

</form>
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
	<script src="js/main.js"></script>

</body>
</html>
