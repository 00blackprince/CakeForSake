<!DOCTYPE html>
<?php
include( "./inc/connect.inc.php");
error_reporting(0);
session_start();
// Store Session Data
if(isset($_SESSION['user_login'])){
  $email = $_SESSION["user_login"];
  $user_query = mysqli_query($db_conx , "SELECT * FROM users WHERE Email = '$email'");

  while($user_data = mysqli_fetch_array($user_query)){
  $firstname = $user_data['first_name'];
}
}
else
{
    $email = "";

         }


$signup=@$_POST['signup'];
//declaring variables tp prevent error


$name="";//username
$em="";//email

$pswd="";//password
$pswd2="";//password2
$d="";//sign up date
$u_check="";//check if username exist


//registration form

$n=strip_tags(@$_POST['name']);

$em=strip_tags(@$_POST['email']);

$pswd=strip_tags(@$_POST['password']);
$pswd2=strip_tags(@$_POST['password2']);
$d=date("Y-m-d");//Year-Month_Day


if(isset($signup)){
       $e_check =  mysqli_query( $db_conx , "SELECT id FROM users WHERE Email = '$em'");
       //count the number of row s return
       $email_check =mysqli_num_rows($e_check);

            if($email_check == 0){
      //check all the field have been filled in

        //check password match
        if($pswd==$pswd2){
          //Encrypt Password and Password2 using Md5 before sending to datebase
              $pwsd=md5($pswd);
              $pwsd2=md5($pswd2);
             /* $otp = rand(100000,500000);*/
       $query=mysqli_query( $db_conx , "INSERT INTO users VALUES ('', '$n' ,  '$em' , '$pwsd' ,'','','','$d','','','','' )");
            // header('Location:index.php');

           /* $to      = $em; // Send email to our user
            $subject = 'Signup | Verification'; // Give the email a subject
            $message = '
            Hello'.$fn.'
            Thanks for signing up!
            Your account has been created, Use below OTP to verify Your Account.


            Please click this link to activate your account:
            http://localhost/CakeOrderWebsite/verify.php?otp='.$otp.'

            '; // Our message above including the link

            $headers = 'From:noreply@yourwebsite.com' . "\r\n"; // Set from headers
            mail($to, $subject, $message, $headers); // Send our email
*/



             ?>

              <script type='text/javascript'>alert('You registration is Complete!! Login To Continue!!');</script>
              <style type="text/css">
                   #id04 {
                     display: block;
                   }
               </style>



               <?php
           }
            else{
                       echo "Your Password Don'T Match!";
                         }
            }

         else{
           ?>

            <script type='text/javascript'>alert('Your Email Is already registered with another account!!');</script>
                       <?php
    }









}



if(isset($_POST["login_email"]) && isset($_POST["login_password"])){
  $login_email =$_POST["login_email"]; // filter the everything but number and letters
          $login_password = $_POST["login_password"];
if($login_email == "admin@cakeshoppy.com" && $login_password == "admin1234"){
 $_SESSION["user_login"] = $login_email;
        header('Location:admin.php');
          die('<h1>Welcome , Reload Page!!</h1>');
       exit();
}
else{
           // filter the everything but number and letters
          $md5_login_password = md5($login_password );
          echo    $md5_login_password ;
      $sql = mysqli_query($db_conx , "SELECT id FROM users WHERE Email = '$login_email' AND Password = '$md5_login_password' LIMIT 1"); //query
   // check for existance
   $userCount = mysqli_num_rows($sql);
   echo $userCount;
    //Count The Name Of and return
     if($userCount==1){
       while($row = mysqli_fetch_array($sql , MYSQLI_NUM)){
         $id = $row["id"];
       }

        $_SESSION["user_login"] = $login_email;
        echo   $_SESSION["user_login"];
        header('Location:index.php');
        echo
          die('<h1>Welcome , Reload Page!!</h1>');
       exit();
         }else{
           ?>
           <script type='text/javascript'>alert('Incorrect Information');</script>
<?php
           header("Location:index.php");
       exit();
     }
 }
}
  ?>

  <!DOCTYPE html>
  <html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Online Cake Ordering Websites , Order any Flavours , Types of Cakes" />
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/cart.css" rel="stylesheet" type="text/css" media="all" />

     <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
     <link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>

    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
    </head>
    <body>



