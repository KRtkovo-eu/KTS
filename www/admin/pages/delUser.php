<?php
  if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $title = $db->QueryValue("name", "kts_users", "id='{$id}'");
    
      if($db->Delete("kts_users","id='{$id}'")) {
        $tproc->set("title", $title);
        $tproc->set("description", "ĂšspÄ›ĹˇnÄ› smazĂˇno");
      }
      else {
        $tproc->set("title", $title);
        $tproc->set("description", "MazĂˇnĂ­ neprobÄ›hlo ĂşspÄ›ĹˇnÄ›");
      }
  }
?>