'use strict';
var temp;
var intervalnumber = 0;
var current_y = 0;
var current_x = 0;
var speed = 1;
var scrolling_interval;
var init= 0;
function getDimensions() {
  var usable_w = window.innerWidth;
  var usable_h = window.innerHeight - document.getElementById("descr_wrapper").clientHeight;
  
  return([usable_w, usable_h]);
}


function display_image(actual_width, actual_height, scrolling_time){
  clearInterval (temp);
  
  //Check the image and window size
  var window_w = getDimensions()[0];
  var window_h = getDimensions()[1];
  //console.log ("Window width : "+ window_w);
  //console.log ("Window height : "+ window_h)
  var image_x = actual_width;
  var image_y = actual_height;
  
    
  var maxy = document.getElementById('picture').scrollHeight;
  var maxx = document.getElementById('picture').scrollWidth;
   
  speed = 1;
  var dist_x = image_x - window_w;
  var dist_y = image_y - window_h;
    //console.log ("Maxy : " + maxy);
  //console.log ("Scroll distance x : " + dist_x);
  //console.log ("Scroll distance y : " + dist_y);
  //(image_x > window_w && image_y > window_h) ? scroll_x_and_y(scrolling_time, dist_x, dist_y) : 
  //(image_x > window_w) ? scroll_x(scrolling_time, dist_x) : 
  intervalnumber ++;
  if (image_y > window_h && image_x > window_w){
      console.log ("Image exceeds both dimensions");
      document.getElementById('picture').style['align-items'] = "center";
      document.getElementById('picture').style['justify-content'] = "center";
      document.getElementById('image').style['width'] = "auto";
      document.getElementById('image').style['height'] = "auto";
      document.getElementById('image').style['max-width'] = "100%";
      document.getElementById('image').style['max-height'] = "100%";
  }
  else if (image_y > window_h){
      clearInterval (temp);
      current_y = 0;
      scrolling_interval = Math.round((scrolling_time*1000)/dist_y); 
      
      document.getElementById('picture').style['align-items'] = "flex-start";
      document.getElementById('picture').style['justify-content'] = "center";
      console.log ("Scrolling_interval : " + scrolling_interval);
      temp = setInterval(
          function(){
            scroll_y(dist_y,intervalnumber)
          }
          
          ,scrolling_interval);
  }
  else if (image_x > window_w){
      clearInterval (temp); 
      current_x = 0;
      document.getElementById('picture').style['align-items'] = "center";
      document.getElementById('picture').style['justify-content'] = "flex-start";
      scrolling_interval = Math.round((scrolling_time*1000)/dist_x); 
      temp = setInterval(
          function(){
            scroll_x(dist_x,intervalnumber)
          }
          
          ,scrolling_interval);
  }
  else{
      document.getElementById('picture').style['align-items'] = "center";
      document.getElementById('picture').style['justify-content'] = "center";
  }
  
}





function scroll_y(dist_y, intvnumber){
    //console.log("Runnning interval number : "+intvnumber);
    //console.log("Current Y : "+current_y);

  
    var picture1 = document.getElementById('picture');
    //console.log ("Max Scroll height : "+ picture1.scrollHeight);
    //console.log ("Current scroll height : " + picture1.scrollTop);
    if (picture1.scrollTop + 468 > picture1.scrollHeight){
        //console.log("Interval number : "+intvnumber);
        //console.log('has reached maximum, reversing');
        speed = speed * -1; //Reverses the scrolling direction
        //picture1.scrollTop += speed;
    }
    else if (picture1.scrollTop < 1) {
        //console.log("Interval number : "+intvnumber);
        //console.log('have overshot, reversing');
        speed = speed * -1;
        //picture1.scrollTop += speed;
    }
    //console.log(current_y, picture1.scrollTop);
    picture1.scrollTop += speed; 
}

function scroll_x(dist_x, intvnumber){
    //console.log("Runnning interval number : "+intvnumber);
    //console.log("Current Y : "+current_x);

  
    var picture1 = document.getElementById('picture');
    console.log ("Max Scroll width : "+ picture1.scrollWidth);
    console.log ("Current scroll width : " + picture1.scrollLeft);
    //Add your screen width
    if (picture1.scrollLeft + 1366 >= picture1.scrollWidth){
        console.log("Interval number : "+intvnumber);
        console.log('has reached maximum, reversing');
        speed = speed * -1; //Reverses the scrolling direction
        //picture1.scrollLeft += speed;
    }
    else if (picture1.scrollLeft < 1) {
        //console.log("Interval number : "+intvnumber);
        //console.log('have overshot, reversing');
        speed = speed * -1;
        //picture1.scrollLeft += speed;
    }
    //console.log(current_x, picture1.scrollLeft);
    picture1.scrollLeft += speed; 
}