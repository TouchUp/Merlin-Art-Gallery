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

		}

		function displayOrNot(){
			//This function controls what information of the painting to display

			//Initialise an array that will take in all the parameters
			var boolArray = [];
			boolArray["id"] = false;
			boolArray["painting_name"] = false;
			//......

			


		}

	</script>


	<div id = "picture"><img src = "landscape.jpg"></div>
	<div id = "description"></div>
</body>
</html>