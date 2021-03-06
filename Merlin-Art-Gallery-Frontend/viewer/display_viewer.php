<!DOCTYPE html>
<html>
<link rel = 'stylesheet' type = 'text/css' href = 'normalize.css'>
<link rel="stylesheet" type = "text/css" href="displaystyle.css">
<head>
<title>Display Viewer </title>

	<?php
		//COLUMN in the database
		$COLUMN = array('name', 'artist', 'price', 'height', 'width', 'bio', 'sold', 'others','doby','dobm','dobd','plocation','pyear','country','media','subject','pkey');
		//mapping $_POST to the $dp array
		$POST_DP_MAPPING = array('painting_checkbox'=>'name', 'artist_checkbox'=>'artist', 'price_checkbox'=>'price', 'cm_height_checkbox'=>'height', 'cm_width_checkbox'=>'width', 'in_height_checkbox'=>'inheight', 'in_width_checkbox'=>'inwidth', 'biography_checkbox'=>'bio', 'other'=>'others', 'showrandom'=>'showrandom');
		//things that may be displayed
		$DISPLAYABLE = array('name', 'artist', 'price', 'height', 'width', 'inheight', 'inwidth', 'bio', 'others');
		//name of the things to be displayed. NONE is like for biography, don't want to show "Biography: " before the value.
		$DISPLAYABLE_NAME = array('Painting name', 'Artist', 'Price', 'Height (cm)', 'Width (cm)', 'Height (in)', 'Width (in)', 'NONE', 'Other information');
    
        
		
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
		
		//display properties e.g. whether or not to show painting name
		$dp = array();
		
		foreach ($POST_DP_MAPPING as $postid => $dpid){
            
            if (isset($_POST[$postid])){
                if ($_POST[$postid] === "on"){
                    $dp[$dpid] = true;
                }
                
            }
            else{
                $dp[$dpid] = false;
            }
            
		}
		$transtime = isset($_POST['transtime']) ? (int)$_POST['transtime'] : $transtime = 1;
		$transtime = mysql_real_escape_string($transtime);
		
		$scrollspeed = isset($_POST['scrollspeed']) ? (int)$_POST['scrollspeed'] : $scrollspeed = 1;
		$scrollspeed = mysql_real_escape_string($scrollspeed);
		
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
    
    
	
    <script src = 'display.js'></script>
    
    <script language="javascript">
		var DISPLAYABLE = <?php echo json_encode($DISPLAYABLE); ?>;
		var visited = [];
		//
		var DISPLAYABLE_NAME = <?php echo json_encode($DISPLAYABLE_NAME); ?>;
		var imagecount = <?php echo $nopic ?>;
		var imagearray = [];
		var dp = <?php echo json_encode($dp); ?>;
		var imageInfo = {};
		var imagearray = <?php echo json_encode($imagedata) ?>;
		var i = 0;
		var temp;
		var SCROLL_SPEED = <?php echo $scrollspeed ?>;
		for (a = 0; a < imagecount; a++){
			visited[a] = false;	
		}
		var z = 0
		var speed = 1
		
		
		
		function scroll() {
			z = z + speed
			var div = document.getElementById("descr_wrapper")
			div.scrollTop = z
            //console.log(window.innerHeight);
			if (z >= div.scrollHeight-300) {
				z = 0
				t1=setTimeout("scroll()",5000)
			}
			else{
				t1=setTimeout("scroll()",100)
			}
			
		}
		function pageLoad(){
			setTransitionProperties();
		}

		function setTransitionProperties(){
			nextPicture(); //So that it displays the first picture instantly
			scroll();
			
			var transition_time = <?php echo $transtime; ?>;
			temp = transition_time * 1000;

			var start = setInterval(function(){nextPicture()}, temp);
		}
		var speed = 1
		
		
		

	</script>
    
    <script language="javascript">
i = 0

</script>
    
    
    
</head>
    <style>
    </style>

<body onload = "pageLoad()">	
	
	<div id = "picture"></div>
	<div id = "descr_wrapper"><div id = "description"></div></div>
	
</body>
<script src='scroller.js'></script>
<script src='Ruleify.js'></script>
</html>