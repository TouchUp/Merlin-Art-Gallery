<?php
	$mysqli = new mysqli("localhost", "root", "", "imageserver");
	if ($mysqli->connect_errno){
		printf('I cannot connect to the database  because: ' . $mysqli->connect_error);
		exit();
	}
	if (isset($_POST['idsearch'])){
		
		$idsearch = $_POST['idsearch'];
		$idsearch = mysql_real_escape_string($idsearch);
		
	}
	else{
		$idsearch = "";
	}
	if (isset($_POST['namesearch'])){
		$namesearch = $_POST['namesearch'];
		$namesearch = mysql_real_escape_string($namesearch);
	}
	else{
		$namesearch="";
	}
	if (isset($_POST['artistsearch'])){
		$artistsearch = $_POST['artistsearch'];
		$artistsearch = mysql_real_escape_string($artistsearch);
	}
	else{
		$artistsearch="";
	}
	if (isset($_POST['othersearch'])){
		$othersearch = $_POST['othersearch'];
		$othersearch = mysql_real_escape_string($othersearch);
	}
	else{
		$othersearch = "";	
	}
	if (isset($_POST['yearsearch'])){
		$yearsearch = $_POST['yearsearch'];
		$yearsearch = mysql_real_escape_string($yearsearch);
	}
	else {
		$yearsearch = "";
	}
	if (isset($_POST['nationsearch'])){
		$nationsearch = $_POST['nationsearch'];
		$nationsearch  = mysql_real_escape_string($nationsearch );
	}
	else{
		$nationsearch = "";	
	}
	if (isset($_POST['genresearch'])){
		$genresearch = $_POST['genresearch'];
		$genresearch = mysql_real_escape_string($genresearch);
	}
	else{
		$genresearch = 0;
	}
	
	if (isset($_POST['pricesearch'])){
		$pricesearch = $_POST['pricesearch'];
		$pricesearch = mysql_real_escape_string($pricesearch);
	}
	else{
		$pricesearch = "";
	}
	
	if (isset($_POST['heightsearch'])){
		$heightsearch = $_POST['heightsearch'];
		$heightsearch = mysql_real_escape_string($heightsearch);
	}
	else{
		$heightsearch = "";
	}
	
	if (isset($_POST['widthsearch'])){
		$widthsearch = $_POST['widthsearch'];
		$widthsearch = mysql_real_escape_string($widthsearch);
	}
	else{
		$widthsearch = "";
	}
	
	if (isset($_POST['biosearch'])){
		$biosearch = $_POST['biosearch'];
		$biosearch = mysql_real_escape_string($biosearch);
	}
	else{
		$biosearch = "";
	}
	
	if (isset($_POST['soldsearch'])){
		$soldsearch = $_POST['soldsearch'];
		$soldsearch = mysql_real_escape_string($soldsearch);
	}
	else{
		$soldsearch = "";
	}
	
	if (isset($_POST['locsearch'])){
		$locsearch = $_POST['locsearch'];
		$locsearch = mysql_real_escape_string($locsearch);
	}
	else{
		$locsearch = "";
	}
	
	
	$sql = 'SELECT * FROM images WHERE 
	(artist LIKE "'.$artistsearch.'%") 
	AND (code LIKE "'.$idsearch.'%") 
	AND (name LIKE "'.$namesearch.'%") 
	AND (others LIKE "'.$othersearch.'%")
	AND (price LIKE "'.$pricesearch.'%")
	AND (height LIKE "'.$heightsearch.'%")
	AND (width LIKE "'.$widthsearch.'%")
	AND (bio LIKE "'.$biosearch.'%")
	AND (sold LIKE "'.$soldsearch.'%")
	
	';
	$result=$mysqli->query($sql); 
	if ($mysqli->error) { // add this check.
    	die('Invalid query: ' . $mysqli->error);
	}
	echo '<table border=1 width="2340">';
	
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
		$country = $row['country'];
		$subject = $row['subject'];
		$location= $row['plocation'];
		$media = $row['media'];
		$pyear = $row['pyear'];
		echo '<tr onMouseUp="editfield('.$pkey.')" id="'.$pkey.'">';
		
		//<img src="data:image/jpeg;base64,' . base64_encode($image) . '" width="80" height="80">
		echo '<td width="100"><img src="'.$flocation.'/'.$fname.'" height = "80" width = "80" /></td>';
		echo '<td width="100">'.$code.'</td>';
		echo '<td width="150">'.$name.'</td>';
		echo '<td width="200">'.$artist.'</td>';
		echo '<td width="50">'.$sold.'</td>';
		echo '<td width="100">'.$doby.'</td>';
		echo '<td width="150">'.$country.'</td>';
		echo '<td width="140">'.$subject.'</td>';
		echo '<td width="140">'.$media.'</td>';
		echo '<td width="100">'.$pyear.'</td>';
		echo '<td width="120">'.$price.'</td>';
		echo '<td width="120">'.round($cmheight,2).'</td>';
		echo '<td width="120">'.round($cmwidth,2).'</td>';
		echo '<td width="200">'.$location.'</td>';
		echo '<td width="300">'.$bio.'</td>';
		echo '<td >'.$others.'</td>';
		echo '</tr>';
		}
	echo '</table>';
	$result->free();
	$mysqli->close();
	
?>