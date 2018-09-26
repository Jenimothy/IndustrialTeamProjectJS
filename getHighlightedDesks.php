<?php 

include 'dbconnect.php';

//This will return the status of all desks and if they are in use or not

$db = connect();
$stmt = $db->prepare('SELECT desk_ID, Available FROM staff');
$stmt->execute();

$result = $stmt->get_result();

$i = 0;
while($row=$result->fetch_array(MYSQLI_ASSOC))
{	
	$desks_states[$i] = $row;
	$i++;
}

echo json_encode($desks_states);
?>
