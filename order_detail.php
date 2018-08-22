<?php
session_start();
require_once "ConnectDatabase/connectionDb.inc.php";

$id = getIsset("id");

$tbl_order = $conn->select('orders', array('orderid' => getIsset('id')), true);


if ($tbl_order != null){
  $refid= $tbl_order["refid"];
  $id_cus= $tbl_order["id_cus"];
  $data= $tbl_order["data"];
  $paystatus= $tbl_order["paystatus"];
  $statusnow= $tbl_order["statusnow"];
  $sent_rate= $tbl_order["sent_rate"];
  $transport= $tbl_order["transport"];

  $sqlDetail = "select * from orderdetails where orderid = $id";
  $tbl_orderDetail = $conn->queryRaw($sqlDetail);

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
			<form action="history.php" method="post">
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<h4 class="m-text26 p-b-36 p-t-15" align="center">
						เลขที่ใบสั่งซื้อ : <?php echo $refid; ?>
					</h4>

					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="column-1"></th>
							<th class="column-2">สินค้า</th>
              	<th class="column-2">ไซต์</th>
							<th class="column-3">ราคา</th>
							<th class="column-4 p-l-70">จำนวน</th>
							<th class="column-5">รวม</th>
						</tr>


                <?php

                $Total = 0;
                $SumTotal = 0;

                            $index =0;
                                    foreach ($tbl_orderDetail as $row) {
                                        $index++;

                $strProductID = $row["productid"] ;
                $objResult = $conn->select('products', array('productid' => $strProductID), true);

                $Total =  $row["qty"] * $objResult["productsprice"];
                $SumTotal = $SumTotal + $Total;
                      ?>

                <tr class="table-row">
    							<td class="column-1">
    								<div class="cart-img-product b-rad-4 o-f-hidden">
    									<img src="images/<?php echo $objResult["productsphoto"]; ?>" alt="IMG-PRODUCT">
    								</div>
    							</td>
    							<td class="column-2"><?php echo $objResult["productsname"];?></td>
                  <td class="column-2"><?php echo $row["size"];?></td>
    							<td class="column-3">฿<?php echo $row["price"]; ?></td>
    							<td class="column-4 p-l-80"><?php echo $row["qty"][$i]; ?></td>
    							<td class="column-5">฿<?php echo $row["total"]; ?></td>
    						</tr>

                <?php
                           }
                       ?>
					</table>
				</div>
			</div>

      <!-- Banner2 -->
    	<section class="banner2 p-t-55 p-b-55">
    		<div class="container">
    			<div class="row">
    				<div class="col-sm-10 col-md-8 col-lg-6 m-l-r-auto p-t-15 p-b-15">
              <!-- Total -->
              <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-0 p-lr-15-sm">
                <h5 class="m-text20 p-b-24">
                  ข้อมูลการชำระเงิน
                </h5>

                <div align="center">
                	<img src="images/PromptPay.jpg" alt="IMG-BLOG" width="80" height="60"/>

                  <h4 class="p-b-7 m-text11">
                  พร้อมเพย์ 0995413486
                	</h4>
                    ชื่อบัญชี สุริยา ปาน้อย
                  <br>
                  <img src="images/kbank.png" alt="IMG-BLOG" width="100" height="80"/>
                  <h4 class="p-b-7 m-text11">
                    กสิกรไทย 0171175941
                  </h4>

                  ชื่อบัญชี สุริยา ปาน้อย
              </div>
            </div>

    				</div>

    				<div class="col-sm-10 col-md-8 col-lg-6 m-l-r-auto p-t-15 p-b-15">
              <!-- Total -->
              <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
                <h5 class="m-text20 p-b-24">
                  ข้อมูลการจัดส่งสินค้า
                </h5>

                <!--  -->
                <div class="flex-w flex-sb-m p-b-12">
                </div>

                <!--  -->
                <div class="flex-w flex-sb bo10 p-t-15 p-b-20">
                  <span class="s-text18 w-size19 w-full-sm">
                      ที่อยู่ที่จะจัดส่ง :
                  </span>

                  <div class="w-size20 w-full-sm">
                    <p class="s-text8 p-b-23">
                      ชื่อ - สกุล : <?php echo $_SESSION["memberName"]; ?>
                    </p>

                    <p class="s-text8 p-b-23">
                      ที่อยู่ : <?php echo $_SESSION["memberAddress"]; ?>
                    </p>

                    <p class="s-text8 p-b-23">
                      รหัสไปรษณีย์ : <?php echo $_SESSION["memberZipcode"]; ?>
                    </p>

                    <p class="s-text8 p-b-23">
                      เบอร์โทร : <?php echo $_SESSION["memberPhone"]; ?>
                    </p>

                  </div>
                </div>

                <div class="flex-w flex-sb bo10 p-t-15 p-b-20">
                  <span class="s-text18 w-size19 w-full-sm">
                    วิธีการจัดส่ง :
                  </span>

                  <div class="w-size20 w-full-sm">
                    <p class="s-text8 p-b-23">
                      <?php echo $transport ?>
                    </p>
                  </div>
                </div>
                <!--  -->
                <div class="flex-w flex-sb-m p-t-26 p-b-30">
                  <span class="m-text22 w-size19 w-full-sm">
                  รวมราคาสินค้า
                  </span>

                  <span class="m-text21 w-size20 w-full-sm" id="total">
                      &nbsp; <?php echo number_format($SumTotal,2);?> บาท
                  </span>

                  <span class="m-text22 w-size19 w-full-sm">
                  ค่าขนส่ง
                  </span>

                  <span class="m-text21 w-size20 w-full-sm" id="total">
                    <?php if ($transfer == 'POST'){
                      $transfer = 30;
                    }else if ($transfer == 'EMS'){
                      $transfer = 80;
                    }else{
                      $transfer = 80;
                    } ?>
                      &nbsp; <?php echo number_format($transfer,2);?> บาท
                  </span>
                  <span class="m-text22 w-size19 w-full-sm">
                  ราคารวมทั้งหมด
                  </span>

                  <span class="m-text21 w-size20 w-full-sm" id="total">
                    <?php
                      $Total = $SumTotal + $transfer; ?>
                      &nbsp; <?php echo number_format($Total,2);?> บาท
                  </span>
                </div>
                <div class="size15 trans-0-4">
                  <!-- Button -->
                  <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                    ตกลง
                  </button>
                </div>
              </div>
              </div>

    				</div>
    			</div>
    		</div>
    	</section>
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
