"use strict";

function getDimensions() {
  var usable_w = window.innerWidth;
  var usable_h = window.innerHeight - document.getElementById("descr_wrapper").clientHeight;
  
  return([usable_w, usable_h]);
}


function display_image(actual_width, actual_height, scrolling_time){
  //Check the image and window size
  var window_w = getDimensions()[0];
  var window_h = getDimensions()[1];
  var image_x = actual_width;
  var image_y = actual_height;
  
  var dist_x = image_x - window_w;
  var dist_y = image_y - window_h;
  
  (image_x > window_w && image_y > window_h) ? scroll_x_and_y(scrolling_time, dist_x, dist_y) : 
  (image_x > window_w) ? scroll_x(scrolling_time, dist_x) : 
  (image_y > window_h) ? scroll_y(scrolling_time, dist_y) : 
  console.log("image is smaller than window");
}

function scroll_x(scrolling_time, dist_x) {
 var picture = document.getElementById('picture');
 rule.add("#picture");
 rule.prop("#picture", '-webkit-transition', scrolling_time + 's' + 'linear');
 rule.prop("#picture", '-webkit-transform', 'translate(0, 0)');
 picture.classList.add("#picture");
 
 rule.add( "#picture.translate_x");
 rule.prop("#picture.translate_x", 'left', "'dist_x ' + px");
 picture.addEventListener("transitionend", toggleTransition("picture.translate_x"), false);
 
 function toggleTransition(rule){
  if (rule.get(rule) == false) { //Rule doesn't exist
    console.log("Rule doesn't exist")
    picture.classList.add("#picture.translate_x");
  }
  else { 
    picture.classList.remove("#picture.translate_x");
  }
 }
}

function scroll_y(scrolling_time, dist_y){
 var picture = document.getElementById('picture');
 rule.add("#picture");
 rule.prop("#picture", '-webkit-transition', scrolling_time + 's' + 'linear');
 rule.prop("#picture", '-webkit-transform', 'translate(0, 0)');
  
 picture.classList.add("#picture");
 rule.add( "#picture.translate_y");
 rule.prop("#picture.translate_y", 'top', "'dist_y ' + px");
 picture.addEventListener("transitionend", toggleTransition("picture.translate_y"), false);
 
 function toggleTransition(rule){
  if ( getCSSRule(rule) == false) { //Rule doesn't exist
    console.log("Rule doesn't exist")
    picture.classList.add("#picture.translate_y");
  }
  else { 
    picture.classList.remove("#picture.translate_y");
  }
 }
}

function scroll_x_and_y (scrolling_time, dist_x, dist_y) {
}
