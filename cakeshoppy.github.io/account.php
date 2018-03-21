<!DOCTYPE html>
<?php
include( "./inc/connect.inc.php");
 include( "./inc/header.inc.php");

error_reporting(0);
session_start();

$change_name = @$_POST['change_name'];
$firstname_change = $_POST['first_name'];
$lastname_change = $_POST['last_name'];
$name = $firstname_change." ".$lastname_change;

if(isset($change_name)){
 mysqli_query($db_conx , "UPDATE users SET Name = '$name'  WHERE Email = '$email'");
}

$senddata = @$_POST['senddata'];

 //Password variables
 $old_password = strip_tags(@$_POST['oldpassword']);
 $new_password = strip_tags(@$_POST['newpassword']);
 $repeat_password = strip_tags(@$_POST['newpassword2']);

 if ($senddata) {
 //If the form has been submitted ...

 $password_query = mysqli_query($db_conx , "SELECT * FROM users WHERE Email='$email'");
 while ($row = mysqli_fetch_array($password_query)) {
       $db_password = $row['password'];


       //Check whether old password equals $db_password
       if ($old_password == $db_password) {
        //Continue Changing the users password ...
        //Check whether the 2 new passwords match
        if ($new_password == $repeat_password) {
           if (strlen($new_password) <= 4) {
            echo "Sorry! But your password must be more than 4 character long!";
           }
           else
           {

           //md5 the new password before we add it to the database

          //Great! Update the users passwords!
          $password_update_query = mysqli_query($db_conx , "UPDATE users SET Password='$new_password' WHERE Email='$email'");
          echo "Success! Your password has been updated!";

           }
        }
        else
        {
         echo "Your two new passwords don't match!";
        }
       }
       else
       {
        echo "The old password is incorrect!";
       }
 }
  }
 else
 {
  echo "";
 }


 $changeAddress = $_POST['changeAddress'];
 $fullname = "";
 $addressline1 = "" ;
 $addressline2 = "";
 $citytown = "";
 $stateregion = "";
 $postalcode="" ;
 $country="";
 $paymentmethod="";


    $address = $fullname.",".$addressline1.", ".$addressline2."," .$citytown.", ".$stateregion.",".$postalcode.",".$country;

  if(isset($changeAddress)){
    $fullname = strip_tags(@$_POST['fullname']);
  $addressline1 = strip_tags(@$_POST['addressline1']);
  $addressline2 = strip_tags(@$_POST['addressline2']);
  $citytown = strip_tags(@$_POST['citytown']);


  $stateregion = strip_tags(@$_POST['stateregion']);
  $postalcode=strip_tags(@$_POST['postalcode']);
  $country=strip_tags(@$_POST['country']);
    $address = $fullname.','.$addressline1.', '.$addressline2.' , '.$citytown.',  '.$stateregion.' ,'.$postalcode.' ,'.$country;
    $check =  mysqli_query($db_conx , "UPDATE users SET address = '$address' WHERE Email = '$email' ");

   
   
}
?>
<style>

#order-container{
  margin: auto;

}
#order-container input{
  width: 100%;
  font-size: 1vw;
  padding:0.5vw;
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
@media screen and (max-width: 600px) {
     input, input[type=submit] {
        width: 100%;
        margin-top: 0;
    }

 #order-container input{
  width: 100%;
  font-size: 4vw;
  padding:0.5vw;
  margin:10px;
  
  border-radius:5px;

}   
}
 </style>
<?php
$user_account_query = mysqli_query($db_conx  , "SELECT * FROM users WHERE Email = '$email'");
while($user_account_row = mysqli_fetch_array($user_account_query)){
  $name = $user_account_row["Name"];
  $address = $user_account_row["address"];
  $password = $user_account_row["password"];
  $email = $user_account_row["Email"];
}


               $user_name_array = explode(" " , $name);

?>
<div style="width:70%; margin:auto;" id="order-container">
<h3>Change Your name</h3>
<form action="account.php" method= "POST">
<input type="text" name="first_name" value="<?php echo $user_name_array[0]; ?>" placeholder="First Name" />
<input type="text" name="last_name"   value="<?php echo $user_name_array[1]; ?>" placeholder="Last Name" />
<input type="submit" name="change_name" value="Change Name"/>
</form>

