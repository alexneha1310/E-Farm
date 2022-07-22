<?php
session_start();
include('connection.php');

$id = $_SESSION['fid'];

if(isset($_POST['finish'])){
    
    header("location:farmer.php");
}
?>

<html>
    <head>
        <title>Invoice</title>
        <style>
        .ord-inv-cont{
            margin-left: 25%;
            
}
.inv-body{
    margin-top: 50px;
 background-color: whitesmoke;
 box-shadow: 1px 1px 1px 1px;
 width: 70%;

}
.inv-dtls{
    text-align: center;
}
.inv-footer{
    margin-top:15px;
    padding-bottom: 10px;
    text-align: center;
}
.inv-btn{
    border: none;
    width: 150px;
    height:30px;
    border-radius:6px;
    background-color:#57d7fa;
    color: black;
    margin-left: 25%;
}
.inv-btn:hover{
    border: none;
    border-radius:6px;
    background-color:#51ad89;
    color: black;
}
.inv-btn1{
    border: none;
    width: 150px;
    height:30px;
    border-radius:6px;
    background-color:orange;
    color: black;
}
.inv-btn1:hover{
    border: none;
    border-radius:6px;
    background-color:lawngreen;
    color: black;
}


    </style>

<style type="text/css" rel="stylesheet">


.indent-small {
  margin-left: 5px;
}
.form-group.internal {
  margin-bottom: 0;
}
.dialog-panel {
  margin: 10px;
}
.datepicker-dropdown {
  z-index: 200 !important;
}
.panel-body {
  background: #e5e5e5;
  /* Old browsers */
  background: -moz-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
  /* FF3.6+ */
  background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, #e5e5e5), color-stop(100%, #ffffff));
  /* Chrome,Safari4+ */
  background: -webkit-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
  /* Chrome10+,Safari5.1+ */
  background: -o-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
  /* Opera 12+ */
  background: -ms-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
  /* IE10+ */
  background: radial-gradient(ellipse at center, #e5e5e5 0%, #ffffff 100%);
  /* W3C */
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e5e5e5', endColorstr='#ffffff', GradientType=1);
  /* IE6-9 fallback on horizontal gradient */
  font: 600 15px "Open Sans", Arial, sans-serif;
}
label.control-label {
  font-weight: 600;
  color: #777;
}


table { 
	width: 750px; 
	border-collapse: collapse; 
	margin: auto;
	
	}

/* Zebra striping */
tr:nth-of-type(odd) { 
	background: #eee; 
	}

th { 
	background: #ff3300; 
	color: white; 
	font-weight: bold; 
	
	}

td, th { 
	padding: 10px; 
	border: 1px solid #ccc; 
	text-align: left; 
	font-size: 14px;
	
	}

/* 
Max width before this PARTICULAR table gets nasty
This query will take effect for any screen smaller than 760px
and also iPads specifically.
*/
@media 
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {

	table { 
	  	width: 100%; 
	}

	/* Force table to not be like tables anymore */
	table, thead, tbody, th, td, tr { 
		display: block; 
	}
	
	/* Hide table headers (but not display: none;, for accessibility) */
	thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	
	tr { border: 1px solid #ccc; }
	
	td { 
		/* Behave  like a "row" */
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
	}

	td:before { 
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
		/* Label the data */
		content: attr(data-column);

		color: #000;
		font-weight: bold;
	}

}







	</style>
    </head>
    <body>
<div class="ord-inv-cont" >
            <div class="inv-body" id="invoice">
                <div class="inv-dtls">
                    
                    <h2>E_Farm</h2>
                    <p>Your Product Our Market</p>
                </div><br><br>
                <form method="post">
               
                <table  class="table table-bordered table-striped">
						  <thead>
							<tr>
              
              <th>Date</th>
							  <th>Item</th>
							  <th>Buyer Name</th>
                <th>Buyer Address</th>
                <th>Quantity</th>
							  <th>Price</th>
                <th>Current Status</th>
							   <!-- <th>Action </th> -->
							   
							  
							</tr>
						  </thead>
              
						  <tbody>
						 
							
						  <?php		
                 $uu="SELECT * FROM farmer_product where loginid='$id' ";
                 $shit=mysqli_query($con,$uu);
                 $tt=mysqli_fetch_array($shit);
                 $cool=$tt['fname'];
                                  $sql=mysqli_query($con,"SELECT order_tbl.id,order_tbl.status,order_tbl.date,order_tbl.price,register.fname,register.adress,tbl_cart.quantity,tbl_products.product_name FROM `order_tbl` join register on register.loginid=order_tbl.login_id join tbl_cart on tbl_cart.id=order_tbl.cartid join tbl_products on tbl_products.pro_id=tbl_cart.pro_id join farmer_product on farmer_product.pro_id=tbl_products.pro_id WHERE farmer_product.loginid='$id' and tbl_cart.fname='$cool'");
                                  while($rows=mysqli_fetch_array($sql)){
                                    ?>
                                     
                                    
                                      
												<tr style= width="300" height="50">	
                        
                             <td data-column="Item" ><?php echo $rows['date']; ?></td>
														 <td data-column="Item"> <?php echo $rows['product_name']; ?></td>
														 <td data-column="Item"> <?php echo $rows['fname']; ?></td>
														 <td data-column="Item"> <?php echo $rows['adress']; ?></td>
                              <td data-column="Item"> <?php echo $rows['quantity']; ?></td>
														  <td data-column="Total Price"> <?php echo $rows['price']; ?></td>
														  <td data-column="status"><?php echo $rows['status']; ?></td>
                             

                              <!-- <td><a style="color:#F63" href="edit_status.php?id=<?php echo $rows['id']; ?>"><b>Deliver</a></td> -->
                            	 
												</tr>
												
											
																		
							
												<?php }?>
										
						
						  </tbody>
					</table>



                    <br><br>
                    <div class="inv-footer">
                        <text>"We  are so thrilled to see that you reached your goal"</text>
                    </div>
                </div>
                
            </div>
            <p>

            <button class="inv-btn" onclick="printDiv('invoice')">Download Invoice</button>
            <button class="inv-btn1" type="submit" name="finish" >Finish</button></p>
            
     </div>
</form>
<!-- print screen -->
<script type="text/javascript">
      function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
    </script>
    </body></html>