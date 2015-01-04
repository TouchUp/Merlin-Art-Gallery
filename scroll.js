var picArray = new Array;
picArray = {1, 2, 3, 4, 5, "six", "seven"};

interval = 0;

//increments the picture 

function nextPicture (i){
	for (i <= picArray.length){
		i++;
		//sets x to be the file name in the array
		x = picArray[i];
		alert(x);
		document.getElementById("picture").innerHTML = "<img src ='"  + picArray[i] + ".jpg'>";
	}
}