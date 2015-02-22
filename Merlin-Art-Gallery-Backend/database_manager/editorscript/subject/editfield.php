<?php
	$mysqli = new mysqli("localhost", "root", "", "imageserver");
	if ($mysqli->connect_errno){
		printf('I cannot connect to the database  because: ' . $mysqli->connect_error);
		exit();
	}
	if (isset($_POST['pkey'])){
		
		$idsearch = $_POST['pkey'];
		$idsearch = mysql_real_escape_string($idsearch);
		
	}
	else{
		$idsearch = "";
	}
	
	
	$sql = 'SELECT * FROM subjectid WHERE 
	pkey = "'.$idsearch.'"';
	$result=$mysqli->query($sql); 
	if ($mysqli->error) { // add this check.
    	die('Invalid query: ' . $mysqli->error);
	}
	
	while($row=$result->fetch_array()){ 
		$pkey = $row['pkey'];
		$name = $row['subject'];
		$location = "../../images/";
		echo '<input type="hidden" id="currentpkey" value='.$pkey.'>';
		echo '<label>Name of subject</label>';
		echo '<input type ="text" id="nname" value="'.$name.'">';
		echo '<input type ="button" value="Save" onMouseUp="save('.$pkey.')">';
	}
	$result->free();
	$mysqli->close();
	
?>