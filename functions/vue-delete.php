<?php 

include_once('db.php');

// echo "foo";

if(isset($_POST['delete'])) {

	$eventID = $_POST['eventID'];

	try {
		$PDO = db_connect();
		$statement = $PDO->prepare('delete from eventsTest where eventID = :eventID');
		$statement->bindParam(':eventID', $eventID, PDO::PARAM_INT);
		$statement->execute();

		echo 'deleted!';
	} catch(PDOException $e) {
	    echo $e->getMessage();
	}
}