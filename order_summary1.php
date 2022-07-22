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
<style type="text/css" rel="stylesheet">

  


.indent-small {
  margin-left: 5px;
}
.form-group.internal {
  margin-bottom: 0;
}
.dialog-panel {
  margin: 10px;
}
.datepicker-dropdown {
  z-index: 200 !important;
}
.panel-body {
  background: #e5e5e5;
  /* Old browsers */
  background: -moz-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
  /* FF3.6+ */
  background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, #e5e5e5), color-stop(100%, #ffffff));
  /* Chrome,Safari4+ */
  background: -webkit-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
  /* Chrome10+,Safari5.1+ */
  background: -o-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
  /* Opera 12+ */
  background: -ms-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
  /* IE10+ */
  background: radial-gradient(ellipse at center, #e5e5e5 0%, #ffffff 100%);
  /* W3C */
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e5e5e5', endColorstr='#ffffff', GradientType=1);
  /* IE6-9 fallback on horizontal gradient */
  font: 600 15px "Open Sans", Arial, sans-serif;
}
label.control-label {
  font-weight: 600;
  color: #777;
}


table { 
	width: 750px; 
	border-collapse: collapse; 
	margin: auto;
	
	}

/* Zebra striping */
tr:nth-of-type(odd) { 
	background: #eee; 
	}

th { 
	background: #ff3300; 
	color: white; 
	font-weight: bold; 
	
	}

td, th { 
	padding: 10px; 
	border: 1px solid #ccc; 
	text-align: left; 
	font-size: 14px;
	
	}

/* 
Max width before this PARTICULAR table gets nasty
This query will take effect for any screen smaller than 760px
and also iPads specifically.
*/
@media 
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {

	table { 
	  	width: 100%; 
	}

	/* Force table to not be like tables anymore */
	table, thead, tbody, th, td, tr { 
		display: block; 
	}
	
	/* Hide table headers (but not display: none;, for accessibility) */
	thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	
	tr { border: 1px solid #ccc; }
	
	td { 
		/* Behave  like a "row" */
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
	}

	td:before { 
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
		/* Label the data */
		content: attr(data-column);

		color: #000;
		font-weight: bold;
	}

}







	</style>

	</head>

<body>
    
       <?php include 'head.php'; ?>
            <br>
            <div class="result-show">
                <div class="container">
                    <div class="row">
                       
                       
                    </div>
                </div>
            </div>
            <!-- //results show -->
            <section class="restaurants-page">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-10 col-sm-4 col-md-4 col-lg-2">
                          
                          
                            
                        </div>
                        <div class="col-xs-12 col-sm-7 col-md-7 ">
                            <div class="bg-gray restaurant-entry">
                                <div class="row">
								
						<table  class="table table-bordered table-striped">
						  <thead>
							<tr>
              <th>Date</th>
							  <th>Item</th>
							  <th>Buyer Name</th>
                              <th>Buyer Address</th>
                              <th>Quantity</th>
							  <th>Price</th>
                <th>Current Status</th>


							   <th>Action </th>
							   
							  
							</tr>
						  </thead>
						  <tbody>
						  
						  
							
						  <?php		
                                  $sql=mysqli_query($con,"SELECT order_tbl.id,order_tbl.status,order_tbl.date,order_tbl.price,register.fname,register.adress,tbl_cart.quantity,tbl_products.product_name FROM `order_tbl` join register on register.loginid=order_tbl.login_id join tbl_cart on tbl_cart.id=order_tbl.cartid join tbl_products on tbl_products.pro_id=tbl_cart.pro_id join farmer_product on farmer_product.pro_id=tbl_products.pro_id WHERE farmer_product.loginid='$id' and order_tbl.id BETWEEN 21 and 26;");
                                  while($rows=mysqli_fetch_array($sql)){
                                    $uid=$rows['id'];
                                      ?>
                                    
                                      
												<tr style= width="300" height="50">	
                             <td data-column="status" ><?php echo $rows['date']; ?></td>
														 <td data-column="Item"> <?php echo $rows['product_name']; ?></td>
														 <td data-column="Item"> <?php echo $rows['fname']; ?></td>
														 <td data-column="Item"> <?php echo $rows['adress']; ?></td>
                              <td data-column="Item"> <?php echo $rows['quantity']; ?></td>
														  <td data-column="Total Price"> <?php echo $rows['price']; ?></td>
														  <td data-column="status"><?php echo $rows['status']; ?></td>
                             

                              <td><a style="color:#F63" href="edit_status.php?id=<?php echo $uid;?>"><b>Deliver</a></td>
                            	 
												</tr>
												
											
																		
							
												<?php }  ?>
										
						
						  </tbody>
					</table>
          <style>
.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
}
</style>
</head>
<body>

<div class="pagination">
  <a href="order_summary.php">&laquo;</a>
  <a href="order_summary1.php">1</a>
  <a href="#">2</a>
  <a href="#">3</a>
  <a href="#">4</a>
  <a href="#">5</a>
  <a href="#">6</a>
  <a href="#">&raquo;</a>
</div>
          <div class="table-responsive"style="text-align:center;align:center">
    <?php
    $sql1 = "SELECT * FROM order_tbl.id,order_tbl.status,order_tbl.date,order_tbl.price,register.fname,register.adress,tbl_cart.quantity,tbl_products.product_name FROM `order_tbl` join register on register.loginid=order_tbl.login_id join tbl_cart on tbl_cart.id=order_tbl.cartid join tbl_products on tbl_products.pro_id=tbl_cart.pro_id join farmer_product on farmer_product.pro_id=tbl_products.pro_id WHERE farmer_product.loginid='$id'";
    $result1 = mysqli_query($con, $sql1) or die("Query Failed.");

    if(mysqli_num_rows($result1) > 0){

      $total_records = mysqli_num_rows($result1);

      $total_page = ceil($total_records / $limit);

      echo '<ul class="pagination admin-pagination">';
      if($page > 1){
        echo '<li><a href="order_summary.php?page='.($page - 1).'">Prev</a></li>';
      }
      for($i = 1; $i <= $total_page; $i++){
        if($i == $page){
          $active = "active";
        }else{
          $active = "";
        }
        echo '<li class="'.$active.'"><a href="order_summary.php?page='.$i.'">'.$i.'</a></li>';
      }
      if($total_page > $page){
        echo '<li><a href="order_summary.php?page='.($page + 1).'">Next</a></li>';
      }

      echo '</ul>';
    }
    ?>
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
