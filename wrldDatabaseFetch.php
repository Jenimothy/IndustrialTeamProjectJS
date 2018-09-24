<?php

//A rough description of this codes puyrpose, mostly to help dominic think

//This code will be called by clicking on a desk, it will get the desk ID and send it over to here. This will find out the desks state and return it

include 'dbconnect.php';

$deskID = $_GET['q'];

$name = '';
$lastName = '';
$finalData = 2;
$id = 0;
$jobStart = 'N/A';
$jobEnd = 'N/A';
$jobStart = 'N/A';
$jobDate = 'N/A';

$db = connect();

$sql = 'SELECT * FROM 18indteam1db.staff Where desk_ID = '.$deskID.';';

$result = mysqli_query($db, $sql);

//This section of code will contain the stuff to get from databse but issues currenty occur so commented out for now






while($row=mysqli_fetch_array($result))
{
	$name = $row['first_name'];
	$lastName = $row['last_Name'];
	$id = $row['Id'];
	$finalData = $row['Available'];
	
}	

//Fetches from database



/*

Next step

Find my next job
Find it's start time
 

*/

$sql = 'select * from jobs WHERE Staff_ID = '.$id.';';

$result = mysqli_query($db, $sql);
while($row=mysqli_fetch_array($result))
{
	$jobStart = $row['Time_Start'];

	
}


/*
if (($deskID == 1) || ($deskID == 2) || ($deskID == 4)) //This is a placeholder for when the databse is sorted out
{
	$finalData = 1;
}
*/


//This is the end of that code
$toReturn = $name.','.$lastName.','.$finalData.','.$jobStart;
//This returns the data about the desk
echo $toReturn;

?>