<?php
session_start();
include('connection.php');

$id = $_SESSION['fid'];
$sql=mysqli_query($con,"SELECT * FROM `farmdetail` WHERE `loginid`='$id'");
$row=mysqli_fetch_array($sql);
if(!empty($row)){
$ss = mysqli_query($con,"SELECT * FROM `farmdetail` where loginid ='$id' AND status = 'reported'");
$ss1 = mysqli_num_rows($ss);
if($ss1>0){
	echo "<script> alert('You are not assigned'); window.location.href='farmer.php';</script>";
}
else



$sql = mysqli_query($con,"SELECT * from `register` where loginid='$id'");
$iid=0;
@$iid = $_GET['sid'];
while($row=mysqli_fetch_array($sql)){
  $name = $row['loginid'];
  $fname= $row['fname'];
  $place= $row['place'];
  
 
}


if(isset($_POST['submit']))
{
	$category=$_POST['category'];
	$pro_id=$_POST['products'];
	$productprice=$_POST['price'];
	$quantity=$_POST['quantity'];
	$image=$_FILES["image"]["name"];
	$uid='$id';
    $valid=mysqli_query($con,"select * from farmer_product where pro_id='$pro_id' and loginid='$id'");
    if(mysqli_num_rows($valid)>0){
  echo"<script>alert('product already exists')</script>";
  echo"<script>location=insert_product.php</script>";
}else{


    
 
  
//for getting product id
  
move_uploaded_file($_FILES["image"]["tmp_name"],"images".$_FILES["image"]["name"]);	
$sql=mysqli_query($con,"insert into farmer_product(loginid,fname,place,pro_id,price,quantity,image,status) values('$name','$fname','$place','$pro_id','$productprice','$quantity','$image',1)");

echo"<script>alert('Item Added');</script>";
echo"<script>window.location='insert_product.php';</script>";  

}
}
}
else{
    echo"<script> alert('Add Details and try Again!!');window.location='farmer.php';</script>";  

}
?>

                           
                          
    


<!DOCTYPE html>

<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">
    <link rel="shortcut icon" href="images/logo.jpg" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/logo.jpg">

    <!-- Title Page-->
    <title>VEGE-FOODS</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
        rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Main CSS-->
    <link href="css_insert/main.css" rel="stylesheet" media="all">

</head>

<body>
    <?php
    include 'head.php'
    ?>
    
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50" style="background-color: #f5f5f5;">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading" style="background-color: #82ae46;">
                    <h2 class="title">ADD PRODUCTS</h2>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        
                       <div class="form-row">
                            <div class="name">Category</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <?php if($iid==0){ ?>
                                            <select name="category" id="category-dropdown" onchange="location = this.value;">
                                            <option value="">Select Category</option>
                                            <?php $query=mysqli_query($con,"select * from tbl_category");
                                          while($row=mysqli_fetch_array($query))
                                          {?>

                                            <option value="insert_product.php?sid=<?php echo $row['id'];?>"> <?php echo $row['categoryname'];?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                            <?php }else{ ?>
                                            <select name="category" id="category-dropdown" onchange="location = this.value;">
                                            <?php $query=mysqli_query($con,"select * from tbl_category");
                                          while($row=mysqli_fetch_array($query))
                                          {?>

                                            <option value="insert_product.php?sid=<?php echo $row['id'];?>" <?php if($row['id']==$iid){?>selected<?php }?>> <?php echo $row['categoryname'];?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                            <?php } ?>
                                       
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
						
				
					   
					   
                        <div class="form-row">
                            <div class="name">Products</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="products"  id = "product-dropdown" >
                                      <option value="">Select Products</option>
										<?php
										$result = mysqli_query($con,"SELECT * FROM tbl_products WHERE category = '$iid'");
										while($row = mysqli_fetch_array($result)) {
										?>
										<option value="<?php echo $row["pro_id"];?>"><?php echo $row["product_name"];?></option>
										<?php
										}
										?>
                                            
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
						
						 <div class="form-row">
                            <div class="name">Product Images</div>
						 <input type="file" class="form-control" name="image" id="file" required onChange="return fileValidation();" />
						  
                    </div>
					<script>
        function fileValidation() {
            var fileInput = 
                document.getElementById('file');
              
            var filePath = fileInput.value;
          
            // Allowing file type
            var allowedExtensions = 
/(\.jpg|\.png|\.jpeg)$/i;
              
            if (!allowedExtensions.exec(filePath)) {
                alert('Invalid file type');
                fileInput.value = '';
                return false;
            } 
        }
    </script>
						
						
						
						
                        <div class="form-row">
                            <div class="name">Price/kg</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="number" name="price"  min="1" max="300" oninput="this.value=Math.abs(this.value)"/>

                                </div>
                            </div>
                        </div>
						
						 <div class="form-row">
                            <div class="name">Quantity(in kgs)</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="number" name="quantity"  min="1" max="60" oninput="this.value=Math.abs(this.value)"/>

                                </div>
                            </div>
                        </div>
                        
                        
                      




                        <div>
                            <button class="btn btn--radius-2 btn--red" type="submit" name="submit" style="background-color:#d33b33">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
	


</body>

</html>