<?php
session_start();
include('connection.php');

$id = $_SESSION['fid'];
$sql2 = mysqli_query($con,"SELECT * from `register` where loginid='$id'");
while($row=mysqli_fetch_array($sql2)){
  
  $email= $row['email'];
  $phone= $row['phone'];
  $address= $row['adress']; 
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
							
                                <h4>Edit Added Details</h4>
                            </div>

                      <table class="table">
                        <thead>
                          <tr>
                           
                            
                            <th class="font-weight-bold">Details</th>
                            <th class="font-weight-bold">Id-Proof</th>
                          <th class="font-weight-bold" colspan="2" align="center" >Action</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                           <?php
                          include 'connection.php';
$sql="select * from farmdetail where  status='assigned' and loginid='$id'";
$res=mysqli_query($con,$sql);

while($r=mysqli_fetch_array($res))
{
$id=$r['loginid'];
$sql1="SELECT * FROM register WHERE loginid=$id";
$res1=mysqli_query($con,$sql1);

$r1=mysqli_fetch_array($res1);
$email=$r['email'];
?>
		<tr><td>
       <b>Name:</b> <?php echo $r1['fname'];?> <?php echo $r1['lname'];?><br/></br> 
       <b>Farm-Name:</b> <?php echo $r['farm_name'];?><br/></br>
       <b>Mail-id:</b> <?php echo $r['email'];?></br></br>
       <b>Phone:</b> <?php echo $r['phone'];?><br/></br>
       <b>Address:</b> <?php echo $r['address'];?><br/></br>
       <b>About Farm:</b> <?php echo $r['about'];?><br/></br>
		
		

		<td><img src="uploads/<?php echo $r['idproof'];?>" width="300" height="300" /></td>
		
		
		
		
        		<td><a style="color:#F63" href="detail_update.php?id=<?php echo $r['farmid'];?>"><b>Edit</a></td>
				</tr>
                      <?php
}
?>
                        </tbody>
                      </table>
                                        </div>
                                    </div><br>
                                    
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