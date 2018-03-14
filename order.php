<?php include( "inc/connect.inc.php");
error_reporting(0);
 include( "./inc/header.inc.php");
 if(isset($_SESSION['user_login'])){
   $email = $_SESSION["user_login"];

 }
 else
 {
     $email = "";

          }
          echo $email ;
if(isset($_GET["action"]))
{
     if($_GET["action"] == "order")
     {
       if(isset($_GET["id"]))
       {
                $cake_id_to_order  = $_GET["id"];
                $order_cake_array = explode("," , $cake_id_to_order);
                $order_item_count = count($order_cake_array);
                $total = 0;
                ?>
           <div style="margin:auto; width:80%;">
                <table class="table table-bordered">
                  <table >
                    <thead>
                      <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Price</th>

                      </tr>
                    </thead>
                                <tbody>
                  <?php
                for($i = 0 ; $i < $order_item_count ;$i++){
                  $cake_query = mysqli_query($db_conx , "SELECT * FROM cakes WHERE id = '$order_cake_array[$i]'");
                       while($cake_row = mysqli_fetch_array($cake_query)){
                        $CakeImgSrc = $cake_row['CakeImgSrc'];
                        $CakeName = $cake_row['CakeName'];
                        $CakePrice = $cake_row['CakePrice'];
                        $total = $total +  $CakePrice;

                        ?>

                        <tr>
                        <td data-label="Cake" style="width:auto;"><img src="image/<?php echo $CakeImgSrc; ?>" width="100px" height="100px" /></td>
                        <td data-label="Cake Name" ><?php echo $CakeName; ?></td>
                        <td data-label="Price" >&#8377;  <?php echo $CakePrice; ?></td></tr>
                        <?php
                }
              }
              ?>
              <tr>
                <td data-label="total"  align="right" colspan="2">Total</td>
                <td align="left">&#8377; <?php echo $total; ?></td>
              </tr>
                          <tbody>
            </table>
          </div>
            <?php
          }
     }

}


?>
<?php
 $placeorder = @$_POST['placeorder'];
$fullname = "";
$addressline1 = "" ;
$addressline2 = "";
$citytown = "";
$stateregion = "";
$postalcode="" ;
$country="";
$paymentmethod="";






  if(isset($placeorder)){

    $fullname = strip_tags(@$_POST['fullname']);
    $addressline1 = strip_tags(@$_POST['addressline1']);
    $addressline2 = strip_tags(@$_POST['addressline2']);
    $citytown = strip_tags(@$_POST['citytown']);
    $stateregion = strip_tags(@$_POST['stateregion']);
    $postalcode=strip_tags(@$_POST['postalcode']);
    $country=strip_tags(@$_POST['country']);
    $paymentmethod=strip_tags(@$_POST['paymentmethod']);
   $estimatedDate = date('d/m/Y',strtotime("+2 day"));


    $address = $fullname.','.$addressline1.', '.$addressline2.' , '.$citytown.',  '.$stateregion.' ,'.$postalcode.' ,'.$country;
     if(isset($firstname)){
?>
<script>
console.log("Data insrted 1")
</script>

<?php

     mysqli_query($db_conx , "UPDATE users SET address = '$address' WHERE Email = '$email' ");
     ?>
     <script>
     console.log("Data insrted 1")
     </script>

     <?php
   }

     mysqli_query($db_conx , "INSERT INTO UserOrder VALUES ('', '$email' , '$cake_id_to_order', '$address' , '$paymentmethod','$estimatedDate' , '$total' , 0 )");
    $cake_order_id_query  = mysqli_query($db_conx , "SELECT id FROM UserOrder WHERE Email = '$email' ");
     while($cake_info = mysqli_fetch_array($cake_order_id_query)){
       $cake_order_id = $cake_info["id"];
       ?>
       <script>
       console.log("Data insrted 1")
       </script>

       <?php
 }

mysqli_query($db_conx , "UPDATE users SET PendingOrder = '$cake_order_id' WHERE  Email = '$email' ");


                 $sql = "SELECT * FROM users WHERE  Email = '$email'";
                 $user_query = mysqli_query($db_conx , $sql);

                  while($row = mysqli_fetch_array($user_query)){

                    $user_cart = $row['product_order_array'];
                  }
                  if(count($order_cake_array)==1){
                    $user_cart_item_array = explode("," , $user_cart);

                    $key = array_search($cake_id_to_order,  $user_cart_item_array);
                        unset($user_cart_item_array[$key]);

                   $user_cart_array_to_String = implode(",",$user_cart_item_array);
                   $sql = "UPDATE users SET product_order_array='$user_cart_array_to_String' WHERE  Email = '$email' ";

                   mysqli_query($db_conx , $sql);

                   ?>
                   <script>
                   console.log("Data insrted 1")
                   </script>

                   <?php
                  }
                else{
                  $sql = "UPDATE users SET product_order_array='' WHERE  Email = '$email'";

                  mysqli_query($db_conx , $sql);

                  ?>
                  <script>
                  console.log("Data insrted 1")
                  </script>

                  <?php
                }
                ?>
<script>window.location = 'ordered.php'</script>
<?php
}

 ?>
<?php
$user_order_query = mysqli_query($db_conx , "SELECT * FROM users WHERE  Email = '$email' ");
while($user_info = mysqli_fetch_array($user_order_query)){
  $user_address = $user_info["address"];
  $user_cart = $user_info["product_order_array"];
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
#order-container{
  margin: auto;

}
#order-container input{
  font-size: 20px;
  padding:5px;
  margin:10px;
  width:50%;
  border-radius:5px;

}
#order-container input:focus{
  border:1px solid #2fdab8;
}
#order-container input[type=submit]{
  background-color: #2fdab8;
}
#order-container input[type=submit]:hover{
  color: white;
}
 </style>
<div id="order-container">


<center>
<h3 margin="auto">fill all the detail to place your order</h3>
<form action = "#" method="POST" autocomplete="on">

      <p>please enter the address to deliver the order</p>
      <?php
            echo $user_address;
              $user_address_array = explode("," , $user_address);
           ?>

     <input type="text" name="fullname" value="<?php echo $user_address_array[0]; ?>" required="true" placeholder="Enter the Full Name"/><br>
     <input type="text" name="addressline1" value="<?php echo $user_address_array[1]; ?>" required="true"  placeholder="Room/Flat/House No. /Building"/><br>
      <input type="text" name="addressline2" value="<?php echo $user_address_array[2]; ?>" required="true" placeholder="Street/colony"/><br>
      <input type="text" name="citytown" value="<?php echo $user_address_array[3]; ?>" required="true" placeholder="City/Town"/><br>
      <input type="text" name="stateregion" value="<?php echo $user_address_array[4]; ?>" required="true" placeholder="State /Region"/><br>
      <input type  = "text" name="postalcode" value="<?php echo $user_address_array[5]; ?>" required="true" placeholder="PinCode"  /><br>
    <input type  = "text" name="country" value="<?php echo $user_address_array[6]; ?>"  required="true" placeholder="Country"  /><br>


      <p>Please Select the payment.</p>
    <input style="width:10px ; display:inline;"type="radio" value="cod" name="cod" />Cash On Delivery
    <input style="width:10px ; display:inline;" type="radio" value="card" name="card" />Pay By Credit/Debit card

<br>
    <input type="submit" value="Place Order" name="placeorder" />

</form>
</center>
</div>


  <?php

  include( "./inc/footer.inc.php");
  ?>
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
