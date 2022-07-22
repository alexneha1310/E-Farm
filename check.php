<?php
include 'connection.php';
session_start();
//error_reporting(0);
$uid = $_SESSION['id'];
if($_SESSION['id']==""){
  header('location:login.php');
}
$sql = mysqli_query($con,"SELECT * from tbl_cart where loginid='$uid'");
while($row=mysqli_fetch_array($sql)){
  $cartid = $row['id'];
  $price = $row['totalprice'];
  
 
}
?>

<?php
if(isset($_POST['update'])){
    $price = $_POST['totalprice'];
    $quan = $_POST['quantity'];
    $cartid = $_POST['id'];
    if($quan==0){
        $sqlls = "DELETE from tbl_cart where id=$cartid";
      mysqli_query($con,$sqlls);
     echo"<script>alert('Item Removed');</script>";
     echo"<script>window.location='cart.php';</script>";

    }
    else{
        $totalprice=$quan*$price;
    $sqll = "UPDATE tbl_cart SET quantity=$quan,totalprice=$totalprice where id=$cartid";
    mysqli_query($con,$sqll);
    
    echo"<script>alert('Cart Updated');</script>";
    echo"<script>window.location='cart.php';</script>";
    }
}


if(isset($_POST['remove'])){
$cartid = $_POST['id'];
$sqlls = "DELETE from tbl_cart where id=$cartid";
mysqli_query($con,$sqlls);
echo"<script>alert('Item Removed');</script>";
echo"<script>window.location='cart.php';</script>";

}


	




   


?>

<script>
function remove()
{
if(confirm("Do you want to remove this item"))
{
	return true;
}
else{
	return false;
}
}                      
 </script>


<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>cart</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/logo.jpg" type="image/x-icon">
    <link rel="apple-touch-icon" href="logo.jpg">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css_cart/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css_cart/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css_cart/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css_cart/custom.css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" /> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <?php include 'header.php' ?>
    <!-- End Main Top -->

    <!-- Start Top Search -->
 
    <!-- End Top Search -->

    <!-- Start All Title Box -->
    <div class="all-title-box" style="background-image: url('https://wallpaperaccess.com/full/1624855.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 style="font-size: 45px;font-weight: 900; padding-left: 80px;">checkout</h2>
                    
                </div>
            </div>
        </div>
    </div>
    
            <div class="cart-box-main">
        <div class="container">
           
            <div class="row">
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="checkout-address">
                        <div class="title-left">
                            <h3>Billing address</h3>
                        </div>
                        
                        <form class="needs-validation" novalidate>
                            <div class="row">
                                
                            </div>
                            <div class="mb-3">
                            <?php
                $result = mysqli_query($con,"SELECT * FROM register where loginid='$uid'");
                                while ($raw = mysqli_fetch_array($result)){ ?>
                                <label for="username"> </label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="username" placeholder="<?php echo $raw['fname']; ?>" readonly>
                                   
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email">Email Address </label>
                                <input type="email" class="form-control" id="email" placeholder="<?php echo $raw['email']; ?>" readonly>
                                
                            </div>
                            <div class="mb-3">
                                <label for="email">Contact Number </label>
                                <input type="email" class="form-control" id="phone" placeholder="<?php echo $raw['phone']; ?>" readonly>
                                
                            </div>
                            <div class="mb-3">
                                <label for="address">Address </label>
                                <input type="text" class="form-control" id="address" placeholder="<?php echo $raw['adress']; ?>" >
                            
                            </div>
                                <?php } ?>
                            
                            <div class="row">
                                <div class="col-md-5 mb-3">
                                   
                                  
                                </div>
                                <div class="col-md-4 mb-3">
                                   
                                </div>
                                <div class="col-md-3 mb-3">
                                    
                                </div>
                            </div>
                            <hr class="mb-4">
                            
                          
                            
                            
                        <div class="col-md-12 col-lg-12">
                            <div class="order-box">
                                
                               
                              
                            
                          
                               
                                <hr>
                                <div class="d-flex gr-total">
                                    <h5>Grand Total</h5>
                                    <?php
                                    $qq = mysqli_query($con,"SELECT SUM(price) FROM `order_tbl` WHERE login_id='$uid' and status='unpaid'");
                                   $er=mysqli_fetch_array($qq);
										
                                    ?>
                                    <div class="ml-auto h5"> <?php echo $er['SUM(price)'];  ?> </div>
                                    
                                </div>
                                <hr> </div>
                        </div>
                        
                        <!-- <div class="button" style=" margin-left: 350px; " > <a href="billpdf.php" class="ml-auto btn hvr-hover" style= "color: black;  background-color: skyblue; ">Generate Bill</a> </div> -->
                        <!-- <div class="button1"  > <a href="orderaction.php?cid=<?php echo $cartid ?>&&price=<?php echo $price ; ?>&&qua=<?php echo $rrrr ; ?>&&ui=<?php echo $f ; ?>&&bb=<?php echo $yy ; ?>" class="ml-auto btn hvr-hover" style="color: black; background-color: skyblue; ">Place Order</a> </div> -->
                                    




                                    <div class="payment-option">
                                        <ul class=" list-unstyled">
                                            <li>
                                                <label class="custom-control custom-radio  m-b-20">
                                                 <h5>NOTE:</h5>   
                                                <input name="mod" id="radioStacked1" checked value="COD" type="radio" class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description"></span><br>
                                                <span class="custom-control-description">Card and all type of digital payments are accepted</span><br>
                                                <span class="custom-control-description">Once Placed there is no replace option</span>
                                                    
                                            </li>
                                            
                                        </ul>
                                        
                                        <p class="text-xs-center"><a href="payment_process.php" class="btn btn-outline-success btn-block " onclick="return confirm('Are you sure?');">Pay now</a> </p>
                                        <!-- <p class="text-xs-center"><a href="billpdf.php" class="btn btn-outline-success btn-block ">Generate Bill</a> </p> -->
                                        </div>



                    </div>
                </div>
            </div>

        </div>
    </div>
	
	</div>
    </div>
	
	
	
	
	
    <!-- End Cart -->

    <!-- Start Instagram Feed  -->
    <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme">
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-01.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-02.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-03.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-04.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-06.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-07.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-08.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-09.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Instagram Feed  -->


   
</body>

</html>