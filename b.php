<?php
include 'connection.php';
session_start();
$id = $_SESSION['fid'];
$ss = mysqli_query($con,"SELECT * FROM `pro_req` where loginid ='$id' AND status = 'assigned'");
$ss1 = mysqli_num_rows($ss);
if($ss1>0){
	echo "<script> alert('You request is assigned'); window.location.href='product_request.php';</script>";
}else

{
$sql2 = mysqli_query($con,"SELECT * from `register` where loginid='$id'");
while($row=mysqli_fetch_array($sql2))
 
$email=  $_POST['email'];
$phone=  $_POST['phone'];
$address=  $_POST['adress']; 
$name=$_POST['fname'];
$product=$_POST['product_name'];
$file1=$_FILES['image']['name'];
move_uploaded_file($_FILES['image']['tmp_name'],"product_request/".$file1);

$sql1="INSERT INTO  `pro_req`(`loginid`, `fname`, `email`, `phone`, `address`, `product_name`, `image`, `status`) VALUES  ('$id','$name','$email','$phone','$address','$product','$file1','reported')";
$result = mysqli_query($con, $sql1);
echo "<script> alert('Successfully reported your request'); window.location.href='product_request.php';</script>";
}
?>