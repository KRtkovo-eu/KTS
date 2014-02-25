<?php  
  if(isset($_POST['passwd'])) {
    $passwd = $_POST['passwd'];
    $password = crypt($passwd);
    
    if(isset($_POST['id'])) {
      $id = $_POST['id'];
      $title = $db->QueryArray("name","kts_users","id='{$id}'");
        
      if($db->Update("kts_users",array("password"=>$password), "id='{$id}'")) {
        $tproc->set("title", $title);
        $tproc->set("description", "Úspěšně upraveno");
      }
      else {
        $tproc->set("title", $title);
        $tproc->set("description", "Upravení neproběhlo úspěšně");
      }
    }
    elseif(isset($_POST['uco']) && isset($_POST['name'])) {
      $name = $_POST['name'];
      $uco = $_POST['uco'];
      
      if($db->Insert("kts_users", array("uco", "name", "password"), array($uco, $name, $password))) {
        $tproc->set("title", $name);
        $tproc->set("description", "Úspěšně přidáno");
      }
      else {
        $tproc->set("title", $title);
        $tproc->set("description", "Přidání neproběhlo úspěšně");
      }
    }
  }
?>