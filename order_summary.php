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

</head>

<body>
    <?php
    include 'head.php'
    ?>



             <!-- main-heading -->
             <h2 class="main-title-w3layouts mb-2 text-center"></h2>
            <!--// main-heading -->

          
    
            <!-- Grids Content -->
            <section class="grids-section bd-content">
			
                <!-- Grids Info -->
                <div class="outer-w3-agile mt-3">
                <center>   <h4 class="tittle-w3-agileits mb-4">Order Requests </h4></center>
								
						<table  class="table table-bordered table-striped">
						  <thead>
							<tr>
              
              <th>Date</th>
							  <th>Item</th>
							  <th>Buyer Name</th>
                <th>Buyer Address</th>
                <th>Quantity</th>
							  <th>Price</th>
                <th>Payment Status</th>
                <th>Current Status</th>
                
							   <th>Action </th>
							   
							  
							</tr>
						  </thead>
              
						  <tbody>
						 
							
						  <?php		
                 $uu="SELECT * FROM farmer_product where loginid='$id' ";
                 $shit=mysqli_query($con,$uu);
                 $tt=mysqli_fetch_array($shit);
                 $cool=$tt['fname'];
                                  $sql=mysqli_query($con,"SELECT order_tbl.id,order_tbl.status,order_tbl.date,order_tbl.price,register.fname,register.adress,tbl_cart.quantity,tbl_products.product_name FROM `order_tbl` join register on register.loginid=order_tbl.login_id join tbl_cart on tbl_cart.id=order_tbl.cartid join tbl_products on tbl_products.pro_id=tbl_cart.pro_id join farmer_product on farmer_product.pro_id=tbl_products.pro_id WHERE farmer_product.loginid='$id' and tbl_cart.fname='$cool'");
                                  while($rows=mysqli_fetch_array($sql)){
                                    $b=$rows['id'];
                                    $r = mysqli_query($con,"SELECT* from tbl_payment Where cartid='$b'");
                
                                    $ro = mysqli_fetch_assoc($r);
                                    $a=$ro['status'];
                
                                
                                   
                                   // $sql1=mysqli_query($con," SELECT  order_tbl.id,order_tbl.cartid,order_tbl.login_id,order_tbl.status,order_tbl.date,register.fname,register.adress,register.loginid FROM `register`,order_tbl where register.loginid=order_tbl.login_id ");
                                   // $rows2=mysqli_fetch_array($sql1);
                                   // $sql1=mysqli_query($con," SELECT * FROM `tbl_cart`");
                                   // $rows3=mysqli_fetch_array($sql1);
                                  //  $g=$rows3['quantity'];
                                   // $t=$rows3['totalprice'];

                         
                                    

                                      ?>
                                     
                                    
                                      
												<tr style= width="300" height="50">	
                        
                             <td style="font-weight:normal" data-column="Item" ><?php echo $rows['date']; ?></td>
														 <td style="font-weight:normal" data-column="Item"> <?php echo $rows['product_name']; ?></td>
														 <td style="font-weight:normal" data-column="Item"> <?php echo $rows['fname']; ?></td>
														 <td style="font-weight:normal" data-column="Item"> <?php echo $rows['adress']; ?></td>
                             <td style="font-weight:normal" data-column="Item"> <?php echo $rows['quantity']; ?></td>
														 <td style="font-weight:normal" data-column="Total Price"> <?php echo $rows['price']; ?></td>
                             <td style="font-weight:normal" data-column="status"><?php echo $a; ?></td>
                             <td style="font-weight:normal" data-column="status"><?php echo $rows['status']; ?></td>
														
                             

                              <td><a style="color:#F63" href="edit_status.php?id=<?php echo $rows['id']; ?>"><b>Deliver</a></td>
                            	 
												</tr>
												
											
																		
							
												<?php }?>
										
						
						  </tbody>
					</table>

          <div class="title-left" style="text-align:center;">
          <td align="center" style="border-radius: 5px;" bgcolor="white"><a href="billpdf1.php" class="ml-auto btn hvr-hover ">Generate Report</a> </td>
                        </div>
						
					
                                    
                                </div>
                                <!--end:row -->
                            </div>
                         
                            
                                
                            </div>
                          
                          
                           
                        </div>
                    </div>
                </div>
            </section>
            
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
