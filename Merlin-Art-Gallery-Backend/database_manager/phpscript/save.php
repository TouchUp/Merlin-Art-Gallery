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
	
	
	if (isset($_POST['nid'])){
		
		$nid = $_POST['nid'];
		$nid = mysql_real_escape_string($nid);
		
	}
	else{
		$nid = "";
	}
	if (isset($_POST['nname'])){
		$nname = $_POST['nname'];
		$nname = mysql_real_escape_string($nname);
	}
	else{
		$nname="";
	}
	if (isset($_POST['nartist'])){
		$nartist = $_POST['nartist'];
		$nartist = mysql_real_escape_string($nartist);
	}
	else{
		$nartist="";
	}
	if (isset($_POST['nothers'])){
		$nothers = $_POST['nothers'];
		$nothers = mysql_real_escape_string($nothers);
	}
	else{
		$nothers = "";	
	}
	if (isset($_POST['ndoby'])){
		$ndoby = $_POST['ndoby'];
		$ndoby = mysql_real_escape_string($ndoby);
	}
	else {
		$ndoby = "";
	}
	if (isset($_POST['ndobm'])){
		$ndobm = $_POST['ndobm'];
		$ndobm = mysql_real_escape_string($ndobm);
	}
	else {
		$ndobm = "";
	}
	if (isset($_POST['ndobd'])){
		$ndobd = $_POST['ndobd'];
		$ndoby = mysql_real_escape_string($ndoby);
	}
	else {
		$ndobd = "''";
	}
	if (isset($_POST['ncountry'])){
		$ncountry = $_POST['ncountry'];
		$ncountry  = mysql_real_escape_string($ncountry );
	}
	else{
		$ncountry = "";	
	}
	if (isset($_POST['nsubject'])){
		$nsubject = $_POST['nsubject'];
		$nsubject = mysql_real_escape_string($nsubject);
	}
	else{
		$nsubject = "";
	}
	if (isset($_POST['nmedia'])){
		$nmedia = $_POST['nmedia'];
		$nmedia = mysql_real_escape_string($nmedia);
	}
	else{
		$nmedia = "";
	}
	if (isset($_POST['npyear'])){
		$npyear = $_POST['npyear'];
		$npyear = mysql_real_escape_string($npyear);
	}
	else{
		$npyear = "";
	}
	
	if (isset($_POST['nprice'])){
		$nprice = $_POST['nprice'];
		$nprice = mysql_real_escape_string($nprice);
	}
	else{
		$nprice = "";
	}
	
	if (isset($_POST['nheight'])){
		$nheight = $_POST['nheight'];
		$nheight = mysql_real_escape_string($nheight);
	}
	else{
		$nheight = "";
	}
	
	if (isset($_POST['nwidth'])){
		$nwidth = $_POST['nwidth'];
		$nwidth = mysql_real_escape_string($nwidth);
	}
	else{
		$nwidth = "";
	}
	
	if (isset($_POST['nbio'])){
		$nbio = $_POST['nbio'];
		if ($nbio == ''){
			$nbio = "None";	
		}
		$nbio = mysql_real_escape_string($nbio);
	}
	else{
		$nbio = "None";
	}
	
	if (isset($_POST['nsold'])){
		$nsold = $_POST['nsold'];
		$nsold = mysql_real_escape_string($nsold);
	}
	else{
		$nsold = 0;
	}
	
	if (isset($_POST['nplocation'])){
		$nplocation = $_POST['nplocation'];
		$nplocation = mysql_real_escape_string($nplocation);
	}
	else{
		$nplocation = "";
	}
	
	$sql = 'UPDATE images SET code="'.$nid.'",
	name="'.$nname.'",
	artist="'.$nartist.'",
	others="'.$nothers.'",
	doby="'.$ndoby.'",
	dobm="'.$ndobm.'",
	dobd="'.$ndobd.'",
	country="'.$ncountry.'",
	subject="'.$nsubject.'",
	media="'.$nmedia.'",
	pyear="'.$npyear.'",
	price="'.$nprice.'",
	height="'.$nheight.'",
	width="'.$nwidth.'",
	bio="'.$nbio.'",
	sold="'.$nsold.'",
	plocation="'.$nplocation.'"
	
	WHERE pkey='.$pkey.';
	';
	
	
	$result=$mysqli->query($sql); 
	if ($mysqli->error) { // add this check.
    	die('Invalid query: ' . $mysqli->error);
	}
	else{
		echo('success');	
	}
	
	$mysqli->close();
	
?>