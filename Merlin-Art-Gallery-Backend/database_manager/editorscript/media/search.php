<?php
	$mysqli = new mysqli("localhost", "root", "", "imageserver");
	if ($mysqli->connect_errno){
		printf('I cannot connect to the database  because: ' . $mysqli->connect_error);
		exit();
	}
	if (isset($_POST['namesearch'])){
		
		$name = $_POST['namesearch'];
		$name = mysql_real_escape_string($name);
		
	}
	else{
		$name = "";
	}
	$sql = 'SELECT * FROM mediaid WHERE 
	(media LIKE "'.$name.'%") 
	';	
	$result=$mysqli->query($sql); 
	if ($mysqli->error) { // add this check.
    	die('Invalid query: ' . $mysqli->error);
	}
	echo '<table border=1 width="200">';
	$a = 0;
	while($row=$result->fetch_array()){ 
		$pkey = $row['pkey'];
		$name = $row['media'];
		echo '<tr onclick="editfield('.$pkey.');shade(this);" id="'.$pkey.'">';
		echo '<td>'.$pkey.'</td>';
		//<img src="data:image/jpeg;base64,' . base64_encode($image) . '" width="80" height="80">
		echo '<td>'.$name.'</td>';
		echo '</tr>';
		}
	echo '</table>';
	$result->free();
	$mysqli->close();
	
?>