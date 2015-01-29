<!DOCTYPE HTML>
<html>

<head>
	<title>Display Manager</title>
	<link rel = "stylesheet" type = "text/css" href = "style_large.css">
	<link rel = "stylesheet" type = "text/css" href = "form_style.css">
	<link rel = "stylesheet" type = "text/css" href = "table_style.css">

	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <?php
		$mysqli = new mysqli("localhost", "root", "", "imageserver");
		if ($mysqli->connect_errno){
			printf('I cannot connect to the database  because: ' . $mysqli->connect_error);
			exit();
		}
	?>
    <script language ="javascript">
		function searchby()  {  
			var idsearch = document.getElementById("idsearch").value; 
			var namesearch = document.getElementById("namesearch").value; 
			var artistsearch = document.getElementById("artistsearch").value;
			var othersearch = document.getElementById("othersearch").value; 
			var minprice = document.getElementById("price_slider").value; 
			var maxprice = document.getElementById("price_slider_max").value; 
			var xhr;  
			if (window.XMLHttpRequest) { // Mozilla, Safari, ...  
				xhr = new XMLHttpRequest();  
			} 
			else if (window.ActiveXObject) { // IE 8 and older  
				xhr = new ActiveXObject("Microsoft.XMLHTTP");  
			}  
			var data = "idsearch=" + idsearch + "&namesearch="+namesearch+"&artistsearch="+artistsearch+"&othersearch="+othersearch+"&min_price="+minprice+"&max_price="+maxprice;  
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
		
		window.onload = searchby;
		 
    	 
	</script>
</head>

<body>
	<section id = 'header'>
		<h1>Display Manager </h1>
	</section>	
	<section id = 'page_1'>
			<h1> Step 1: Advanced Search.</h1>
			<form name="search" action="display_manager_large.php" method="post">
                    	
                        <input type="hidden" name="doSearch" value="1">
						<label class ="search" for ='search_box'> ID </label>
						<input type = 'search' results = '5' name = 'idsearch' placeholder = 'Search' id='idsearch' onKeyUp="searchby()">
						<label  class ="search" for ='search_box'> Painting Name </label>
						<input type = 'search' results = '5' name = 'namesearch' placeholder = 'Search' id='namesearch' onKeyUp="searchby()">
                        <label  class ="search" for ='search_box'> Artist </label>
						<input type = 'search' results = '5' name = 'artistsearch' placeholder = 'Search' id = 'artistsearch' onKeyUp="searchby()">
                        <label  class ="search" for ='search_box'> Others </label>
						<input type = 'search' results = '5' name = 'othersearch' placeholder = 'Search' id='othersearch' onKeyUp="searchby()">
					<label for ='price_range'>Price</label>
					<br>
					<input id = 'price_slider' type = 'range' min = '0' max = '10000' step = '50' value = '0' oninput="amount.value=price_slider.value" onMouseUp="searchby()">
					<output name="amount" for="price_slider">0</output> 
					to

					<input id = 'price_slider_max' type = 'range' min = '0' max = '10000' step = '50' value = '10000' oninput="amount_max.value=price_slider_max.value" onMouseUp="searchby()">
					<output name="amount_max" for="price_slider_max">10000</output>

					<br>
					<div id = 'size'>
						<label for ='size_range'> Size </label>
						
						<input id = 'height_slider_min' class = 'height_slider' type = 'range' min = '0' max = '1000' step = '1' value = '0' oninput = 'height_min.value=height_slider_min.value'>
						<input id = 'height_slider_max' class = 'height_slider' type = 'range' min = '0' max = '1000' step = '1' value = '1000' oninput = 'height_max.value=height_slider_max.value'>
						<output id = 'height_min' name = 'height_min' for = 'height_slider_min'> 0 </output> 
						<output id = 'height_max' name = 'height_max' for = 'height_slider_max'> 1000 </output>

						<select class = 'cm_in' id = 'height_selector'>
							<option value = "cm"> cm </option>
							<option value = "in"> in </option>
						</select>

						<div id = 'rectangle'></div>
						
						<input id = 'width_slider_min' class = 'width_slider' type = 'range' min = '0' max = '1000' step = '1' value = '0' oninput = 'width_min.value=width_slider_min.value'>
						<input id = 'width_slider_max' class = 'width_slider' type = 'range' min = '0' max = '1000' step = '1' value = '1000' oninput = 'width_max.value=width_slider_max.value'>
						<output id = 'width_min' name = 'width_min' for = 'width_slider_min'> 0 </output>
						<output id = 'width_max' name = 'width_max' for = 'width_slider_max'> 1000 </output>
		
						<select class = 'cm_in' id = 'width_selector'>
							<option value = "cm"> cm </option>
							<option value = "in"> in </option>
						</select>			
					</div>		
				<input id =  'test' type = "submit" value = "Search">
				
			</form>

		</section>
		<section id = "page_2">
			<h1> Step 2: Image Select.</h1>
			<div id="searchpic">
            
			
			</div>

		</section>

		<section id = 'page_3'>
			<div id = 'form'>
				<h1>Step 3: Display Settings.</h1>
				
				<h2>Transition Time</h2>
				<li>
				<label for ="trans_time"></label>
				<input type = "number" id = "trans_time" value = 15 name="transtime" min = '1'> 
				</li>

				<h2> What to display </h2>

				<div id = "checkbox_grid">

					<li>
						<input type = "checkbox" id = "painting_name" name = "painting_checkbox" value = true>
						<label for = "painting_name"> Painting Name </label>
					</li>
					
					<li>
						<input type = "checkbox" id = "artist_name" name = "artist_checkbox" value = true> 
						<label for = "artist_name"> Artist Name </label>
					</li>

					<li>
						<input type = "checkbox" id = "price" name = "price_checkbox" value = true> 
						<label for = 'price'> Price </label> 
					</li>

					<li>
						<input type = "checkbox" id = "cm_height" name = "cm_height_checkbox" value = true>
						<label for = "cm_height"> Height (cm) </label>
					</li>
					
					<li>
						<input type = "checkbox" id = "cm_width" name = "cm_width_checkbox" value = true> 
						<label for = "cm_width"> Width (cm) </label>
					</li>

					<li>
						<input type = "checkbox" id = "in_height" name = "in_height_checkbox" value = true> 
						<label for =  'in_height'> Height (in) </label> 
					</li>

					<li>
						<input type = "checkbox" id = "in_width" name = "in_width_checkbox" value = true>
						<label for = "in_width"> Width (in) </label>
					</li>
					
					<li>
						<input type = "checkbox" id = "biography" name = "biography_checkbox" value = true> 
						<label for = "biography"> Biography </label>
					</li>

					<li>
						<input type = "checkbox" id = "other" name = 'other' value = true> 
						<label for = 'other'> Other info </label> 
					</li>	
				</div>

				<h2> Other Settings </h2>

				<li>
				<input type =  "checkbox" id = "random" name = "showrandom" value = true>
				<label for == "random"> Randomise paintings </label>
				</li>						

				<li>
				<input type = "submit" value = "Display Images" >
				</li>


			</div>
			</form>
		</section>
	</div>

</body>

</html>