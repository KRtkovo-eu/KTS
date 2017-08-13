<?php
$tproc->set("headTemplate", $db->QueryValue("value","kts_config","name='template'"));

$categList = $db->QueryArray("id,title","kts_categories");
$categs = $tproc->loop("Categories", "categId", "categName");
foreach ($categList as $d) {
  $categs->push($d[0], $d[1]);
}
$categs->commit();
?>
