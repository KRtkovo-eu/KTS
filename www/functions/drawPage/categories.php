<?php
  $categId = $_GET['id'];

  $categTitle = $db->QueryValue("title","kts_categories","id='{$categId}'");
  $tproc->set("title", $categTitle);

  $topicList = $db->QueryArray("id,title","kts_topics","categ='{$categId}'");
  $topics = $tproc->loop("topics", "topicId", "topicTitle");
  foreach ($topicList as $d) {
    $topics->push($d[0], $d[1]);
  }
  $topics->commit();
?>
