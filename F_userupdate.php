<?php  

session_start();  
 
if(!isset($_SESSION['email'])){  
    header("Location: /F_login.html");  
    exit();  
}  

$email = $_SESSION['email'];
$resize = $_POST["resize"];
$reprefer = $_POST["reprefer"];
include ('F_conn.php');
$update = "UPDATE userinfo SET size = '$resize', preference= '$reprefer' WHERE email = '$email';";
if ($connection->query($update) === TRUE) {
	header("Location:/index.php");
}
else{
	echo "Error: " ;
}

?> 
