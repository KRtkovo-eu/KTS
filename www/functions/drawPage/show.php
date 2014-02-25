<?php
$topicId = $_GET['tid'];


$query = $db->QueryArray("*","kts_topics","id='{$topicId}'");

foreach ($query as $d) {
  $tproc->set("title", $d[2]);
  
  require("functions/texy/texy.php");

  $texy = new Texy();

  $texy->htmlOutputModule->baseIndent  = 1;
  $texy->encoding = 'utf-8';

  $html = $texy->process($d[3]);
  
  $html = str_replace("attachment/", "attachment/{$topicId}/", $html);
  
  $tproc->set("content", $html);
  $tproc->set("date", $d[4]);
  
  if(is_dir("attachment/{$topicId}")) {
    $tproc->set("control", 1);
    $albumList = scandir("attachment/{$topicId}/");                                              
    $attachments = $tproc->loop("attachments", "title","id");
    
    for($i=0; $i<count($albumList);$i++) {
      if($albumList[$i]!="." && $albumList[$i]!="..") {
        $attachments->push($albumList[$i],$topicId);
      }
    }
    
    $attachments->commit();
  }
}
?>