		var screendiagonal = 65;
		var screenresolution = 1920;
		var z = Math.sqrt((screendiagonal*screendiagonal)/337);
		var screenwidth = z * 16;
		
		var screenheight = z * 9;
		var pixelsize = (screenwidth / screenresolution)*2.54;

		function nextPicture (){
			var width;
			var height;
			var actual_height;
			var actual_width;
			// Magic number
			var multiplier = 1.53;
			
			if (dp['showrandom'] == true){
				var loop = 0;
				var lol = 0;
				if (i == imagecount-1){
					loop = 1;
					for (a = 0; a < imagecount; a++){
						if (visited[a] == false){
							lol = a;
							break;	
						}
					}
				}
				while (loop == 0){
					lol = Math.floor( Math.random() *imagecount);
					if (visited[lol] == false){
						break;
					}
				}
				visited[lol] = true;
				imagename = imagearray[lol]['pkey'];
				width = imagearray[lol]['cmwidth'];
				height = imagearray[lol]['cmheight'];
				actual_width = width/pixelsize * multiplier;
				actual_height = height/pixelsize * multiplier;
				
				document.getElementById('picture').innerHTML =  '<img id = "image" src = "../../images/'+ imagename +'" width = '+actual_width+' height = '+actual_height+'>';
				displayInfo(); //calls the function to display related info as well

				//Let's get the height and width of this picture
				//by calling a function that gets the array properties 

				getHeightWidth(lol);
				i++;
				
				if (i >= imagecount){
					i = 0;	
					for (a = 0; a  < imagecount; a++){
						visited[a] = false;	
					}
				}
				
			}
			else{
				if (i >= imagecount-1){
					i = 0;
				}
				else{
				
					i++;
				}
				imagename = imagearray[i]['pkey'];
				width = imagearray[i]['width'];
				height = imagearray[i]['height'];
				
				actual_width = (width/pixelsize)  *multiplier;
				actual_height = (height/pixelsize)  * multiplier;
				
				document.getElementById('picture').innerHTML =  '<img id = "image" src = "../../images/'+ imagename +'" width = "'+actual_width+'px" height = "'+actual_height+'px">';
				displayInfo(); //calls the function to display related info as well

				//Let's get the height and width of this picture
				//by calling a function that gets the array properties 

				getHeightWidth(i);
			}
			

		}

		function displayInfo(){


			/* This is pseudocode 
			for (each element in dp){
				get the information of that primary key's element
				imageInfo.push;
			}
			*/
			var dptoshow = 0;
			var temp;
			
			var dphtml = '';
			dphtml += '<ul>';
			for(var j = 0; j < DISPLAYABLE.length; j++){
				if (dp[DISPLAYABLE[j]] == true){
					dphtml += '<li>';
					if(DISPLAYABLE_NAME[j]=='Height (in)'){
						temp = imagearray[i]['height'];
						temp = Math.round((temp*100)/2.54);
						temp = temp/100;
						var val = temp.toString();
					}
					else if(DISPLAYABLE_NAME[j]=='Width (in)'){
						temp = imagearray[i]['width'];
						temp = Math.round((temp*100)/2.54);
						temp = temp/100;
						var val = temp.toString();
					}
					else{
						var val = imagearray[i][DISPLAYABLE[j]].toString();
					}
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
			IN_HEIGHT = imagearray[i]['cmheight']*2.54;
			IN_WIDTH = imagearray[i]['cmwidth']*2.54;

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