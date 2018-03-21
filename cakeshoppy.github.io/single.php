<?php include( "inc/connect.inc.php");
error_reporting(0);
 include( "./inc/header.inc.php");

?>
<?php

if(isset($_GET["product_id"])){
  $product_id = $_GET["product_id"];
  $product_detail = mysqli_query($db_conx ,"SELECT * FROM cakes WHERE id='$product_id'");
  while($row = mysqli_fetch_array($product_detail)){
       $cake_image  = $row['CakeImgSrc'];
       $cake_name = $row['CakeName'];
       $cake_type = $row['CakeType'];
       $cake_price = $row['CakePrice'];
       $cake_desc = $row['CakeDesc'];

                }

}

 ?>

  <!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
	<div class="container">
	     <div class="col-md-4 single-right-left ">
			<div class="grid images_3_of_2">
		<div class="thumb-image"> <img src="image/<?php echo $cake_image; ?>" data-imagezoom="true" class="img-responsive"> </div>
			</div>
		</div>
		<div class="col-md-8 single-right-left simpleCart_shelfItem">
					<h3><?php echo $cake_name; ?></h3>
					<p><span class="item_price"><?php echo $cake_price; ?></span> <del>- <?php echo $cake_price+100; ?>/del></p>
					<div class="rating1">
						<span class="starRating">
							<input id="rating5" type="radio" name="rating" value="5">
							<label for="rating5">5</label>
							<input id="rating4" type="radio" name="rating" value="4">
							<label for="rating4">4</label>
							<input id="rating3" type="radio" name="rating" value="3" checked="">
							<label for="rating3">3</label>
							<input id="rating2" type="radio" name="rating" value="2">
							<label for="rating2">2</label>
							<input id="rating1" type="radio" name="rating" value="1">
							<label for="rating1">1</label>
						</span>
					</div>
					<div class="description">
						<h5><?php echo $cake_desc; ?></h5>
						 <form action="#" method="post">
						<input type="text" value="Enter pincode" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter pincode';}" required="">
						<input type="submit" value="Check">
						</form>
					</div>
					<!--<div class="color-quality">
						<div class="color-quality-right">
							<h5>Quality :</h5>
							<select id="country1" onchange="change_country(this.value)" class="frm-field required sect">
								<option value="null">5 Qty</option>
								<option value="null">6 Qty</option>
								<option value="null">7 Qty</option>
								<option value="null">10 Qty</option>
							</select>
						</div>
					</div>-->

					<div class="occasion-cart">
						<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
															<form action="cart.php?action=add&id=<?php echo   $product_id; ?>" method="post">
																<fieldset>
																	<input type="hidden" name="cmd" value="_cart">
																	<input type="hidden" name="add" value="1">
																	<input type="hidden" name="business" value=" ">
																	<input type="hidden" name="item_name" value="Wing Sneakers">
																	<input type="hidden" name="amount" value="650.00">
																	<input type="hidden" name="discount_amount" value="1.00">
																	<input type="hidden" name="currency_code" value="INR">
																	<input type="hidden" name="return" value=" ">
																	<input type="hidden" name="cancel_return" value=" ">
																	<input type="submit" name="submit" value="Add to cart" class="button">
																</fieldset>
															</form>
														</div>

					</div>
					<ul class="social-nav model-3d-0 footer-social w3_agile_social single_page_w3ls">
						                                   <li class="share">Share On : </li>
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
	 			<div class="clearfix"> </div>
				<!-- /new_arrivals -->
	<div class="responsive_tabs_agileits">
				<div id="horizontalTab">
						<ul class="resp-tabs-list">
							<li>Description</li>
							<li>Reviews</li>
							<li>Information</li>
						</ul>
					<div class="resp-tabs-container">
					<!--/tab_one-->
					   <div class="tab1">

							<div class="single_page_agile_its_w3ls">
							  <h6><?php echo $cake_name; ?></h6>
							   <p><?php echo $cake_desc; ?>.</p>
							   <p class="w3ls_para"><?php echo $cake_desc; ?>.</p>
							</div>
						</div>
						<!--//tab_one-->
						<div class="tab2">

							<div class="single_page_agile_its_w3ls">
								<div class="bootstrap-tab-text-grids">
									<div class="bootstrap-tab-text-grid">
										<div class="bootstrap-tab-text-grid-left">
											<img src="images/t1.jpg" alt=" " class="img-responsive">
										</div>
										<div class="bootstrap-tab-text-grid-right">
											<ul>
												<li><a href="#">Admin</a></li>
												<li><a href="#"><i class="fa fa-reply-all" aria-hidden="true"></i> Reply</a></li>
											</ul>
											<p> your reviews matters us.your review query will be replied as soon as possible and sorry for inconvienece..</p>
										</div>
										<div class="clearfix"> </div>
						             </div>
									 <div class="add-review">
										<h4>add a review</h4>
										<form action="#" method="post">
												<input type="text" name="Name" required="Name" placeholder="name">
												<input type="email" name="Email" required="Email" placeholder="Email">
												<textarea name="Message" required="" placeholder="Textbox"></textarea>
											<input type="submit" value="SEND">
										</form>
									</div>
								 </div>

							 </div>
						 </div>
						   <div class="tab3">

							<div class="single_page_agile_its_w3ls">
							  <h6>Store Location</h6>
							   <p>Our Cake Shops pride themselves on being convenient, easy-to-locate and customer-friendly locations, where owners are dedicated to the absolute satisfaction of the customer. Whether you are looking to celebrate your anniversary, birthday, wedding, “just another Tuesday” or any other occasion with a cake, cupcake, or Swiss roll; a Monginis store member is waiting to help! Input your Pin Code or location or you can search by distance to find a CakeShoppy near you!

