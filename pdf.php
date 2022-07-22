<?php
session_start();
error_reporting(0);
include('connection.php');
if(strlen($_SESSION['logged_in'])==0)
    {   
header('location:login.php');
}
$cartid = $_GET['cid'];
$uid = $_SESSION['id'];
$result=mysqli_query($con,"SELECT `fname`,`lname`,`phone`,`adress` from `register` where loginid=$uid") or die(mysqli_error($con));
$result1=mysqli_query($con,"SELECT `status`,`date` from `order_tbl` where login_id=$uid") or die(mysqli_error($con));
$result2=mysqli_query($con,"SELECT `quantity`,`totalprice` from `tbl_cart` where loginid=$uid and status =2;") or die(mysqli_error($con));
$result3=mysqli_query($con,"SELECT * from tbl_cart,tbl_products where tbl_products.pro_id=tbl_cart.pro_id and loginid=$uid and tbl_cart.status='2' ;") or die(mysqli_error($con));
$result4=mysqli_query($con,"SELECT * FROM `tbl_payment` ORDER by payment_id desc limit 1") or die(mysqli_error($con));
$ro = mysqli_fetch_assoc($result3);
										$a=$ro['product_name'];

include('pdf_mc_table.php');
$pdf = new PDF_MC_TABLE();
$pdf->AddPage();
$pdf->SetFont('Arial','B',15);	
$pdf->Cell(176, 5, 'Bill ', 0, 0, 'C');
  $pdf->Ln();
  $pdf->Ln();
  $pdf->Ln();	
$row=mysqli_fetch_array($result);
$row1=mysqli_fetch_array($result1);
$row2=mysqli_fetch_array($result2);
$row3=mysqli_fetch_array($result3);
$row4=mysqli_fetch_array($result4);


$pdf->SetFont('Arial','',12);	
$pdf->Cell(0,12,'First Name : '. $row['fname'],0,1);
$pdf->Cell(0,12,'Last Name : '. $row['lname'],0,1);
// $pdf->Cell(0,12,'Gender : '. $row['gender'],0,1);
// $pdf->Cell(0,12,'Parent Name : '. $row['parent_name'],0,1);
// $pdf->Cell(0,12,'House Name : '. $row['house_name'],0,1);
// $pdf->Cell(0,12,'State : '. $row['state'],0,1);
// $pdf->Cell(0,12,'District : '. $row['district'],0,1);
// $pdf->Cell(0,12,'Email : '. $row['email'],0,1);
$pdf->Cell(0,12,'Phone Number : '. $row['phone'],0,1);
$pdf->Cell(0,12,'address : '. $row['adress'],0,1);
$pdf->Cell(0,12,'Product Names : '. $ro['product_name'],0,1,);
$pdf->Cell(0,12,'Quantity : '. $row2['quantity'],0,1);
$pdf->Cell(0,12,'Price: '. $row4['amount'],0,1);
$pdf->Cell(0,12,'Status: '. $row4['status'],0,1);
$pdf->Cell(0,12,'Date : '. $row1['date'],0,1);
// $pdf->Cell(0,12,'Blood : '. $row['blood'],0,1);




$pdf->Output();
?>