<?php
$topicId = $db->QueryValue("value","kts_config","name='mainTopicID'");

$query = $db->QueryArray("title,value,date","kts_topics","id='{$topicId}'");

foreach ($query as $d) {
  require("functions/texy/texy.php");

  $texy = new Texy();

  $texy->htmlOutputModule->baseIndent  = 1;
  $texy->encoding = 'utf-8';

  $html = $texy->process($d[1]);
  
  $tproc->set("title", $d[0]);
  $tproc->set("content", $html);
  $tproc->set("date", $d[2]);
}
?>
