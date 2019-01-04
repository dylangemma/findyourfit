<?php  

session_start();  
 
if(!isset($_SESSION['email'])){  
    header("Location: /F_login.html");  
    exit();  
}  

include('F_conn.php');    
$user = $_SESSION['username'];
$email = $_SESSION['email'];
$query = $connection->query("select * from userinfo where username = '$user';");  
$row = mysqli_fetch_array($query);    
?>  

 <!DOCTYPE html>
<html>

<body>

<h3>My Profile</h3>

<form action="/F_userupdate.php" method="post" style="border:1px solid #ccc">
  <div class="container">
    <label><b>Email: 
    <?php
	echo $email;
    ?>
    </b></label></br>
    
    <label><b>User Name: 
    <?php
	echo $user;
    ?>
    </b></label></br>

    <label><b>Cloth Size: 
    <?php
	echo $row[3];
    ?>
    </b></label>
    <select name="resize">
		<option value="S">S</option>
		<option value="M">M</option>
		<option value="L">L</option>
		<option value="XL">XL</option>
		<option value="XXL">XXL</option>
		<option value="XXXL">XXXL</option>
	</select></br>

    <label><b>Fitting Preference: 
    <?php
	echo $row[4];
    ?>
    </b></label>
    <select name="reprefer">
		<option value="slim">slim</option>
		<option value="trad">trad</option>
	</select><br />

    <div class="clearfix">
      <button type="submit" class="signupbtn">Confirm Change</button>
    </div>
  </div>

</form>

</body>
</html>
