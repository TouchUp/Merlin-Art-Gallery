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
	
	$subjectsize = 0;
	$mediasize = 0;
	$subjectdetails = array();
	$mediadetilas = array();
	
	$sql0 = 'SELECT * FROM subjectid';
	$result=$mysqli->query($sql0); 
	if ($mysqli->error) { // add this check.
    	die('Invalid query: ' . $mysqli->error);
	}
	while($row=$result->fetch_array()){ 
		$subjectsize += 1;
		$subjectdetails[$subjectsize]['name'] = $row['subject'];
		$subjectdetails[$subjectsize]['pkey'] = $row['pkey'];
	}
	
	$sql1 = 'SELECT * FROM mediaid';
	$result=$mysqli->query($sql1); 
	if ($mysqli->error) { // add this check.
    	die('Invalid query: ' . $mysqli->error);
	}
	while($row=$result->fetch_array()){ 
		$mediasize += 1;
		$mediadetails[$mediasize]['name'] = $row['media'];
		$mediadetails[$mediasize]['pkey'] = $row['pkey'];
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
		$inwidth = round(($cmwidth/2.54) * 100) / 100;
		$inheight = round(($cmheight/2.54) * 100) / 100;
		$doby = $row['doby'];
		$dobm = $row['dobm'];
		$dobd = $row['dobd'];
		$country = $row['country'];
		$subject = $row['subject'];
		$plocation= $row['plocation'];
		$media = $row['media'];
		$pyear = $row['pyear'];
		$location = "../../images/";
		echo '<h2>Painting Information</h2>';
		echo '<input type="hidden" id="currentpkey" value='.$pkey.'>';
		echo '<label for="ncode">ID</label>';
		echo '<input type ="text" id="ncode" value="'.$code.'">';
		echo '<label>Title</label>';
		echo '<input type ="text" id="nname" value="'.$name.'">';
		echo '<label>Artist Name</label>';
		echo '<input type ="text" id="nartist" value="'.$artist.'">';
		echo '<label>Artist’s Date of Birth (YYYY/MM/DD)</label>';
		echo '<input type ="text"  id="ndoby" maxlength="4" value="'.$doby.'"></td>';
		echo '<input type ="text" id="ndobm" maxlength="2" value="'.$dobm.'"></td>';	
		echo '<input type ="text" id="ndobd" maxlength="2" value="'.$dobd.'">';
		echo '<label>Sold</label>';
		echo '
		<select id="nsold">
		<option value="0" ';
		if ($sold == 1){
			echo'selected';	
		}
		echo '
		>No</option>
		';
		echo '
		<option value="2" ';
		if ($sold == 2){
			echo'selected';	
		}
		echo '
		>Yes</option>
		
		</select><br>
		';
		
		
		
		//echo '<input type ="text" id="nsold" value="'.$sold.'" maxlength="1">';
		echo '<label>Nationality</label>';
		echo '<input type ="text" id="ncountry" value="'.$country.'">';
		echo '<label>Subject</label>';
		echo '<select id="nsubject">';
		for ($a = 1; $a <= $subjectsize; $a++){
			echo '<option value='.$subjectdetails[$a]['pkey'];
			if ($a == $subject){
				echo ' selected>'.$subjectdetails[$a]['name'].'</options>';	
			}
			else{
				echo '>'.$subjectdetails[$a]['name'].'</options>';
			}
			
		}
		echo '</select><br>';
		echo '<label>Media</label>';
		echo '<select id="nmedia">';
		for ($a = 1; $a <= $mediasize; $a++){
			echo '<option value='.$mediadetails[$a]['pkey'];
			if ($a == $media){
				echo ' selected>'.$mediadetails[$a]['name'].'</options>';	
			}
			else{
				echo '>'.$mediadetails[$a]['name'].'</options>';
			}
			
		}
		echo '</select>';

		echo '<label>Painted Year</label>';
		echo '<input type ="text"   id="npyear" value="'.$pyear.'" maxlength="4">';
		echo '<label>Price</label>';
		echo '<input type ="text"   id="nprice" value="'.$price.'" >';
		echo '<label>Height</label>';
		echo '<input type ="text"  " id="ncmheight" value="'.round($cmheight,2).'" >';
		echo '<select id="htype" onChange="hconvert()"><option value="cm">cm</option><option value="in">in</option></select>';
		echo '<label>Width</label>';
		echo '<input type ="text"  " id="ncmwidth" value="'.round($cmwidth,2).'" >';
		echo '<select id="wtype" onChange="wconvert()"><option value="cm">cm</option><option value="in">in</option></select>';
		echo '<label>Painting Location</label>';
		echo '<input type ="text" " id="nplocation" value="'.$plocation.'" >';
		echo '<label>Biography</label>';
		echo '<textarea rows="4" cols="50" id="nbio" value="'.$bio.'"></textarea>';
		echo '<label>Other Info</label>';
		echo '<input type ="text" id="nothers" value="'.$others.'" >';






		echo '<h2>Image Upload</h2>';
		echo '<label>Current Image</label>';
		echo '<div id="preview">';
		echo '<img src="'.$location.$pkey.'?'.rand().'" height = "100" width = "100" />';
		echo '</div>';
		echo '<input type="file" name="image" id="newimage" accept="image/*">';
		echo '<input type="button" value="Upload" onMouseUp="uploadfile('.$pkey.')" id="uploadbutton" >';

		echo '<input type ="button" id = "save_button" value="Save" onMouseUp="save('.$pkey.')">';
	}
	$result->free();
	$mysqli->close();
	
?>