<?php
session_start();
include ("../model/setconn.php"); 
if(empty($_SESSION["username"])) 
{
header("../Location: login.php"); //Redirecting To Login page
}
?>


<!DOCTYPE html>
<html>
<head>
</head>
<body>
<center>
<h2>ADMIN HOME PAGE</h2>
</center>
<h3><p>Hello!  <?php echo $_SESSION["username"]."!";?></p></h3>

<br/><h3><p>Please select one page you want to go</h5></p>

<div>  
<tr><th><a href="admininfo.php">Admin Profile Informations</a></th>
<tr><th><a href="trash.php">Trash Box</a></th>

</div>
<tr><th><a href="../control/logout.php">logout</a></th>
<br/>
 

</body>
</html>
