var ZOOM = false;
//Not used 

// Get dimensions of the viewport

var VIEWPORT_W = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
var VIEWPORT_H = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);

//Get dimensions of the current image

var IMG =  document.getElementById('picture'); //doesn't work; returns null
alert(IMG);

var CURRENT_W = IMG.clientWidth;
var CURRENT_H = IMG.clientHeight;

//Get dimensions of the black bar

var INFO_BAR = document.getElementById('description'); //doesn't work; returns null

var BAR_H =  INFO_BAR.clientHeight;
var BAR_W = INFO_BAR.clientWidth;

alert(BAR_H);

// Get dimensions of the actual, usable area 

var USABLE_W = VIEWPORT_W - BAR_W;
var USABLE_H = VIEWPORT_H - BAR_H;

//Scrolling speed of image 
//Doesn't work yet

var SCROLL_SPEED = 0;

// This calls the div id 'picture'
PICTURE = document.getElementById('picture');

function sizeChecker() {
	//This function checks the size of the image
	if ((CURRENT_W < USABLE_W || CURRENT_H < USABLE_H) && ZOOM === true){
		zoomImage();
	}
	else if (CURRENT_W < USABLE_W  && CURRENT_H < USABLE_H){
			scrollImage_x();
			scrollImage_y();
			//This will scroll both simultaneously, causing diagonal scrolling (unwanted behaviour!!)			
		}
	else if (CURRENT_W < USABLE_W) {
		scrollImage_x();
	}
	else if (CURRENT_H < USABLE_H) {
		scrollImage_y();
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
	//Let's first find by how much the image overflows.
	var overflow_w = (CURRENT_W - USABLE_W);
	//Now, we translate in the positive-x axis by this overflow amount

	PICTURE.style.marginLeft = +overflow_w+ 'px';
	alert('Left margin:' + PICTURE.style.marginLeft);
	//Then we get the scrolling speed
	//document.getElementById('picture.translate_x').style.-webkit-transition = +scrollSpeed+ 's';
	//document.getElementById('picture.translate_x').style.-moz-transition = +scrollSpeed+ 's';
	//document.getElementById('picture.translate_x').style.transition = +scrollSpeed+ 's';

	//Then, let's add the css class to the div such that it starts animating
	picture.style.marginLeft.classList.add('translate_x');

}

function scrollImage_y() {
	var overflow_h = (CURRENT_H - USABLE_H);

	PICTURE.style.marginTop = +overflow_h+ 'px'; 
	alert('Top margin:' + PICTURE.style.marginTop);
	//document.getElementById('picture.translate_y').style.-webkit-transition = +scrollSpeed+ 's';
	//document.getElementById('picture.translate_y').style.-moz-transition = +scrollSpeed+ 's';
	//document.getElementById('picture.translate_y').style.transition = +scrollSpeed+ 's';

	picture.style.marginTop.classList.add('translate_y');

}