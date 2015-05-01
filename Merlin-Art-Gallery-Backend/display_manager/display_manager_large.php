<!DOCTYPE HTML>
<html>

<head>
	<title>Display Manager</title>
	<link rel = "stylesheet" type = "text/css" href = "./css/style_large.css">
	<link rel = "stylesheet" type = "text/css" href = "./css/form_style.css">
	<link rel = "stylesheet" type = "text/css" href = "./css/table_style.css">

	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <?php
		$mysqli = new mysqli("localhost", "root", "", "imageserver");
		if ($mysqli->connect_errno){
			printf('I cannot connect to the database  because: ' . $mysqli->connect_error);
			exit();
		}
		
		
	?>
    <script language ="javascript">
	
		var listed = [];
		var setup = [];
		var lel = 0;
		
		<?php
			if(isset($_POST["pkey"])){
				$sql = 'SELECT * FROM setups WHERE 
				pkey = '.$_POST["pkey"].'
				';
				$result=$mysqli->query($sql); 
				if ($mysqli->error) { // add this check.
    				die('Invalid query: ' . $mysqli->error);
				}
				while($row=$result->fetch_array()){ 
					$temp = $row['pictures'];
					$temp1 = $row['display'];
				}
				$pictures = explode("_",$temp);
				$display = explode("_",$temp1);
				$temp = sizeof($pictures);
				
				for ($a = 0; $a < $temp; $a++){
					echo 'listed.push('.$pictures[$a].');';	
				}
				$temp = sizeof($display);
				for ($a = 0; $a < $temp; $a++){
					echo 'setup.push('.$display[$a].');';	
				}
				echo 'lel = 1';
			}
		?>
		
		var nselect = 0;
		
		function startfunction(){
			if (setup[0] == 1){
				document.getElementById("painting_name").checked = true;
			}
			if (setup[1] == 1){
				document.getElementById("artist_name").checked = true;
			}
			if (setup[2] == 1){
				document.getElementById("price").checked = true;
			}
			if (setup[3] == 1){
				document.getElementById("cm_height").checked = true;
			}
			if (setup[4] == 1){
				document.getElementById("cm_width").checked = true;
			}
			if (setup[5] == 1){
				document.getElementById("in_height").checked = true;
			}
			if (setup[6] == 1){
				document.getElementById("in_width").checked = true;
			}
			if (setup[7] == 1){
				document.getElementById("biography").checked = true;
			}
			if (setup[8] == 1){
				document.getElementById("other").checked = true;
			}
			if (setup[9] == 1){
				document.getElementById("random").checked = true;
			}
			if (lel == 1){
				document.getElementById("trans_time").value = setup[10];
				document.getElementById("scroll_speed").value = setup[11];
				nselect = listed.length;
			}
			liststuff();
			searchsetup();
			searchby(1);	
		}
		
		function addimage(imageid){
			listed.push(imageid);
			nselect ++;
			liststuff();
		}
		function removeimage(imageid){
			var index = listed.indexOf(imageid);
			if (index > -1){
				listed.splice(index, 1);
			}
			nselect --;
			liststuff();
		}
		function searchby(pageno)  {  
			var idsearch = document.getElementById("idsearch").value; 
			var namesearch = document.getElementById("namesearch").value; 
			var artistsearch = document.getElementById("artistsearch").value;
			var othersearch = document.getElementById("othersearch").value; 
			var minprice = document.getElementById("price_slider").value; 
			var maxprice = document.getElementById("price_slider_max").value; 
			var minheight = document.getElementById("height_slider_min").value; 
			var maxheight = document.getElementById("height_slider_max").value;
			var minwidth = document.getElementById("width_slider_min").value; 
			var maxwidth = document.getElementById("width_slider_max").value;
			var height_select =  document.getElementById("height_selector").value;
			var width_select =  document.getElementById("width_selector").value;
			var scrollspeed = document.getElementById("scroll_speed").value;
			var xhr;  
			if (window.XMLHttpRequest) { // Mozilla, Safari, ...  
				xhr = new XMLHttpRequest();  
			} 
			else if (window.ActiveXObject) { // IE 8 and older  
				xhr = new ActiveXObject("Microsoft.XMLHTTP");  
			}  
			var data = "idsearch=" + idsearch + "&namesearch="+namesearch+"&artistsearch="+artistsearch+"&othersearch="+othersearch+"&min_price="+minprice+"&max_price="+maxprice+"&min_height="+minheight+"&min_width="+minwidth+"&max_height="+maxheight+"&max_width="+maxwidth+"&height_select="+height_select+"&width_select="+width_select+"&pageno="+pageno;  
			xhr.open("POST", "search.php", true);   
			xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                    
			xhr.send(data);  
			xhr.onreadystatechange = display_data; 
			function display_data() {  
     			if (xhr.readyState == 4) {  
      				if (xhr.status == 200) {  
       					document.getElementById("searchpic").innerHTML = xhr.responseText;  
      				} 
					else {  
        				alert('There was a problem with the request.');  
      				}  
     			}  
  			} 
		} 
		
		function removesetup(pkey){
			if (window.XMLHttpRequest) { // Mozilla, Safari, ...  
				qxhr = new XMLHttpRequest();  
			}
			else if (window.ActiveXObject) { // IE 8 and older  
				qxhr = new ActiveXObject("Microsoft.XMLHTTP");  
			} 
			var data="pkey="+pkey;
			qxhr.open("POST", "deletefield.php", true);   
			qxhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                    
			qxhr.send(data);  
			var delay=setTimeout(searchsetup, 100);
		}
		
		function liststuff()  { 
			var querystring = "";
			document.getElementById("selectedpic").innerHTML = "";  
			var xhr;  
			if (window.XMLHttpRequest) { // Mozilla, Safari, ...  
				xhr = new XMLHttpRequest();  
			} 
			else if (window.ActiveXObject) { // IE 8 and older  
				xhr = new ActiveXObject("Microsoft.XMLHTTP");  
			}  
			xhr.open("POST", "searchbox.php", true); 
			for (a = 0; a < nselect; a++){
				querystring += 	a+"="+listed[a]+"&";
			}
			querystring += "size=" + nselect;
			xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                    
			xhr.send(querystring);  
				
			xhr.onreadystatechange = display_data; 
			function display_data() {  
     			if (xhr.readyState == 4) {  
      				if (xhr.status == 200) {  
       					document.getElementById("selectedpic").innerHTML += xhr.responseText;  
      				} 
					else {  
        				alert('There was a problem with the request.');  
      				}  
     			}  
  			}
			 
		} 
		
		function savesetup(){
				var temp = listed.length;
				var pictures = "";
				var setup = "";
				
				for (a = 0; a < temp; a++){
					if (a == temp-1){
						pictures += "" + listed[a];
					}
					else{
						pictures += "" + listed[a] + "_";
					}
				}
				
				/*painting_name
				artist_name
				price
				cm_height
				cm_width
				in_height
				in_width
				biography
				other
				random
				trans_time
				scroll_speed
				*/
				if (document.getElementById("painting_name").checked == true){
					setup += "1_";	
				}
				else{
					setup +="0_";	
				}
				if (document.getElementById("artist_name").checked == true){
					setup += "1_";	
				}
				else{
					setup +="0_";	
				}
				if (document.getElementById("price").checked == true){
					setup += "1_";	
				}
				else{
					setup +="0_";	
				}
				if (document.getElementById("cm_height").checked == true){
					setup += "1_";	
				}
				else{
					setup +="0_";	
				}
				if (document.getElementById("cm_width").checked == true){
					setup += "1_";	
				}
				else{
					setup +="0_";	
				}
				if (document.getElementById("in_height").checked == true){
					setup += "1_";	
				}
				else{
					setup +="0_";	
				}
				if (document.getElementById("in_width").checked == true){
					setup += "1_";	
				}
				else{
					setup +="0_";	
				}
				if (document.getElementById("biography").checked == true){
					setup += "1_";	
				}
				else{
					setup +="0_";	
				}
				if (document.getElementById("other").checked == true){
					setup += "1_";	
				}
				else{
					setup +="0_";	
				}
				if (document.getElementById("random").checked == true){
					setup += "1_";	
				}
				else{
					setup +="0_";	
				}
				setup += document.getElementById("trans_time").value+"_";	
				setup +=document.getElementById("scroll_speed").value;	
				var newname = document.getElementById("setupname").value;
				if (window.XMLHttpRequest) { // Mozilla, Safari, ...  
					wxhr = new XMLHttpRequest();  
				}
				else if (window.ActiveXObject) { // IE 8 and older  
					wxhr = new ActiveXObject("Microsoft.XMLHTTP");  
				} 
				var data = "setup_name="+newname+ "&picturedata=" + pictures + "&setupdata=" + setup;
				wxhr.open("POST", "savesetup.php", true);   
				wxhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                    
				wxhr.send(data);
				var delay=setTimeout(searchsetup, 50);
			}
		
		function searchsetup()  {  
			var setupsearch = document.getElementById("setupsearch").value; 
			var xhr;  
			if (window.XMLHttpRequest) { // Mozilla, Safari, ...  
				zxhr = new XMLHttpRequest();  
			} 
			else if (window.ActiveXObject) { // IE 8 and older  
				zxhr = new ActiveXObject("Microsoft.XMLHTTP");  
			}  
			var data = "setupsearch="+idsearch;  
			zxhr.open("POST", "setups.php", true);   
			zxhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                    
			zxhr.send(data);  
			zxhr.onreadystatechange = display_data; 
			function display_data() {  
     			if (zxhr.readyState == 4) {  
      				if (zxhr.status == 200) {  
       					document.getElementById("setup_results").innerHTML = zxhr.responseText;  
      				} 
					else {  
        				alert('There was a problem with the request.');  
      				}  
     			}  
  			} 
		}
		
		function changepage(pageno){
			
		}
		
		window.onload = startfunction;
		 
    	 
	</script>
