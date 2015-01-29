<!DOCTYPE html>
<html>
<link rel = 'stylesheet' type = 'text/css' href = 'normalize.css'>
<link rel="stylesheet" type = "text/css" href="displaystyle.css">

<link href='http://fonts.googleapis.com/css?family=Raleway:300' rel='stylesheet' type='text/css'>
<head>
<title>Display Viewer </title>

	<?php
		//COLUMN in the database
		$COLUMN = array('name', 'artist', 'price', 'cmheight', 'cmwidth', 'inheight', 'inwidth', 'bio', 'sold', 'others', 'image', 'flocation', 'fname');
		//mapping $_POST to the $dp array
		$POST_DP_MAPPING = array('painting_checkbox'=>'name', 'artist_checkbox'=>'artist', 'price_checkbox'=>'price', 'cm_height_checkbox'=>'cmheight', 'cm_width_checkbox'=>'cmwidth', 'in_height_checkbox'=>'inheight', 'in_width_checkbox'=>'inwidth', 'biography_checkbox'=>'bio', 'other'=>'others', 'transtime'=>'transtime', 'showrandom'=>'random');
		//things that may be displayed
		$DISPLAYABLE = array('name', 'artist', 'price', 'cmheight', 'cmwidth', 'inheight', 'inwidth', 'bio', 'others');
		
		$mysqli = new mysqli("localhost", "root", "", "imageserver");
		if ($mysqli->connect_errno){
			printf('I cannot connect to the database  because: ' . $mysqli->connect_error);
			exit();
		}
		$image_id = array();
		
		// Gets all the IDs of the image selected from the previous page
		if(!empty($_POST['check_list'])) {
			$nopic = count($_POST['check_list']);
			foreach($_POST['check_list'] as $check) {
            	array_push($image_id, $check);
    		}
		}
		
		if (!isset($nopic)){
			 echo "<script type=\"text/javascript\">window.alert('No Picture Selected.');window.location.href = '../../Merlin-Art-Gallery-Backend/display_manager/display_manager_large.php';</script>"; 
			header("Location: ../../Merlin-Art-Gallery-Backend/display_manager/display_manager_large.php");
		}
		
		//Time to get all the PHP values
		
		
		
		
		$dp = array();
		
		foreach ($POST_DP_MAPPING as $postid => $dpid){
			$dp[$dpid] = false;
			if (isset($_POST[$postid])){
				$dp[$dpid] = $_POST[$postid];
			}
		}
		
		//Get all the information of the images selected
		$imagedata = array(array());
		
		for ($a = 0; $a<$nopic; $a++){
			$query = 'SELECT * FROM images WHERE pkey = '.intval($image_id[$a]);
			$result = $mysqli->query($query); 
			if ($mysqli->error) { // add this check.
				die('Invalid query: ' . $mysqli->error);
			}
			
			$row = $result->fetch_array();
			
			$numcols = count($COLUMN); //count gets array length
			for ($b = 0; $b<$numcols; $b++){
				$imagedata[$a][$COLUMN[$b]] = $row[$COLUMN[$b]];
			}
			
		}
	?>
    
</head>

<body onload = "pageLoad()">	
	<div id = "picture"></div>
	<div id = "descr_wrapper"><div id = "description"></div></div>

	<script src = 'image_scroller.js'></script>
	<script src = 'display.js'></script>

	<script language="javascript">
		var DISPLAYABLE = <?php echo json_encode($DISPLAYABLE); ?>;
		var DISPLAYABLE_NAME = ['Painting name', 'Artist', 'Price', 'Height (cm)', 'Width (cm)', 'Height (in)', 'Width (in)', 'NONE', 'Other information'];
		var imagecount = <?php echo $nopic ?>;
		var imagearray = [];
		var boolArray = [];
		var imageInfo = {};
		var imagearray = <?php echo json_encode($imagedata) ?>;
		var i = 0;
		var temp;
		
		function pageLoad(){
			displayOrNot();
			setTransitionProperties();
			
		}

		function setTransitionProperties(){
			nextPicture(); //So that it displays the first picture instantly
			var transition_time = <?php echo $dp['transtime'];?>;
			temp = transition_time * 1000;
			var start = setInterval(function(){nextPicture()}, temp);
		}


		function displayOrNot(){
			//This function controls what information of the painting to display
			
			//Initialise an array that will take in all the parameters
			
			<?php
				
				$numcols = count($DISPLAYABLE);
				for($i = 0; $i < $numcols; $i++){
					$displayableid = $DISPLAYABLE[$i];
					
					echo 'boolArray["'.$displayableid.'"] = ';
					if ($dp[$displayableid] == true){
						echo '1';
					}
					else{
						echo '0';
					}
					echo ";\n";
				}
			?>
			 
			boolArray['random'] = <?php 
			if ($dp['random'] == true){
				echo '1';
			}
			else{
				echo '0';	
			}
			?>;

			}	

		

	</script>
	
</body>
</html>