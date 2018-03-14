
<?php
include( "./inc/connect.inc.php");
error_reporting(0);
session_start();

?>
<div class="coupons">
		<div class="coupons-grids text-center">
			<div class="w3layouts_mail_grid">
				<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-truck" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
						<h3>FREE SHIPPING</h3>
						<p>Lorem ipsum dolor sit amet, consectetur</p>
					</div>
				</div>
				<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-headphones" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
						<h3>24/7 SUPPORT</h3>
						<p>Lorem ipsum dolor sit amet, consectetur</p>
					</div>
				</div>
				<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-shopping-bag" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
						<h3>MONEY BACK GUARANTEE</h3>
						<p>Lorem ipsum dolor sit amet, consectetur</p>
					</div>
				</div>
					<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-gift" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
						<h3>FREE GIFT COUPONS</h3>
						<p>Lorem ipsum dolor sit amet, consectetur</p>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

		</div>
</div>
<div class="footer">
  <div class="footer_agile_inner_info_w3l">
    <div class="col-md-3 footer-left">
      <h2><a href="index.html"><span>C</span>ake Shoppy </a></h2>
      <p>Lorem ipsum quia dolor
      sit amet, consectetur, adipisci velit, sed quia non
      numquam eius modi tempora.</p>
      <ul class="social-nav model-3d-0 footer-social w3_agile_social two">
                              <li><a href="#" class="facebook">
                                  <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                                  <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
                              <li><a href="#" class="twitter">
                                  <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                                  <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
                              <li><a href="#" class="instagram">
                                  <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                                  <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
                              <li><a href="#" class="pinterest">
                                  <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
                                  <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a></li>
                            </ul>
    </div>
    <div class="col-md-9 footer-right">
      <div class="sign-grds">
        <div class="col-md-4 sign-gd">
          <h4>Our <span>Information</span> </h4>
          <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="mens.html">Normal Cakes</a></li>
            <li><a href="womens.html">Occasion Cake</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="contact.html">Contact</a></li>
          </ul>
        </div>

        <div class="col-md-5 sign-gd-two">
          <h4>Store <span>Information</span></h4>
          <div class="w3-address">
            <div class="w3-address-grid">
              <div class="w3-address-left">
                <i class="fa fa-phone" aria-hidden="true"></i>
              </div>
              <div class="w3-address-right">
                <h6>Phone Number</h6>
                <p>+1 234 567 8901</p>
              </div>
              <div class="clearfix"> </div>
            </div>
            <div class="w3-address-grid">
              <div class="w3-address-left">
                <i class="fa fa-envelope" aria-hidden="true"></i>
              </div>
              <div class="w3-address-right">
                <h6>Email Address</h6>
                <p>Email :<a href="mailto:example@email.com"> mail@example.com</a></p>
              </div>
              <div class="clearfix"> </div>
            </div>
            <div class="w3-address-grid">
              <div class="w3-address-left">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
              </div>
              <div class="w3-address-right">
                <h6>Location</h6>
                <p>Broome St, NY 10002,California, USA.

                </p>
              </div>
              <div class="clearfix"> </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 sign-gd flickr-post">
          <h4>Flickr <span>Posts</span></h4>
          <ul>
            <li><a href="single.php?product_id=<?php echo $item["id"]; ?>"><img src="images/t1.jpg" alt=" " class="img-responsive" /></a></li>
            <li><a href="single.php?product_id=<?php echo $item["id"]; ?>"><img src="images/t2.jpg" alt=" " class="img-responsive" /></a></li>
            <li><a href="single.php?product_id=<?php echo $item["id"]; ?>"><img src="images/t3.jpg" alt=" " class="img-responsive" /></a></li>
            <li><a href="single.php?product_id=<?php echo $item["id"]; ?>"><img src="images/t4.jpg" alt=" " class="img-responsive" /></a></li>
            <li><a href="single.php?product_id=<?php echo $item["id"]; ?>"><img src="images/t1.jpg" alt=" " class="img-responsive" /></a></li>
            <li><a href="single.php?product_id=<?php echo $item["id"]; ?>"><img src="images/t2.jpg" alt=" " class="img-responsive" /></a></li>
            <li><a href="single.php?product_id=<?php echo $item["id"]; ?>"><img src="images/t3.jpg" alt=" " class="img-responsive" /></a></li>
            <li><a href="single.php?product_id=<?php echo $item["id"]; ?>"><img src="images/t2.jpg" alt=" " class="img-responsive" /></a></li>
            <li><a href="single.php?product_id=<?php echo $item["id"]; ?>"><img src="images/t4.jpg" alt=" " class="img-responsive" /></a></li>
          </ul>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    <div class="clearfix"></div>
      <div class="agile_newsletter_footer">
          <div class="col-sm-6 newsleft">
        <h3>SIGN UP FOR NEWSLETTER !</h3>
      </div>
      <div class="col-sm-6 newsright">
        <form action="#" method="post">
          <input type="email" placeholder="Enter your email..." name="email" required="">
          <input type="submit" value="Submit">
        </form>
      </div>

    <div class="clearfix"></div>
  </div>
    <p class="copy-right">&copy 2018 Cake shoppy. All rights reserved | Design by <a href="#">Black Prince</a></p>
  </div>
</div>
