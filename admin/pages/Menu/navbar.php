
<?php
	session_start();
?>

<!-- Logo -->
<a href="../Index/index.php" class="logo">
  <!-- mini logo for sidebar mini 50x50 pixels -->
  <span class="logo-mini"><b>CN</b></span>
  <!-- logo for regular state and mobile devices -->
  <span class="logo-lg"><b>Chanon</b></span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top">
  <!-- Sidebar toggle button-->
  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    <span class="sr-only">Toggle navigation</span>
  </a>

  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <!-- Notifications: style can be found in dropdown.less -->
      <!-- <li class="dropdown notifications-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <i class="fa fa-bell-o"></i>
          <span class="label label-warning">10</span>
        </a>
        <ul class="dropdown-menu">
          <li class="header">You have 10 notifications</li>
          <li>
            <ul class="menu">
              <li>
                <a href="#">
                  <i class="fa fa-users text-aqua"></i> 5 new members joined today
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                  page and may cause design problems
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-users text-red"></i> 5 new members joined
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-user text-red"></i> You changed your username
                </a>
              </li>
            </ul>
          </li>
          <li class="footer"><a href="#">View all</a></li>
        </ul>
      </li> -->

      <!-- User Account: style can be found in dropdown.less -->
      <li class="dropdown user user-menu">

				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-user fa-fw"></i>
						  <span class="hidden-xs"><?php echo $_SESSION['fullname']; ?></span> &nbsp;
				<i class="fa fa-caret-down"></i>
				</a>
        <ul class="dropdown-menu dropdown-user">
            <li class="divider"></li>
            <li><a href="../Logout/logout.php"><i class="fa fa-sign-out fa-fw"></i>ออกจากระบบ</a>
            </li>
        </ul>

      </li>
      <!-- Control Sidebar Toggle Button -->
    </ul>
  </div>
</nav>
