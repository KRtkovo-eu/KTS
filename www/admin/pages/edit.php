<?php
if(isset($_POST['control'])) {
  $control = $_POST['control'];
  
  if($db->Update("kts_config",array("value"=>$_POST[$control]),"name='{$control}'")) {
    $tproc->set("title", $control);
    $tproc->set("description", "Úspěšně zaktualizováno");
  }
  else {
    $tproc->set("title", $control);
    $tproc->set("description", "Aktualizace neproběhla úspěšně›");
  }
}
?>