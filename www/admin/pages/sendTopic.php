<?php
  if(isset($_POST['id'])) {
    $id = $_POST['id'];
    
    if($id == "NEW") {
      if($db->Insert("kts_topics",array("categ", "title", "value", "date"), array($_POST['categ'], $_POST['title'], $_POST['content'], date("Y-m-d H:i:s")))) {
        $tproc->set("title", $_POST['title']);
        $tproc->set("description", "Úspěšně zapsáno");
      }
      else {
        $tproc->set("title", $_POST['title']);
        $tproc->set("description", "Zápis neproběhl úspěšně");
      }
    }
    else {
      if($db->Update("kts_topics",array("categ"=>$_POST['categ'], "title"=>$_POST['title'], "value"=>$_POST['content'], "date"=>date("Y-m-d H:i:s")),"id='{$id}'")) {
        $tproc->set("title", $_POST['title']);
        $tproc->set("description", "Úspěšně zaktualizováno");
      }
      else {
        $tproc->set("title", $_POST['title']);
        $tproc->set("description", "Aktualizace neproběhla úspěšně");
      }
    }
  }
?>