<?php
  if(isset($_GET['tid'])) {
    $id = $_GET['tid'];
    $title = $db->QueryValue("title", "kts_topics", "id='{$id}'");
    
      if($db->Delete("kts_topics","id='{$id}'")) {
        $tproc->set("title", $title);
        $tproc->set("description", "ĂšspÄ›ĹˇnÄ› smazĂˇno");
      }
      else {
        $tproc->set("title", $title);
        $tproc->set("description", "MazĂˇnĂ­ neprobÄ›hlo ĂşspÄ›ĹˇnÄ›");
      }
  }
?>