<hr />
<form action="account.php" method="post">
<p>CHANGE YOUR PASSWORD:</p> <br />
Your Old Password: <input type="password" id="myInput1" name="oldpassword" id="oldpassword" size="40"><br />
Your New Password: <input type="password"   id="myInput2"name="newpassword" id="newpassword" size="40"><br />
Repeat Password  : <input type="password"  id="myInput3" name="newpassword2" id="newpassword2" size="40"><br />
<input type="checkbox" onclick="myFunction()" style="width:20px;">Show Password

<input type="submit" name="senddata" id="senddata" value="Update Information">
</form>

<script>
function myFunction() {
    var x1 = document.getElementById("myInput1");
    if (x1.type === "password") {
        x1.type = "text";
    } else {
        x1.type = "password";
    } 
    var x2 = document.getElementById("myInput2");

    if (x2.type === "password") {
        x2.type = "text";
    } else {
        x2.type = "password";
    }

        var x3 = document.getElementById("myInput3");

    if (x3.type === "password") {
        x3.type = "text";
    } else {
        x3.type = "password";
    }
}
</script>

<hr />
<?php
$user_order_query = mysqli_query($db_conx , "SELECT * FROM users WHERE Email = '$email' ");
while($user_info = mysqli_fetch_array($user_order_query)){
  $user_address = $user_info["address"];

}

 ?>
 <form action = "account.php" method="POST">

       <p>please enter the address to deliver the order</p>
       <?php

               $user_address_array = explode("," , $user_address);
            ?>

      <input type="text" name="fullname" value="<?php echo $user_address_array[0]; ?>" required="true" placeholder="Enter the Full Name"/><br>
      <input type="text" name="addressline1" value="<?php echo $user_address_array[1]; ?>" required="true"  placeholder="Room/Flat/House No. /Building"/><br>
       <input type="text" name="addressline2" value="<?php echo $user_address_array[2]; ?>" required="true" placeholder="Street/colony"/><br>
       <input type="text" name="citytown" value="<?php echo $user_address_array[3]; ?>" required="true" placeholder="City/Town"/><br>
       <input type="text" name="stateregion" value="<?php echo $user_address_array[4]; ?>" required="true" placeholder="State /Region"/><br>
       <input type  = "text" name="postalcode" value="<?php echo $user_address_array[5]; ?>" required="true" placeholder="PinCode"  /><br>
        <input type  = "text" name="country" value="<?php echo $user_address_array[6]; ?>"  required="true" placeholder="Country"  /><br>
      <input type="submit" value="Change Address" name="changeAddress" />

 </form>
<hr />
<a href="ordered.php" >Your Order</a>
</hr / >
<h3>Product You Brought Till Now </h3>

<div id="placedOrder" />
<?php
$placeorder_query = mysqli_query($db_conx , "SELECT Delivered FROM users  WHERE Email = '$email'");
while($placeorder_query_row = mysqli_fetch_array($placeorder_query)){
  $delivered  = $placeorder_query_row["Delivered"];
}
if($delivered == ""){
  echo "No Placed Order Yet !!";
}
else{


  $delivered_cake_array = explode("," , $delivered);
  $delivered_item_count = count($delivered_cake_array);
  $total = 0;
  ?>
  <div style="margin:auto; width:80%;">
  <table class="table table-bordered">

    <?php
  for($i = 0 ; $i < $delivered_item_count ;$i++){
    $cake_query = mysqli_query($db_conx , "SELECT * FROM cakes WHERE id = '$delivered_cake_array[$i]'");
         while($cake_row = mysqli_fetch_array($cake_query)){
          $CakeImgSrc = $cake_row['CakeImgSrc'];
          $CakeName = $cake_row['CakeName'];
          $CakePrice = $cake_row['CakePrice'];
          $total = $total +  $CakePrice;

          ?>

          <tr>
          <td style="width:auto;"><img src="image/<?php echo $CakeImgSrc; ?>" width="100px" height="100px" /></td>
          <td><?php echo $CakeName; ?></td>
          <td>&#8377;  <?php echo $CakePrice; ?></td></tr>
          <?php
  }
  }
  ?>
  <tr>
  <td align="right" colspan="2">Total</td>
  <td align="left">&#8377; <?php echo $total; ?></td>
  </tr>
  </table>
  <?php
}
?>
</div>
</div>


<?php
include( "./inc/footer.inc.php");

?>

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