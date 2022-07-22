<!DOCTYPE html>
<html lang="en">
  <head>
    <title>E-Farm</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body class="goto-here">
		<div class="py-1 bg-primary">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">+ 1235 2355 98</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">admin@gmail.com</span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
						    <span class="text">3-5 Business days delivery &amp; Free Returns</span>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Vegefoods</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
	          
	          <li class="nav-item"><a href="login.php" class="nav-link">sign-in</a></li>
	          <li class="nav-item"><a href="signup.php" class="nav-link">sign-up</a></li>
	          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
	          

	        </ul>
	      </div>
	    </div>
	  </nav>

	

	<body>

		<div class="container">
			<div class="inner">
				<div class="image-holder">
					<img src="images/logo1.jpg" alt="">
				</div>
				<form action="signupacc.php" method="POST">
					<h3>Create Account</h3>
					<div class="form-group">
						<input type="text" name="fname" id="fname" placeholder="First Name" class="form-control" required onchange="Validate();">
						<span id="msg1" style="color:red;"></span>
						<script>		
function Validate() 
{
    var val = document.getElementById('fname').value;

    if (!val.match(/^[A-Z][A-Za-z]{3,}$/)) 
    {
        document.getElementById('msg1').innerHTML="Start with a Capital letter & Only alphabets without space are allowed!!";
		            document.getElementById('fname').value = "";
        return false;
    }
document.getElementById('msg1').innerHTML=" ";
    return true;
}
</script>
					<br><input type="text" name="lname" id="lname" placeholder="Last Name" class="form-control" required onchange="Validate1();">
						<span id="msg2" style="color:red;"></span>
<script>		
function Validate1() 
{
    var val = document.getElementById('lname').value;

    if (!val.match(/^[A-Z][a-z]{0,}$/)) 
    {
        document.getElementById('msg2').innerHTML="Start with a Capital letter & Only alphabets without space are allowed!!";
		            document.getElementById('lname').value = "";
        return false;
    }
document.getElementById('msg2').innerHTML=" ";
    return true;
}
</script>
					</div>
					<div class="form-wrapper">
						<input type="text" name="email" id="email" placeholder="Email Address" class="form-control" required onchange="Validata();">
						<i class="zmdi zmdi-email"></i>
					</div>
					<span id="msg5" style="color:red;"></span>
<script>		
function Validata() 
{
    var val = document.getElementById('email').value;

    if (!val.match(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/)) 
    {
        document.getElementById('msg5').innerHTML="Enter a Valid Email";
		
		     document.getElementById('email').value = "";
        return false;
    }
document.getElementById('msg5').innerHTML=" ";
    return true;
}

		</script>
					<div class="form-wrapper">
						<input type="text" name="adress" id="adress" placeholder="Address" class="form-control" required onchange="Validname();">
						<i class="zmdi zmdi-home"></i>
					</div>
					<span id="msg3" style="color:red;"></span>
<script>		
function Validname() 
{
    var val = document.getElementById('adress').value;

    if (!val.match(/^[A-Z][a-z" "]{3,}$/)) 
    {
        document.getElementById('msg3').innerHTML="Start with a Capital letter & Only alphabets are allowed";
		            document.getElementById('adress').value = "";
        return false;
    }
document.getElementById('msg3').innerHTML=" ";
    return true;
}
</script>


<div class="form-wrapper">
						<input type="text" name="place" id="place" placeholder="place" class="form-control" required onchange="Validname();">
						<i class="zmdi zmdi-home"></i>
					</div>
					<span id="msg3" style="color:red;"></span>
<script>		
function Validname() 
{
    var val = document.getElementById('place').value;

    if (!val.match(/^[A-Z][a-z" "]{3,}$/)) 
    {
        document.getElementById('msg3').innerHTML="Start with a Capital letter & Only alphabets are allowed";
		            document.getElementById('place').value = "";
        return false;
    }
document.getElementById('msg3').innerHTML=" ";
    return true;
}
</script>


					<div class="form-wrapper">
						<input type="number" name="phone"  maxlength="10" id="phone" placeholder="Phone Number" class="form-control" required onchange="Validat();">
						<i class="zmdi zmdi-phone"></i>
					</div>
					<span id="msg4" style="color:red;"></span>
			
<script>
function Validat() 
{
    var val = document.getElementById('phone').value;

    if (!val.match(/^[789][0-9]{9}$/))
    {
        document.getElementById('msg4').innerHTML="Only Numbers are allowed and must contain 10 number";
	
		
		            document.getElementById('phone').value = "";
        return false;
    }
document.getElementById('msg4').innerHTML=" ";
    return true;
}

</script>

					
					<div class="form-wrapper">
						<input type="password" name="password" id="password" placeholder="Password" class="form-control" required onchange="Validp();">
						<i class="zmdi zmdi-lock"></i>
					</div>
					<span id="msg6" style="color:red;"></span>
<script>		
function Validp() 
{
    var val = document.getElementById('password').value;

    if (!val.match(/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-])/)) 
    {
        document.getElementById('msg6').innerHTML="Upper case, Lower case, Special character and Numeric number are required in Password filed";
		
		     document.getElementById('password').value = "";
        return false;
    }
document.getElementById('msg6').innerHTML=" ";
    return true;
}

</script>
					<div class="form-wrapper">
						<input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" class="form-control" required onchange="check();">
						<i class="zmdi zmdi-lock"></i>
					</div>
					<span id="msg7" style="color:red;"></span>
<script>
function check()
{
var pas1=document.getElementById("password");
							  var pas2=document.getElementById("confirm_password");
							
							  if(pas1.value==""
	{
		document.getElementById('msg7').innerHTML="Password can't be null!!";
		pas1.focus();
		return false;
	}
	if(pas2.value=="")
	{
		document.getElementById('msg7').innerHTML="Please confirm password!!";
		pass2.focus();
		return false;
	}
	if(pas1.value!=pas2.value)
	{
		document.getElementById('msg7').innerHTML="Passwords does not match!!";
		pas1.focus();
		return false;
	}
     document.getElementById('msg7').innerHTML=" "; 
	return true;
	
}
	</script>
	<td align="right" class="form-control" style = width: 239px;>Enter Usertype :</td>
	<td><select id="role" name="role" class="form-control" class="tb" required>
              <option value="select" selected disabled style="width: 100%;height: 34px; ">select</option> 
              <option value="farmer" class="">FARMER</option>
              <option value="buyer" class="">BUYER</option>
              </select></td><br>
					<center><button>SIGN UP
						<i class="zmdi zmdi-arrow-right"></i>
					</button></center>
					
				</form>
			</div>
		</div>
		</div>
	</body>
</html>