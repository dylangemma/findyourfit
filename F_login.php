<?php

$email = $_POST['email'];  
$psw = $_POST['psw'];

include('F_conn.php');

$sql = "select username from userinfo where email='$email' and password='$psw';"; 
$result = $connection->query($sql);

$user = mysqli_fetch_array($result, MYSQLI_NUM);
$num = mysqli_num_rows($result);

if($num==1){  
	//login success  
    session_start();  
    $_SESSION['email'] = $email;
    $_SESSION['username'] = $user[0];
    header('Location: /index.php');
    exit;  
} 
else {  
    exit('Failed to login! Click <a href="javascript:history.back(-1);">HERE</a> to go back to login page.');  
}  

?>
