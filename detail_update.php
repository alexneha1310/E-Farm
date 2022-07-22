<?php      
    include 'connection.php';
    $id=$_GET['id'];
    $sql="select * from `farmdetail` where farmid='$id'";
    $result=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($result);
    $farm_name=$row['farm_name'];
	$about=$row['about'];
	$idproof = $row['idproof'];
    

    if(isset($_POST['update']))
    {
    
	$farm_name = $_POST['farm_name'];
	$about = $_POST['about'];
    $idproof = $_POST['idproof'];
    
   
        mysqli_query($con,"UPDATE `farmdetail` SET `farm_name`='$farm_name',`about`='$about',`idproof`='$idproof' where farmid='$id'");
    
            echo "<script>alert('Updated');</script>";
            header('location: addeddetail.php');
     }
  
      
    
 ?>
 
 <!DOCTYPE html>  
<html>  
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1">  
<style>  
body{  
  font-family: Calibri, Helvetica, sans-serif;  
  background-color: blue;  
}  
.container {  
    padding: 50px;  
  background-color: white;  
}  
  
input[type=text], input[type=password], textarea {  
  width: 100%;  
  padding: 15px;  
  margin: 5px 0 22px 0;  
  display: inline-block;  
  border: none;  
  background: #f1f1f1;  
}  
input[type=text]:focus, input[type=password]:focus {  
  background-color: orange;  
  outline: none;  
}  
 div {  
            padding: 10px 0;  
         }  
hr {  
  border: 1px solid #f1f1f1;  
  margin-bottom: 25px;  
}  
.registerbtn {  
  background-color: #4CAF50;  
  color: white;  
  padding: 16px 20px;  
  margin: 8px 0;  
  border: none;  
  cursor: pointer;  
  width: 100%;  
  opacity: 0.9;  
}  
.registerbtn:hover {  
  opacity: 1;  
}  
</style> 
<style> form{
  padding: 150px 170px;
}</style> 
</head>  
<body>  
<form method='post' action="" >  
  
  <div class="container">  
  <center>  <h1>update information</h1> </center>  
  <hr>  
  <div class="modal-header">
 
                          </div>
                      <div class="modal-body">
                     <div class="card-body card-block">
                     
                
                <div class="form-group">
                        <label for="company" class=" form-control-label">farm_name</label>
                    <input type="text"  class="form-control" name="farm_name"  id="farm_name" required onchange="Validat();"  onfocusout="f1()" value="<?php echo $farm_name?>">
					<span id="msg4" style="color:red;"></span>
						 

                </div>
				
				<div class="form-group">
                        <label for="company" class=" form-control-label">about</label>
                    <input type="text"  class="form-control" name="about"  id="about" required onchange="Validat();"  onfocusout="f1()" value="<?php echo $about?>">
					<span id="msg4" style="color:red;"></span>
						

                </div>
				
				
				<div class="form-group">
                        <label for="company" class=" form-control-label">idproof</label>
                    <input type="file"  class="form-control" name="idproof"  id="idproof" required onchange="Validat();"  onfocusout="f1()" >
					<span id="msg4" style="color:red;"></span>
						

                </div>
                <div class="form-group">
                        
                        <td><img src="uploads/<?php echo $row['idproof'];?>" width="300" height="300" /></td>
                    <img src=''
					
                </div>
                
                
               
                <!--<div class="form-group">
                        <label for="company" class=" form-control-label">Email </label>
                    <input type="email"   class="form-control" name="email" id="email" onfocusout="f1()" value=<?php echo $officer_email?>>
                </div>  
                <div class="form-group">
                       
                     <p style="">Password</p><input type="text"  name="password"   id="pwd"  value=<?php echo $officer_password?>>

                </div>  -->
            </div>  
                     
                </div>
            <div class="modal-footer">
                     <a id="" href="addeddetail.php" color="white"> Cancel</a>
                    <!--<button type="submit" class="btn btn-primary" name="s">Update</button>-->
					<input type="submit" class="btn btn-primary" name="update" value="Update" />

            </div>
                   
            </div>
                </div>
            
</form>  
</body>  
</html>