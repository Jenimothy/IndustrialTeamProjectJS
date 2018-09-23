<?php

//A rough description of this codes puyrpose, mostly to help dominic think

//This code will be called by clicking on a desk, it will get the desk ID and send it over to here. This will find out the desks state and return it

include 'dbconnect.php';

$deskID = $_GET['q'];

$finalData = 0;
/*
//This section of code will contain the stuff to get from databse but issues currenty occur so commented out for now

$db = connect();

$sql = 'SELECT '.$deskID.' FROM 18indteam1db.staff;';

$result = mysqli_query($database, $sql);


while($row=mysqli_fetch_array($result))
{
	$finalData = $row['Occupied'];
	
}	

//Fetches from database

*/


if (($deskID == 1) || ($deskID == 2) || ($deskID == 4)) //This is a placeholder for when the databse is sorted out
{
	$finalData = 1;
}



//This is the end of that code


echo $finalData;

?>