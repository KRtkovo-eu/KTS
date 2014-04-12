<?php
$topicId = $_GET['id'];


$query = $db->QueryArray("categ,title,value,date","kts_topics","id='{$topicId}'");

foreach ($query as $d) {
  $tproc->set("title", $d[1]);

  require("functions/texy/texy.php");

  $texy = new Texy();

  $texy->htmlOutputModule->baseIndent  = 1;
  $texy->encoding = 'utf-8';

  $html = $texy->process($d[2]);

  $html = str_replace("attachment/", "attachment/{$topicId}/", $html);

  $tproc->set("content", $html);
  $tproc->set("date", $d[3]);
}

if(is_dir("attachment/{$topicId}")) {
  $tproc->set("control", 1);
  $albumList = scandir("attachment/{$topicId}/");
  $attachments = $tproc->loop("attachment", "file", "id");

  for($i=0; $i<count($albumList);$i++) {
    if($albumList[$i]!="." && $albumList[$i]!="..") {
      $attachments->push($albumList[$i],$topicId);
    }
  }

  $attachments->commit();
}
else {
  $tproc->set("attachEnabled", 0);
}
?>

