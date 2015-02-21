<?php
	$mysqli = new mysqli("localhost", "root", "", "imageserver");
	if ($mysqli->connect_errno){
		printf('I cannot connect to the database  because: ' . $mysqli->connect_error);
		exit();
	}
	
	$sql = 'INSERT INTO images (`pkey`, `code`, `name`, `artist`, `price`, `height`, `width`, `bio`, `sold`, `others`, `image`, `flocation`, `fname`, `doby`, `dobm`, `dobd`, `plocation`, `pyear`, `country`, `media`, `subject`) VALUES (NULL, "", "", "", 0, 0, 0, "", 0, "", NULL, NULL, NULL, 0, 0, 0, "", 0, "", 0, 0)';
	$result=$mysqli->query($sql); 
	if ($mysqli->error) { // add this check.
    	die('Invalid query: ' . $mysqli->error);
	}
	while($result->fetch_array()){ 
	
	}
	$result->free();
	$mysqli->close();
	
?>