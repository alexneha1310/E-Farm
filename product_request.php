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
else



$sql2 = mysqli_query($con,"SELECT * from `register` where loginid='$id'");
while($row=mysqli_fetch_array($sql2)){
 $name= $row['fname'];
  $email= $row['email'];
  $phone= $row['phone'];
  $address= $row['adress']; 
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



<body class="fix-header">
    <?php include 'head.php'; ?>
								
								
					    <div class="col-lg-12">
						
                        <div class="card card-outline-primary">
                            <div class="card-header"><br>
							
                                <h4>Make a Request</h4>
                            </div>
                            <div class="card-body">
                                 <form class="form-horizontal" role="form" method="post" action="b.php" enctype="multipart/form-data">
                                    <div class="form-body">
                                       
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Name</label>
                                                    <input type="text" name="fname" class="form-control" value="<?php echo $name; ?>"readonly>
                                                   </div>
                                            </div>
											
											<div class="col-md-6">
											<div class="form-group">
                                                    <label class="control-label">Email</label>
                                                    <input type="text" name="email" class="form-control" value="<?php echo $email; ?>"readonly>
                                                   </div>
												   </div>
												   
												   <div class="col-md-6">
												   <div class="form-group">
                                                    <label class="control-label">phone</label>
                                                    <input type="text" name="phone" class="form-control" value="<?php echo $phone; ?>" readonly>
                                                   </div>
												   </div>
												   
												   <div class="col-md-6">
												   <div class="form-group">
                                                    <label class="control-label">Address</label>
                                                    <input type="text" name="adress" class="form-control" value="<?php echo $address; ?>" readonly>
                                                   </div>
												   </div>
                                            </div>
                                            
                                        </div>
                                        <!--/row-->
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Enter the Product name that you need to add on our site </label>
                                                    <input type="text" name="product_name" class="form-control" placeholder="">
                                                   </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Upload_Product Image</label>
                                                    <input type="file" name="image"   class="form-control form-control-danger" placeholder="">
                                                    </div>
                                            </div>
                                        </div>
                                        <!--/row-->
										
                                            <!--/span-->
                                        <div class="row">
                                            
											
											
											
											
											
											
											
											
											
											
                                        </div>
                                     
                                        </div>
                                    </div><br>
                                    <center><div>
                                        <input type="submit" value="save" name="submit" value="save"> 
                                        <a href="farmer.php" class="btn btn-inverse">Cancel</a>
                                    </div></center>
                                </form>
                            </div>
                        </div>
                    </div>
					
					
					
					
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

<script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
</body>
</html>