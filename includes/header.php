
<div class="am-loader" id="amLoader" aria-hidden="true">
  <img src="assets/images/favicon-aurelia.svg" alt="" class="am-loader__logo" width="72" height="72">
  <span class="am-loader__text">Aurelia Motors</span>
  <div class="am-loader__bar"></div>
</div>

<div class="scroll-progress" id="scrollProgress" aria-hidden="true"></div>
<div class="am-drawer-backdrop dpc-drawer-backdrop" id="dpcDrawerBackdrop" aria-hidden="true"></div>

<header class="site-header">
  <div class="lux-header-wrap dpc-header am-header" id="dpcHeader">
    <div class="dhruv-topbar dpc-topbar am-topbar">
      <div class="container">
        <div class="dhruv-topbar__inner dpc-topbar__inner am-topbar__inner">
         <?php
         $sql = "SELECT EmailId,ContactNo from tblcontactusinfo";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
foreach ($results as $result) {
$email=$result->EmailId;
$contactno=$result->ContactNo;
}
$email = 'prodhruv.saxena889@gmail.com';
$contactno = '9351901010';
?>
          <div class="dhruv-topbar__contact dpc-topbar__contact am-topbar__contact">
            <a href="mailto:<?php echo htmlentities($email);?>"><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo htmlentities($email);?></a>
            <a href="tel:<?php echo htmlentities($contactno);?>"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo htmlentities($contactno);?></a>
          </div>
          <div class="dhruv-topbar__actions">
<?php if(strlen($_SESSION['login'])==0) { ?>
            <a href="#loginform" class="dhruv-topbar__login am-topbar__login" data-toggle="modal" data-dismiss="modal">Login / Register</a>
<?php } else { ?>
            <span class="dhruv-topbar__welcome am-topbar__welcome">Welcome back</span>
<?php } ?>
          </div>
        </div>
      </div>
    </div>

    <nav id="navigation_bar" class="navbar navbar-default dpc-navbar am-navbar">
      <div class="container dpc-navbar__inner dhruv-nav am-navbar__inner">
        <div class="navbar-header">
          <div class="logo dhruv-logo-wrap">
            <a href="index.php" class="dhruv-logo dpc-logo am-logo" aria-label="AURELIA MOTORS - Home">
              <img src="assets/images/logo-aurelia.svg" class="dhruv-logo__img am-logo__img" alt="AURELIA MOTORS" width="240" height="52">
            </a>
          </div>
          <button id="menu_slide" aria-expanded="false" aria-controls="navigation" class="navbar-toggle collapsed dpc-nav-toggle am-nav-toggle" type="button" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>

        <div class="collapse navbar-collapse dpc-nav-center am-nav-center" id="navigation">
          <div class="am-drawer-head">
            <span class="am-drawer-head__title">Menu</span>
            <button type="button" class="am-drawer-close" id="amDrawerClose" aria-label="Close menu">
              <i class="fa fa-times" aria-hidden="true"></i>
            </button>
          </div>
          <ul class="nav navbar-nav dhruv-nav__links dpc-nav__links am-nav__links">
            <li><a href="index.php">Home</a></li>
            <li><a href="page.php?type=aboutus">About Us</a></li>
            <li><a href="car-listing.php">Car Listing</a></li>
            <li><a href="page.php?type=faqs">FAQs</a></li>
            <li><a href="contact-us.php">Contact Us</a></li>
          </ul>
          <div class="dpc-drawer-contact am-drawer-contact">
            <a href="tel:9351901010"><i class="fa fa-phone" aria-hidden="true"></i> 9351901010</a>
            <a href="mailto:prodhruv.saxena889@gmail.com"><i class="fa fa-envelope" aria-hidden="true"></i> prodhruv.saxena889@gmail.com</a>
            <a href="contact-us.php"><i class="fa fa-map-marker" aria-hidden="true"></i> Devi Nagar, Sodala, Jaipur</a>
<?php if(strlen($_SESSION['login'])==0) { ?>
            <a href="#loginform" data-toggle="modal" data-dismiss="modal"><i class="fa fa-user" aria-hidden="true"></i> Login / Register</a>
<?php } ?>
          </div>
        </div>

        <div class="header_wrap dhruv-nav__tools dpc-nav__tools am-nav__tools">
          <div class="user_login">
            <ul>
              <li class="dropdown">
                <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dhruv-user-toggle dpc-user-toggle am-user-toggle">
                  <i class="fa fa-user-circle" aria-hidden="true"></i>
                  <span class="dhruv-user-name">
<?php 
$email=$_SESSION['login'];
$sql ="SELECT FullName FROM tblusers WHERE EmailId=:email ";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
	{
	 echo htmlentities($result->FullName); }} else { echo 'Account'; } ?>
                  </span>
                  <i class="fa fa-angle-down" aria-hidden="true"></i>
                </a>
                <ul class="dropdown-menu">
<?php if($_SESSION['login']){?>
                  <li><a href="profile.php">Profile Settings</a></li>
                  <li><a href="update-password.php">Update Password</a></li>
                  <li><a href="my-booking.php">My Booking</a></li>
                  <li><a href="post-testimonial.php">Post a Testimonial</a></li>
                  <li><a href="my-testimonials.php">My Testimonial</a></li>
                  <li><a href="logout.php">Sign Out</a></li>
<?php } ?>
                </ul>
              </li>
            </ul>
          </div>
          <div class="header_search">
            <div id="search_toggle" class="dpc-search-toggle am-search-toggle" role="button" aria-label="Toggle search"><i class="fa fa-search" aria-hidden="true"></i></div>
            <form action="search.php" method="post" id="header-search-form">
              <input type="text" placeholder="Search vehicles..." name="searchdata" class="form-control" required="true">
              <button type="submit" aria-label="Search"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
          </div>
        </div>
      </div>
    </nav>
  </div>
</header>
