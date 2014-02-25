<?php
$tproc->set("title", $db->QueryValue("value","kts_config","name='title'"));
$tproc->set("description", $db->QueryValue("value","kts_config","name='description'"));
$tproc->set("keywords", $db->QueryValue("value","kts_config","name='keywords'"));

require("common.php");

$ktsNewVersion = stream_get_contents(fopen($ktsVersionURL, "r"));  
$ktsUpdateLink = stream_get_contents(fopen($ktsUpdateURL, "r"));   

if($ktsNewVersion > $ktsVersion) {
  $tproc->set("updateDiv", "available");
  $tproc->set("updateComment", "Aktualizace je k dispozici");
  $tproc->set("updateButton", "visible");
  $tproc->set("updateLink", $ktsUpdateLink);
}
elseif($ktsNewVersion == $ktsVersion) {
  $tproc->set("updateDiv", "success");
  $tproc->set("updateComment", "MĂˇte aktuĂˇlnĂ­ verzi");
  $tproc->set("updateButton", "hidden");
}
else {
  $tproc->set("updateDiv", "wrong");
  $tproc->set("updateComment", "Instalace nenĂ­ standardnĂ­");
  $tproc->set("updateButton", "visible");
  $tproc->set("updateLink", $ktsUpdateLink);
}

$tproc->set("updateVersion", $ktsNewVersion);
$tproc->set("currentVersion", $ktsVersion);
?>