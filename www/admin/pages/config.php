<?php
$tproc->set("title", $db->QueryValue("value","kts_config","name='title'"));
$tproc->set("description", $db->QueryValue("value","kts_config","name='description'"));
$tproc->set("keywords", $db->QueryValue("value","kts_config","name='keywords'"));

?>
