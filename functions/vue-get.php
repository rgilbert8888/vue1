<?php 

include_once('db.php');

// echo "foo";

if(isset($_GET['method']) && $_GET['method'] == 'get') {

	$PDO = db_connect();
	$statement = $PDO->prepare('select * from eventsTest');
	// $statement->bindParam(':eID', $eID, PDO::PARAM_INT);
	$statement->execute();
	$events = $statement->fetchAll(PDO::FETCH_ASSOC);
	// $edit = json_encode($edit[0]);
	// print_r($edit);
	echo json_encode($events);
}

