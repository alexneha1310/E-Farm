<?php
include 'connection.php';
session_start(); 
error_reporting(0);
$uid = $_SESSION['id'];
if($_SESSION['id']==""){
  header('location:login.php');
}
$sql = mysqli_query($con,"SELECT * from register where id='$uid'");
while($row=mysqli_fetch_array($sql)){
  $name = $row['fname'];
 
}
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">
    <link rel="shortcut icon" href="images/logo.jpg" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/logo.jpg">

    <!-- Title Page-->
    <title>VEGE-FOODS</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
        rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Main CSS-->
    <link href="css_insert/main.css" rel="stylesheet" media="all">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="buycss/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="buycss/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="buycss/css/responsive.css">

</head>

<body>
    <?php include 'header.php'; ?>
	
	<div class="w3l_header_right">
		
		<form class="example" action="testshop.php" method="POST">
        <input type="" placeholder="Search.." name="search" >
        <button type="submit"><i class="fa fa-search" ></i></button>
        
		<!--<a href="testshop.php"><button style="margin-left:20px">search</button></a>-->
        </form>
				
		
		</div>
	
<div class="row product-categorie-box">
    
                            <div class="tab-content">
                               <center> <h2>OUR PRODUCTS<h2></center>
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                <div class="row">
                                    <?php  
                                    $result = mysqli_query($con,"SELECT * FROM tbl_products");
                                    while ($raw = mysqli_fetch_array($result)){ ?>
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                        <form method="post"  enctype="multipart/form-data" action="">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                   
                                                    <img src="images/<?php echo $raw['product_image']; ?>" class="img-fluid" alt="Image" style="height: 188px;width: 322px;">
                                                   
                                                </div>
                                                <div class="why-text">
                                                    <h4 align="center"><?php echo $raw['product_name']; ?></h4>
                                                    
                                                    <input type="hidden" name="productid" value="<?php echo $raw['pid']; ?>"> 
                                                    <center><a class="nav-link"  href="list.php?id=<?php echo $raw['pro_id']; ?>">Shop Now</a></center>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                        <?php } ?>	
                                    </div>
                                </div>
                                
                                     
                             
                            </div>
                        </div>

</body>

</html>

