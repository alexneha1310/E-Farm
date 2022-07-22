<?php
session_start();
include('connection.php');
$id = $_SESSION['id'];
if($_SESSION['id']==""){
  header('location:login.php');
}
$r=$_GET['id'];
$sql2 = mysqli_query($con,"SELECT `id`, `loginid`, `fname`, `place`, `pro_id`, `price`, `quantity`, `image`, `status` FROM `farmer_product` WHERE id='$r'");
while($row=mysqli_fetch_array($sql2)){
  $name= $row['fname'];
  $place= $row['place'];
  $price= $row['price']; 
  $quty=$row['quantity'];
  $pid=$row['pro_id'];
  $sql3=mysqli_query($con,"SELECT `pro_id`, `category`, `product_name`, `product_image`, `status` FROM `tbl_products` WHERE pro_id='$pid'");
  $row1=mysqli_fetch_array($sql3);
  $product=$row1['product_name'];
  $p_img='images/'.$row1["product_image"];
  
}

?>

<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>.</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/logo.jpg" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/logo.jpg">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="csss/css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="csss/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="csss/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="csss/css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

 <?php include 'header.php' ?>
 <br>
				<br><br>
        <br><br>
				

				
 <form action="cart_action.php?id=<?php echo $r ;?>" method="post">
				

<img src="<?php echo $p_img; ?> " width="700px" style="border-radius:70px;margin-left:-30px;margin-top:100px" >	
<h2 style="margin-left:850px;margin-top:-500px;font-weight:bold;font-size:30px"><?php echo $product ?> </h2>	<br><br>
<input type="submit" name="cart" value="Add to Cart" style="height: 43px;color: #fff;  background: #d33b33; border-radius: 6px;width: 98px;font-size: small;font-weight: 900;margin-left:250px;margin-top:400px">&nbsp &nbsp 
<!--<button name="view cart"  style="height: 43px;color: #fff;  background: #d33b33; border-radius: 5px;width: 98px;font-size: small;font-weight: 900;">View Cart</button>-->
<h3 style="margin-left:680px;margin-top:-300px;font-weight:bold;font-size:22px">Price/kg :&nbsp<?php echo $price ?></h3><br>
<!--<div class="form-group quantity-box" style="width:100px">
   <label class="control-label" style="margin-left:700px">Quantity&nbsp:</label>
    <input class="form-control" name="quantity" value="1" min="1" max="20" type="number" style="margin-left:690px">
 </div>-->

 
 <div style="margin-left:1000px;margin-top:-270px">
 <h4>DETAILS</h4>
 <label>Farmer Name:</label><br>
  <input type="text"name="fname" value="<?php  echo $name ?>" style="width:400px;border-color:red;height:40px"><br>
  


  <li>
                                        <div class="form-group quantity-box">
                                            <label class="control-label">Quantity</label>

                                            <input class="form-control" name="quantity" value="1" min="1" max="<?php  echo $quty ?>" style="width:100px;border-color:red;height:40px" type="number">
                                        </div>
                                    </li>


  <!-- <label>Availabe Quantity/kg:</label><br>
  <?php if($quty > 0) 
  {
    ?>
    <input type="text" name="aquantity" value="<?php  echo $quty ?>" style="width:400px;border-color:red;height:40px"><br>
    <label>Select Quantity/kg:</label><br>
    <?php
  }
  else{
    ?>
     <input type="text" name="aquantity" value="Not Available" style="width:400px;border-color:red;height:40px"><br>
    <label>Select Quantity/kg:</label><br>


    <?php
  }



    ?>

  
  
  
  <select id ="cat" name="quantity">
   <option value="">select</option>
  <?php 
		$s=1;
   while($s <= $quty)
   {?>
 <option  value="<?php echo $s;?>"><?php echo $s;?></option>
                                            <?php 
											$s++;
											} 
											?>
                                        </select> -->
  <label>Farmer Place:</label><br>
  <input type="text" name="place"  value="<?php  echo $place ?>"  style="width:400px;border-color:red;height:40px"><br>
</div>
</form>


	



			
                
            </div>
			
			</div>
			
			
           
    <!-- ALL JS FILES -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/jquery.superslides.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/inewsticker.js"></script>
    <script src="js/bootsnav.js."></script>
    <script src="js/images-loded.min.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/baguetteBox.min.js"></script>
    <script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>

