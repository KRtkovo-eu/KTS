<?php
require("functions/drawPage/htmltmpl.php");

function ktsComposeBlock($block,$db) {
  $tmplName = $db->QueryValue("value","kts_config","name='template'");
  # Compile or load already precompiled template.
  $manager = new TemplateManager();
  $template =& $manager->prepare("templates/{$tmplName}/{$block}.tmpl");
  $tproc = new TemplateProcessor();
  
  require("functions/drawPage/{$block}.php");
  
  # Print the processed template.
  echo $tproc->process($template);
  echo("\n");
}
?>