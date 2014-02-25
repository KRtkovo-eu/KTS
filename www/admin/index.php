<?php
// Attaching configuration file and modules
require("../.config.php");
require("../functions/db/database.php");
require("../functions/drawPage/htmltmpl.php");

$page = isset($_GET["page"]) ? $_GET["page"] : null;

if ($page) {
	if (file_exists("pages/".basename($page).".php")) {
		$page = $page;
	}
	else {
		$page = "404";
	}
} 
else {
	$page = "config";
}

function ktsComposeBlock($block,$db) {
  # Compile or load already precompiled template.
  $manager = new TemplateManager();
  $template =& $manager->prepare("pages/{$block}.tmpl");
  $tproc = new TemplateProcessor();
  
  require("pages/{$block}.php");
  
  # Print the processed template.
  echo $tproc->process($template);
  echo("\n");
}

// Compose a page
ktsComposeBlock("head",$db);
ktsComposeBlock("header",$db);
ktsComposeBlock($page,$db);
ktsComposeBlock("footer",$db);
?>