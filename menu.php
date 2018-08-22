<?php

session_start();
require_once "ConnectDatabase/connectionDb.inc.php";

?>

<div class="wrap_header">
<!-- Logo -->
<a href="index.php" class="logo">
  <img src="images/icons/logo1.png" alt="IMG-LOGO">
</a>

<!-- Menu -->
<div class="wrap_menu">


<nav class="menu">
  <ul class="main_menu"><li>
  <a href="index.php">หน้าหลัก</a>
  <!-- <ul class="sub_menu">
    <li><a href="index.html">Homepage V1</a></li>
    <li><a href="home-02.html">Homepage V2</a></li>
    <li><a href="home-03.html">Homepage V3</a></li>
  </ul> -->
</li>

<li>
  <a href="product.php">สินค้า</a>
</li>

<!-- <li class="sale-noti">
  <a href="product.html">Sale</a>
</li> -->
<?php if ($_SESSION["isLogin"] == ''){ ?>
<li>
  <a href="register.php">สมัครสมาชิก</a>
</li>
<?php } ?>

<?php if ($_SESSION["isLogin"] == '1'){ ?>
<li>
  <a href="info.php?id=<?php echo $_SESSION["memberid"];?>">ข้อมูลส่วนตัว</a>
  <!-- <a href="blog.html">แจ้งโอนเงิน</a> -->
</li>
<li>
  <a href="history.php">ประวัติการสั่งซื้อ</a>
  <!-- <a href="blog.html">แจ้งโอนเงิน</a> -->
</li>
<li>
  <a href="transferInfos.php">การชำระเงิน</a>
  <!-- <a href="blog.html">แจ้งโอนเงิน</a> -->
</li>
<li>
  <a href="transfer.php">แจ้งชำระเงิน</a>
  <!-- <a href="blog.html">แจ้งโอนเงิน</a> -->
</li>


<?php }?>

<li>
    <!-- <a href="about.html">เกี่ยวกับเรา</a> -->
  <a href="contact.php">ติดต่อเรา</a>
</li>

<li>
  <a href="Webboard.php">เว็บบอร์ด</a>
</li>
<!-- <li>
  <a href="cart.php">สมัครสมาชิก</a>
</li> -->
<?php if ($_SESSION["isLogin"] == ''){?>
<li>
  <a href="login.php">เข้าสู่ระบบ</a>
</li>
<?php } ?>

<?php if ($_SESSION["isLogin"] == '1'){?>
  <li>
    <a href="logout.php">ออกจากระบบ</a>
  </li>
  <?php } ?>

</ul>
</nav>
</div>

<!-- Header Icon -->
<div class="header-icons">
  <!-- <a href="login.php" class="header-wrapicon1 dis-block">
    <img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
  </a> -->

  <span class="linedivide1"></span>

  <div class="header-wrapicon2">
    <a href="cart.php">
    <img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
  </a>
  </div>
</div>
</div>
