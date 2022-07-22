<?php
session_start();
include('connection.php');
$id = $_SESSION['id'];
if($_SESSION['id']==""){
  header('location:login.php');
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
    include 'header.php'
    ?>

            <br>
           <!-- main-heading -->
           <h2 class="main-title-w3layouts mb-2 text-center"></h2>
            <!--// main-heading -->

          
    
            <!-- Grids Content -->
            <section class="grids-section bd-content">
			
                <!-- Grids Info -->
                <div class="outer-w3-agile mt-3">
                <center>   <h4 class="tittle-w3-agileits mb-4">Your Orders</h4></center>
								
						<table  class="table table-bordered table-striped">
						  <thead>
							<tr>
                <th>Date</th>
							  <th>Item</th>
							  <th>Farmer Name</th>
							  <th>Quantity</th>
							  <th>Price</th>
							   <th>Status</th>
                

							   
							  
							</tr>
						  </thead>
						  <tbody>
						  
						  
							
						  <?php			
                                    $result = mysqli_query($con,"SELECT* from tbl_cart where loginid=$id");
                                    while ($raw = mysqli_fetch_assoc($result)){
                                        $t=$raw['pro_id'];
										$re = mysqli_query($con,"SELECT* from tbl_products Where pro_id='$t'");
                    

                                        $b=$raw['id'];
										$r = mysqli_query($con,"SELECT* from order_tbl Where cartid='$b'");

										$ro = mysqli_fetch_assoc($r);
										$a=$ro['status'];

                                    $row = mysqli_fetch_assoc($re);

										$pn=$raw['fname'];
										$p=$raw['totalprice'];
										
										$q=$raw['quantity'];
                    $d=$ro['date'];
                                       $product=$row['product_name'];
                                       
                                        
                                      ?>
                                      
												<tr>
                             <td data-column="date"><?php echo $d; ?></td>	
														 <td data-column="Item"> <?php echo $product; ?></td>
														 <td data-column="Item"> <?php echo $pn; ?></td>
														 <td data-column="Item"> <?php echo $q; ?></td>
														  <td data-column="Total Price"> <?php echo $p; ?></td>
														  <td data-column="status"><?php echo $a; ?></td>
                              
														  
														  
														  
														 
												</tr>
												
											
																		
							
												<?php }  ?>
										
						
						  </tbody>
					</table>
						
					
                                    
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
