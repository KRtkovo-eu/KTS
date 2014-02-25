<?php
  require("../functions/core.php");
  
  if(isset($_GET['order'])) {
    $order = $_GET['order'];
  }
  else {
    $order = "id";
  }
  
  $tproc->set("order",$order);
  
  $topicList = $db->QueryArray("id,categ,title,date","kts_topics",null,$order);
  $topics = $tproc->loop("Topics", "topicId", "topicCateg", "topicTitle", "topicDate");
  foreach ($topicList as $d) {
    $date = strtotime($d[3]);
    
    $dayName = cesky_den(date("w",$date));
    $day = date("j", $date);
    $month = cesky_mesic(date("n", $date));
    $year = date("Y", $date);
    $time = date("H:i:s", $date);
    
    $categTitle = $db->QueryValue("title","kts_categories","id='{$d[1]}'");
    
    $topics->push($d[0], $categTitle, $d[2], "{$dayName} {$day}. {$month} {$year} - {$time}");
  }
  $topics->commit();
?>