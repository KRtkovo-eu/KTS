<?php
function ktsTitle($db) {
  $title=null;
  if(isset($_GET['page'])) {
    $page = $_GET['page'];
  }
  else {
    $page = "main";
  }
  $portalTitle = $db->QueryValue("value","kts_config","name='title'");

	switch($page) {
	  case 'main':
	    $title = $portalTitle;
	    break;
	    
	  case 'categories':
	    $cid = $_GET['cid'];
	    $categoryTitle = $db->QueryValue("title","kts_categories","id='{$cid}'");
	    $title = "{$categoryTitle} - {$portalTitle}";
	    break;
	    
	  case 'show':
	    $tid = $_GET['tid'];
	    $topicTitle = $db->QueryValue("title","kts_topics","id='{$tid}'");
	    $title = "{$topicTitle} - {$portalTitle}";
	    break;
	  
	  case 'gallery':
	    $title = "Fotogalerie - {$portalTitle}";
	    break;
	    
	  case 'photos':
	    $album = $_GET['album'];
	    $title = "Foto: {$album} - {$portalTitle}";
	    break;
	  
	  case 404:
	  default:
	    $title = "Soubor nenalezen - {$portalTitle}";
	    break;
	}
	
	return $title;
}
?>