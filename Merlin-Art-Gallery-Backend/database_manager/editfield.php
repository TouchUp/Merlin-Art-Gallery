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
	
	$sql = 'SELECT * FROM images WHERE 
	pkey = "'.$idsearch.'"';
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
		$cmheight = $row['height'];
		$cmwidth = $row['width'];
		$bio = $row['bio'];
		$sold = $row['sold'];
		$others = $row['others'];
		$image = $row['image'];
		$flocation = $row['flocation'];
		$fname = $row['fname'];
		$inwidth = round(($cmwidth/2.54) * 100) / 100;
		$inheight = round(($cmheight/2.54) * 100) / 100;
		$doby = $row['doby'];
		$dobm = $row['dobm'];
		$dobd = $row['dobd'];
		$country = $row['country'];
		$subject = $row['subject'];
		$location= $row['plocation'];
		$media = $row['media'];
		$pyear = $row['pyear'];
		echo '<label>ID</label>';
		echo '<input type ="text" id="code" value="'.$code.'">';
		echo '<label>Title</label>';
		echo '<input type ="text" id="name" value="'.$name.'">';
		echo '<label>Artist Name</label>';
		echo '<input type ="text" id="artist" value="'.$artist.'">';
		echo '<label>Artist Date of Birth</label>';
		echo '<input type ="text" style="width:100px;" id="doby" value="'.$doby.'">';
		echo '<input type ="text" style="width:100px;" id="dobm" value="'.$dobm.'">';	
		echo '<input type ="text" style="width:100px;" id="dobd" value="'.$dobd.'">';
		echo '<label>Sold</label>';
		echo '<input type ="text" style="width:20px;" id="sold" value="'.$sold.'" maxlength="1">';
		echo '<label>Nationality</label>';
		echo '<input type ="text" id="country" value="'.$country.'">';
		echo '<label>Genre</label>';
		echo '<input type ="text" id="subject" value="'.$subject.'">';
		echo '<label>Media</label>';
		echo '<input type ="text" id="media" value="'.$media.'">';
		echo '<label>Painted Year</label>';
		echo '<input type ="text"  style="width:50px;" id="pyear" value="'.$pyear.'" maxlength="4">';
		echo '<label>Price</label>';
		echo '<input type ="text"  style="width:100px;" id="price" value="'.$price.'" >';
		echo '<label>Height</label>';
		echo '<input type ="text"  style="width:100px;" id="cmheight" value="'.$cmheight.'" >';
		echo '<label>Width</label>';
		echo '<input type ="text"  style="width:100px;" id="cmwidth" value="'.$cmwidth.'" >';
		echo '<label>Painting Location</label>';
		echo '<input type ="text"  style="width:150px;" id="plocation" value="'.$location.'" >';
		echo '<label>Biography</label>';
		echo '<textarea rows="4" cols="50" id="bio" value="'.$bio.'"></textarea>';
		echo '<label>Other Info</label>';
		echo '<input type ="text"  style="width:200px;" id="others" value="'.$others.'" >';
	}
	$result->free();
	$mysqli->close();
	
?>