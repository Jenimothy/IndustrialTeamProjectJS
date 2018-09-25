<?php

include 'dbconnect.php';

//This will return the status of all desks and if they are in use or not

$db = connect();
$finalId;
$finalOc;

$stmt = $db->prepare('SELECT desk_ID, Available FROM staff');
$stmt->execute();
$result = $stmt->get_result();

$desks = new desk();
$i = 0;
while($row=mysqli_fetch_array($result))
{
	$finalOc[$i] = $row['Available'];
	$finalId[$i] = $row['desk_ID'];
	$i++;
}

$desks->id = $finalId;
$desks->oc = $finalOc;

echo json_encode($desks);

class desk
{
	public $id;
	public $oc;
}

?>