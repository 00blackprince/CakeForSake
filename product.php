<?php include( "inc/connect.inc.php");
error_reporting(0);
 include( "./inc/header.inc.php");

?>


  <!-- banner-bootom-w3-agileits -->
	<div class="banner-bootom-w3-agileits">
	<div class="container">
         <!-- mens -->
		<div class="col-md-4 products-left">

			<div class="css-treeview">
				<h4>Categories</h4>
				<ul class="tree-list-pad">
					<li><input type="checkbox" checked="checked" id="item-0" /><label for="item-0"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> Normal Cake</label>
						<ul>
							<li><input type="checkbox" id="item-0-0" /><label for="item-0-0"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Type 1</label>
								<ul>
                  <li><a href="product.php?type=layer-cake">Layer Cake</a></li>
                  <li><a href="product.php?type=cheese-cake">Cheese Cake</a></li>
                  <li><a href="product.php?type=sponge-cake">Sponge Cake</a></li>
                  <li><a href="product.php?type=butter-cake">Butter Cake</a></li>
                  <li><a href="product.php?type=eggless-cake">Eggless Cake</a></li>
                  <li><a href="product.php?type=black-forest-cake">Black Forest Cake</a></li>
                  <li><a href="product.php?type=sacher-cake">Sacher-Torte</a></li>
								</ul>
							</li>
							<li><input type="checkbox"  id="item-0-1" /><label for="item-0-1"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> Type 2</label>
								<ul>
                 <li><a href="product.php?type=layer-cake?type=layer-cake">Layer Cake</a></li>
                  <li><a href="product.php?type=cheese-cake">Cheese Cake</a></li>
                  <li><a href="product.php?type=sponge-cake">Sponge Cake</a></li>
                  <li><a href="product.php?type=butter-cake">Butter Cake</a></li>
                  <li><a href="product.php?type=eggless-cake">Eggless Cake</a></li>
                  <li><a href="product.php?type=black-forest-cake">Black Forest Cake</a></li>
                  <li><a href="product.php?type=sacher-cake">Sacher-Torte</a></li>
								</ul>
							</li>
              <li><input type="checkbox"  id="item-0-2" /><label for="item-0-2"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Filter By Price</label>
                <ul>


               <li><a href="product.php?min=100&max=300">(100-300)&#8377;</a></li>
               <li><a href="product.php?min=300&max=500">(300-500)&#8377;</a></li>
              <li> <a href="product.php?min=500&max=700">(500-700)&#8377;</a></li>
            <li>   <a href="product.php?min=700&max=1000">(700-1000)&#8377;</a></li>
              <li>  <a href="product.php?min=1000&max=2000" > 1000&#8377;</a></li>
                </ul>
              </li>


						</ul>
					</li>


				</ul>
			</div>

			<div class="clearfix"></div>
		</div>
		<div class="col-md-8 products-right">
			
			<div class="men-wear-top">

				<div  id="top" class="callbacks_container">
					<ul class="rslides" id="slider3">
						<li>
							<img class="img-responsive" src="image/banner2.jpg" alt=" "/>
						</li>
						<li>
							<img class="img-responsive" src="image/banner5.jpg" alt=" "/>
						</li>
						<li>
							<img class="img-responsive" src="image/banner2.jpg" alt=" "/>
						</li>

					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="men-wear-bottom">
				<div class="col-sm-4 men-wear-left">
					<img class="img-responsive" src="images/bb2.jpg" alt=" " />
				</div>
				<div class="col-sm-8 men-wear-right">
					<h4>Exclusive Cake <span>Collections</span></h4>
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem
					accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae
					ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
					explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut
					odit aut fugit. </p>
				</div>
				<div class="clearfix"></div>
			</div>


      <?php
  $result = $db_conx->query("SELECT * FROM cakes WHERE CakeType = 'layer-cake' LIMIT 3");
    while ($item = $result->fetch_array()) {

      ?>
  <div class="col-md-4 product-men">
    <div class="men-pro-item simpleCart_shelfItem">
      <div class="men-thumb-item">
        <img src="image/<?php echo $item["CakeImgSrc"]; ?>" alt="" class="pro-image-front" style="max-width:260px; max-height:300px;min-width:260px; min-height:300px;">
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
                  <form action="cart.php?action=add&id=<?php echo $item["id"]; ?>" method="post">
                    <fieldset>
                      <input type="hidden" name="cmd" value="_cart" />
                      <input type="hidden" name="add" value="1" />
                      <input type="hidden" name="business" value=" " />
                      <input type="hidden" name="item_name" value="Formal Blue Shirt" />
                      <input type="hidden" name="amount" value="30.99" />
                      <input type="hidden" name="discount_amount" value="1.00" />
                      <input type="hidden" name="currency_code" value="USD" />
                      <input type="hidden" name="return" value=" " />
                      <input type="hidden" name="cancel_return" value=" " />
                      <input type="submit" name="add_to_cart" value="Add to cart" class="button" />
                    </fieldset>
                  </form>
                </div>

      </div>
    </div>
  </div>
<?php } ?>





				<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>

		<div class="single-pro">

              <?php

              if(isset($_SESSION['user_login'])){
                $email = $_SESSION["user_login"];

              }
              else
              {
                  $email = "";

                       }




                ?>

                 <?php
                       if(isset($_GET['type'])){
                        $type = $_GET['type'];
                            $result = $db_conx->query("SELECT * FROM cakes WHERE CakeType = '$type' ");
                  }
                  else if(isset($_GET['min']) && isset($_GET['max'])){
                  	$min  = (int)$_GET['min'];
                  	$max = (int)$_GET['max'];
                  	$result = $db_conx->query("SELECT * FROM cakes WHERE CakePrice > $min And CakePrice < $max  ");
                  }




            while ($item = $result->fetch_array()) {

              ?>
          <div class="col-md-3 product-men">
            <div class="men-pro-item simpleCart_shelfItem">
              <div class="men-thumb-item">
                <img src="image/<?php echo $item["CakeImgSrc"]; ?>" alt="" class="pro-image-front" style="max-width:260px; max-height:300px;min-width:260px; min-height:300px;">
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
                          <form action="cart.php?action=add&id=<?php echo $item["id"]; ?>" method="post">
                            <fieldset>
                              <input type="hidden" name="cmd" value="_cart" />
                              <input type="hidden" name="add" value="1" />
                              <input type="hidden" name="business" value=" " />
                              <input type="hidden" name="item_name" value="Formal Blue Shirt" />
                              <input type="hidden" name="amount" value="30.99" />
                              <input type="hidden" name="discount_amount" value="1.00" />
                              <input type="hidden" name="currency_code" value="USD" />
                              <input type="hidden" name="return" value=" " />
                              <input type="hidden" name="cancel_return" value=" " />
                              <input type="submit" name="add_to_cart" value="Add to cart" class="button" />
                            </fieldset>
                          </form>
                        </div>

              </div>
            </div>
          </div>
        <?php } ?>
      </div>
