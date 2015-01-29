<!DOCTYPE html>
<html>
<link rel = 'stylesheet' type = 'text/css' href = 'normalize.css'>
<link rel="stylesheet" type = "text/css" href="displaystyle.css">

<link href='http://fonts.googleapis.com/css?family=Raleway:300' rel='stylesheet' type='text/css'>
<head>
<title>Display Viewer </title>

	<?php
		$COLUMNS = array('name', 'artist', 'price', 'cmheight', 'cmwidth', 'inheight', 'inwidth', 'bio', 'sold', 'others', 'image', 'flocation', 'fname');
		$FORM_FIELDS = array('painting_checkbox', 'artist_checkbox', 'price_checkbox', 'cm_height_checkbox', 'cm_width_checkbox', 'in_height_checkbox', 'in_width_checkbox', 'biography_checkbox', 'other', 'transtime', 'showrandom');
		$DP_IDS = array('name', 'artist', 'price', 'cmheight', 'cmwidth', 'inheight', 'inwidth', 'bio', 'others', 'transtime', 'random');
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
		
		$numfields = count($FORM_FIELDS);
		for ($i = 0; $i < $numfields; $i++){
			$fieldname = $FORM_FIELDS[$i];
			
			$dp[$DP_IDS[$i]] = false;
			if (isset($_POST[$fieldname])){
				$dp[$DP_IDS[$i]] = $_POST[$fieldname];
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
			
			$numcols = count($COLUMNS); //count gets array length
			for ($b = 0; $b<$numcols; $b++){
				$imagedata[$a][$COLUMNS[$b]] = $row[$COLUMNS[$b]];
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
		<?php
			for ($x = 0; $x<$nopic; $x++){
				echo 'imagearray['.$x.']={};'; echo "\n";
				
				$numcols = count($COLUMNS);
				for ($y = 0; $y<$numcols; $y++){
					echo 'imagearray['.$x.']["'.$COLUMNS[$y].'"] = "'.$imagedata[$x][$COLUMNS[$y]].'";';echo "\n";
				}
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