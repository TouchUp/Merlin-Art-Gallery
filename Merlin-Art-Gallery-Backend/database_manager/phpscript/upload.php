<?php
	function makeThumbnails($updir, $id){
    	$thumbnail_width = 200;
   		$thumbnail_height = 200;
    	$thumb_beforeword = "thumb";
    	$arr_image_details = getimagesize("$updir" . $id); // pass id to thumb name
    	$original_width = $arr_image_details[0];
    	$original_height = $arr_image_details[1];
    	if ($original_width > $original_height) {
       		$new_width = $thumbnail_width;
        	$new_height = intval($original_height * $new_width / $original_width);
    	} else {
       		$new_height = $thumbnail_height;
        	$new_width = intval($original_width * $new_height / $original_height);
    	}
    	$dest_x = intval(($thumbnail_width - $new_width) / 2);
    	$dest_y = intval(($thumbnail_height - $new_height) / 2);
		$imgcreatefrom = "ImageCreateFromString";
		$imgt = "ImageJPEG";
    	if ($arr_image_details[2] == 1) {
        	$imgt = "ImageGIF";
        	$imgcreatefrom = "ImageCreateFromGIF";
    	}
    	if ($arr_image_details[2] == 2) {
       		$imgt = "ImageJPEG";
        	$imgcreatefrom = "ImageCreateFromJPEG";
    	}
    	if ($arr_image_details[2] == 3) {
        	$imgt = "ImagePNG";
        	$imgcreatefrom = "ImageCreateFromPNG";
    	}
    	if ($imgt) {
        	$old_image = $imgcreatefrom("$updir" . $id );
        	$new_image = imagecreatetruecolor($thumbnail_width, $thumbnail_height);
        	imagecopyresized($new_image, $old_image, $dest_x, $dest_y, 0, 0, $new_width, $new_height, $original_width, $original_height);
        	$imgt($new_image, "$updir" . $id . '_' . "$thumb_beforeword" );
    	}
	}
	
	$mysqli = mysqli_connect("localhost", "root", "", "imageserver");
	if ($mysqli->connect_errno){
		printf('I cannot connect to the database  because: ' . $mysqli->connect_error);
		exit();
	}
	
	$fileName = $_FILES['image']['name'];
	$fileType = $_FILES['image']['type'];
	$pkey = $_REQUEST['pkey'];
	$tmpName  = $_FILES['image']['tmp_name'];
	$fileSize = $_FILES['image']['size'];
	$location = "../../../images/";
	$ext = pathinfo($fileName, PATHINFO_EXTENSION);
	echo 'tmpName';
	
	if(move_uploaded_file($tmpName,$location.$pkey)){
		makeThumbnails($location,$pkey);
		
	}
	else{
		echo 'fail';	
	}
	
	
?>