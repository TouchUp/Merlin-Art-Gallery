<!DOCTYPE html>
<html>
<link rel="stylesheet" type = "text/css" href="displaystyle.css">
<link href='http://fonts.googleapis.com/css?family=Raleway:300' rel='stylesheet' type='text/css'>
<head>

	<?php
        $db = mysql_connect("localhost", "root", "") or die ('I cannot connect to the database  because: ' . mysql_error());
        $mydb = mysql_select_db("imageserver");
		$image_id = array();
		
		// Gets all the IDs of the image selected from the previous page
		if(!empty($_POST['check_list'])) {
			$nopic = count($_POST['check_list']);
			foreach($_POST['check_list'] as $check) {
            	array_push($image_id, $check);
    		}
		}
		
		//Time to get all the PHP values
		
		$dpname = false;$dpartist=false;$dpprice=false;$dpcmheight=false;$dpcmwidth=false;$dpinheight=false;$dpinwidth=false;$dpbio=false;$dpothers=false;$transtime=1;$dprandom=false;
		
		if (isset($_POST['painting_checkbox'])){
			
			$dpname = $_POST['painting_checkbox'];
		}
		if (isset($_POST['artist_checkbox'])){
			
			$dpartist = $_POST['artist_checkbox'];
		}
		if (isset($_POST['price_checkbox'])){
			
			$dpprice = $_POST['price_checkbox'];
		}
		if (isset($_POST['cm_height_checkbox'])){
			
			$dpcmheight = $_POST['cm_height_checkbox'];
		}
		if (isset($_POST['cm_width_checkbox'])){
			
			$dpcmwidth = $_POST['cm_width_checkbox'];
		}
		if (isset($_POST['in_height_checkbox'])){
			
			$dpinheight = $_POST['in_height_checkbox'];
		}
		if (isset($_POST['in_width_checkbox'])){
			
			$dpinwidth = $_POST['in_width_checkbox'];
		}
		if (isset($_POST['biography_checkbox'])){
			
			$dpbio = $_POST['biography_checkbox'];
		}
		if (isset($_POST['other'])){
			
			$dpothers = $_POST['other'];
		}
		if (isset($_POST['transtime'])){
			
			$transtime = $_POST['transtime'];
		}
		if (isset($_POST['showrandom'])){
			
			$dprandom = $_POST['showrandom'];
		}
		
		//Get all the information of the images selected
		$imagedata = array(array());
		
		for ($a = 0; $a<$nopic; $a++){
			$query = 'SELECT * FROM images WHERE pkey = '.intval($image_id[$a]);
			$result=mysql_query($query); 
			if (!$result) { // add this check.
    			die('Invalid query: ' . mysql_error());
			}
			
			$row=mysql_fetch_array($result);
			$imagedata[$a][0] = $row['name'];
			$imagedata[$a][1] = $row['artist'];
			$imagedata[$a][2] = $row['price'];
			$imagedata[$a][3] = $row['cmheight'];
			$imagedata[$a][4] = $row['cmwidth'];
			$imagedata[$a][5] = $row['inheight'];
			$imagedata[$a][6] = $row['inwidth'];
			$imagedata[$a][7] = $row['bio'];
			$imagedata[$a][8] = $row['sold'];
			$imagedata[$a][9] = $row['others'];
			$imagedata[$a][10] = $row['image'];
			$imagedata[$a][11] = $row['flocation'];
			$imagedata[$a][12] = $row['fname'];
			
		}
	?>
    
</head>

