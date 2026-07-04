<?php
if(isset($_POST['emailsubscibe']))
{
$subscriberemail=$_POST['subscriberemail'];
$sql ="SELECT SubscriberEmail FROM tblsubscribers WHERE SubscriberEmail=:subscriberemail";
$query= $dbh -> prepare($sql);
$query-> bindParam(':subscriberemail', $subscriberemail, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
echo "<script>alert('Already Subscribed.');</script>";
}
else{
$sql="INSERT INTO  tblsubscribers(SubscriberEmail) VALUES(:subscriberemail)";
$query = $dbh->prepare($sql);
$query->bindParam(':subscriberemail',$subscriberemail,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Subscribed successfully.');</script>";
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}
}
}
?>

<footer class="dhruv-footer dpc-footer am-footer">
  <div class="footer-top">
    <div class="container">
      <div class="am-footer__grid">
        <div class="am-footer__col am-footer__brand">
          <a href="index.php" class="am-footer__logo">
            <img src="assets/images/logo-aurelia-footer.svg" alt="AURELIA MOTORS" width="200" height="44">
          </a>
          <p>Driven Beyond Expectations — curated premium vehicles and white-glove service by Dhruv Saxena in Jaipur.</p>
          <ul class="am-social">
            <li><a href="https://github.com/dhruvsaxena007" target="_blank" rel="noopener noreferrer" aria-label="GitHub"><i class="fa fa-github" aria-hidden="true"></i></a></li>
            <li><a href="https://www.instagram.com/dhruv_saxena_007?igsh=NnN1eHhrYTg2dHJ2" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            <li><a href="https://www.linkedin.com/in/dhruv-saxena-297230291" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
            <li><a href="mailto:prodhruv.saxena889@gmail.com" aria-label="Email"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
          </ul>
        </div>
        <div class="am-footer__col am-footer__explore">
          <h6>Explore</h6>
          <ul>
            <li><a href="car-listing.php">Our Fleet</a></li>
            <li><a href="page.php?type=aboutus">About Us</a></li>
            <li><a href="page.php?type=faqs">FAQs</a></li>
            <li><a href="contact-us.php">Contact</a></li>
          </ul>
        </div>
        <div class="am-footer__col am-footer__contact">
          <h6>Contact</h6>
          <ul class="am-footer__contact">
            <li><i class="fa fa-user" aria-hidden="true"></i><span>Dhruv Saxena</span></li>
            <li><a href="tel:9351901010"><i class="fa fa-phone" aria-hidden="true"></i><span>9351901010</span></a></li>
            <li><a href="mailto:prodhruv.saxena889@gmail.com"><i class="fa fa-envelope" aria-hidden="true"></i><span>prodhruv.saxena889@gmail.com</span></a></li>
            <li><i class="fa fa-map-marker" aria-hidden="true"></i><span>Devi Nagar, Sodala, Jaipur - 302019</span></li>
          </ul>
        </div>
        <div class="am-footer__col am-footer__newsletter">
          <h6>Newsletter</h6>
          <div class="newsletter-form">
            <form method="post">
              <div class="am-newsletter-row">
                <input type="email" name="subscriberemail" class="form-control newsletter-input" required placeholder="Your email address" />
                <button type="submit" name="emailsubscibe" class="btn">Subscribe</button>
              </div>
            </form>
            <p class="subscribed-text">Exclusive offers and fleet updates — delivered weekly.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container am-footer__bottom">
      <p class="copy-right">&copy; <?php echo date('Y'); ?> AURELIA MOTORS. All rights reserved.</p>
      <ul class="am-footer__legal">
        <li><a href="page.php?type=privacy">Privacy</a></li>
        <li><a href="page.php?type=terms">Terms</a></li>
        <li><a href="admin/">Admin</a></li>
      </ul>
    </div>
  </div>
</footer>
