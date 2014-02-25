<?php
$path="gallery_data/";

$albumList = scandir($path);

$albums = $tproc->loop("Albums", "title", "thumb");

for($i=0; $i<count($albumList);$i++) {
  if($albumList[$i]!="." && $albumList[$i]!="..") {
    $thumbList = scandir($path.$albumList[$i]);
    for($g=0; $g<count($thumbList); $g++) {
      if($thumbList[$g]!="." && $thumbList[$g]!=".." && $thumbList[$g]!="thumbs" && $thumbList!="orig") {
        $albums->push($albumList[$i], $thumbList[$g]);
        break;
      }    
    }
  }
}

$albums->commit();
?>