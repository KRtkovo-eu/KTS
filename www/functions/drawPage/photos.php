<?php
$album=$_GET['album'];
$path="gallery_data/{$album}/thumbs/";


$photoList = scandir($path);

$tproc->set("album", $album);
$photos = $tproc->loop("Photos", "elem", "album");

for($i=0; $i<count($photoList);$i++) {
  if($photoList[$i]!="." && $photoList[$i]!="..") {
    $photos->push($photoList[$i], $album);
  }
}

$photos->commit();
?>