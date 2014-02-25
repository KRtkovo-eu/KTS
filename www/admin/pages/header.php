<?php
if(isset($_GET['page'])) {
  $page = $_GET['page'];
}
else {
  $page = "config";
}

switch($page) {
  case "config":
  case "edit":
    $class = "config";
    $info = "Konfigurace portĂˇlu";
    break;
  
  case "topics":
  case "editTopic":
  case "sendTopic":
  case "delTopic":
  case "uploadAttach":
    $class = "topics";
    $info = "SprĂˇva pĹ™Ă­spÄ›vkĹŻ";
    break;
  
  case "photos":
  case "upload":
  case "albumProcess":
    $class = "photos";
    $info = "Fotogalerie";
    break;
    
  case "users":
  case "editUsers":
  case "delUser":
    $class = "users";
    $info = "SprĂˇva uĹľivatelĹŻ";
    break;
      
  case "404":
  default:
    $class = "error";
    $info = "Chyba";
    break;
}

$tproc->set("class",$class);
$tproc->set("info",$info);
?>