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
	if (isset($_POST['pyearsearch'])){
		$pyearsearch = $_POST['pyearsearch'];
		$pyearsearch = mysql_real_escape_string($pyearsearch);
	}
	else {
		$pyearsearch = "";
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
	
	if (isset($_POST['mediasearch'])){
		$mediasearch = $_POST['mediasearch'];
		$mediasearch = mysql_real_escape_string($mediasearch);
	}
	else{
		$mediasearch = 0;
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
	if (isset($_POST['searchorder'])){
		$orderby = $_POST['searchorder'];
		$orderby = mysql_real_escape_string($orderby);
	}
	else{
		$orderby = "name";
	}
	if (isset($_POST['searchtype'])){
		$searchtype = $_POST['searchtype'];
		$searchtype = mysql_real_escape_string($searchtype);
	}
	else{
		$searchtype = "asc";
	}
	$subjectsize = 0;
	$mediasize = 0;
	$foundsubject = 0;
	$foundmedia = 0;
	
	$subjectdetails = array( array() );
	$mediadetilas = array(array() );
	
	$sql0 = 'SELECT * FROM subjectid';
	$result=$mysqli->query($sql0); 
	if ($mysqli->error) { // add this check.
    	die('Invalid query: ' . $mysqli->error);
	}
	while($row=$result->fetch_array()){ 
		$subjectsize += 1;
		$subjectdetails[$subjectsize]['name'] = $row['subject'];
		$subjectdetails[$subjectsize]['pkey'] = $row['pkey'];
		if ($genresearch == $subjectdetails[$subjectsize]['name']){
			$genresearch = 	$subjectdetails[$subjectsize]['pkey'];
			$foundsubject = 1;
		}
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
		if ($mediasearch ==$mediadetails[$mediasize]['name']){
			$mediasearch = 	$mediadetails[$mediasize]['pkey'];
			$foundmedia = 1;
		}
	}
	
	if ($foundmedia == 0){
		$mediasearch="%";	
	}
	if ($foundsubject == 0){
		$genresearch="%";	
	}
	
	$sql = 'SELECT * FROM images WHERE 
	(artist LIKE "'.$artistsearch.'%") 
	AND (code LIKE "'.$idsearch.'%") 
	AND (name LIKE "'.$namesearch.'%") 
	AND (country LIKE "'.$nationsearch.'%")
	AND (others LIKE "'.$othersearch.'%")
	AND (price LIKE "'.$pricesearch.'%")
	AND (height LIKE "'.$heightsearch.'%")
	AND (width LIKE "'.$widthsearch.'%")
	AND (bio LIKE "%'.$biosearch.'%")
	AND (sold LIKE "'.$soldsearch.'%")
	AND (doby LIKE "'.$yearsearch.'%")
	AND (pyear LIKE "'.$pyearsearch.'%")
	AND (media LIKE "'.$mediasearch.'")
	AND (subject LIKE "'.$genresearch.'")
	AND (plocation LIKE "'.$locsearch.'%")
	
	ORDER BY '.$orderby.'
	
	';
	
	if ($searchtype == "DESC"){
		$sql = $sql.' '.$searchtype;
	}
	
	$result=$mysqli->query($sql); 
	if ($mysqli->error) { // add this check.
    	die('Invalid query: ' . $mysqli->error);
	}
	echo '<table width="2340">';
	$a = 0;
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
		$country = $row['country'];
		$subject = $row['subject'];
		$location= $row['plocation'];
		$media = $row['media'];
		$pyear = $row['pyear'];
		$locationz = "../../images/";
		echo '<tr onclick="editfield('.$pkey.');shade(this);" id="'.$pkey.'">';
		
		//<img src="data:image/jpeg;base64,' . base64_encode($image) . '" width="80" height="80">
		echo '<td width="100"><img src="'.$locationz.$pkey.'_thumb?'.rand().'" height = "80" width = "80" /></td>';
		echo '<td width="100">'.$code.'</td>';
		echo '<td width="150">'.$name.'</td>';
		echo '<td width="200">'.$artist.'</td>';
		echo '<td width="50">'.$sold.'</td>';
		echo '<td width="100">'.$doby.'</td>';
		echo '<td width="150">'.$country.'</td>';
		$found = 0;
		for ($a = 1; $a <= $subjectsize; $a++){
			if ($subject == $subjectdetails[$a]['pkey']){
				$subject = $subjectdetails[$a]['name'];	
				$found = 1;
				break;
			}
			else if ($a == $subjectsize && $found == 0){
				$subject = "undefined";	
			}
		}
		echo '<td width="140">'.$subject.'</td>';
		$found = 0;
		for ($a = 1; $a <= $mediasize; $a++){
			if ($media == $mediadetails[$a]['pkey']){
				$media = $mediadetails[$a]['name'];	
				$found = 1;
				break;
			}
			else if ($a == $mediasize && $found == 0){
				$media = "undefined";	
			}
		}
		echo '<td width="140">'.$media.'</td>';
		echo '<td width="100">'.$pyear.'</td>';
		echo '<td width="120">'.$price.'</td>';
		echo '<td width="120">'.round($cmheight,2).'</td>';
		echo '<td width="120">'.round($cmwidth,2).'</td>';
		echo '<td width="200">'.$location.'</td>';
		echo '<td width="300"><div style="height:80px; overflow-y:auto;">'.$bio.'</div></td>';
		echo '<td >'.$others.'</td>';
		echo '</tr>';
		}
	echo '</table>';
	$result->free();
	$mysqli->close();
	
?>