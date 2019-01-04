
<?php

	$user = $_POST["user"]; 
	$email = $_POST["email"];
	$psw = $_POST["psw"];  
	$psw_repeat = $_POST["psw_repeat"];
	$size = $_POST["size"];
	$prefer = $_POST["prefer"];
	
	if($psw == $psw_repeat){  
		include ('F_conn.php');
		
		$create_table = "CREATE TABLE IF NOT EXISTS userinfo (username VARCHAR(100), email VARCHAR(100), password VARCHAR(100), size VARCHAR(10), preference VARCHAR(10));";
		if ($connection->query($create_table) === TRUE) {
		}
		else{
			echo "Error: " . $create_table . "<br>" . $connection->error;
		}
		
		$sql = "SELECT * FROM userinfo WHERE email = '$email';"; 
		$result = $connection->query($sql);
		$num = mysqli_num_rows($result);
		
		if($num == 0)
		{
			$sql_insert = "insert into userinfo (username, email, password, size, preference) values('$user','$email','$psw','$size','$prefer');";  
			$res_insert = $connection->query($sql_insert);  
			if($res_insert){  
				echo "<script>alert('Sign up successful!'); history.go(-1);</script>"; 
			}  
			else{  
				echo "<script>alert('WAIT！'); history.go(-1);</script>";  
			} 
		}  
		else 
		{  
			echo "<script>alert('Email already be used!'); history.go(-1);</script>"; 
			
		}
		

		
	}  
	else  
	{  
		echo "<script>alert('Password Not Match'); history.go(-1);</script>";  
	}  

?>
