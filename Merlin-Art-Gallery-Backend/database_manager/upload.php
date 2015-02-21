<?php
	$mysqli = mysqli_connect("localhost", "root", "", "imageserver");
	if ($mysqli->connect_errno){
		printf('I cannot connect to the database  because: ' . $mysqli->connect_error);
		exit();
	}
	
	$fileName = $_FILES['image']['name'];
	$fileType = $_FILES['image']['type'];
	$pkey = $_REQUEST['pkey'];
	$tmpName  = $_FILES['image']['tmp_name'];
	$fileSize = $_FILES['image']['size'];
	$location = "../../images/";
	$ext = pathinfo($fileName, PATHINFO_EXTENSION);
		
	
	if(move_uploaded_file($tmpName,$location.$pkey)){
		
	}
	else{
		echo 'fail';	
	}
	
	
?>