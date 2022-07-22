<?php
include 'connection.php';
session_start();
$id = $_SESSION['fid'];
$ss = mysqli_query($con,"SELECT * FROM `farmdetail` where loginid ='$id' AND status = 'assigned'");
$ss1 = mysqli_num_rows($ss);
if($ss1>0){
	echo "<script> alert('You are already assigned'); window.location.href='farmer.php';</script>";

}else


$ss = mysqli_query($con,"SELECT * FROM `farmdetail` where loginid ='$id' AND status = 'reported'");
$ss1 = mysqli_num_rows($ss);
if($ss1>0){
	echo "<script> alert('You are already reported'); window.location.href='farmer.php';</script>";

}else


{
$sql2 = mysqli_query($con,"SELECT * from `register` where loginid='$id'");
while($row=mysqli_fetch_array($sql2))
 
$email=  $_POST['email'];
$phone=  $_POST['phone'];
$address=  $_POST['adress']; 
$farm_name=$_POST['farm_name'];
$about=$_POST['about'];
$file1=$_FILES['idproof']['name'];
move_uploaded_file($_FILES['idproof']['tmp_name'],"uploads/".$file1);

$sql1="INSERT INTO `farmdetail`(`loginid`, `farm_name`, `email`, `phone`, `address`, `about`, `idproof`, `status`) VALUES ('$id','$farm_name','$email','$phone','$address','$about','$file1','reported')";
$result = mysqli_query($con, $sql1);
echo "<script> alert('Successfully reported your request'); window.location.href='farmdetail.php';</script>";
}
?>