<?php

 if(!(isset($_SESSION['user_login']))){ ?>
    <div class="header" id="home">
        <div class="container">
          <ul>
              <li> <a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Sign In </a></li>
            <li> <a href="#" data-toggle="modal" data-target="#myModal2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sign Up </a></li>
            <li><i class="fa fa-phone" aria-hidden="true"></i> Call : 01234567898</li>
            <li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:info@example.com">info@example.com</a></li>
          </ul>
        </div>
      </div>
 <?php  }else{ ?>
    <div class="header" id="home">
        <div class="container">
          <ul>

            <li> <a href="ordered.php" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Your Order</a></li>
            <li><i class="fa fa-phone" aria-hidden="true"></i> Call : 01234567898</li>
            <li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:info@example.com">info@example.com</a></li>
            <li><i class="fa fa-sign-out" aria-hidden="true"></i><a href="logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
 <?php   }?>


      <div class="header-bot">
        <div class="header-bot_inner_wthreeinfo_header_mid">
          <div class="col-md-4 header-middle">
            <form action="#" method="post">
                <input type="search" name="search" placeholder="Search here..." required="">
                <input type="submit" value=" ">
              <div class="clearfix"></div>
            </form>
          </div>
          <!-- header-bot -->
            <div class="col-md-4 logo_agile">
              <h1><a href="index.php"><span>C</span>ake Shoppy <i class="fa fa-shopping-bag top_logo_agile_bag" aria-hidden="true"></i></a></h1>
            </div>
              <!-- header-bot -->
          <div class="col-md-4 agileits-social top_content">
                  <ul class="social-nav model-3d-0 footer-social w3_agile_social">
                                                     <li class="share">Share On : </li>

                                                     <!-- AddToAny BEGIN -->
                                                     <div class="a2a_kit a2a_kit_size_32 a2a_default_style">

                                                     <a class="a2a_button_facebook"></a>
                                                     <a class="a2a_button_twitter"></a>
                                                     <a class="a2a_button_google_plus"></a>
                                                     </div>
                                                     <script async src="https://static.addtoany.com/menu/page.js"></script>
                                                     <!-- AddToAny END -->
                                                     <!--
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

                                      -->
                                  </ul>



          </div>
          <div class="clearfix"></div>
        </div>
      </div>



         <div class="ban-top">
           <div class="container">
             <div class="top_nav_left">
               <nav class="navbar navbar-default">
                 <div class="container-fluid">
                 <!-- Brand and toggle get grouped for better mobile display -->
                 <div class="navbar-header">
                   <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                   <span class="sr-only">Toggle navigation</span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   </button>
                 </div>
                 <!-- Collect the nav links, forms, and other content for toggling -->
                 <div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
                   <ul class="nav navbar-nav menu__list">
                   <li class="active menu__item menu__item--current"><a class="menu__link" href="index.php" >Home <span class="sr-only">(current)</span></a></li>
 <?php
  if(!(isset($_SESSION['user_login']))){ ?>
    <li class=" menu__item"><a class="menu__link" href="about.php">About</a></li>
         <?php  }else{ ?>


                   <li class=" menu__item"><a class="menu__link" href="account.php">Account</a></li>
  <?php   }?>
                   <li class="dropdown menu__item">
                     <a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Normal Cake<span class="caret"></span></a>
                       <ul class="dropdown-menu multi-column columns-3">
                         <div class="agile_inner_drop_nav_info">
                           <div class="col-sm-6 multi-gd-img1 multi-gd-text ">
                             <a href="product.php?type=layer-cake"><img src="image/top1.jpeg" alt=" "/></a>
                           </div>
                           <div class="col-sm-3 multi-gd-img">
                             <ul class="multi-column-dropdown">
                               <li><a href="product.php?type=layer-cake?type=layer-cake">Layer Cake</a></li>
                               <li><a href="product.php?type=cheese-cake">Cheese Cake</a></li>
                               <li><a href="product.php?type=sponge-cake">Sponge Cake</a></li>
                               <li><a href="product.php?type=butter-cake">Butter Cake</a></li>
                               <li><a href="product.php?type=eggless-cake">Eggless Cake</a></li>
                               <li><a href="product.php?type=black-forest-cake">Black Forest Cake</a></li>
                               <li><a href="product.php?type=sacher-cake">Sacher-Torte</a></li>
                             </ul>
                           </div>
                           <div class="col-sm-3 multi-gd-img">
                             <ul class="multi-column-dropdown">
                               <li><a href="product.php?type=flourless-orange-cake">Flourless Orange Cake</a></li>
                               <li><a href="product.php?type=tiramisu-cake">Tiramisu</a></li>
                               <li><a href="product.php?type=spice-cake">Spice Cake</a></li>
                               <li><a href="product.php?type=croquembouche-cake">Croquembouche</a></li>
                               <li><a href="product.php?type=carrot-cake">Carrot Cake</a></li>
                               <li><a href="product.php?type=babka-cake">Babka</a></li>
                               <li><a href="product.php?type=passionfruit-sponge-cake">Passionfruit Sponge Cake</a></li>
                             </ul>
                           </div>
                           <div class="clearfix"></div>
                         </div>
                       </ul>
                   </li>
                   <li class="dropdown menu__item">
                     <a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Occasion Cake <span class="caret"></span></a>
                       <ul class="dropdown-menu multi-column columns-3">
                         <div class="agile_inner_drop_nav_info">
                           <div class="col-sm-3 multi-gd-img">
                             <ul class="multi-column-dropdown">
                               <li><a href="occassion.php?type=Birthday-Cake">Birthday</a></li>
                               <li><a href="occassion.php?type=anniversary cake">Anniversary</a></li>
                               <li><a href="occassion.php?type=valentine-cake">Velentine Day</a></li>
                               <li><a href="occassion.php?type=christmas-cake">Merry Christmas </a></li>
                               <li><a href="occassion.php?type=Happy New Year Cake">Happy New Year </a></li>
                               <li><a href="occassion.php?type=Photo-Cake/Theme-Cake">Republic Day- 26th </a></li>
                               <li><a href="occassion.php?type=retirement cake">Retirement</a></li>
                             </ul>
                           </div>
                           <div class="col-sm-3 multi-gd-img">
                             <ul class="multi-column-dropdown">
                               <li><a href="occassion.php?type=flower-cake and flowers">Flowers Cake and Flowers</a></li>
                               <li><a href="occassion.php">For Mothor</a></li>
                               <li><a href="occassion.php">For Father</a></li>
                               <li><a href="occassion.php">For Sister</a></li>
                               <li><a href="occassion.php">For Hushband</a></li>
                               <li><a href="occassion.php">For Wife</a></li>
                               <li><a href="occassion.php">For Friend</a></li>
                             </ul>
                           </div>
                           <div class="col-sm-6 multi-gd-img multi-gd-text ">
                             <a href="occassion.php"><img src="image/top2.jpg" alt=" "/></a>
                           </div>
                           <div class="clearfix"></div>
                         </div>
                       </ul>
                   </li>

                   <li class=" menu__item"><a class="menu__link" href="contact.php">Contact</a></li>
                   </ul>
                 </div>
                 </div>
               </nav>
             </div>
             <?php

              if(!(isset($_SESSION['user_login']))){ ?>
             <div class="top_nav_right">
               <div class="wthreecartaits wthreecartaits2 cart cart box_1" data-toggle="modal" data-target="#myModalcart">

                     <button class="w3view-cart" onclick="alert('You Must Login First!!')" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>


                     </div>
             </div>
             <?php  }else{ ?>
               <div class="top_nav_right">
                 <div class="wthreecartaits wthreecartaits2 cart cart box_1" data-toggle="modal" data-target="#myModalcart">

                       <button class="w3view-cart"  onclick="location.href = 'cart.php';"  type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>


                       </div>
               </div>

              <?php   }?>
             <div class="clearfix"></div>
           </div>
         </div>





      <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
              <div class="modal-body modal-body-sub_agile">
              <div class="col-md-8 modal_body_left modal_body_left1">
              <h3 class="agileinfo_sign">Sign In <span>Now</span></h3>
                    <form action="#" method="post">
                <div class="styled-input agile-styled-input-top">
                  <input type="email" name="login_email" required="">
                  <label>Email</label>
                  <span></span>
                </div>
                <div class="styled-input">
                  <input type="password" name="login_password" required="">
                  <label>Password</label>
                  <span></span>
                </div>
                <input type="submit" value="Sign In" name="login">
              </form>
                <ul class="social-nav model-3d-0 footer-social w3_agile_social top_agile_third">
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
                              <div class="clearfix"></div>
                              <p><a href="#" data-toggle="modal" data-target="#myModal2" > Don't have an account?</a></p>

              </div>
              <div class="col-md-4 modal_body_right modal_body_right1">
                <img src="images/log_pic.jpg" alt=" "/>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
          <!-- //Modal content-->
        </div>
      </div>



      <div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
              <div class="modal-body modal-body-sub_agile">
              <div class="col-md-8 modal_body_left modal_body_left1">
              <h3 class="agileinfo_sign">Sign Up <span>Now</span></h3>
               <form action="#" method="post">
                <div class="styled-input agile-styled-input-top">
                  <input type="text" name="name" required="">
                  <label>Name</label>
                  <span></span>
                </div>
                <div class="styled-input">
                  <input type="email" name="email" required="">
                  <label>Email</label>
                  <span></span>
                </div>
                <div class="styled-input">
                  <input type="password" name="password" required="">
                  <label>Password</label>
                  <span></span>
                </div>
                <div class="styled-input">
                  <input type="password" name="password2" required="">
                  <label>Confirm Password</label>
                  <span></span>
                </div>
                <input type="submit" name="signup" value="Sign Up">
              </form>
                <ul class="social-nav model-3d-0 footer-social w3_agile_social top_agile_third">
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
                              <div class="clearfix"></div>
                              <p><a href="#">By clicking register, I agree to your terms</a></p>

              </div>
              <div class="col-md-4 modal_body_right modal_body_right1">
                <img src="images/log_pic.jpg" alt=" "/>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
          <!-- //Modal content-->
        </div>
      </div>
