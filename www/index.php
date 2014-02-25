<?php
// Attaching configuration file and modules
require(".config.php");
require("functions/db/database.php");
require("functions/drawPage/drawPage.php");

$page = isset($_GET["page"]) ? $_GET["page"] : null;

if ($page) {
	if (file_exists("functions/drawPage/".basename($page).".php")) {
		$page = $page;
	}
	else {
		$page = "404";
	}
} 
else {
	$page = "main";
}

// Compose a page
ktsComposeBlock("head",$db);
ktsComposeBlock("header",$db);
ktsComposeBlock($page,$db);
ktsComposeBlock("footer",$db);


?>