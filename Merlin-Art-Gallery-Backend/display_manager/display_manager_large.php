<!DOCTYPE HTML>
<html>

<head>
	<title>Display Manager</title>
	<link rel = "stylesheet" type = "text/css" href = "style_large.css">
	<link rel = "stylesheet" type = "text/css" href = "form_style.css">
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <?php
        $db = mysql_connect("localhost", "root", "") or die ('I cannot connect to the database  because: ' . mysql_error());
        $mydb = mysql_select_db("imageserver");
	?>
</head>

<body>
	<div id = 'header'>
		<h1>Display Manager </h1>
	</div>	
	<div id = 'page_1'>
			<h1> Step 1: Advanced Search.</h1>

				<ul>
                    	<form name="search" action="display_manager_large.php" method="post">
                        <input type="hidden" name="doSearch" value="1">
                    <li>
						<label class ="search" for 'search_box'> ID </label>
						<input type = 'search' results = '5' name = 'idsearch' placeholder = 'Search'>
                    </li>
                    <li>
						<label  class ="search" for 'search_box'> Painting Name </label>
						<input type = 'search' results = '5' name = 'namesearch' placeholder = 'Search'>
                    </li>
                     <li>   
                        <label  class ="search" for 'search_box'> Artist </label>
						<input type = 'search' results = '5' name = 'artistsearch' placeholder = 'Search'>
                    </li>
                    <li>
                        <label  class ="search" for 'search_box'> Others </label>
						<input type = 'search' results = '5' name = 'othersearch' placeholder = 'Search'>
					</li>

					<li>
                        <!--
						<select>
							<option value = "<"> less than </option>
							<option value = "="> equal </option>
							<option value = ">" selected='selected'> more than </option>
						</select>
                        -->
                        Minimum price : 
						<input type = 'number' name = 'min_price' placeholder = '5000'> 
                        <!--
						<select>
							<option value = "<"> less than </option>
							<option value = "="> equal </option>>
						</select>
                        -->
                        &nbsp;Maximum price : 
						<input type = 'number' name = 'max_price' placeholder = '10000'>
					</li>

					<li>
						<label for 'size_range'> Size </label>
						<br>
						<select>
							<option value = "<"> less than </option>
							<option value = "="> equal </option>
							<option value = ">" selected> more than </option>
						</select>
						<input type = 'number' id = 'min_size' placeholder = '40'> 
						<select>
							<option value = "cm"> cm </option>
							<option value = "in"> in </option>
						</select>	
						and/or 
						<select>
							<option value = "<"> less than </option>
							<option value = "="> equal </option>
						</select>
						<input type = 'number' id = 'max_size' placeholder = '80'>
						<select>
							<option value = "cm"> cm </option>
							<option value = "in"> in </option>
						</select>
                        
                        </li>						
					</li>
				<li>
				<input id =  'test' type = "submit" value = "Search">
                </form>
				</li>

			</ul>

		</div>

		<div id = "page_2">
			<h1> Step 2: Image Select.</h1>
            <table border ="1" width = "100%">
            	<tr>
                	
                	<th>
                    <form action = "../../merlin-art-gallery-frontend/viewer/display_viewer.php" method = "POST">
                    Select
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
                <tr>
                </tr>
					<?php
					
					
					if (isset($_POST['idsearch'])){
						$idsearch = $_POST['idsearch'];
					}
					else{
						$idsearch = "";
					}
					if (isset($_POST['namesearch'])){
						$namesearch = $_POST['namesearch'];
					}
					else{
						$namesearch="";
					}
					if (isset($_POST['artistsearch'])){
						$artistsearch = $_POST['artistsearch'];
					}
					else{
						$artistsearch="";
					}
					if (isset($_POST['othersearch'])){
						$idsearch = $_POST['othersearch'];
					}
					else{
						$idsearch = "";	
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
						$maxprice = 2147483647;	
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
						$maxsize = 2147483647;	
					}
						

					$sql = 'SELECT * FROM images WHERE 
					(code LIKE "'.$idsearch.'%")
					AND (artist LIKE "'.$artistsearch.'%") 
					AND (code LIKE "'.$idsearch.'%") 
					AND (name LIKE "'.$namesearch.'%") 
					';
					$result=mysql_query($sql); 
					if (!$result) { // add this check.
    					die('Invalid query: ' . mysql_error());
					}
					while($row=mysql_fetch_array($result)){ 
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
						echo "<tr>";
						echo '<td><input type="checkbox" name="check_list[]" value="'.$pkey.'"></td>';
						//<img src="data:image/jpeg;base64,' . base64_encode($image) . '" width="80" height="80">
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
                ?>
            </table>
			<div id = 'image_gallery' >
			</div>
		</div>

		<div id = 'page_3'>
			<ul>
				<h1>Step 3: Display Settings.</h1>

				<li>
				<label for "trans_time">Transition Time (in seconds):</label>
				<input type = "number" id = "trans_time" value = "Transition Time" name="transtime" min = '1' placeholder = '10'> 
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
						<label for =  'price'> Price </label> 
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
						<label for =  'other'> Other info </label> 
					</li>	
				</div>

				<h2> Other Settings </h2>

				<li>
				<input type =  "checkbox" id = "random" name = "showrandom" value = true>
				<label for = "random"> Randomise paintings </label>
				</li>

				<li>
				<label for = 'text_area'> I don't know what this text field is for, I just wanted to show off text fields </label>
				<input type = "text" id = "text_area" value = 'You can type anything here'>

				</li>							

				<li>
				<input type = "submit" value = "Display Images" >
				</li>


			</ul>
			</form>
		</div>
	</div>

</body>

</html>