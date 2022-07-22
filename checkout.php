<?php
        $apiKey="rzp_test_FPgs3nlZNIlL5w";
        include 'connection.php';
        session_start();    
        $session=$_SESSION['id'];
        $sqlii="SELECT register.loginid,register.fname,register.adress,order_tbl.login_id,order_tbl.id,order_tbl.cartid,order_tbl.price,order_tbl.status,order_tbl.date,tbl_cart.price,tbl_cart.totalprice from register join order_tbl on register.loginid=order_tbl.login_id join tbl_cart on tbl_cart.loginid=order_tbl.login_id where order_tbl.login_id='$session'";
        $result = mysqli_query($con, $sqlii);
        while ($row = mysqli_fetch_assoc($result)) {
            $id= $row['id'];
            $name=$row['fname'];
            $cc=$row['cartid'];

        }
        $sql=mysqli_query($con,"SELECT SUM(price) from order_tbl where login_id='$session' ");
        while($er=mysqli_fetch_array($sql)){
            $amounts=$er['SUM(price)'];
        
        }
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Provision Ordering and Delivering</title>
    <!-- Bootstrap core CSS -->
    <link href="css1/bootstrap.min.css" rel="stylesheet">
    <link href="css1/font-awesome.min.css" rel="stylesheet">
    <link href="css1/animsition.min.css" rel="stylesheet">
    <link href="css1/animate.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css1/style.css" rel="stylesheet"> </head>
<body>
<?php include 'header.php' ?>
    <div class="site-wrapper">
        <!--header starts-->
       
        <div class="page-wrapper">
            
                
            
			
			
				  
            <div class="container m-t-30">
			<form action="" method="POST">
                <div class="widget clearfix">
                    
                    <div class="widget-body">
                        <form method="post" action="payment_action.php?bid=<?php echo $id ?>&&id=<?php echo $amounts ?>&&uu=<?php echo $cc ?>">
                            <div class="row">
                                
                                <div class="col-sm-12">
                                    <div class="cart-totals margin-b-20">
                                        <div class="cart-totals-title">
                                            <h4>Cart Summary</h4> </div>
                                        <div class="cart-totals-fields">
										
                                            <table class="table">
											<tbody>
                                          
												 
											   
                                                    <tr>
                                                        <td>Cart Subtotal</td>
                                                        <td> <?php echo $amounts; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Shipping &amp; Handling</td>
                                                        <td>free shipping</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-color"><strong>Total</strong></td>
                                                        <td class="text-color"><strong> <?php echo  $amounts; ?></strong></td>
                                                    </tr>
                                                </tbody>
												
												
												
												
                                            </table>
                                        </div>
                                    </div>
                                    <!--cart summary-->
                                    <div class="payment-option">
                                        <ul class=" list-unstyled">
                                            <li>
                                                <label class="custom-control custom-radio  m-b-20">
                                                    <input name="mod" id="radioStacked1" checked value="COD" type="radio" class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Payment on delivery is acceptable</span><br>
                                                <span class="custom-control-description">and once Placed there is no replace option</span>
                                                    
                                            </li>
                                            
                                        </ul>
                                        
                                        <p class="text-xs-center"> <input type="submit" onclick="return confirm('Are you sure?');" name="submit"  class="btn btn-outline-success btn-block" value="Pay Now"> </p>
                                            
                                        </div>
									</form>
                                </div>
                            </div>
                       
                    </div>
                </div>
				 </form>
            </div>
           
        </div>
        <!-- end:page wrapper -->
         </div>

     <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
</body>

</html>