</div>
</div>
<!-- //mens -->
<!--/grids-->
<?php
include( "./inc/footer.inc.php");


?>

<!-- //footer -->

<!-- login -->
			<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body modal-spa">
							<div class="login-grids">
								<div class="login">
									<div class="login-bottom">
										<h3>Sign up for free</h3>
										<form>
											<div class="sign-up">
												<h4>Email :</h4>
												<input type="text" value="Type here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" required="">
											</div>
											<div class="sign-up">
												<h4>Password :</h4>
												<input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">

											</div>
											<div class="sign-up">
												<h4>Re-type Password :</h4>
												<input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">

											</div>
											<div class="sign-up">
												<input type="submit" value="REGISTER NOW" >
											</div>

										</form>
									</div>
									<div class="login-right">
										<h3>Sign in with your account</h3>
										<form>
											<div class="sign-in">
												<h4>Email :</h4>
												<input type="text" value="Type here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" required="">
											</div>
											<div class="sign-in">
												<h4>Password :</h4>
												<input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
												<a href="#">Forgot password?</a>
											</div>
											<div class="single-bottom">
												<input type="checkbox"  id="brand" value="">
												<label for="brand"><span></span>Remember Me.</label>
											</div>
											<div class="sign-in">
												<input type="submit" value="SIGNIN" >
											</div>
										</form>
									</div>
									<div class="clearfix"></div>
								</div>
								<p>By logging in you agree to our <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
<!-- //login -->
<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<script src="js/responsiveslides.min.js"></script>
				<script>
						// You can also use "$(window).load(function() {"
						$(function () {
						 // Slideshow 4
						$("#slider3").responsiveSlides({
							auto: true,
							pager: true,
							nav: false,
							speed: 500,
							namespace: "callbacks",
							before: function () {
						$('.events').append("<li>before event fired.</li>");
						},
						after: function () {
							$('.events').append("<li>after event fired.</li>");
							}
							});
						});
				</script>
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
	<!---->
							<script type='text/javascript'>//<![CDATA[
							$(window).load(function(){
							 $( "#slider-range" ).slider({
										range: true,
										min: 0,
										max: 9000,
										values: [ 1000, 7000 ],
										slide: function( event, ui ) {  $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
										}
							 });
							$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );

							});//]]>

							</script>
						<script type="text/javascript" src="js/jquery-ui.js"></script>
					 <!---->
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
