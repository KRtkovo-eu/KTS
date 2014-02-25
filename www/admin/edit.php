<?php
require("../.config.php");
require("../functions/db/database.php");

if(isset($_POST['control'])) {
  if($_POST['control']=="edit") {
    $topicId = $_POST['topicId'];
    $topicTitle = $_POST['title'];
    $topicContent = $_POST['content'];
    
    echo $db->Update("kts_topics",array("title"=>$topicTitle, "value"=>$topicContent, "date"=>date("j.n.Y H:i:s")),"id='{$topicId}'");
  }
}

if(isset($_GET['tid'])) {
  $topicId = $_GET['tid'];
  $query = $db->QueryArray("*","kts_topics","id='{$topicId}'");
  
  foreach ($query as $d) {
    echo("<h1>Ăšprava ÄŤlĂˇnku: {$d[2]}</h1>\n");
    
    echo("<form method=\"post\" action=\"edit.php?tid={$topicId}\">\n");
    echo("NĂˇzev: <input type=\"text\" name=\"title\" value=\"{$d[2]}\" /><br />\n");
    echo("Obsah:");
    echo("<textarea name=\"content\">{$d[3]}</textarea>\n");
    echo("<input type=\"hidden\" name=\"topicId\" value=\"{$topicId}\" />\n");
    echo("<input type=\"hidden\" name=\"control\" value=\"edit\" />\n");
    echo("<input type=\"submit\" value=\"Aktualizuj\" />\n");
  }
}
?>