<?php
	$mysqli = new mysqli("localhost", "root", "", "imageserver");
	if ($mysqli->connect_errno){
		printf('I cannot connect to the database  because: ' . $mysqli->connect_error);
		exit();
	}
	
	if(isset($_POST['pkey'])){
		$pkey = $_POST['pkey'];	
		$pkey = mysql_real_escape_string($pkey);
	}
	
	
	if (isset($_POST['nname'])){
		$nname = $_POST['nname'];
		$nname = mysql_real_escape_string($nname);
	}
	else{
		$nname="";
	}
	$sql = 'UPDATE subjectid SET 
	subject="'.$nname.'"
	WHERE pkey='.$pkey.';
	';
	
	
	$result=$mysqli->query($sql); 
	if ($mysqli->error) { // add this check.
    	die('Invalid query: ' . $mysqli->error);
		
	}
	else{
		echo('success');	
	}
	
	$result->free();
	$mysqli->close();
	
?>