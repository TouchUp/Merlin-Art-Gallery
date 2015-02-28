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
	if (isset($_POST['min_price'])){
		$minprice = $_POST['min_price'];
	}
	else {
		$minprice = 0;
	}
	if (isset($_POST['max_price'])){
		$maxprice = $_POST['max_price'];
	}
	else{
		$maxprice = 9999999;	
	}
	if (isset($_POST['min_height'])){
		$minheight = $_POST['min_height'];
	}
	else{
		$minheight = 0;
	}
	if (isset($_POST['max_height'])){
		$maxheight = $_POST['max_height'];
	}
	else{
		$maxheight = 9999999;	
	}
	if (isset($_POST['min_width'])){
		$minwidth = $_POST['min_width'];
	}
	else{
		$minwidth = 0;
	}
	if (isset($_POST['max_width'])){
		$maxwidth = $_POST['max_width'];
	}
	else{
		$maxwidth = 9999999;	
	}
	if (isset($_POST['height_select'])){
		$heighttype = $_POST['height_select'];
	}
	else{
		$heighttype = 0;	
	}
	if (isset($_POST['width_select'])){
		$widthtype = $_POST['width_select'];
	}
	else{
		$widthtype = 0;	
	}
	// if heighttype = 0, cm. If heighttype = 1, inch.
	
	if ($heighttype == 1){
		$minheight = $minheight*2.54;
		$maxheight = $maxheight*2.54;
	}
	if ($widthtype == 1){
		$maxwidth = $maxwidth*2.54;
		$minwidth = $minwidth*2.54;
	}
	
	$location = "../../images/";
	$sql = 'SELECT * FROM images WHERE 
	(artist LIKE "'.$artistsearch.'%") 
	AND (code LIKE "'.$idsearch.'%") 
	AND (name LIKE "'.$namesearch.'%") 
	AND (others LIKE "'.$othersearch.'%")
	AND (price BETWEEN '.$minprice.' AND '.$maxprice.')
	AND (height BETWEEN '.$minheight.' AND '.$maxheight.')
	AND (width BETWEEN '.$minwidth.' AND '.$maxwidth.')
	';
	$result=$mysqli->query($sql); 
	if ($mysqli->error) { // add this check.
    	die('Invalid query: ' . $mysqli->error);
	}
	echo '<table>
	<tr>
        	
        <th>
		</th>
        <th>Image</th>
        <th>Image ID</th>
        <th>Name</th>
        <th>Artist</th>
        <th>Price</th>
        <th>Height (cm)</th>
        <th>Width (cm)</th>
        <th>Height (in)</th>
        <th>Height (in)</th>
        <th>Biography</th>
        <th>Sold</th>
        <th>Others</th>
        </tr>
	
	
	
	';
	
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
		echo '<tr>';
		
		//<img src="data:image/jpeg;base64,' . base64_encode($image) . '" width="80" height="80">
		echo '<td><input type=button  onmouseup="addimage('.$pkey.')" value="Add"/></td>';
		echo '<td><img src="'.$location.$pkey.'_thumb?'.rand().'" height = "80" width = "80" /></td>';
		echo '<td>'.$code.'</td>';
		echo '<td>'.$name.'</td>';
		echo '<td>'.$artist.'</td>';
		echo '<td>'.$price.'</td>';
		echo '<td>'.(round($cmheight*100)/100).'</td>';
		echo '<td>'.(round($cmwidth)/100).'</td>';
		echo '<td>'.$inheight.'</td>';
		echo '<td>'.$inwidth.'</td>';
		echo '<td><div style="height:80px; overflow-y:auto;">'.$bio.'</bio></td>';
		echo '<td>'.$sold.'</td>';
		echo '<td>'.$others.'</td>';
		echo '</tr>';
		}
	echo '</table>';
	$result->free();
	$mysqli->close();
	
?>