<?php

session_start();

error_reporting(0);

include('includes/config.php');



$pagetype = isset($_GET['type']) ? $_GET['type'] : '';

$pageTitle = 'AURELIA MOTORS | Page Details';

if ($pagetype === 'aboutus') { $pageTitle = 'AURELIA MOTORS | About Us'; }

if ($pagetype === 'faqs') { $pageTitle = 'AURELIA MOTORS | FAQs'; }

if ($pagetype === 'terms') { $pageTitle = 'AURELIA MOTORS | Terms'; }

if ($pagetype === 'privacy') { $pageTitle = 'AURELIA MOTORS | Privacy'; }

?>

<!DOCTYPE HTML>

<html lang="en">

<head>

<?php include('includes/head-assets.php'); ?>

</head>

<body>



<?php include('includes/header.php'); ?>



<?php if ($pagetype === 'aboutus') { ?>

<section class="about_us section-padding am-content-page lux-reveal">

  <div class="container">

    <div class="am-about-grid">

      <div class="am-about-intro">

        <p class="am-about-eyebrow">Our Story</p>

        <h2>Built to Make Premium Car Rental Simple</h2>

        <p>AURELIA MOTORS was created by <strong>Dhruv Saxena</strong> with a clear purpose — to help people rent vehicles online with the same confidence and ease they expect from world-class brands.</p>

        <p>What started as a personal project to build a complete car rental platform has grown into a premium service for Jaipur and Rajasthan. Every part of this website — from browsing the fleet to booking your dates — was designed so you can reserve the right vehicle in minutes, not hours.</p>

        <p>We believe renting a car should feel effortless: transparent pricing, verified vehicles, responsive support, and a booking flow that simply works on phone, tablet, and desktop.</p>

      </div>

      <div class="am-about-cards">

        <div class="am-about-card">

          <i class="fa fa-laptop" aria-hidden="true"></i>

          <h4>Online-First Platform</h4>

          <p>Search, compare, and book entirely online — no paperwork hassles at the counter.</p>

        </div>

        <div class="am-about-card">

          <i class="fa fa-shield" aria-hidden="true"></i>

          <h4>Trusted Fleet</h4>

          <p>Every vehicle is inspected and maintained to premium safety standards.</p>

        </div>

        <div class="am-about-card">

          <i class="fa fa-map-marker" aria-hidden="true"></i>

          <h4>Rooted in Jaipur</h4>

          <p>Based in Sodala, we know Rajasthan's roads and what travelers need.</p>

        </div>

        <div class="am-about-card">

          <i class="fa fa-headphones" aria-hidden="true"></i>

          <h4>Personal Support</h4>

          <p>Reach Dhruv Saxena directly at 9351901010 for booking assistance.</p>

        </div>

      </div>

    </div>

    <div class="am-about-founder lux-reveal">

      <div class="am-about-founder__photo">

        <img src="assets/images/founder-dhruv.png" alt="Dhruv Saxena — Founder, AURELIA MOTORS" class="am-about-founder__avatar am-about-founder__avatar--photo" width="160" height="160">

      </div>

      <div class="am-about-founder__bio">

        <h3>Dhruv Saxena</h3>

        <p class="am-about-founder__role">Founder, AURELIA MOTORS</p>

        <p>I built this car rental portal to solve a real problem — people in Jaipur and across Rajasthan deserved a modern way to rent premium vehicles without confusion or hidden steps. AURELIA MOTORS is that platform: elegant, reliable, and built for 2026.</p>

        <ul class="am-about-founder__contact">

          <li><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:9351901010">9351901010</a></li>

          <li><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:prodhruv.saxena889@gmail.com">prodhruv.saxena889@gmail.com</a></li>

          <li><i class="fa fa-map-marker" aria-hidden="true"></i> Devi Nagar, Sodala, Jaipur - 302019</li>

        </ul>

      </div>

    </div>

  </div>

</section>



<?php } elseif ($pagetype === 'faqs') { ?>

<section class="about_us section-padding am-content-page lux-reveal">

  <div class="container">

    <div class="section-header text-center am-faq-header">

      <h2>Frequently Asked <span>Questions</span></h2>

      <p>Everything you need to know about booking with AURELIA MOTORS.</p>

    </div>

    <div class="panel-group am-faq-list" id="amFaqAccordion" role="tablist">

      <div class="panel panel-default am-faq-item">

        <div class="panel-heading" role="tab" id="faq1">

          <h4 class="panel-title">

            <a role="button" data-toggle="collapse" data-parent="#amFaqAccordion" href="#faqCollapse1" aria-expanded="true">How do I book a vehicle online?</a>

          </h4>

        </div>

        <div id="faqCollapse1" class="panel-collapse collapse in" role="tabpanel">

          <div class="panel-body">Browse our <a href="car-listing.php">fleet</a>, open a vehicle you like, choose your dates, and click Book Now. If you are not logged in, create a free account first — it takes under a minute.</div>

        </div>

      </div>

      <div class="panel panel-default am-faq-item">

        <div class="panel-heading" role="tab" id="faq2">

          <h4 class="panel-title">

            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#amFaqAccordion" href="#faqCollapse2">What documents do I need to rent a car?</a>

          </h4>

        </div>

        <div id="faqCollapse2" class="panel-collapse collapse" role="tabpanel">

          <div class="panel-body">You will need a valid driving licence, government-issued ID proof (Aadhaar or passport), and the booking confirmation we send after your reservation is accepted.</div>

        </div>

      </div>

      <div class="panel panel-default am-faq-item">

        <div class="panel-heading" role="tab" id="faq3">

          <h4 class="panel-title">

            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#amFaqAccordion" href="#faqCollapse3">Can I cancel or modify my booking?</a>

          </h4>

        </div>

        <div id="faqCollapse3" class="panel-collapse collapse" role="tabpanel">

          <div class="panel-body">Yes. Contact us at <a href="tel:9351901010">9351901010</a> or email <a href="mailto:prodhruv.saxena889@gmail.com">prodhruv.saxena889@gmail.com</a> with your booking number. Changes depend on vehicle availability for your new dates.</div>

        </div>

      </div>

      <div class="panel panel-default am-faq-item">

        <div class="panel-heading" role="tab" id="faq4">

          <h4 class="panel-title">

            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#amFaqAccordion" href="#faqCollapse4">Is fuel included in the rental price?</a>

          </h4>

        </div>

        <div id="faqCollapse4" class="panel-collapse collapse" role="tabpanel">

          <div class="panel-body">Fuel is typically not included. You receive the vehicle with an agreed fuel level and should return it at the same level. Details are confirmed at booking.</div>

        </div>

      </div>

      <div class="panel panel-default am-faq-item">

        <div class="panel-heading" role="tab" id="faq5">

          <h4 class="panel-title">

            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#amFaqAccordion" href="#faqCollapse5">Do you offer airport or hotel delivery in Jaipur?</a>

          </h4>

        </div>

        <div id="faqCollapse5" class="panel-collapse collapse" role="tabpanel">

          <div class="panel-body">Delivery within Jaipur can be arranged on request. Mention your pickup location in the booking message or call us to confirm availability and any delivery fee.</div>

        </div>

      </div>

      <div class="panel panel-default am-faq-item">

        <div class="panel-heading" role="tab" id="faq6">

          <h4 class="panel-title">

            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#amFaqAccordion" href="#faqCollapse6">What payment methods do you accept?</a>

          </h4>

        </div>

        <div id="faqCollapse6" class="panel-collapse collapse" role="tabpanel">

          <div class="panel-body">We accept UPI, bank transfer, and cash at pickup. Online payment options may be added soon — contact us for the latest payment details when you book.</div>

        </div>

      </div>

      <div class="panel panel-default am-faq-item">

        <div class="panel-heading" role="tab" id="faq7">

          <h4 class="panel-title">

            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#amFaqAccordion" href="#faqCollapse7">Where is AURELIA MOTORS located?</a>

          </h4>

        </div>

        <div id="faqCollapse7" class="panel-collapse collapse" role="tabpanel">

          <div class="panel-body">We are based at Devi Nagar, Sodala, Jaipur - 302019. Visit our <a href="contact-us.php">Contact page</a> for directions and a map.</div>

        </div>

      </div>

    </div>

  </div>

</section>



<?php } else {

$sql = "SELECT type,detail,PageName from tblpages where type=:pagetype";

$query = $dbh -> prepare($sql);

$query->bindParam(':pagetype',$pagetype,PDO::PARAM_STR);

$query->execute();

$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)

{

foreach($results as $result)

{ ?>

<section class="page-header aboutus_page lux-reveal">

  <div class="container">

    <div class="page-header_wrap">

      <div class="page-heading">

        <h1><?php echo htmlentities($result->PageName); ?></h1>

      </div>

      <ul class="coustom-breadcrumb">

        <li><a href="index.php">Home</a></li>

        <li><?php echo htmlentities($result->PageName); ?></li>

      </ul>

    </div>

  </div>

</section>

<section class="about_us section-padding lux-reveal">

  <div class="container">

    <div class="am-cms-content">

      <h2><?php echo htmlentities($result->PageName); ?></h2>

      <div class="am-cms-body"><?php echo $result->detail; ?></div>

    </div>

  </div>

</section>

<?php } } } ?>



<?php include('includes/footer.php'); ?>



<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>



<?php include('includes/login.php'); ?>

<?php include('includes/registration.php'); ?>

<?php include('includes/forgotpassword.php'); ?>

<?php include('includes/footer-scripts.php'); ?>

</body>

</html>

