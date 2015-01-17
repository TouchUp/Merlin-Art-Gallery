<!DOCTYPE html>
<html>
<link rel="stylesheet" type = "text/css" href="displaystyle.css">
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
    <script language="javascript">
		var i = 0;
		var imagecount = <?php echo $nopic ?>
		var imagearray = new Array ([]);
		<?php $a = 0; ?>
		for (a=0;a<imagecount;a++){
			
			imagearray[a][0] = <?php echo $imagedata[$a][0] ?>;
			imagearray[a][1] = <?php echo $imagedata[$a][1] ?>;
			imagearray[a][2] = <?php echo $imagedata[$a][2] ?>;
			imagearray[a][3] = <?php echo $imagedata[$a][3] ?>;
			imagearray[a][4] = <?php echo $imagedata[$a][4] ?>;
			imagearray[a][5] = <?php echo $imagedata[$a][5] ?>;
			imagearray[a][6] = <?php echo $imagedata[$a][6] ?>;
			imagearray[a][7] = <?php echo $imagedata[$a][7] ?>;
			imagearray[a][8] = <?php echo $imagedata[$a][8] ?>;
			imagearray[a][9] = <?php echo $imagedata[$a][9] ?>;
			imagearray[a][10] = <?php echo $imagedata[$a][10] ?>;
			imagearray[a][11] = <?php echo $imagedata[$a][11] ?>;
			imagearray[a][12] = <?php echo $imagedata[$a][12] ?>;
			
			
			<?php $a++ ?>
		}
	</script>
</head>

<body>

	<script>
		function setTransitionProperties(){
			var transition_time = <?php echo $transtime;?>;
			setTimeout(nextPicture(), transition_time);
		}

		function nextPicture (){
			if (i >= imagecount-1){
				i = 0;
			}
			else{
				i++;
			}
			imagepath == imagearray[i][11];
			imagename == imagearray[i][12];
			document.getElementById('picture').innerHTML =  '<img src = "' + imagepath + '/'+ imagename +'">';
			displayInfo(); //calls the function to display related info as well
		}

		function displayOrNot(){
			//This function controls what information of the painting to display

			//Initialise an array that will take in all the parameters
			var boolArray = [];
			boolArray["painting_name"] = <?php echo $dpname ?>;
			boolArray["artist_name"] = <?php echo $dpartist ?>;
			boolArray["price"]=<?php echo $dpprice ?>;
			boolArray["cm_height"] = <?php echo $dpcmheight ?>;
			boolArray["cm_width"] = <?php echo $dpcmwidth ?>;
			boolArray["in_height"] = <?php echo $dpinheight ?>;
			boolArray["in_width"] = <?php echo $dpinwidth ?>;
			boolArray["biography"] = <?php echo $dpbio ?>;
			boolArray["other"] = <?php echo $dpothers ?>;
			boolArray['random'] = <?php echo $dprandom ?>;


			}	

		function displayInfo(){

			

			/* This is pseudocode 
			for (each element in boolArray){
				get the information of that primary key's element
				imageInfo.push;
			}
			*/

			if (boolArray["painting_name"] == true){
				imageInfo.push(imagearray[i][0]);
			}
			if (boolArray["artist_name"] == true){
				imageInfo.push(imagearray[i][1]);
			}
			if (boolArray["price"] == true){
				imageInfo.push(imagearray[i][2]);
			}
			if (boolArray["cm_height"] == true){
				imageInfo.push(imagearray[i][3]);
			}
			if (boolArray["cm_width"] == true){
				imageInfo.push(imagearray[i][4]);
			}
			if (boolArray["in_height"] == true){
				imageInfo.push(imagearray[i][5]);
			}
			if (boolArray["in_width"] == true){
				imageInfo.push(imagearray[i][6]);
			}
			if (boolArray["biography"] == true){
				imageInfo.push(imagearray[i][7]);
			}
			if (boolArray["sold"] == true){
				imageInfo.push(imagearray[i][8]);
			}
			if (boolArray["others"] == true){
				imageInfo.push(imagearray[i][9]);
			}
			
			imageInfo.push(temp);
			alert(prop + "=" + obj[prop]);
			
			//concatenate all the innerHTML; loops through all
			for (d=0; d <= imageInfo.length; d ++) {
				var temp = imageInfo[d].toString();
				document.getElementById('description').innerHTML += "<br>" + temp;			
			}
	}


	</script>


	<div id = "picture"><img src = "landscape.jpg"></div>
	<div id = "description"></div>
</body>
</html>