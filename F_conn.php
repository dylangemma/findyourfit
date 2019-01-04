<?php

$connection=@mysqli_connect ('localhost', 'flatiron_dbuser', 'DSG!2017', 'flatiron_clothing', '10.30.0.2' );

if(mysqli_connect_errno())
{
	echo "<h4>Failed to connect to MySQL: </h4>".mysqli_connect_error();
}

?>
