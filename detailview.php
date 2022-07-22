<?php
session_start();
include('connection.php');

$id = $_SESSION['fid'];

$id = $_SESSION['fid'];
$sql=mysqli_query($con,"SELECT * FROM `farmdetail` WHERE `loginid`='$id'");
$row=mysqli_fetch_array($sql);
if(!empty($row)){


$ss = mysqli_query($con,"SELECT * FROM `farmdetail` where loginid ='$id' AND status = 'reported'");
$ss1 = mysqli_num_rows($ss);
if($ss1>0){
	echo "<script> alert('You are not assigned'); window.location.href='farmer.php';</script>";
}
}
else{
    echo"<script> alert('Add Details and try Again!!');window.location='farmer.php';</script>";  

}
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
	      <a class="navbar-brand" href="farmeraccount.php"></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="farmer.php" class="nav-link">Home</a></li>
            <li class="nav-item active"><a href="insert_product.php" class="nav-link">Add Product</a></li>
			<li class="nav-item active"><a href="productview.php" class="nav-link">View Products</a></li>
			<li class="nav-item active"><a href="farmdetail.php" class="nav-link">Add details</a></li>
			<li class="nav-item active"><a href="product_request.php" class="nav-link">Make a product request</a></li>
      <li class="nav-item active"><a href="order_summary.php" class="nav-link">Your Orders</a></li>
	      
	         <!-- <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
            
	          
	          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>-->
			  <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
	      

	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

  
  
        
            <!-- main-heading -->
            <h2 class="main-title-w3layouts mb-2 text-center"></h2>
            <!--// main-heading -->

          
    
            <!-- Grids Content -->
            <section class="grids-section bd-content">
			
                <!-- Grids Info -->
                <div class="outer-w3-agile mt-3">
                 <center>   <h4 class="tittle-w3-agileits mb-4">Product View </h4></center>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                
								<th class="text-center">
                                    Category
                                   
                                </th>
								 <th class="text-center">
                                 Product
                                    
                                </th>
								 <th class="text-center">
                               Product Image
                                    
                                </th>
								<th class="text-center">
                               Quantity
                                    
                                </th>
								<th class="text-center">
                               Price
                                    
                                </th>
								<th class="text-center" colspan="2" align="center">
                                    Action
                                    
                                </th>
								
                                
                            </tr>
							
                        </thead>
						
						
                        <tbody>
						
						

                           
                         <?php
						include 'connection.php';

            $sql1=mysqli_query($con,"select * from register where loginid='$id'");
            $rows=mysqli_fetch_array($sql1);
            $loid=$rows['loginid'];
            

$sql="select tbl_products.product_name, farmer_product.image,farmer_product.id, tbl_category.categoryname,farmer_product.price, farmer_product.quantity from farmer_product join tbl_products 
    on tbl_products.pro_id = farmer_product.pro_id join tbl_category on tbl_category.id=tbl_products.category where farmer_product.loginid='$id'";
$result = mysqli_query($con, $sql);

while($r=mysqli_fetch_array($result))
{?>
		<tr><td><?php echo $r['categoryname'];?></td>
		    <td><?php echo $r['product_name'];?></td>
			<td><img src="images/<?php echo $r['image'];?>" width="100" height="100"></td>
			
			<td><?php echo $r['quantity'];?></td>
			<td><?php echo $r['price'];?></td>
			<td><a style="color:#F63" href="update.php?id=<?php echo $r[2];?>"><b>Edit</a></td>
				<td><a style="color:#F63" href="deleteproduct.php?pid=<?php echo $r['id'];?>"><b>Delete</a></td></tr>
                      <?php
}
?>
		  
        
      
               
                     
				</tbody>
                    </table>
					
                <!--// Grids Info -->
                

</body>
</html>        
                                   
           
		  

