<?php      
    include 'connection.php';
    $id=$_GET['id'];
    $sql="select *from `farmer_product` where id='$id'";
    $result=mysqli_query($con,$sql);
   $row=mysqli_fetch_assoc($result);
    $productprice=$row['price'];
	$quantity=$row['quantity'];
    //$pimg = $row['pimg'];
    //$officer_email = $row['officer_email'];
    //$officer_password = $row['officer_password'];

    if(isset($_POST['update']))
    {
    
	$quantity = $_POST['quantity'];
	$productprice = $_POST['price'];
    
    
   
        mysqli_query($con,"UPDATE `farmer_product` SET `price`='$productprice',`quantity`='$quantity' where id='$id'");
    
            echo "<script>alert('Updated');</script>";
            header('location: productview.php');
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
                        <label for="company" class=" form-control-label">price</label>
                    <input type="number"  class="form-control" name="price"  id="price" required onchange="Validat();"  onfocusout="f1()" value="<?php echo $productprice?>">
					<span id="msg4" style="color:red;"></span>
						 <script>
function Validat() 
{
    var val = document.getElementById('price').value;

    if (!val.match(/^[1-9][0-9]*$/))
    {
        document.getElementById('msg4').innerHTML="Only Numbers are allowed ";
	
		
		            document.getElementById('price').value = "";
        return false;
    }
document.getElementById('msg4').innerHTML=" ";
    return true;
}

</script>

                </div>
				
				<div class="form-group">
                        <label for="company" class=" form-control-label">Quantity</label>
                    <input type="number"  class="form-control" name="quantity"  id="quantity" required onchange="Validat();"  onfocusout="f1()" value="<?php echo $quantity?>">
					<span id="msg4" style="color:red;"></span>
						 <script>
function Validat() 
{
    var val = document.getElementById('price').value;

    if (!val.match(/^[1-9][0-9]*$/))
    {
        document.getElementById('msg4').innerHTML="Only Numbers are allowed ";
	
		
		            document.getElementById('price').value = "";
        return false;
    }
document.getElementById('msg4').innerHTML=" ";
    return true;
}

</script>

                </div>
                <!--<div class="form-group">
                        <label for="company" class=" form-control-label">pimg</label>
                    <input type="file"  class="form-control" name="pimg" id="pimg" onfocusout="f1()" value=<?php echo $pimg?>>
					<!--<input type="hidden" name="old" onfocusout="f1()" value=<?php echo $pimg?>>-->
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
                     <a id="" href="addproduct.php" color="white"> Cancel</a>
                    <!--<button type="submit" class="btn btn-primary" name="s">Update</button>-->
					<input type="submit" class="btn btn-primary" name="update" value="Update" />

            </div>
                   
            </div>
                </div>
            
</form>  
</body>  
</html>