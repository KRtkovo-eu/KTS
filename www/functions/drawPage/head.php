<?php
$tproc->set("headDescription", $db->QueryValue("value","kts_config","name='description'"));
$tproc->set("headKeywords", $db->QueryValue("value","kts_config","name='keywords'"));

require("functions/title.php");
$page = ktsTitle($db);
$tproc->set("headTitle", $page);

$tproc->set("headTemplate", $db->QueryValue("value","kts_config","name='template'"));

?>