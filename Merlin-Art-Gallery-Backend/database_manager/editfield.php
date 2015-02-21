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
		echo '<input type="hidden" id="currentpkey" value='.$pkey.'>';
		echo '<label>ID</label>';
		echo '<input type ="text" id="ncode" value="'.$code.'">';
		echo '<label>Title</label>';
		echo '<input type ="text" id="nname" value="'.$name.'">';
		echo '<label>Artist Name</label>';
		echo '<input type ="text" id="nartist" value="'.$artist.'">';
		echo '<label>Artist Date of Birth (Y/M/D)</label>';
		echo '<table><tr>';
		echo '<td><input type ="text" style="width:100px;" id="ndoby" value="'.$doby.'"></td>';
		echo '<td><input type ="text" style="width:100px;" id="ndobm" value="'.$dobm.'"></td>';	
		echo '<td><input type ="text" style="width:100px;" id="ndobd" value="'.$dobd.'"></td>';
		echo '</tr></table>';
		echo '<label>Sold</label>';
		echo '<input type ="text" style="width:20px;" id="nsold" value="'.$sold.'" maxlength="1">';
		echo '<label>Nationality</label>';
		echo '<input type ="text" id="ncountry" value="'.$country.'">';
		echo '<label>Genre</label>';
		echo '<input type ="text" id="nsubject" value="'.$subject.'">';
		echo '<label>Media</label>';
		echo '<input type ="text" id="nmedia" value="'.$media.'">';
		echo '<label>Painted Year</label>';
		echo '<input type ="text"  style="width:50px;" id="npyear" value="'.$pyear.'" maxlength="4">';
		echo '<label>Price</label>';
		echo '<input type ="text"  style="width:100px;" id="nprice" value="'.$price.'" >';
		echo '<label>Height</label>';
		echo '<input type ="text"  style="width:100px;" id="ncmheight" value="'.round($cmheight,2).'" >';
		echo '<select id="htype" onChange="hconvert()"><option value="cm">cm</option><option value="in">in</option></select><br>';
		echo '<label>Width</label>';
		echo '<input type ="text"  style="width:100px;" id="ncmwidth" value="'.round($cmwidth,2).'" >';
		echo '<select id="wtype" onChange="wconvert()"><option value="cm">cm</option><option value="in">in</option></select><br>';
		echo '<label>Painting Location</label>';
		echo '<input type ="text"  style="width:150px;" id="nplocation" value="'.$location.'" >';
		echo '<label>Biography</label>';
		echo '<textarea rows="4" cols="50" id="nbio" value="'.$bio.'"></textarea>';
		echo '<label>Other Info</label>';
		echo '<input type ="text"  style="width:200px;" id="nothers" value="'.$others.'" > <br>';
		echo '<input type ="button" value="Save" onMouseUp="save('.$pkey.')">';
	}
	$result->free();
	$mysqli->close();
	
?>