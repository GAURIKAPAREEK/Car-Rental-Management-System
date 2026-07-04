<?php

session_start();

error_reporting(0);

include('includes/config.php');

if(isset($_POST['send']))

  {

$name=$_POST['fullname'];

$email=$_POST['email'];

$contactno=$_POST['contactno'];

$message=$_POST['message'];

$sql="INSERT INTO  tblcontactusquery(name,EmailId,ContactNumber,Message) VALUES(:name,:email,:contactno,:message)";

$query = $dbh->prepare($sql);

$query->bindParam(':name',$name,PDO::PARAM_STR);

$query->bindParam(':email',$email,PDO::PARAM_STR);

$query->bindParam(':contactno',$contactno,PDO::PARAM_STR);

$query->bindParam(':message',$message,PDO::PARAM_STR);

$query->execute();

$lastInsertId = $dbh->lastInsertId();

if($lastInsertId)

{

$msg="Query Sent. We will contact you shortly";

}

else 

{

$error="Something went wrong. Please try again";

}



}

?>

<!DOCTYPE HTML>

<html lang="en">

<head>

<?php $pageTitle = 'AURELIA MOTORS | Contact Us'; include('includes/head-assets.php'); ?>

</head>

<body>



<?php include('includes/header.php'); ?> 



<section class="contact_us section-padding am-content-page lux-reveal">

  <div class="container">

    <div class="row am-contact-layout">

      <div class="col-md-6 col-sm-12 am-contact-form-col">

        <h3>Get in touch</h3>

        <p class="am-contact-lead">Send us a message and our team will respond within 24 hours.</p>

          <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 

        else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

        <div class="contact_form">

          <form method="post">

            <div class="form-group">

              <label class="control-label">Full Name <span>*</span></label>

              <input type="text" name="fullname" class="form-control" id="fullname" required>

            </div>

            <div class="form-group">

              <label class="control-label">Email Address <span>*</span></label>

              <input type="email" name="email" class="form-control" id="emailaddress" required>

            </div>

            <div class="form-group">

              <label class="control-label">Phone Number <span>*</span></label>

              <input type="text" name="contactno" class="form-control" id="phonenumber" required maxlength="10" pattern="[0-9]+">

            </div>

            <div class="form-group">

              <label class="control-label">Message <span>*</span></label>

              <textarea class="form-control" name="message" rows="4" required></textarea>

            </div>

            <div class="form-group">

              <button class="btn" type="submit" name="send">Send Message <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>

            </div>

          </form>

        </div>

      </div>

      <div class="col-md-6 col-sm-12 am-contact-info-col">

        <h3>Contact Info</h3>

        <p class="am-contact-lead">AURELIA MOTORS — Sodala, Jaipur</p>

        <div class="contact_detail">

          <ul>

            <li>

              <div class="icon_wrap"><i class="fa fa-user" aria-hidden="true"></i></div>

              <div class="contact_info_m"><strong>Dhruv Saxena</strong><br>Founder, AURELIA MOTORS</div>

            </li>

            <li>

              <div class="icon_wrap"><i class="fa fa-map-marker" aria-hidden="true"></i></div>

              <div class="contact_info_m">Devi Nagar, Sodala,<br>Jaipur - 302019, Rajasthan</div>

            </li>

            <li>

              <div class="icon_wrap"><i class="fa fa-phone" aria-hidden="true"></i></div>

              <div class="contact_info_m"><a href="tel:9351901010">9351901010</a></div>

            </li>

            <li>

              <div class="icon_wrap"><i class="fa fa-envelope" aria-hidden="true"></i></div>

              <div class="contact_info_m"><a href="mailto:prodhruv.saxena889@gmail.com">prodhruv.saxena889@gmail.com</a></div>

            </li>

          </ul>

        </div>

      </div>

    </div>



    <div class="am-map-block lux-reveal">

      <div class="am-map-block__header">

        <h3>Find Us on the Map</h3>

        <p>Devi Nagar, Sodala, Jaipur — open by appointment</p>

      </div>

      <div class="am-map-wrap">

        <iframe

          title="AURELIA MOTORS location — Sodala, Jaipur"

          src="https://maps.google.com/maps?q=Devi+Nagar,+Sodala,+Jaipur,+Rajasthan+302019&amp;t=&amp;z=15&amp;ie=UTF8&amp;iwloc=&amp;output=embed"

          width="100%"

          height="420"

          style="border:0;"

          allowfullscreen=""

          loading="lazy"

          referrerpolicy="no-referrer-when-downgrade"></iframe>

      </div>

      <p class="am-map-link"><a href="https://www.google.com/maps/search/?api=1&amp;query=Devi+Nagar+Sodala+Jaipur+302019" target="_blank" rel="noopener noreferrer"><i class="fa fa-external-link" aria-hidden="true"></i> Open in Google Maps</a></p>

    </div>

  </div>

</section>



<?php include('includes/footer.php');?>



<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>



<?php include('includes/login.php');?>

<?php include('includes/registration.php');?>

<?php include('includes/forgotpassword.php');?>

<?php include('includes/footer-scripts.php'); ?>



</body>

</html>

