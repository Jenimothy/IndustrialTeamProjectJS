<?php

//A rough description of this codes puyrpose, mostly to help dominic think

//This code will be called by clicking on a desk, it will get the desk ID and send it over to here. This will find out the desks state and return it

include 'dbconnect.php';

if(isset($_GET['q']))
	$deskID = $_GET['q'];
else
	$deskID = 1;

$name = '';
$lastName = '';
$finalData = 2;
$id = 0;
$jobStart = 'N/A';
$jobEnd = 'N/A';
$jobStart = 'N/A';
$jobDate = 'N/A';


$db = connect();

$stmt = $db->prepare('SELECT * FROM staff Where desk_ID = ? LIMIT 1');
$stmt->bind_param("i", $deskID);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();

$person = new person();
$row = $result->fetch_array(MYSQLI_ASSOC);
$person->firstName = $row['first_name'];
$person->lastName = $row['last_Name'];
$person->isPresent = $row['Available'];
$person->deskId = $row['desk_ID'];
$person->id = $row['Id'];

/*
Next step

Find my next job
Find it's start time
 
*/

$stmt = $db->prepare('SELECT * FROM jobs WHERE Staff_ID = ? AND Time_Start < NOW() AND Time_End > NOW()');
$stmt->bind_param("i", $person->id);
$stmt->execute();
$result = $stmt->get_result();
$result = $result->fetch_array(MYSQLI_ASSOC);
$stmt->close();

$person->jobDateTimeStart = $result['Time_Start'];
$person->jobDateTimeEnd = $result['Time_End'];

if($person->jobDateTimeStart == null)
{
	$stmt = $db->prepare('SELECT * FROM jobs WHERE Staff_ID = ? AND Time_Start > NOW() ORDER BY Time_Start ASC LIMIT 1');
	$stmt->bind_param("i", $person->id);
	$stmt->execute();
	
	$result = $stmt->get_result();
	$result = $result->fetch_array(MYSQLI_ASSOC);
	
	$person->jobDateTimeStart = $result['Time_Start'];
	$person->jobDateTimeEnd = $result['Time_End'];
	
	$stmt->close();
}

/*
if (($deskID == 1) || ($deskID == 2) || ($deskID == 4)) //This is a placeholder for when the databse is sorted out
{
	$finalData = 1;
}
*/


$db->close();

//This returns the data about the desk
echo json_encode($person);
 class person{
	public $id;
 	public $firstName;
 	public $lastName;
	public $isPresent;
	public $deskId;
	public $jobDateTimeStart;
	public $jobDateTimeEnd;
 }


?>