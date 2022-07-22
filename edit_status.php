<?php
session_start();
include('connection.php');
$id=$_GET['id'];
$sql1=mysqli_query($con,"UPDATE `order_tbl` SET `status`='Delivered' WHERE `id`='$id'");
echo "<script> alert('Order Delivered Successfully!!'); window.location.href='order_summary.php';</script>";
?>