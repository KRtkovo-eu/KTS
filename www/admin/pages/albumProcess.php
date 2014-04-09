<?php
function delete_dir($src) { 
    $dir = opendir($src);
    while(false !== ( $file = readdir($dir)) ) { 
        if (( $file != '.' ) && ( $file != '..' )) { 
            if ( is_dir($src . '/' . $file) ) { 
                delete_dir($src . '/' . $file); 
            } 
            else { 
                unlink($src . '/' . $file); 
            } 
        } 
    } 
    rmdir($src);
    closedir($dir); 
}

function formatURL($string) {
  $ext = substr(strrchr($string,'.'),1);
  $string = preg_replace("/\\.[^.]*$/", "", basename($string));
  $match = array("/\s+/","/[^a-zA-Z0-9\-]/","/-+/","/^-+/","/-+$/");
  $replace = array("-","","-","","");
  $string = preg_replace($match,$replace, $string);
  $string = strtolower($string);
  return $string.".".$ext;
}

if(isset($_GET['action'])) {
  switch($_GET['action']) {
    case "create":
      if(isset($_POST['albumTitle'])) {
        $album = $_POST['albumTitle'];
        $album = formatURL($album);
        
        if(mkdir("../gallery_data/{$album}") && chmod("../gallery_data/{$album}", 0777)) {
          if(mkdir("../gallery_data/{$album}/thumbs") && chmod("../gallery_data/{$album}/thumbs", 0777)) {
            if(mkdir("../gallery_data/{$album}/orig") && chmod("../gallery_data/{$album}/orig", 0777)) {
              $tproc->set("title", "Vytvořeno");
              $tproc->set("description", "Album {$album} úspěšně vytvořeno.");
            }
          }
        }
      }
      break;
    
    case "del":
      if(isset($_GET['album'])) {
        $album = $_GET['album'];
        delete_dir("../gallery_data/{$album}");
        $tproc->set("title", "Smazáno");
        $tproc->set("description", "Album {$album} úspěšně smazáno.");
      }
      break;
      
    case "rename":
      if(isset($_POST['albumTitle']) && isset($_GET['album'])) {
        $album = $_POST['albumTitle'];
        $albumOld = $_GET['album'];
        $album = formatURL($album);

        if((rename("../gallery_data/{$albumOld}", "../gallery_data/{$album}")) && chmod("../gallery_data/{$album}", 0777)) {
          $tproc->set("title", "PĹ™ejmenovĂˇno");
          $tproc->set("description", "Album {$album} úspěšně přejmenováno.");
        }
      }
      break;
      
    default:
      break;
  }
}
?>