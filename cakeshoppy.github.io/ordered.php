<?php include( "inc/connect.inc.php");
error_reporting(0);
 include( "./inc/header.inc.php");


 if(isset($_GET["action"]))
 {
        if($_GET["action"] == "cancelorder")
      {
        if(isset($_GET["id"]))
        {
                 $order_to_cancel  = $_GET["id"];
                 echo $order_to_cancel;
                 $sql = "DELETE FROM UserOrder WHERE id = '$order_to_cancel'";
                 $user_query = mysqli_query($db_conx , $sql);
                                  ?>
                  <script>window.location = 'ordered.php'</script>
                  <?php
          }
      }
 }
 $order_count = 1;
$order_result = mysqli_query($db_conx , "SELECT * from UserOrder WHERE Email='$email' AND IsDelivered = 0 ");
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
<div style="width:80%; magin:auto; margin-top:50px; ">
<center><h3 style="font-size: 2.5em;
font-weight: 700;
text-align: center;
letter-spacing: 2px;
color: #000;
text-transform: uppercase;">Your Pending Order</h3>
<p style="font-size: 1.5em;
font-weight: 700;
text-align: center;
letter-spacing: 2px;
color: #000;
text-transform: uppercase;"> We Trying To deliver as soon as Possible</p></center>
</div>
<table >
  <thead>
    <tr><th scope="col" >Order No.</th><th scope="col" >Order ID</th><th scope="col">Cake Details</th><th scope="col" >Total Price</th> <th scope="col" >Address</th> <th scope="col">Estimated Date</th></tr>


  </thead>
              <tbody>

  <?php
while($order_result_row = mysqli_fetch_array($order_result)){
  $cake_list = $order_result_row["CakeList"];
  $order_id = $order_result_row["id"];
    $address = $order_result_row["address"];
      $estimatedDate = $order_result_row["EstimatedDate"];
        $total_price = $order_result_row["TotalPrice"];
        $cake_list_array = explode(",", $cake_list);
        $cake_list_array_count = count($cake_list_array);

        ?>
        <tr>
          <td data-label="Order NO."><?php echo $order_count; ?></td>
          <td data-label="Order ID"><?php echo $order_id; ?></td>
          <td>

              <table >
<tbody>
                  <?php
                for($i = 0 ; $i < $cake_list_array_count ;$i++){
                  $cake_query = mysqli_query($db_conx , "SELECT * FROM cakes WHERE id = '$cake_list_array[$i]'");
                       while($cake_row = mysqli_fetch_array($cake_query)){
                        $CakeName = $cake_row['CakeName'];
                        $CakePrice = $cake_row['CakePrice'];
                ?>

                        <tr>
                        <td data-label="Cake"><?php echo $CakeName; ?></td>
                        <td data-label="Price">&#8377;  <?php echo $CakePrice; ?></td></tr>
                        <?php
                }
              }
              ?>
              <tr>
</tbody>
</table>

          </td>
          <td  data-label="Total Price"><?php echo $total_price; ?></td>
            <td  data-label="Address"><?php echo $address; ?></td>
          <td  data-label="Estimated Date"><?php echo $estimatedDate; ?></td>
          <td><a href="ordered.php?action=cancelorder&id=<?php echo $order_id; ?>">Cancel Order</a></td>

        </tr>
        <?php
$order_count = $order_count+1;
}

 ?>
        <tbody>
    </table>






</table>
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