</head>

<body>
	<section id = 'header'>
		<h1>Display Manager </h1>
	</section>	
	<section id = 'page_1'>
			<h1> Step 1: Advanced Search.</h1>

                    	
                        <input type="hidden" name="doSearch" value="1">
						<label class ="search" for ='search_box'> ID </label>
						<input type = 'search' results = '5' name = 'idsearch' placeholder = 'Search' id='idsearch' onKeyUp="searchby(1)">
						<label  class ="search" for ='search_box'> Painting Name </label>
						<input type = 'search' results = '5' name = 'namesearch' placeholder = 'Search' id='namesearch' onKeyUp="searchby(1)">
                        <label  class ="search" for ='search_box'> Artist </label>
						<input type = 'search' results = '5' name = 'artistsearch' placeholder = 'Search' id = 'artistsearch' onKeyUp="searchby(1)">
                        <label  class ="search" for ='search_box'> Others </label>
						<input type = 'search' results = '5' name = 'othersearch' placeholder = 'Search' id='othersearch' onKeyUp="searchby(1)">
					<label for ='price_range'>Price</label>
					<br>
					<input id = 'price_slider' type = 'range' min = '0' max = '10000' step = '50' value = '0' oninput="amount.value=price_slider.value" onMouseUp="searchby(1)">
					<output id="amount" for="price_slider">0</output> 
					to

					<input id = 'price_slider_max' type = 'range' min = '0' max = '10000' step = '50' value = '10000' oninput="amount_max.value=price_slider_max.value" onMouseUp="searchby(1)">
					<output id="amount_max" for="price_slider_max">10000</output>

					<br>
					<div id = 'size'>
						<label for ='size_range'> Size </label>
						
						<input id = 'height_slider_min' name = 'height_min' class = 'height_slider' type = 'range' min = '0' max = '1000' step = '1' value = '0' oninput = 'height_min.value=height_slider_min.value' onMouseUp='searchby(1)'>
						<input id = 'height_slider_max' name = 'height_max' class = 'height_slider' type = 'range' min = '0' max = '1000' step = '1' value = '1000' oninput = 'height_max.value=height_slider_max.value' onMouseUp='searchby(1)'>
						<output id = 'height_min'  for = 'height_slider_min'> 0 </output> 
						<output id = 'height_max'  for = 'height_slider_max'> 1000 </output>

						<select class = 'cm_in' id = 'height_selector' name='height_select' onChange="searchby(1)">
							<option value = 0> cm </option>
							<option value = 1> in </option>
						</select>

						<div id = 'rectangle'></div>
						
						<input id = 'width_slider_min' name = 'width_min' class = 'width_slider' type = 'range' min = '0' max = '1000' step = '1' value = '0' oninput = 'width_min.value=width_slider_min.value' onMouseUp='searchby(1)'>
						<input id = 'width_slider_max' name = 'width_max' class = 'width_slider' type = 'range' min = '0' max = '1000' step = '1' value = '1000' oninput = 'width_max.value=width_slider_max.value' onMouseUp='searchby(1)'>
						<output id = 'width_min' for = 'width_slider_min'> 0 </output>
						<output id = 'width_max' for = 'width_slider_max'> 1000 </output>
		
						<select class = 'cm_in' id = 'width_selector' name='width_select' onChange="searchby(1)">
							<option value = 0> cm </option>
							<option value = 1> in </option>
						</select>			
					</div>		
				<!--<input id =  'test' type = "submit" value = "Search">-->

		</section>

		<section id = "page_2">
			<h1> Step 2: Image Select.</h1>
			<div id="searchpic" style="height:800px; overflow:auto; width:100%;">
            
			
			</div>

		</section>
        <form name="selectimages" action="../../Merlin-Art-Gallery-Frontend/viewer/display_viewer.php" method="post">
        
        <section id = "page_2">
			<h1> Selected images</h1>
			<div id="selectedpic">
            
			
			</div>

		</section>
        
       

		<section id = 'page_3'>
			<div id = 'form'>
				<h1>Step 3: Display Settings.</h1>
				
				<h2>Transition Time</h2>
				<li>
				<label for ="transtime"></label>
				<input type = "number" id = "trans_time" value = 15 name="transtime" min = '1'> 
				</li>
                
                <h2>Scroll Speed</h2>
				<li>
				<label for ="scroll_speed"></label>
				<input type = "number" id = "scroll_speed" value = 5 name="scrollspeed" min = '1' max='10'> 
				</li>

				<h2> What to display </h2>

				<div id = "checkbox_grid">

					<li>
						<input type = "checkbox" id = "painting_name" name = "painting_checkbox">
						<label for = "painting_name"> Painting Name </label>
					</li>
					
					<li>
						<input type = "checkbox" id = "artist_name" name = "artist_checkbox"> 
						<label for = "artist_name"> Artist Name </label>
					</li>

					<li>
						<input type = "checkbox" id = "price" name = "price_checkbox"> 
						<label for = 'price'> Price </label> 
					</li>

					<li>
						<input type = "checkbox" id = "cm_height" name = "cm_height_checkbox">
						<label for = "cm_height"> Height (cm) </label>
					</li>
					
					<li>
						<input type = "checkbox" id = "cm_width" name = "cm_width_checkbox"> 
						<label for = "cm_width"> Width (cm) </label>
					</li>

					<li>
						<input type = "checkbox" id = "in_height" name = "in_height_checkbox"> 
						<label for =  'in_height'> Height (in) </label> 
					</li>

					<li>
						<input type = "checkbox" id = "in_width" name = "in_width_checkbox">
						<label for = "in_width"> Width (in) </label>
					</li>
					
					<li>
						<input type = "checkbox" id = "biography" name = "biography_checkbox"> 
						<label for = "biography"> Biography </label>
					</li>

					<li>
						<input type = "checkbox" id = "other" name = 'other' > 
						<label for = 'other'> Other info </label> 
					</li>	
				</div>

				<h2> Other Settings </h2>

				<li>
				<input type =  "checkbox" id = "random" name = "showrandom" >
				<label for == "random"> Randomise paintings </label>
				</li>						

				<li>
				<input type = "submit" value = "Display Images" >
				</li>


			</div>
			</form>
		</section>
        
         <section id = "page_2_5">
        	<h1>Load Setups</h1>
            <div id='options'>
            	<input type="text" id="setupname" style="width:200px">
            	<input type="button" value="Save Setup" onClick="savesetup()">
            </div>
            
            <div id='search_settings'>
            	Search Setup : <input type="search" id="setupsearch" style="width:1000px" onKeyUp="searchsetup()">
            	
            </div>
            
            <div id='setup_results'>
            	
            </div>
        </section>
	</div>

</body>

</html>