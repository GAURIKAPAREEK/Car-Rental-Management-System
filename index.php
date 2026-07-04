<?php 
session_start();
include('includes/config.php');
error_reporting(0);
$pageTitle = 'AURELIA MOTORS | Drive Without Limits';
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<?php include('includes/head-assets.php'); ?>
</head>
<body class="page-home">

<?php include('includes/header.php'); ?>

<!-- Hero -->
<section class="lux-hero dpc-hero am-hero lux-reveal" id="top">
  <div class="lux-hero__bg dpc-hero__bg am-hero__bg" aria-hidden="true"></div>
  <div class="lux-hero__overlay dpc-hero__overlay am-hero__overlay" aria-hidden="true"></div>
  <div class="lux-hero__content dpc-hero__content am-hero__content">
    <p class="lux-hero__eyebrow am-hero__eyebrow">Driven Beyond Expectations</p>
    <h1 class="lux-hero__title am-hero__title">Drive Without Limits.</h1>
    <p class="lux-hero__subtitle am-hero__subtitle">Experience Rajasthan's finest premium rental collection.</p>
    <div class="lux-hero__actions am-hero__actions">
      <a href="car-listing.php" class="lux-btn-primary am-btn-primary lux-magnetic am-magnetic">Explore Fleet</a>
      <a href="#loginform" class="lux-btn-ghost am-btn-ghost lux-magnetic am-magnetic" data-toggle="modal" data-dismiss="modal">Reserve Now</a>
    </div>
  </div>
  <div class="lux-hero__scroll am-hero__scroll" aria-hidden="true">Scroll</div>
</section>

<!-- Premium Features -->
<section class="section-padding lux-features">
  <div class="container">
    <div class="section-header text-center lux-reveal">
      <h2>The <span>Luxury</span> Standard</h2>
      <p>Every detail designed for discerning travelers who expect nothing less than excellence.</p>
    </div>
    <div class="row">
      <div class="col-md-3 col-sm-6 lux-reveal">
        <div class="lux-feature-card">
          <div class="lux-feature-card__icon"><i class="fa fa-diamond" aria-hidden="true"></i></div>
          <h4>Premium Fleet</h4>
          <p>Curated collection of the world's finest automobiles, meticulously maintained.</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 lux-reveal">
        <div class="lux-feature-card">
          <div class="lux-feature-card__icon"><i class="fa fa-headphones" aria-hidden="true"></i></div>
          <h4>24/7 Assistance</h4>
          <p>Round-the-clock concierge support for seamless travel, anywhere you go.</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 lux-reveal">
        <div class="lux-feature-card">
          <div class="lux-feature-card__icon"><i class="fa fa-shield" aria-hidden="true"></i></div>
          <h4>Verified Vehicles</h4>
          <p>Every vehicle inspected and certified to the highest safety standards.</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 lux-reveal">
        <div class="lux-feature-card">
          <div class="lux-feature-card__icon"><i class="fa fa-star" aria-hidden="true"></i></div>
          <h4>Luxury Experience</h4>
          <p>White-glove service from booking to return — effortless elegance throughout.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Recent Cars -->
<section class="section-padding gray-bg am-fleet-section">
  <div class="container">
    <div class="section-header text-center lux-reveal">
      <h2>Featured <span>Fleet</span></h2>
      <p>Discover our handpicked selection of premium vehicles, ready for your next extraordinary journey.</p>
    </div>
    <div class="row am-fleet-grid">

<?php $sql = "SELECT tblvehicles.VehiclesTitle,tblbrands.BrandName,tblvehicles.PricePerDay,tblvehicles.FuelType,tblvehicles.ModelYear,tblvehicles.id,tblvehicles.SeatingCapacity,tblvehicles.VehiclesOverview,tblvehicles.Vimage1 from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand limit 9";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
?>  

<div class="col-md-4 col-sm-6 col-list-3 lux-reveal">
<div class="recent-car-list">
<div class="car-info-box"> <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="<?php echo htmlentities($result->VehiclesTitle);?>" loading="lazy"></a>
<ul>
<li><i class="fa fa-car" aria-hidden="true"></i><?php echo htmlentities($result->FuelType);?></li>
<li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo htmlentities($result->ModelYear);?> Model</li>
<li><i class="fa fa-user" aria-hidden="true"></i><?php echo htmlentities($result->SeatingCapacity);?> seats</li>
</ul>
</div>
<div class="car-title-m">
<h6><a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"> <?php echo htmlentities($result->VehiclesTitle);?></a></h6>
<span class="price">₹<?php echo htmlentities($result->PricePerDay);?> /Day</span> 
</div>
<div class="inventory_info_m">
<p><?php echo substr($result->VehiclesOverview,0,70);?></p>
</div>
</div>
</div>
<?php }}?>

    </div>
  </div>
</section>

<!-- Stats -->
<section class="fun-facts-section lux-reveal">
  <div class="container div_zindex">
    <div class="row">
      <div class="col-lg-3 col-xs-6 col-sm-3">
        <div class="fun-facts-m">
          <div class="cell">
            <h2><i class="fa fa-calendar" aria-hidden="true"></i>40+</h2>
            <p>Years In Business</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6 col-sm-3">
        <div class="fun-facts-m">
          <div class="cell">
            <h2><i class="fa fa-car" aria-hidden="true"></i>1200+</h2>
            <p>Premium Vehicles</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6 col-sm-3">
        <div class="fun-facts-m">
          <div class="cell">
            <h2><i class="fa fa-car" aria-hidden="true"></i>1000+</h2>
            <p>Luxury Models</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6 col-sm-3">
        <div class="fun-facts-m">
          <div class="cell">
            <h2><i class="fa fa-user-circle-o" aria-hidden="true"></i>600+</h2>
            <p>Satisfied Customers</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Testimonials -->
<section class="section-padding testimonial-section parallex-bg">
  <div class="container div_zindex">
    <div class="section-header text-center lux-reveal">
      <h2>Our Satisfied <span>Customers</span></h2>
    </div>
    <div class="row lux-reveal">
      <div id="testimonial-slider">
<?php 
$tid=1;
$sql = "SELECT tbltestimonial.Testimonial,tblusers.FullName from tbltestimonial join tblusers on tbltestimonial.UserEmail=tblusers.EmailId where tbltestimonial.status=:tid limit 4";
$query = $dbh -> prepare($sql);
$query->bindParam(':tid',$tid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>

        <div class="testimonial-m">
          <div class="testimonial-content">
            <div class="testimonial-heading">
              <h5><?php echo htmlentities($result->FullName);?></h5>
            <p><?php echo htmlentities($result->Testimonial);?></p>
          </div>
        </div>
        </div>
        <?php }} ?>
      </div>
    </div>
  </div>
</section>

<?php include('includes/footer.php'); ?>

<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>

<?php include('includes/login.php'); ?>
<?php include('includes/registration.php'); ?>
<?php include('includes/forgotpassword.php'); ?>

<?php include('includes/footer-scripts.php'); ?>
</body>
</html>
