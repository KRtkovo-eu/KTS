<?php
require("functions/core.php");

$update = strtotime($db->QueryValue("MAX(date)","kts_topics"));

$dayName = cesky_den(date("w",$update));
$day = date("j", $update);
$month = cesky_mesic(date("n", $update));
$year = date("Y", $update);
$count = floor((time() - $update)/86400);

$tproc->set("headTemplate", $db->QueryValue("value","kts_config","name='template'"));
$tproc->set("ktsVersion", $db->QueryValue("value","kts_config","name='version'"));
$tproc->set("update", "{$dayName} {$day}. {$month} {$year}");
$tproc->set("count", $count);
?>
