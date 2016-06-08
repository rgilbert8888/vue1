<?php 

include_once('db.php');

// echo "foo";

if(isset($_POST['insert'])) {

// var_dump($_POST);	
	$eName = $_POST['name'];
	$eDescription = $_POST['description'];
	$eDate = $_POST['date'];

	try {
		$PDO = db_connect();
		$statement = $PDO->prepare('insert into eventsTest (name,date,description)
			VALUES (:eName, :eDate, :eDescription)');
		$statement->bindParam(':eName', $eName, PDO::PARAM_STR);
		$statement->bindParam(':eDate', $eDate, PDO::PARAM_STR);
		$statement->bindParam(':eDescription', $eDescription, PDO::PARAM_STR);
		$statement->execute();
		$lastId = $PDO->lastInsertId(); 
		echo $lastId; 
	} catch(PDOException $e) {
	    echo $e->getMessage();
	}
}