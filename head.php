<?php
include 'connection.php';
if (! empty($_SESSION['logged_in'])) {
	# code...
	$uid = $_SESSION['fid'];
	$sql = mysqli_query($con,"SELECT * from register where loginid='$uid'");
	while($row=mysqli_fetch_array($sql)){
		$name = $row['fname'];
	}

}
else
header('location:login.php');
?>


<!DOCTYPE html>
<html lang="en">
  <head>
   <title>E-Farm</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body class="goto-here">
		<div class="py-1 bg-primary">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">+ 1235 2355 98</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">NEHAALEX92@email.com</span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
						    <span class="text">3-5 Business days delivery &amp; Free Returns</span>
					    </div>
				    </div>

					
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
        
	      <a class="navbar-brand" href="farmer.php">E-FARM</a>
        <style>
          .navbar-brand {
            margin-left:-200px;
            
          }
        </style>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="farmer.php" class="nav-link">Home</a></li>
            <li class="nav-item active"><a href="insert_product.php" class="nav-link">Add Product</a></li>
			<li class="nav-item active"><a href="productview.php" class="nav-link">View Products</a></li>
			<li class="nav-item active"><a href="addeddetail.php" class="nav-link">View details</a></li>
      <li class="nav-item active"><a href="product_request.php" class="nav-link">Make a request</a></li>
      <li class="nav-item active"><a href="order_summary.php" class="nav-link">Order Requests</a></li>
	      
	         <!-- <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
            
	          
	          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>-->
			  <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li><br>
        <li class="navbar-brands"><a href="farmeraccount.php"><b>Hello <?php echo $name; ?><b></a></li>
        <style>
          .navbar-brands{
            padding:20px;
            margin-left:30px;
            
          }
        
        </style>
	      

	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->