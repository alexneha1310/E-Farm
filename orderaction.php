<?php
include 'connection.php';
session_start();

$uid = $_SESSION['id'];
if($_SESSION['id']==""){
  header('location:login.php');
}
$cartid = $_GET['cid'];
$price = $_GET['price'];
$qun=$_GET['qua'];
$nn=$_GET['ui'];
$tt=$_GET['bb'];
$d=date('d-m-Y');
$order="INSERT INTO `order_tbl`(`login_id`, `cartid`, `price`,`status`, `date`) VALUES ('$uid', '$cartid', '$price','unpaid','$d')";
$or1=mysqli_query($con,$order);

$query="SELECT quantity FROM farmer_product WHERE pro_id='$tt' and fname='$nn' ";
$result=mysqli_query($con,$query);
$data=mysqli_fetch_array($result);
	 $dat=$data['quantity'];
   $total=0;
   $total=$dat-$qun;
     
			$n=mysqli_query($con,"UPDATE farmer_product set quantity='$total' where pro_id='$tt' and fname='$nn'");
		
$sqlls = "UPDATE tbl_cart SET status='2' WHERE id='$cartid'";
mysqli_query($con,$sqlls);
$orid = mysqli_insert_id($con);
$qq = mysqli_query($con,"UPDATE `cart_tbl` SET sts=1, orderid ='$orid' WHERE sts = 0 and login_id = '$uid' ");
echo"<script>window.location='check.php';</script>";
?>



