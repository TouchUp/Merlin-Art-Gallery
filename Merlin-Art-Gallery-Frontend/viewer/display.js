		

		function nextPicture (){
			
			if (i >= imagecount-1){
				i = 0;
			}
			else{
				
				i++;
			}
			imagepath = imagearray[i]['flocation'];
			imagename = imagearray[i]['fname'];
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
			
			var dphtml = '';
			dphtml += '<ul>';
			for(var j = 0; j < DISPLAYABLE.length; j++){
				if (boolArray[DISPLAYABLE[j]] == 1){
					dphtml += '<li>';
					var val = imagearray[i][DISPLAYABLE[j]].toString();
					if(DISPLAYABLE_NAME[j] == 'NONE'){
						dphtml += val;
					}
					else{
						dphtml += DISPLAYABLE_NAME[j] + ': ' + val;
					}
					dphtml += '</li>';
				}
			}
			dphtml += '</ul>';
			document.getElementById('description').innerHTML = dphtml;


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
			CM_HEIGHT = imagearray[i]['cmheight'];
			CM_WIDTH = imagearray[i]['cmwidth'];
			IN_HEIGHT = imagearray[i]['inheight'];
			IN_WIDTH = imagearray[i]['inwidth'];

			//Let's do some conversion. Call the conversion function.
			convertInchToCm(IN_HEIGHT, IN_WIDTH);

		}

		function convertInchToCm(h,w){
			var conv_factor = 2.54;
			if (CM_HEIGHT == 0 || CM_WIDTH == 0) {
				CM_HEIGHT = IN_HEIGHT * conv_factor;
				CM_WIDTH = IN_WIDTH * conv_factor;
			}
		}

		function resize(h,w){

		}