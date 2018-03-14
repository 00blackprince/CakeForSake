<?php include( "inc/connect.inc.php");
error_reporting(0);
 include( "./inc/header.inc.php");



?>
<?php

if(isset($_SESSION['user_login'])){
  $email = $_SESSION["user_login"];

}
else
{
    $email = "";

         }

if($_GET['action']=="add") {


$id = $_GET['id'];
//select user from
if(isset($_SESSION['user_login'])){


     $sql = "SELECT * FROM users WHERE Email = '$email'";
     $user_query = mysqli_query($db_conx , $sql);

      while($row = mysqli_fetch_array($user_query)){

        $user_cart = $row['product_order_array'];
      }

        /*$user_cart_item_array = explode("," , $user_cart);
        $count = count($user_cart_item_array);*/
         if($user_cart == ""){ //means its first item in user cart


            $user_cart_update = $_GET['id'];
              $sql = "UPDATE users SET product_order_array='$user_cart_update' WHERE Email='$email'";

              mysqli_query($db_conx , $sql);

      }
      else{
        $get_id = $_GET['id'];
        echo $user_cart;
        $user_cart_update =  $user_cart.",".$get_id;
        echo $user_cart;
        $sql = "UPDATE users SET product_order_array='$user_cart_update' WHERE Email='$email'";
              mysqli_query($db_conx , $sql);

      }
}

else{
                  echo '<script>alert("You Have To Login First!!")</script>';
                   echo '<script>window.location="index.php"</script>';
}


}

if(isset($_GET["action"]))
{
    if($_GET["action"] == "delete")
    {
      if(isset($_GET["id"]))
      {
               $cake_id_to_remove  = $_GET["id"];

               $sql = "SELECT * FROM users WHERE Email = '$email'";
               $user_query = mysqli_query($db_conx , $sql);

                while($row = mysqli_fetch_array($user_query)){

                  $user_cart = $row['product_order_array'];
                }
                 $user_cart_item_array = explode("," , $user_cart);

                 $key = array_search($cake_id_to_remove,  $user_cart_item_array);
                     unset($user_cart_item_array[$key]);

                $user_cart_array_to_String = implode(",",$user_cart_item_array);
                $sql = "UPDATE users SET product_order_array='$user_cart_array_to_String' WHERE Email='$email'";

                mysqli_query($db_conx , $sql);

                ?>
                <script>window.location = 'cart.php'</script>
                <?php



        }
    }
}
?>

<style>

body {
  font-family: "Open Sans", sans-serif;
  line-height: 1.25;
}
table {
  border: 1px solid #ccc;
  border-collapse: collapse;
  margin: 0;
  padding: 0;
  width: 100%;
  table-layout: fixed;
}
table caption {
  font-size: 1.5em;
  margin: .5em 0 .75em;
}
table tr {
  background: #f8f8f8;
  border: 1px solid #ddd;
  padding: .35em;
}
table th,
table td {
  padding: .625em;
  text-align: center;
}
table th {
  font-size: .85em;
  letter-spacing: .1em;
  text-transform: uppercase;
}
@media screen and (max-width: 600px) {
  table {
    border: 0;
  }
  table caption {
    font-size: 1.3em;
  }
  table thead {
    border: none;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
  }
  table tr {
    border-bottom: 3px solid #ddd;
    display: block;
    margin-bottom: .625em;
  }
  table td {
    border-bottom: 1px solid #ddd;
    display: block;
    font-size: .8em;
    text-align: right;
  }
  table td:before {
    /*
    * aria-label has no advantage, it won't be read inside a table
    content: attr(aria-label);
    */
    content: attr(data-label);
    float: left;
    font-weight: bold;
    text-transform: uppercase;
  }
  table td:last-child {
    border-bottom: 0;
  }
}
</style>

<div >
                     <table >
                       <thead>
    <tr>
      <th scope="col">Image</th>
      <th scope="col">Product Name</th>
      <th scope="col">Price</th>
      <th scope="col">Action</th>
      <th scope="col">Order</th>
    </tr>
  </thead>
                      <tbody>
                          <?php
                          $user_cart_query = mysqli_query($db_conx , "SELECT * FROM users WHERE Email = '$email'");
                          $user_row = mysqli_fetch_array($user_cart_query);
                          $cart_item = $user_row['product_order_array'];
                           $total = 0;
                          $cart_item_array = explode("," , $cart_item);
                          for($i = 0 ; $i < count($cart_item_array) ; $i++){

                      $cake_query = mysqli_query($db_conx , "SELECT * FROM cakes WHERE id = '$cart_item_array[$i]'");
                           while($cake_row = mysqli_fetch_array($cake_query)){
  $CakeImgSrc = $cake_row['CakeImgSrc'];
                            $CakeName = $cake_row['CakeName'];
                            $CakePrice = $cake_row['CakePrice'];


                              $total = $total +  $CakePrice;
                          ?>
                          <tr>
                             <td data-label="Cake"> <img width="100px" height="100px" src="image/<?php echo $CakeImgSrc; ?>" /></td>
                               <td data-label="Cake Name"><?php echo $CakeName; ?></td>
                               <td data-label="Price">&#8377; <?php echo $CakePrice; ?></td>
                               <td data-label="Remove"> <a href="cart.php?action=delete&id=<?php echo $cake_row["id"]; ?>"><span class="text-danger">Remove</span></a></td>
                               <td data-label="Order"><a href="order.php?action=order&id=<?php echo $cake_row["id"]; ?>"><span class="text-success">Order</span></a></td>
                          </tr>
                          <?php

                        }
                        }

                          ?>
                          <tr>
                               <td align="right" colspan="2">Total</td>
                               <td align="left">&#8377; <?php echo $total; ?></td>
                               <td><a href="cart.php?action=deleteall"><span class="text-danger">Remove</span></a></td>
                               <td ><a href="order.php?action=order&id=<?php echo $cart_item; ?>" ><span class="text-success">Order All</span></a></td>

                          </tr>
</tbody>
                     </table>

                </div>



<?php
include( "./inc/footer.inc.php");


?>

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
<!-- //script for responsive tabs -->
<!-- stats -->
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.countup.js"></script>
  <script>
    $('.counter').countUp();
  </script>
<!-- //stats -->
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
