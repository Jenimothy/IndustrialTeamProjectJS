<?php

//A rough description of this codes puyrpose, mostly to help dominic think

//This code will be called by clicking on a desk, it will get the desk ID and send it over to here. This will find out the desks state and return it

include 'ChineseRestaurantPart5.php';

$deskID = $_GET['q'];

$finalData = 0001;
$db = connect();

$sql = 'SELECT '.$deskID.' FROM 18indteam1db.staff;';


//This section of code will contain the stuff to get from databse but that doesn't exist currently so it will be dummied instead

$finalData = 1;



//This is the end of that code


echo $deskID;

?>