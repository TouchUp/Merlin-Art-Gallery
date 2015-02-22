<?php
	$mysqli = new mysqli("localhost", "root", "", "imageserver");
	if ($mysqli->connect_errno){
		printf('I cannot connect to the database  because: ' . $mysqli->connect_error);
		exit();
	}
	
	$sql = 'INSERT INTO subjectid (`pkey`, `subject`) VALUES (NULL, "New Subject")';
	$result=$mysqli->query($sql); 
	if ($mysqli->error) { // add this check.
    	die('Invalid query: ' . $mysqli->error);
	}
	while($result->fetch_array()){ 
	
	}
	$result->free();
	$mysqli->close();
	
?>