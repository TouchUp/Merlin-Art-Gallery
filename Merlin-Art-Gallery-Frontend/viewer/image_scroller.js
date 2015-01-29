var zoom = false;
//Not used 

// Get dimensions of the viewport

var viewport_w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
var viewport_h = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);

//Get dimensions of the current image

var img =  document.getElementById('picture'); //doesn't work; returns null
alert(img);

var current_w = img.clientWidth;
var current_h = img.clientHeight;

//Get dimensions of the black bar

var info_bar = document.getElementById('description'); //doesn't work; returns null

var bar_h =  info_bar.clientHeight;
var bar_w = info_bar.clientWidth;

alert(bar_h);

// Get dimensions of the actual, usable area 

var usable_w = viewport_w - bar_w;
var usable_h = viewport_h - bar_h;

//Alternative functionality to zoom in and out the image

function sizeChecker() {
	//This function checks the size of the image
	if ((current_w < usable_w || current_h < usable_h) && zoom === true){
		zoomImage();
	}
	else if (current_w < usable_w  && current_h < usable_h){
			scrollImage_x();
			scrollImage_y();
			//This will scroll both simultaneously, causing diagonal scrolling (unwanted behaviour!!)			
		}
	else if (current_w < usable_w) {
		scrollImage_x();
	}
	else if (current_h < usable_h) {
		scrollImage_y();
	}
}

function zoomImage() {
	/* How much to zoom? The following piece of code 
	obtains the ratio of container to image, then scales it appropriately 
	by that amount */
	var toZoom_x = (usable_w / current_w);
	var toZoom_y = (usable_h / current_h);
}

function scrollImage_x() {
	//Let's first find by how much the image overflows.
	var overflow_w = (current_w - usable_w);
	//Now, we translate in the positive-x axis by this overflow amount
	document.getElementById('picture').style.marginLeft = overflow_w;

}

function scrollImage_y() {
	var overflow_h = (current_h - usable_h);
	document.getElementById('picture').style.marginTop = overflow_h;

}