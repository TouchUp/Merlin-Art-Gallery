<?php
	$mysqli = new mysqli("localhost", "root", "", "imageserver");
	if ($mysqli->connect_errno){
		printf('I cannot connect to the database  because: ' . $mysqli->connect_error);
		exit();
	}
	
	if (isset($_POST['setup_name'])){
		
		$setupname = $_POST['setup_name'];
		$setupname = mysql_real_escape_string($setupname);
		
	}
	else{
		$setupname = "";
	}
	
	if (isset($_POST['picturedata'])){
		
		$picturedata = $_POST['picturedata'];
		$picturedata = mysql_real_escape_string($picturedata);
		
	}
	else{
		$picturedata = "";
	}
	
	if (isset($_POST['setupdata'])){
		
		$setupdata = $_POST['setupdata'];
		$setupdata = mysql_real_escape_string($setupdata);
		
	}
	else{
		$setupdata = "";
	}
	
	$sql = 'INSERT INTO setups (`pkey`, `name`, `pictures`, `display`) VALUES ("", "'.$setupname.'", "'.$picturedata.'", "'.$setupdata.'")';
	$result=$mysqli->query($sql); 
	if ($mysqli->error) { // add this check.
    	die('Invalid query: ' . $mysqli->error);
	}
	while($result->fetch_array()){ 
	
	}
	$result->free();
	$mysqli->close();
	
?>