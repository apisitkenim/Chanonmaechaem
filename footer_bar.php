<?php

session_start();
require_once "ConnectDatabase/connectionDb.inc.php";

//select all producttype
$sql = "SELECT *  from productstype limit 3";

$select_all = $conn->queryRaw($sql);

$total = sizeof($select_all);

?>

<!-- Footer -->
<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
  <div class="flex-w p-b-90">
    <div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
      <h4 class="s-text12 p-b-30">
        ชานนท์ by chanon
      </h4>

      <div>
        <p class="s-text7 w-size27">
          134/1 หมู่ที่ 3 ตำบลช่างเคิ่ง อำเภอแม่แจ่ม จังหวัดเชียงใหม่
        </p>

        <div class="flex-m p-t-30">
          <!-- <a href="https://www.facebook.com/chanonbychanon" target="_blank" class="fs-18 color1 p-r-20 fa fa-facebook"></a> -->
          <!-- <a href="#" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
          <a href="#" class="fs-18 color1 p-r-20 fa fa-pinterest-p"></a>
          <a href="#" class="fs-18 color1 p-r-20 fa fa-snapchat-ghost"></a>
          <a href="#" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a> -->
        </div>
      </div>
    </div>

    <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
      <h4 class="s-text12 p-b-30">
        ประเภทสินค้า
      </h4>

      <ul>
        <li class="p-b-9">
          <a href="product.php" class="s-text7">
            ทั้งหมด
          </a>
        </li>
        <?php

                    $index =0;
                            foreach ($select_all as $row) {
                                $index++;

                                ?>
        <li class="p-b-9">
          <a href="product.php?type=<?php echo $row['productstypeid']; ?>" class="s-text7">
            <?php echo $row['productstypename']; ?>
        </li>
<?php } ?>
      </ul>
    </div>

    <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
      <h4 class="s-text12 p-b-30">
        เช็คเลขพัสดุ
      </h4>

      <ul>
        <li class="p-b-9">
          <a href="http://track.thailandpost.co.th/tracking/default.aspx" target="_blank" class="s-text7">
            ไปรษณีย์
          </a>
        </li>

        <li class="p-b-9">
          <a href="https://th.kerryexpress.com/th/track/" target="_blank" class="s-text7">
            Kerry Express
          </a>
        </li>
      </ul>
    </div>

    <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
      <h4 class="s-text12 p-b-30">
        ช่วยเหลือ
      </h4>

      <ul>
        <li class="p-b-9">
          <a href="contact.php" class="s-text7">
            ติดต่อเรา
          </a>
        </li>

        <li class="p-b-9">
          <a href="Webboard.php" class="s-text7">
            เว็บบอร์ด
          </a>
        </li>
        <li class="p-b-9">
          <a href="../admin/pages/Login/admin_login.php" class="s-text7">
            สำหรับเจ้าของร้าน
          </a>
        </li>
      </ul>
    </div>

    <div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
      <h4 class="s-text12 p-b-30">
        ช่องทางการติดต่อ
      </h4>

      <ul>
        <li class="p-b-9">
          <a href="https://www.facebook.com/chanonbychanon" target="_blank" class="s-text7">
            Facebook : ชานนท์ by chanon
          </a>
        </li>
        <li class="p-b-9">
            <a href="#" class="s-text7">
          LineID : chanon-f
</a>
        </li>

        <li class="p-b-9">
          <a href="#" class="s-text7">
            Email : chanonbychanon@gmail.com
          </a>
        </li>
      </ul>
    </div>
  </div>

  <div class="t-center p-l-15 p-r-15">
    <!-- <a href="#"> -->
      <!-- <img class="h-size2" src="images/icons/paypal.png" alt="IMG-PAYPAL"> -->
    <!-- </a> -->

    <!-- <a href="#"> -->
      <!-- <img class="h-size2" src="images/icons/visa.png" alt="IMG-VISA"> -->
    <!-- </a> -->

    <!-- <a href="#"> -->
      <!-- <img class="h-size2" src="images/icons/mastercard.png" alt="IMG-MASTERCARD"> -->
    <!-- </a> -->

    <!-- <a href="#"> -->
      <!-- <img class="h-size2" src="images/icons/express.png" alt="IMG-EXPRESS"> -->
    <!-- </a> -->

    <!-- <a href="#"> -->
      <!-- <img class="h-size2" src="images/icons/discover.png" alt="IMG-DISCOVER"> -->
    <!-- </a> -->

    <div class="t-center s-text8 p-t-20">
      Copyright © 2018 | ร้าน ชานนท์ by Chanon
    </div>
  </div>
</footer>
