<?php
function formatURL($string) {
  $ext = substr(strrchr($string,'.'),1);
  $string = preg_replace("/\\.[^.]*$/", "", basename($string));
  $match = array("/\s+/","/[^a-zA-Z0-9\-]/","/-+/","/^-+/","/-+$/");
  $replace = array("-","","-","","");
  $string = preg_replace($match,$replace, $string);
  $string = strtolower($string);
  return $string.".".$ext;
}

if(isset($_FILES['photo'])) {
  $count=count((array)$_FILES['photo']['tmp_name']);
  
  if(isset($_POST['folder'])) {
    $id = $_POST['folder'];
    $pathAlbum = "../attachment/{$id}/";
    
    if(!(is_dir($pathAlbum))) {
      mkdir($pathAlbum);
      chmod($pathAlbum, 0777);
    }
   
    $photos = $tproc->loop("Photos", "fileName", "thumb");
    for($i=0; $i<$count; $i++) {
      $photoName = formatURL($_FILES['photo']['name'][$i]);
      $photoLocation = $pathAlbum.$photoName;
      @move_uploaded_file($_FILES['photo']['tmp_name'][$i], $photoLocation);
    }
    $photos->commit();
  }
}
?>