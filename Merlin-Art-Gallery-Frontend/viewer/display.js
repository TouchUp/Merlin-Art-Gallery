		

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

			//Let's get the height and width of this picture
			//by calling a function that gets the array properties 

			getHeightWidth(i);

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
				document.getElementById('description').innerHTML +=  "Painting name: " + temp;	
				
				
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
				document.getElementById('description').innerHTML += "<br>" + temp;
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

				

		function getHeightWidth(i) {

			//Some more global variables here
			CM_HEIGHT = imagearray[i][3];
			CM_WIDTH = imagearray[i][4];
			IN_HEIGHT = imagearray[i][5];
			IN_WIDTH = imagearray[i][6];

			//Let's do some conversion. Call the conversion function.
			convertInchToCm(IN_HEIGHT, IN_WIDTH);

		}

		function convertInchToCm(h,w){
			var CONV_FACTOR = 2.54;
			if (CM_HEIGHT == 0 || CM_WIDTH == 0) {
				CM_HEIGHT = IN_HEIGHT * CONV_FACTOR;
				CM_WIDTH = IN_WIDTH * CONV_FACTOR;
			}
		}

		function resize(h,w){

		}