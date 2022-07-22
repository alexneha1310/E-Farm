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
		<tr><td style="font-weight:normal"><?php echo $r['categoryname'];?></td>
		    <td style="font-weight:normal"><?php echo $r['product_name'];?></td>
			<td ><img src="images/<?php echo $r['image'];?>" width="100" height="100"></td>
			
			<td style="font-weight:normal"><?php echo $r['quantity'];?></td>
			<td style="font-weight:normal"><?php echo $r['price'];?></td>
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
                                   
           
		  

