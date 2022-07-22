<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php
session_start();
$id=$_GET["pid"];
include 'connection.php';
$sql2="Delete from `farmer_product` where id='$id'";
 mysqli_query($con, $sql2);
header("location:productview.php");
?>
</body>
</html>