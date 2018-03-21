<?php include( "inc/connect.inc.php"); 
error_reporting(0);
 include( "./inc/header.inc.php");
?>


<?php

 


$reg=@$_POST['reg'];
//declaring variables tp prevent error
$fn="";// first name
$ln="";//last name
$un="";//username
$em="";//email
$em2="";//email2
$pswd="";//password
$pswd2="";//password2
$d="";//sign up date
$u_check="";//check if username exist


//registration form
$fn=strip_tags(@$_POST['fname']);
$ln=strip_tags(@$_POST['lname']);
$un=strip_tags(@$_POST['username']);
$em=strip_tags(@$_POST['email']);
$em2=strip_tags(@$_POST['email2']);
$pswd=strip_tags(@$_POST['password']);
$pswd2=strip_tags(@$_POST['password2']);
$d=date("Y-m-d");//Year-Month_Day


if(isset($reg)){
  if($em=$em2){
    echo ($fn);
    //check if user already exist
    $u_check = mysqli_query( $db_conx , "SELECT username FROM users WHERE username = '$un'");
        // count the amount of the row where username= $un
       $check = mysqli_num_rows($u_check);
       //Email Check wheather Email Alrady Used Or not
       $e_check =  mysqli_query( $db_conx , "SELECT username FROM users WHERE email = '$em'");
       //count the number of row s return
       $email_check =mysqli_num_rows($e_check);
           if($check == 0){
            if(email_check == 0){
      //check all the field have been filled in
      
        //check password match
        if($pswd==$pswd2){
          //Encrypt Password and Password2 using Md5 before sending to datebase
              $pwsd=md5($pswd);
              $pwsd2=md5($pswd2);
              $query=mysqli_query( $db_conx , "INSERT INTO users VALUES ('', '$un' , '$fn', '$ln' , '$em' , '$pswd' , '$d' , '0' ,'','','')");
            // header('Location:index.php');

             $message = "You registration is Complete!! Login To Continue!!";
             ?>
                echo $message;
              <script type='text/javascript'>alert('<?php $message ?>');</script>
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
       echo "Sorry , But it Look  Like Email is Already Registered";
    }

}

                   else{
                    echo "UserName Already Taken..!";
                      } 
      
  


}
else{
echo "Your Email Doesn't Match!..";
}   

}



if(isset($_POST["user_login"]) && isset($_POST["password_login"])){
  $user_login = preg_replace('#[^A-Za-z0-9]#i' , '' , $_POST["user_login"]); // filter the everything but number and letters
          $password_login = preg_replace('#[^A-Za-z0-9]#i' , '' , $_POST["password_login"]); // filter the everything but number and letters
      $sql = mysqli_query($db_conx , "SELECT id FROM users WHERE username = '$user_login' AND password = '$password_login' LIMIT 1"); //query
   // check for existance
   $userCount = mysqli_num_rows($sql); //Count The Name Of and return
     if($userCount==1){
       while($row = mysqli_fetch_array($sql , MYSQLI_NUM)){
         $id = $row["id"];
       }
  
        $_SESSION["user_login"] = $user_login;
        header('Location:index.php');
          die('<h1>Welcome</h1>');
      
      
       exit();
       
       
     
       
         }else{
       echo 'That Information is Incorrect , Try Again !!';
       exit();
     }
 }
 

   



?>



  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>

<div id="id03" class="SignUpModal">
  <span onclick="document.getElementById('id03').style.display='none'" class="SignUpClose" title="Close Modal">&times;</span>
  <form class="signup-modal-content" action="#" method="POST">
    <div class="SignUp-container">
      <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>
      <input type="text" name="fname" min="6" max="25"  placeholder="First Name"  title="Maximum Limit Of First Name is 25 Character" required /><br /><br />
          <input type="text" name="lname"  min="6" max="25" placeholder="Last Name"  title="Maximum Limit Of Last Name is 25 Character"  required/><br /><br />
          <input type="text" name="username"  min="5" max="25" placeholder="UserName"  title="Maximum Limit Of Username is 25 Character" required/><br /><br />
          
          <input type="email" name="email" min="6" max="50" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"  required /><br /><br />
             
              
          <input type="email" name="email2"  min="6" max="50" placeholder="Re-Enter Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required/><br /><br />
          
          <input type="password" name="password" min="8" max="25" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
          title="Must contain at least one number and one uppercase and lowercase letter,
          and at least 8 or more characters" required /><br /><br />
          
          <input type="password" name="password2" min="8" max="25" placeholder="Re-Enter Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
          title="Must contain at least one number and one uppercase and lowercase letter,
          and at least 8 or more characters" required/><br /><br />

      <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
      <p> Already Registered?<button onclick="document.getElementById('id03').style.display='none'; document.getElementById('id04').style.display='block'" style="width:auto;">Login</button></p>
      <div class="SignUp-clearfix">
        <button  type="button" onclick="document.getElementById('id03').style.display='none'" class="SignUp-cancelbtn">Cancel</button>
        <button type="submit" name="reg" class="signupbtn SignUp-button">Sign Up</button>
      </div>
    </div>
  </form>
</div>

<div id="id04" class="modal">
  
  <form class="modal-content animate" action="index.php" method="POST" >
    <div class="imgcontainer">
      <span onclick="document.getElementById('id04').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
       <input type="text" name="user_login" min="5" max="25" placeholder="UserName" required  />

     <input type="text" name="password_login" min="8" max="25"" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter,
          and at least 8 or more characters" required />
        
      <button type="submit" name="login">Login</button>
    
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id04').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>



<div class="slideshow-container">
<div class="mySlides slide-fade">
  <div class="numbertext">1 / 3</div>
  <img src="image/cake-banner1.jpg" style="width:100%">
  <div class="text">Caption Text</div>
</div>
<div class="mySlides slide-fade">
  <div class="numbertext">2 / 3</div>
  <img src="image/cake-banner1.jpg" style="width:100%">
  <div class="text">Caption Two</div>
</div>
<div class="mySlides slide-fade">
  <div class="numbertext">3 / 3</div>
  <img src="image/cake-banner1.jpg" style="width:100%">
  <div class="text">Caption Three</div>
</div>
<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <button class="dropdown-btn">Cake Type
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
                     <a href="javascript:openMenu(  'layer-cake');" id = "defaultOpen" class="tablinks" >LAYER CAKES</a>
					 <a href="javascript:openMenu(  'pound-cake');" class="tablinks" >POUND CAKE</a>
					 <a href="javascript:openMenu(  'foam-cake');" class="tablinks" >FOAM AND SPONGE CAKES</a>
					 <a href="javascript:openMenu(  'egg-white-only-cake');" class="tablinks" >EGG WHITES ONLY</a>
					 <a href="javascript:openMenu(  'egg-white-and-yolks-cake');" class="tablinks" >EGG WHITES AND YOLKS</a>
					 <a href="javascript:openMenu(  'egg-and-oil-cake');" class="tablinks" >EGG AND OIL</a>
					 <a href="javascript:openMenu(  'flourless-cake');" class="tablinks" >FLOURLESS OR LOW-FLOUR CAKES</a>
					 <a href="javascript:openMenu(  'flourless-cake');" class="tablinks" >UNBAKED CAKES</a>
					 <a href="javascript:openMenu(  'yeast-cake');" class="tablinks" >YEAST CAKES</a>
					 <a href="javascript:openMenu(  'tortes-cake');" class="tablinks" >TORTES</a>
  </div>
    <button class="dropdown-btn">Filter By Weight
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
                     <a href="">250gm - 500gm</a>
					 <a href="">500gm - 1Kg</a>
					 <a href="">1Kg - 1.5Kg</a>
					 <a href="">1.5Kg - 2Kg</a>
					 <a href="">More than 2Kg</a>
  </div>
    <button class="dropdown-btn">Filter By Price
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
                      <a href="">(250-500)Rup</a>
					 <a href="">(500-1000)Rup</a>
					 <a href="">(1000-2000)Rup</a>
					 <a href="">(2000-5000)Rup</a>
					 <a href="">(More Than 5000)Rup</a>
  </div>
</div>
<span style="font-size:30px;cursor:pointer;  position:fixed; top:10%; left:0px;" onclick="openNav()">&#9776; Menu</span>





<?php
        $result = $db_conx->query("SELECT * FROM cakes ");
  $rows = $result->num_rows;    // Find total rows returned by database
  if($rows > 0) {
    $cols = 3;    // Define number of columns
    $counter = 1;     // Counter used to identify if we need to start or end a row
    $nbsp = $cols - ($rows % $cols);    // Calculate the number of blank columns
    
    $container_class = 'container-fluid';  // Parent container class name
    $row_class = 'row';    // Row class name
    $col_class = 'col-sm-4';
    $img_class='DBimg'; // Column class name
 
        echo '<div class="'.$container_class.'">';    // Container open
    while ($item = $result->fetch_array()) {
      if(($counter % $cols) == 1) {    // Check if it's new row
        echo '<div class="'.$row_class.'">';  // Start a new row
      }
                    $img = "image/layer-cake/".$item['CakeImgSrc'];
          echo '<div class="'.$col_class.'"><img class="'.$img_class.'" src="'.$img.'" alt="'.$item['CakeName'].'" /><h5>'.$item['CakeName'].'</h5><h5>'.$item['CakePrice'].'&#x20B9;</h5>
       
          <a href="cart.php?id='.$item['CakeName'].'">Add to cart</a> 


          </div>';     // Column with content
      if(($counter % $cols) == 0) { // If it's last column in each row then counter remainder will be zero
        echo '</div>';   //  Close the row
      }
      $counter++;    // Increase the counter
    }
    $result->free();
    if($nbsp > 0) { // Adjustment to add unused column in last row if they exist
      for ($i = 0; $i < $nbsp; $i++)  { 
        echo '<div class="'.$col_class.'">&nbsp;</div>';    
      }
      echo '</div>';  // Close the row
    }
        echo '</div>';  // Close the container
  }
?>




<div id="myModal" class="cake-modal">
  <span class="cake-close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="cake-caption"></div>
  
</div>
-->
<footer class="footer">
    <div class="container">
        <div class="row">
        <div class="col-sm-3">
            <h4 class="title">CakeForSake</h4>
            <p>Order Delicious Cake!!Its Fast And Afordable!!We Have 10+ types of cake + 500+ cakes!!</p>

            <ul class="social-icon">
            <a href="#" class="social"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="#" class="social"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a href="#" class="social"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="#" class="social"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
            <a href="#" class="social"><i class="fa fa-google" aria-hidden="true"></i></a>
            <a href="#" class="social"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
            </ul>
            </div>
        <div class="col-sm-3">
            <h4 class="title">My Account</h4>
            <span class="acount-icon">
            <a href="#"><i class="fa fa-heart" aria-hidden="true"></i> Wish List</a>
            <a href="#"><i class="fa fa-cart-plus" aria-hidden="true"></i> Cart</a>
            <a href="#"><i class="fa fa-user" aria-hidden="true"></i> Profile</a>
            <a href="#"><i class="fa fa-globe" aria-hidden="true"></i> Language</a>
          </span>
            </div>
        <div class="col-sm-3">
            <h4 class="title">Category</h4>
            <div class="category">
            <a href="#">Layer Cake</a>
            <a href="#">Eggs White Only Cake</a>
            <a href="#">Pound-cake</a>
            <a href="#">....</a>
            <a href="#">....</a>
            <a href="#">....</a>
            <a href="#">....</a>
            <a href="#">....</a>
            <a href="#">....</a>
            <a href="#">....</a>
            <a href="#">....</a>
            <a href="#">....</a>
            </div>
            </div>
        <div class="col-sm-3">
            <h4 class="title">Payment Methods</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            <ul class="payment">
            <li><a href="#"><i class="fa fa-cc-amex" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-credit-card" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-paypal" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-cc-visa" aria-hidden="true"></i></a></li>
            </ul>
            </div>
        </div>
        <hr>

        <div class="row text-center"> © 2017. Made  by Ashish And Murtuza.</div>
        </div>


    </footer>

<script>

// Get the modal
var signinmodal = document.getElementById('id04');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == signinmodal) {
        signinmodal.style.display = "none";
    }
}

// Get the modal
var SignUpmodal = document.getElementById('id03');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == SignUpmodal) {
        SignUpmodal.style.display = "none";
    }
}

function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
//slide show
var slideIndex = 1;
showSlides(slideIndex);
function plusSlides(n) {
  showSlides(slideIndex += n);
}
function currentSlide(n) {
  showSlides(slideIndex = n);
}
function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
}
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;
for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
var modal = document.getElementById('myModal');
// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("cake-caption");
function  modelView(img){
    modal.style.display = "block";
    modalImg.src = img.src;
    captionText.innerHTML = "<h1>"+img.title+"</h1>";
}
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("cake-close")[0];
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}
function openMenu(CakeType) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(CakeType).style.display = "block";
    evt.currentTarget.className += " active";
}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();


</script>
</body>
</html>
