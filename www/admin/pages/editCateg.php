<?php
  if(isset($_POST['categ_id'])) {
    $id = $_POST['categ_id'];
    
    $title = $_POST['categ_title'];

    if($id!="new") {
      if($db->Update("kts_categories", array("title"=>$title), "id='{$id}'")) {
        $tproc->set("title", $title);
        $tproc->set("description", "Úspěšně přejmenováno.");
      }
      else {
        $tproc->set("title", $title);
        $tproc->set("description", "Přejmenování neproběhlo úspěšně›");
      }
    }
    else {
      if($db->Insert("kts_categories",array("title"), array($title))) {
        $tproc->set("title", $title);
        $tproc->set("description", "Úspěšně vytvořeno.");
      }
      else {
        $tproc->set("title", $title);
        $tproc->set("description", "Vytváření neproběhlo úspěšně›");
      }
    }
  }
?>