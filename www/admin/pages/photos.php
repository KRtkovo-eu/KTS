<?php
$path="../gallery_data/";

$albumList = scandir($path);

$albums = $tproc->loop("Albums", "title", "count");

for($i=0; $i<count($albumList);$i++) {
  if($albumList[$i]!="." && $albumList[$i]!="..") {
    //odecitame 3, protoze nechceme zapocitat elementy ".", "..", "thumbs" a "orig"
    $photoCount = count(scandir($path.$albumList[$i]))-4;
    $albums->push($albumList[$i], $photoCount);
  }
}

$albums->commit();
?>