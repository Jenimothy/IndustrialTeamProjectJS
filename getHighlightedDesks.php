<?php 

include 'dbconnect.php';

//This will return the status of all desks and if they are in use or not

$db = connect();
$stmt = $db->prepare('SELECT desk_ID, Available, Id FROM staff');
$stmt->execute();

$result = $stmt->get_result();

$i = 0;
while($row=$result->fetch_array(MYSQLI_ASSOC))
{	
	//query for current job
	$stmt1 = $db->prepare('SELECT * FROM jobs WHERE Staff_ID = ? AND Time_Start < NOW() AND Time_End > NOW() LIMIT 1');
	$stmt1->bind_param("i", $row["Id"]);
	$stmt1->execute();
	$stmt1->store_result();
	
	$desks_states[$i] = $row;
	
	//if not currently on the job
	if($desks_states[$i]["Available"] == 0 && mysqli_stmt_num_rows($stmt1) == 0)
	{
		$desks_states[$i]["Available"] = "2";
	}
	$stmt1->close();
	
	$i++;
}

echo json_encode($desks_states);
?>
