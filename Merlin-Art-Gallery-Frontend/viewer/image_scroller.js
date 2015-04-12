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
    
    PICTURE.classList.remove('translate_x');
    PICTURE.classList.remove('translate_y');


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

function getCSSRule(ruleName, deleteFlag) {               // Return requested style obejct
   ruleName=ruleName.toLowerCase();                       // Convert test string to lower case.
   if (document.styleSheets) {                            // If browser can play with stylesheets
      for (var i=0; i<document.styleSheets.length; i++) { // For each stylesheet
         var styleSheet=document.styleSheets[i];          // Get the current Stylesheet
         var ii=0;                                        // Initialize subCounter.
         var cssRule=false;                               // Initialize cssRule. 
         do {                                             // For each rule in stylesheet
            if (styleSheet.cssRules) {                    // Browser uses cssRules?
               cssRule = styleSheet.cssRules[ii];         // Yes --Mozilla Style
            } else {                                      // Browser usses rules?
               cssRule = styleSheet.rules[ii];            // Yes IE style. 
            }                                             // End IE check.
            if (cssRule)  {                               // If we found a rule...
               if (cssRule.selectorText.toLowerCase()==ruleName) { //  match ruleName?
                  if (deleteFlag=='delete') {             // Yes.  Are we deleteing?
                     if (styleSheet.cssRules) {           // Yes, deleting...
                        styleSheet.deleteRule(ii);        // Delete rule, Moz Style
                     } else {                             // Still deleting.
                        styleSheet.removeRule(ii);        // Delete rule IE style.
                     }                                    // End IE check.
                     return true;                         // return true, class deleted.
                  } else {                                // found and not deleting.
                     return cssRule;                      // return the style object.
                  }                                       // End delete Check
               }                                          // End found rule name
            }                                             // end found cssRule
            ii++;                                         // Increment sub-counter
         } while (cssRule)                                // end While loop
      }                                                   // end For loop
   }                                                      // end styleSheet ability check
   return false;                                          // we found NOTHING!
}                                                         // end getCSSRule /**
/*
function killCSSRule(ruleName) {                          // Delete a CSS rule   
   return getCSSRule(ruleName,'delete');                  // just call getCSSRule w/delete flag.
}                                                         // end killCSSRule

function addCSSRule(ruleName) {                           // Create a new css rule
   if (document.styleSheets) {                            // Can browser do styleSheets?
      if (!getCSSRule(ruleName)) {                        // if rule doesn't exist...
         if (document.styleSheets[0].addRule) {           // Browser is IE?
            document.styleSheets[0].addRule(ruleName, null,0);      // Yes, add IE style
         } else {                                         // Browser is IE?
            document.styleSheets[0].insertRule(ruleName+' { }', 0); // Yes, add Moz style.
         }                                                // End browser check
      }                                                   // End already exist check.
   }                                                      // End browser ability check.
   return getCSSRule(ruleName);                           // return rule we just created.
}*/s 

function scrollImage_x() {
	console.log(PICTURE);
	//Let's first find by how much the image overflows.
	var overflow_w = (CURRENT_W - USABLE_W);
	//Now, we translate in the positive-x axis by this overflow amount

	PICTURE.style.marginLeft = +overflow_w+ 'px';
	console.log('Left margin:' + PICTURE.style.marginLeft);
    
	//Then, let's add the css class to the div such that it starts animating
    var x_rule = getCSSRule('#picture.translate_x');
    x_rule.style.marginLeft = (overflow_w * (-1)+ 50) +'px';
    x_rule.style.webkittransition = SCROLL_SPEED + 's';
    x_rule.style.transition = SCROLL_SPEED + 's'
    
	PICTURE.classList.add('translate_x');
    
    /*
	document.getElementsByClassName('translate_x')[0].style.marginLeft = (overflow_w * (-1)+ 50) +'px';
	document.getElementsByClassName('translate_x')[0].style.webkittransition = SCROLL_SPEED + 's';
	document.getElementsByClassName('translate_x')[0].style.moztransition = SCROLL_SPEED + 's';
	document.getElementsByClassName('translate_x')[0].style.transition = SCROLL_SPEED + 's';
	*/
    
				
}

function scrollImage_y() {
	console.log(PICTURE);
	var overflow_h = (CURRENT_H - USABLE_H);

	//PICTURE.style.marginTop = +overflow_h+ 'px'; 
	console.log('Top margin:' + PICTURE.style.marginTop);
    
    var y_rule = getCSSRule('#picture.translate_y');
    y_rule.style.marginLeft = (overflow_h * (-1)+ 50) +'px';
    y_rule.style.webkittransition = SCROLL_SPEED + 's';
    y_rule.style.transition = SCROLL_SPEED + 's'
    
	PICTURE.classList.add('translate_y');
    
    /*
	document.getElementsByClassName('translate_y')[0].style.marginTop = (overflow_h * -1+ 50) +'px';
	document.getElementsByClassName('translate_y')[0].style.webkittransition = SCROLL_SPEED + 's';
	document.getElementsByClassName('translate_y')[0].style.moztransition = SCROLL_SPEED + 's';
	document.getElementsByClassName('translate_y')[0].style.transition = SCROLL_SPEED + 's';
	
	//alert(overflow_h * -1);
    */

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