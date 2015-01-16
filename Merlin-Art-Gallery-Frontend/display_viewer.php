<!DOCTYPE html>
<html>
<link rel="stylesheet" type = "text/css" href="displaystyle.css">
<head>
</head>

<body>

	<script>
		function setTransitionProperties(){
			var transition_time = <? php echo $_GET["trans_time"];?>;
			setTimeout(nextPicture(), transition_time);
		}

		function nextPicture (){
			//this is the actual function that transitions
			//display the next image in the array
			i++;
			tempImage == imageArray[i];
			document.getElementById('picture').innerHTML =  '<img src = "' + tempImage + '">';
			displayInfo(); //calls the function to display related info as well
		}

		function displayOrNot(){
			//This function controls what information of the painting to display

			//Initialise an array that will take in all the parameters
			var boolArray = [];
			boolArray["id"] = false;
			boolArray["painting_name"] = false;
			boolArray["artist_name"] = false;
			boolArray["price"]=false;
			boolArray["cm_height"] = false;
			boolArray["cm_width"] = false;
			boolArray["in_height"] = false;
			boolArray["in_width"] = false;
			boolArray["biography"] = false;
			boolArray["other"] = false;

			//This checks which checkboxes the user has checked
			boolArray["id"] = <?php isset($_POST)['id'];?>;
			boolArray["painting_name"] = <?php isset($_POST)['painting_name'];?>;
			boolArray["artist_name"] = <?php isset($_POST)['artist_name'];?>;
			boolArray["price"] = <?php isset($_POST)['price'];?>;
			boolArray["cm_height"] = <?php isset($_POST)['cm_height'];?>;
			boolArray["cm_width"] = <?php isset($_POST)['cm_width'];?>;
			boolArray["in_height"] = <?php isset($_POST)['in_height'];?>;
			boolArray["in_width"] = <?php isset($_POST)['in_width'];?>;
			boolArray["biography"] = <?php isset($_POST)['biography'];?>;
			boolArray["other"] = <?php isset($_POST)['other'];?>;

			}	

		function displayInfo(){

			var imageInfo = [];
			var id = <?php $id; ?>; //I don't know how to get the primary key using php

			/* This is pseudocode 
			for (each element in boolArray){
				get the information of that primary key's element
				imageInfo.push;
			}
			*/

			//concatenate all the innerHTML; loops through all
			for (i=0; i <= imageInfo.length; i ++) {
				var temp = imageInfo[i].toString();
				document.getElementById('description').innerHTML += "<br>" + temp;			
			}
	}


	</script>


	<div id = "picture"><img src = "landscape.jpg"></div>
	<div id = "description"></div>
</body>
</html>