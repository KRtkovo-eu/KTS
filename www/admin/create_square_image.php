<?php
function create_square_image($source,$dest,$size=150) {
  $length = null;
  $x = null;
  $y = null;
  
  
  $image_save_dir = $dest;
  $image_filename = substr(md5(microtime()),0,$length)."jpg";
  $thumb_size = $size;
  $size = getimagesize($source);
  $width = $size[0];
  $height = $size[1];
     if($width> $height) {
  $x = ceil(($width - $height) / 2 );
  $width = $height;
     } elseif($height> $width) {
  $y = ceil(($height - $width) / 2);
  $height = $width;
     }
  $new_im = ImageCreatetruecolor($thumb_size,$thumb_size);
  $im = imagecreatefromjpeg($source);
  imagecopyresampled($new_im,$im,0,0,$x,$y,$thumb_size,$thumb_size,$width,$height);
  imagejpeg($new_im,$image_save_dir,100);
}


function resize_image($file,$backupfile) {
  copy($file, $backupfile);
  
	list($width, $height)=getimagesize($file);

	if($width>$height) {
		$new_width=640;
		$new_height=$height/($width/$new_width);
  } else {
		$new_height=640;
		$new_width=$width/($height/$new_height);
	}
    
    # Get new sizes
    if (!is_numeric($new_width))
        unset($new_width);
    
    if (!is_numeric($new_height))
        unset($new_height);
    
    if (isset($new_width) && !isset($new_height))
    {
        $newwidth=$new_width;
        $newheight=$new_width/$width*$height;
    }
    else if (isset($new_height) && !isset($new_width))
    {
        $newheight=$new_height;
        $newwidth=$new_height/$height*$width;
    }
    else if (isset($new_width) && isset($new_height))
    {
        $newwidth=$new_width;
        $newheight=$new_height;
    }
    else
    {
        $newwidth=$width;
        $newheight=$height;
    }

    # Load image
      $source=imagecreatefromjpeg($file); $content_type="image/jpeg";
    
    # New image
    if(function_exists("imagecreatetruecolor"))
        $thumb=imagecreatetruecolor($newwidth, $newheight);
    else
        $thumb=imagecreate($newwidth, $newheight);

    # Resize image
    imagecopyresampled($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);


    if ($newwidth==$width && $newheight==$newheight)
        readfile($file);
    else
    {
        imagejpeg($thumb, $file, 95);
    }
    return 1;
}
?>