<body onload = "pageLoad()">	
	<script language="javascript">
		var imagecount = <?php echo $nopic ?>;
		var imagearray = new Array([]);
		var boolArray = new Array([]);
		var imageInfo = {};
		<?php
			for ($x = 0; $x<$nopic; $x++){
				echo 'imagearray['.$x.']={};'; echo "\n";
				echo 'imagearray['.$x.'][0] ="'.$imagedata[$x][0].'";'; echo "\n";
				echo 'imagearray['.$x.'][1] ="'.$imagedata[$x][1].'";'; echo "\n";
				echo 'imagearray['.$x.'][2] ="'.$imagedata[$x][2].'";'; echo "\n";
				echo 'imagearray['.$x.'][3] ="'.$imagedata[$x][3].'";'; echo "\n";
				echo 'imagearray['.$x.'][4] ="'.$imagedata[$x][4].'";'; echo "\n";
				echo 'imagearray['.$x.'][5] ="'.$imagedata[$x][5].'";'; echo "\n";
				echo 'imagearray['.$x.'][6] ="'.$imagedata[$x][6].'";'; echo "\n";
				echo 'imagearray['.$x.'][7] ="'.$imagedata[$x][7].'";'; echo "\n";
				echo 'imagearray['.$x.'][8] ="'.$imagedata[$x][8].'";'; echo "\n";
				echo 'imagearray['.$x.'][9] ="'.$imagedata[$x][9].'";'; echo "\n";
				echo 'imagearray['.$x.'][10] ="'.$imagedata[$x][10].'";'; echo "\n";
				echo 'imagearray['.$x.'][11] ="'.$imagedata[$x][11].'";'; echo "\n";
				echo 'imagearray['.$x.'][12] ="'.$imagedata[$x][12].'";'; echo "\n";
			}
			
		?>
		var i = 0;
		var temp;
		function pageLoad(){
			displayOrNot();
			setTransitionProperties();
			
		}

		function setTransitionProperties(){
			nextPicture(); //So that it displays the first picture instantly
			var transition_time = <?php echo $transtime;?>;
			temp = transition_time * 1000;
			var start = setInterval(function(){nextPicture()}, temp);
		}

		function nextPicture (){
			
			if (i >= imagecount-1){
				i = 0;
			}
			else{
				
				i++;
			}
			imagepath = imagearray[i][11];
			imagename = imagearray[i][12];
			document.getElementById('picture').innerHTML =  '<img id = "image" src = "' + imagepath + '/'+ imagename +'">';
			displayInfo(); //calls the function to display related info as well
		}

		function displayOrNot(){
			//This function controls what information of the painting to display
			
			//Initialise an array that will take in all the parameters
			
			boolArray["painting_name"] = <?php 
			if ($dpname == true){
				echo '1';
			}
			else{
				echo '0';	
			}
			?>;
			
			
			boolArray["artist_name"] = <?php 
			if ($dpartist == true){
				echo '1';
			}
			else{
				echo '0';	
			}
			?>;
			boolArray["price"]=<?php
			if ($dpprice == true){
				echo '1';
			}
			else{
				echo '0';	
			}
			?>;
			boolArray["cm_height"] = <?php 
			if ($dpcmheight == true){
				echo '1';
			}
			else{
				echo '0';	
			}
			?>;
			boolArray["cm_width"] = <?php 
			if ($dpcmwidth == true){
				echo '1';
			}
			else{
				echo '0';	
			}
			?>;
			boolArray["in_height"] = <?php 
			if ($dpinheight == true){
				echo '1';
			}
			else{
				echo '0';	
			}
			?>;
			boolArray["in_width"] = <?php 
			if ($dpinwidth == true){
				echo '1';
			}
			else{
				echo '0';	
			}
			?>;
			boolArray["biography"] = <?php 
			if ($dpbio == true){
				echo '1';
			}
			else{
				echo '0';	
			}
			?>;
			boolArray["other"] = <?php 
			if ($dpothers == true){
				echo '1';
			}
			else{
				echo '0';	
			}
			?>;
			boolArray['random'] = <?php 
			if ($dprandom == true){
				echo '1';
			}
			else{
				echo '0';	
			}
			?>;

			}	

		function displayInfo(){


			/* This is pseudocode 
			for (each element in boolArray){
				get the information of that primary key's element
				imageInfo.push;
			}
			*/
			var dptoshow = 0;
			var temp;
			document.getElementById('description').innerHTML = '';
			
			if (boolArray["painting_name"] == 1){
				temp = imagearray[i][0].toString();
				document.getElementById('description').innerHTML += "<br>" + "Painting name: " + temp;	
				
				
			}
			if (boolArray["artist_name"] == 1){
				temp = imagearray[i][1].toString();
				document.getElementById('description').innerHTML += "<br>" + "Artist: " + temp;
			}
			if (boolArray["price"] == 1){
				temp = imagearray[i][2].toString();
				document.getElementById('description').innerHTML += "<br>" + "Price: " + temp + " SGD";
			}
			if (boolArray["cm_height"] == 1){
				temp = imagearray[i][3].toString();
				document.getElementById('description').innerHTML += "<br>" + "Height (cm): " + temp;
			}
			if (boolArray["cm_width"] == 1){
				temp = imagearray[i][4].toString();
				document.getElementById('description').innerHTML += "<br>" + "Width (cm): " + temp;
			}
			if (boolArray["in_height"] == 1){
				temp = imagearray[i][5].toString();
				document.getElementById('description').innerHTML += "<br>" + "Height (in): " + temp;
			}
			if (boolArray["in_width"] == 1){
				temp = imagearray[i][6].toString();
				document.getElementById('description').innerHTML += "<br>" + "Width (in): " +temp;
			}
			if (boolArray["biography"] == 1){
				temp = imagearray[i][7].toString();
				document.getElementById('description').innerHTML += "<br>" + "Biography: " + temp;
			}
			if (boolArray["sold"] == 1){
				temp = imagearray[i][8].toString();
				document.getElementById('description').innerHTML += "<br>" + "Sold: " + temp;
			}
			if (boolArray["others"] == 1){
				temp = imagearray[i][9].toString();
				document.getElementById('description').innerHTML += "<br>" + "Other information: " + temp;
			}
			
			//concatenate all the innerHTML; loops through all
			/*
			for (d=0; d <= imageInfo.length; d ++) {	
				var temp = imageInfo[d].toString();
				alert(imageInfo);
				document.getElementById('description').innerHTML += "<br>" + temp;			
			}
			*/
	}


	</script>
	
	<div id = "picture"></div>
	<div id = "description"></div>
</body>
</html>