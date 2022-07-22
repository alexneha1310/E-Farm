<?php
    include 'connection.php';
  
    $fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$adress = $_POST['adress'];
	$place = $_POST['place'];
    $phone = $_POST['phone'];
	$password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
	$role=$_POST['role'];
	
    $s = "SELECT * FROM login WHERE username = '$email'";
    $result1 = mysqli_query($con, $s);
    $row1=mysqli_fetch_assoc($result1);
    $uname= isset($row1['username']) ? $row1['username'] : '';
	
    if($uname=="")
    {
            if($password===$confirm_password)
            {
            $sq = "INSERT INTO login (username,password,type,status) VALUES ('$email','$password','$role','1')";
            
             mysqli_query($con, $sq);

              $sqll = "SELECT * FROM login WHERE username = '$email' and password = '$password' and type = '$role'";
             $result = mysqli_query($con, $sqll);
            $no=mysqli_num_rows($result);
        
            if($no > 0)
            {
             $row=mysqli_fetch_assoc($result);
             $loid=$row['loginid'];
             $sql = "INSERT INTO register (loginid,fname,lname,email,adress,place,phone,estatus) VALUES ('$loid','$fname','$lname','$email','$adress','$place','$phone','1')";
             mysqli_query($con, $sql);
               echo "<script> alert('Registration successfull'); window.location.href='login.php';</script>";
             }
         }
         else
            echo "<script> alert('please enter password correctly'); window.location.href='signup.php';</script>";
}
else
echo "<script> alert('You are already registered'); window.location.href='index.php';</script>"

?>