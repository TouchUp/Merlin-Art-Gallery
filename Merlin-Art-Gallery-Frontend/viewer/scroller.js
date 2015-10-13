/* Display Code */
//The following set of functions should take in an image_array Array variable.
//Some other variables: info_array (denotes what info to show),
//transition_time, scrolling_time, randomise (a Boolean), and so on

// if randomize is true, shuffle the image_array.
// transition_time and scrolling_time are also separate variables


// There should be a display_image that is called after every set_timeout
// And an "array_handler"?? or something 

/*I don't want transition_time and scrolling_time to be global variables.
  We should obtain them from the get_settings function */
  
function get_settings(settings_array){
  //The settings array should have everything
  //Extract these critical values: 
  //transition_time;
  //scrolling_speed;
  //randomise;
  //and lastly, the rest of the values to be shown
  //Maybe it is better to have key-value pairs rather than array
  //Depends on the PHP code.
}
  
function shuffle(image_array) {
  return(image_array.shuffle);
}

//The following function takes in an image_array, and handles the showing of each individual image.
// display_image should take ONE image only.
// Parameters of display_image: image, scrolling_time, info_array.

function display(image_array, transition_time, scrolling_time) {
  if (randomise === true) {
    image_array = shuffle(image_array);
  }
  setInterval(function(){display_image(image, scrolling_time, info_array);}, transition_time);
}

function display_image(image, scrolling_time, info_array){
  //Check the image and window size
  (image-x > window-x && image-y > window-y) ? scroll_x_and_y() : image-x > window-x ? scroll_x() : (image-y > window-y) ? scroll_y() : console.log("image is smaller than window");
}

/* Scrolling Code */
// Rules 
// Variables: window-x, window-y (What if the window is suddenly resized?)
// Variables: scrolling speed as well.
// When an image is loaded, the image dimensions are checked. 
// If the image-x exceeds window-x, mark it as follows;
// If image-y exceeds window-y, mark it as follows.

//Scrolling Code when both image-x and image-y exceed the boundaries
//If image-y and image-x both overflow: (TYPEWRITER movement)
// 1. Place the image all the way to the left-top corner. 
// 2. scroll image-x until the right bound is reached.
// 3. Return to original image-x position
// 4. Go down one screen of window-y
// 5. Repeat 2, 3

//The following function should take in an image variable

function new_image(image) {
  return (image-x, image-y);
}

function scroll_x(image) {
}

function scroll_y(image){
}

function scroll_x_and_y (image) {
}

//If random-order is selected, shuffle the array of images