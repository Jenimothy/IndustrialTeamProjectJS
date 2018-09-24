<?php
function connect()
{
	//Login details to database
	$host = "silva.computing.dundee.ac.uk";
	$username = "18indteam1";
	$password = "4387.it1.7834";
	$database = "18indteam1db";
	$connection = mysqli_connect($host, $username, $password, $database);
        //If a connection cannot be made
	if ($connection->connect_error) 
	{
		die("Connection failed: " . $connection->connect_error);
		echo "<script type='text/javascript'>alert('Error,Please refresh page');</script>";
	}
	else
	{
		return $connection;
	}
}


function errorChecking($value)
{
	echo '<script> alert('+$value+') </script>';
}
?>