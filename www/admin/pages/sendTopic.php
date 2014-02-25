<?php
  if(isset($_POST['id'])) {
    $id = $_POST['id'];
    
    if($id == "NEW") {
      if($db->Insert("kts_topics",array("categ", "title", "value", "date"), array("1", $_POST['title'], $_POST['content'], date("Y-m-d H:i:s")))) {
        $tproc->set("title", $_POST['title']);
        $tproc->set("description", "ĂšspÄ›ĹˇnÄ› zapsĂˇno");
      }
      else {
        $tproc->set("title", $_POST['title']);
        $tproc->set("description", "ZĂˇpis neprobÄ›hl ĂşspÄ›ĹˇnÄ›");
      }
    }
    else {
      if($db->Update("kts_topics",array("title"=>$_POST['title'], "value"=>$_POST['content'], "date"=>date("Y-m-d H:i:s")),"id='{$id}'")) {
        $tproc->set("title", $_POST['title']);
        $tproc->set("description", "ĂšspÄ›ĹˇnÄ› zaktualizovĂˇno");
      }
      else {
        $tproc->set("title", $_POST['title']);
        $tproc->set("description", "Aktualizace neprobÄ›hla ĂşspÄ›ĹˇnÄ›");
      }
    }
  }
?>