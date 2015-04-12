var ZOOM = false;
//Not used 

// Get dimensions of the viewport

var VIEWPORT_W = (window.innerWidth);
var VIEWPORT_H = window.innerHeight;
//var VIEWPORT_H = Math.max(document.documentElement.clientHeight, window.innerHeight);
console.log(VIEWPORT_W, VIEWPORT_H);


//Get dimensions of the current image
//alert(IMG);

var CURRENT_W;
var CURRENT_H;

var PICTURE;

//Get dimensions of the black bar

//var INFO_BAR = document.getElementById("description"); //doesn't work; returns null

var BAR_H =  document.getElementById("descr_wrapper").clientHeight;
var BAR_W = document.getElementById("descr_wrapper").clientWidth;


// Get dimensions of the actual, usable area 

var USABLE_W = VIEWPORT_W;
var USABLE_H = (VIEWPORT_H - BAR_H);

console.log("usable:", USABLE_W, USABLE_H);

//Scrolling speed of image 
//Doesn't work yet

var SCROLL_SPEED = 3;

// This calls the div id 'picture'


function sizeChecker() {
	//This function checks the size of the image
	PICTURE = document.getElementById('picture');
	//First, reset all animation classes 	

	if ((CURRENT_W > USABLE_W || CURRENT_H > USABLE_H) && ZOOM === true){
		zoomImage();
	}
	else if (CURRENT_W < USABLE_W  && CURRENT_H < USABLE_H){
			//scrollImage_x();
			//scrollImage_y();
			//This will scroll both simultaneously, causing diagonal scrolling (unwanted behaviour!!)			
		}
	else if (CURRENT_W > USABLE_W) {
		scrollImage_x();
	}
	else if (CURRENT_H > USABLE_H) {
		scrollImage_y();
	}
	else {
	}
}

function zoomImage() {
	/* How much to zoom? The following piece of code 
	obtains the ratio of container to image, then scales it appropriately 
	by that amount */
	var toZoom_x = (USABLE_W / CURRENT_W);
	var toZoom_y = (USABLE_H / CURRENT_H);
}

function scrollImage_x() {
	console.log(PICTURE);
	//Let's first find by how much the image overflows.
	var overflow_w = (CURRENT_W - USABLE_W);
	//Now, we translate in the positive-x axis by this overflow amount

	PICTURE.style.marginLeft = +overflow_w+ 'px';
	console.log('Left margin:' + PICTURE.style.marginLeft);
	//Then we get the scrolling speed
	//Then, let's add the css class to the div such that it starts animating
	PICTURE.classList.add('translate_x');
	document.getElementsByClassName('translate_x')[0].style.marginLeft = (overflow_w * (-1)+ 50) +'px';
	document.getElementsByClassName('translate_x')[0].style.webkittransition = SCROLL_SPEED + 's';
	document.getElementsByClassName('translate_x')[0].style.moztransition = SCROLL_SPEED + 's';
	document.getElementsByClassName('translate_x')[0].style.transition = SCROLL_SPEED + 's';
	PICTURE.classList.remove('translate_x');
				
}

function scrollImage_y() {
	console.log(PICTURE);
	var overflow_h = (CURRENT_H - USABLE_H);

	//PICTURE.style.marginTop = +overflow_h+ 'px'; 
	console.log('Top margin:' + PICTURE.style.marginTop);
	
	PICTURE.classList.add('translate_y');
	document.getElementsByClassName('translate_y')[0].style.marginTop = (overflow_h * -1+ 50) +'px';
	document.getElementsByClassName('translate_y')[0].style.webkittransition = SCROLL_SPEED + 's';
	document.getElementsByClassName('translate_y')[0].style.moztransition = SCROLL_SPEED + 's';
	document.getElementsByClassName('translate_y')[0].style.transition = SCROLL_SPEED + 's';
	
	//alert(overflow_h * -1);
	PICTURE.classList.remove('translate_y');

}

function changeImagePosition(){
	
	CURRENT_W =  document.getElementById("image").clientWidth;
	CURRENT_H = document.getElementById("image").clientHeight;
	
	//alert(VIEWPORT_W);
	
	if (CURRENT_W >= USABLE_W){
		document.getElementById("picture").style.textAlign = "left";
		
	}
	else{
		document.getElementById("picture").style.textAlign = "center";
	}
	if (CURRENT_H < USABLE_H){
		document.getElementById("picture").style.marginTop = ((((USABLE_H-CURRENT_H)/USABLE_H)*(50/1.5))) + "vh";	
	}
	else{
		document.getElementById("picture").style.marginTop = 0;	
	}
	
}