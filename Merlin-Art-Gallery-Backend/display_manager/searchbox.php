<?php
	$mysqli = new mysqli("localhost", "root", "", "imageserver");
	if ($mysqli->connect_errno){
		printf('I cannot connect to the database  because: ' . $mysqli->connect_error);
		exit();
	}
	$size = $_POST['size'];
	for ($a = 0; $a < $size; $a ++){
		$input = $_POST[$a];
		$input = mysql_real_escape_string($input);
		$sql = 'SELECT * FROM images WHERE pkey = '.$input.' 
		';
		$result=$mysqli->query($sql); 
		if ($mysqli->error) { // add this check.
    		die('Invalid query: ' . $mysqli->error);
		}
		while($row=$result->fetch_array()){ 
			$pkey = $row['pkey'];
			$code = $row['code'];
			$name = $row['name'];
			$artist = $row['artist'];
			$price = $row['price'];
			$cmheight = $row['cmheight'];
			$cmwidth = $row['cmwidth'];
			$inheight = $row['inheight'];
			$inwidth = $row['inwidth'];
			$bio = $row['bio'];
			$sold = $row['sold'];
			$others = $row['others'];
			$image = $row['image'];
			$flocation = $row['flocation'];
			$fname = $row['fname'];
			echo '<div class = "selected" onmouseup = "removeimage('.$pkey.')">';
			//echo '<input type="button" value="Remove" onmouseup="removeimage('.$pkey.')"/>
			echo '<input type="hidden" name="check_list[]" value="'.$pkey.'">';
			echo '<img src="'.$flocation.'/'.$fname.'"/>';
			echo '<p>'.$name.'</p></div>';
		}
		$result->free();
	}
	
	
	$mysqli->close();
	
	
?>