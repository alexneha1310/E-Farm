 <?php
 include 'connection.php';
 if(isset($_POST['cart']))
 {
    session_start(); 
    $uid = $_SESSION['id'];
      $r=$_GET['id'];
      $name= $_POST['fname'];
      $place= $_POST['place'];
      $quty=$_POST['quantity'];

      $sql3 = mysqli_query($con,"SELECT `id`,`loginid`, `fname`, `place`, `pro_id`, `price`, `quantity`, `image`, `status` FROM `farmer_product` WHERE id='$r'");
      $data=mysqli_fetch_assoc($sql3);
      $prid=$data['pro_id'];


      $s=mysqli_query($con,"select * from tbl_cart where status='1' and loginid='$uid' and pro_id='$prid'");
      $h=mysqli_num_rows($s);
      if($h > 0){
        echo "<script>alert('item alredy exists');</script>";
        echo "<script>window.location='cart.php';</script>";
       }else{

 
              
                $sql2 = mysqli_query($con,"SELECT `id`,`loginid`, `fname`, `place`, `pro_id`, `price`, `quantity`, `image`, `status` FROM `farmer_product` WHERE id='$r'");
                while($row=mysqli_fetch_array($sql2)){
                  $tq=$row['quantity'];
                  $price= $row['price']; 
                  $pid=$row['pro_id'];
                  $sql3=mysqli_query($con,"SELECT `pro_id`, `category`, `product_name`, `product_image`, `status` FROM `tbl_products` WHERE pro_id='$pid'");
                  $row1=mysqli_fetch_array($sql3);
                  $product=$row1['product_name'];
                  $p_img='images/'.$row1["product_image"];
                  
                }
                $totalprice=0;
                $totalprice=$quty*$price;
                $q=0;
                $q=$tq-$quty;
                echo $uid;
              $sql3 = "INSERT INTO `tbl_cart`( `loginid`, `fname`, `o_id`, `pro_id`, `quantity`, `price`, `totalprice`, `status`)  VALUES ('$uid','$name','$r','$pid','$quty','$price','$totalprice',1)";
              $food = mysqli_query($con,$sql3);
              
                  if (!$food) {
                    echo "Error: " . mysqli_error($con);
                }else{
                    header("location:cart.php?");
                }
          }


   }
  
    
    
    
?>



    