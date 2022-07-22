<?php
include('connection.php');
session_start();
//error_reporting(0);
$uid = $_SESSION['id'];
// $name = $_GET['name'];
$amount = $_GET['amount'];
$artist = $_GET['ar'];
$sql="INSERT INTO `tbl_payment`(`login_id`, `cartid`, `amount`, `status`) VALUES('$uid','$artist','$amount','Paid')";
$query_run=mysqli_query($con,$sql);
   

$qq = mysqli_query($con,"UPDATE `order_tbl` SET status='placed' WHERE  login_id = '$uid' ");
$query_run=mysqli_query($con,$qq);
 

echo "<script>window.location='final.php?cartid=$artist';</script>";

?>
