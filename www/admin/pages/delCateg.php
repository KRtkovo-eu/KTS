<?php
  if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $title = $db->QueryValue("title", "kts_categories", "id='{$id}'");
    
      if($db->Delete("kts_categories","id='{$id}'")) {
        //if($db->Delete("kts_topics","categ='{$id}'")) {
          $tproc->set("title", $title);
          $tproc->set("description", "Úspěšně smazáno");
        //}
      }
      else {
        $tproc->set("title", $title);
        $tproc->set("description", "Mazání neproběhlo úspěšně›");
      }
  }
?>