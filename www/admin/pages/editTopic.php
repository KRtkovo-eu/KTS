<?php
if(isset($_GET['tid'])) {
  $topicId = $_GET['tid'];
  $categId = "";

  if($topicId != "NEW") {
    
    $topic = $db->QueryArray("categ,title,value","kts_topics","id='{$topicId}'");
    
    foreach ($topic as $d) {
      $tproc->set("id", $topicId);
      $categId = $d[0];
      $tproc->set("title", $d[1]);
      $tproc->set("content", $d[2]);
    }
    $tproc->set("control", "1");
    
    if(is_dir("../attachment/{$topicId}")) {
      $albumList = scandir("../attachment/{$topicId}/");                                              
      $attachments = $tproc->loop("attachments", "title");
      
      for($i=0; $i<count($albumList);$i++) {
        if($albumList[$i]!="." && $albumList[$i]!="..") {
          $attachments->push($albumList[$i]);
        }
      }
      
      $attachments->commit();
    }

  }
  else {
    $tproc->set("id", "NEW");
    $tproc->set("control", "0");
  }

  $categList = $db->QueryArray("id,title","kts_categories");
  $categs = $tproc->loop("categ", "value", "text", "checked");
  foreach ($categList as $d) {
    if($d[0]==$categId) {
      $categs->push($d[0], $d[1], TRUE);
    }
    else {
      $categs->push($d[0], $d[1], FALSE);
    }
  }
  $categs->commit();
}
?>