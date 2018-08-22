<?php

session_start();
require_once "ConnectDatabase/connectionDb.inc.php";

?>

<div class="container-menu-header">



  <div class="topbar">
    <div class="topbar-social">
      <span class="topbar-email">
        LineID : chanon-f
      </span>
       &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
      <span class="topbar-email">
        Email : chanonbychanon@gmail.com
      </span>
    </div>

<?php if ($_SESSION["isLogin"]== '1'){?>
    <span class="topbar-child1">
      ยินดีต้อนรับ : <?php echo $_SESSION["memberName"]; ?>
    </span>

  <?php } ?>

    <div class="topbar-child2">
      <div id="google_translate_element" class="topbar-language rs1-select2"></div>

      			<script type="text/javascript">
      			function googleTranslateElementInit() {
      				new google.translate.TranslateElement({
      					pageLanguage: 'th',
      					includedLanguages: 'en,th'
      				}, 'google_translate_element');
      			}
      			</script>

      			<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
      			<style>.goog-logo-link { display: none; } .goog-te-gadget { font-size: 0px; }</style>

      <!-- <div class="topbar-language rs1-select2">
        <select class="selection-1" name="time">
          <option value="TH"><a href="change.php?lang=TH"> ภาษาไทย</option>
          <option value="EN"><a href="change.php?lang=EN">English</option>
        </select>
      </div> -->
    </div>
  </div>
