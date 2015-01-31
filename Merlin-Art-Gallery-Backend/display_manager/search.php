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
	if (isset($_POST['min_size'])){
		$minsize = $_POST['min_size'];
	}
	else{
		$minsize = 0;
	}
	if (isset($_POST['max_price'])){
		$maxsize = $_POST['max_price'];
	}
	else{
		$maxsize = 9999999;	
	}
	
	$sql = 'SELECT * FROM images WHERE 
	(artist LIKE "'.$artistsearch.'%") 
	AND (code LIKE "'.$idsearch.'%") 
	AND (name LIKE "'.$namesearch.'%") 
	AND (others LIKE "'.$othersearch.'%")
	AND (price BETWEEN '.$minprice.' AND '.$maxprice.')
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
		echo '<tr>';
		
		//<img src="data:image/jpeg;base64,' . base64_encode($image) . '" width="80" height="80">
		echo '<td><input type=button  onmouseup="addimage('.$pkey.')" value="Add"/></td>';
		echo '<td><img src="'.$flocation.'/'.$fname.'" height = "80" width = "80" /></td>';
		echo '<td>'.$code.'</td>';
		echo '<td>'.$name.'</td>';
		echo '<td>'.$artist.'</td>';
		echo '<td>'.$price.'</td>';
		echo '<td>'.$cmheight.'</td>';
		echo '<td>'.$cmwidth.'</td>';
		echo '<td>'.$inheight.'</td>';
		echo '<td>'.$inwidth.'</td>';
		echo '<td>'.$bio.'</td>';
		echo '<td>'.$sold.'</td>';
		echo '<td>'.$others.'</td>';
		echo '</tr>';
		}
	echo '</table>';
	$result->free();
	$mysqli->close();
	
?>