</p>
							   <p class="w3ls_para">Our Cake Shops pride themselves on being convenient, easy-to-locate and customer-friendly locations, where owners are dedicated to the absolute satisfaction of the customer. Whether you are looking to celebrate your anniversary, birthday, wedding, “just another Tuesday” or any other occasion with a cake, cupcake, or Swiss roll; a Monginis store member is waiting to help! Input your Pin Code or location or you can search by distance to find CakeShoppy near you!

</p>
							</div>
						</div>
					</div>
				</div>
			</div>
	<!-- //new_arrivals -->
	  	<!--/slider_owl-->

			<div class="w3_agile_latest_arrivals">
			<h3 class="wthree_text_info">Featured <span>Arrivals</span></h3>

      <?php
    $result = $db_conx->query("SELECT * FROM cakes WHERE CakeType = '$cake_type' LIMIT 4 ");
    while ($item = $result->fetch_array()) {

      ?>
    <div class="col-md-3 product-men">
    <div class="men-pro-item simpleCart_shelfItem">
      <div class="men-thumb-item">
        <img src="image/<?php echo $item["CakeImgSrc"]; ?>" alt="" class="pro-image-front" style="max-width:260px; max-height:300px; min-width:260px; min-height:300px;">
        <img src="image/<?php echo $item["CakeImgSrc"]; ?>" alt="" class="pro-image-back" style="max-width:260px; max-height:300px; min-width:260px; min-height:300px;">
          <div class="men-cart-pro">
            <div class="inner-men-cart-pro">
              <a href="single.php?product_id=<?php echo $item["id"]; ?>" class="link-product-add-cart">Quick View</a>
            </div>
          </div>
          <span class="product-new-top">New</span>

      </div>
      <div class="item-info-product ">
        <h4><a href="single.php?product_id=<?php echo $item["id"]; ?>"><?php echo $item["CakeName"]; ?></a></h4>
        <div class="info-product-price">
          <span class="item_price">$<?php echo $item["CakePrice"]; ?></span>
          <del>$<?php echo $item["CakePrice"]+100; ?></del>
        </div>
        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                  <form action="#" method="post">
                    <fieldset>
                      <input type="hidden" name="cmd" value="_cart" />
                      <input type="hidden" name="add" value="1" />
                      <input type="hidden" name="business" value=" " />
                      <input type="hidden" name="item_name" value="Formal Blue Shirt" />
                      <input type="hidden" name="amount" value="30.99" />
                      <input type="hidden" name="discount_amount" value="1.00" />
                      <input type="hidden" name="currency_code" value="INR" />
                      <input type="hidden" name="return" value=" " />
                      <input type="hidden" name="cancel_return" value=" " />
                      <input type="submit" name="submit" value="Add to cart" class="button" />
                    </fieldset>
                  </form>
                </div>

      </div>
    </div>
    </div>
    <?php } ?>


							<div class="clearfix"> </div>
					<!--//slider_owl-->
		         </div>
	        </div>
 </div>
<!--//single_page-->
<!--/grids-->

<!--grids-->
<!-- footer -->
<?php
include( "./inc/footer.inc.php");


?>
<!-- //footer -->

<!-- login -->

<!-- //login -->
<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<script src="js/modernizr.custom.js"></script>
	<!-- Custom-JavaScript-File-Links -->
	<!-- cart-js -->
<script>
	// Mini Cart
	paypal.minicart.render({
		action: '#'
	});

	if (~window.location.search.indexOf('reset=true')) {
		paypal.minicart.reset();
	}
</script>

	<!-- //cart-js -->
	<!-- single -->
<script src="js/imagezoom.js"></script>
<!-- single -->
<!-- script for responsive tabs -->
<script src="js/easy-responsive-tabs.js"></script>
<script>
	$(document).ready(function () {
	$('#horizontalTab').easyResponsiveTabs({
	type: 'default', //Types: default, vertical, accordion
	width: 'auto', //auto or any width like 600px
	fit: true,   // 100% fit in a container
	closed: 'accordion', // Start closed if in accordion view
	activate: function(event) { // Callback function if tab is switched
	var $tab = $(this);
	var $info = $('#tabInfo');
	var $name = $('span', $info);
	$name.text($tab.text());
	$info.show();
	}
	});
	$('#verticalTab').easyResponsiveTabs({
	type: 'vertical',
	width: 'auto',
	fit: true
	});
	});
</script>
<!-- FlexSlider -->
<script src="js/jquery.flexslider.js"></script>
						<script>
						// Can also be used with $(document).ready()
							$(window).load(function() {
								$('.flexslider').flexslider({
								animation: "slide",
								controlNav: "thumbnails"
								});
							});
						</script>
					<!-- //FlexSlider-->
<!-- //script for responsive tabs -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/jquery.easing.min.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear'
				};
			*/

			$().UItoTop({ easingType: 'easeOutQuart' });

			});
	</script>
<!-- //here ends scrolling icon -->

<!-- for bootstrap working -->
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>
