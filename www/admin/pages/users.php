<?php
  if(isset($_GET['order'])) {
    $order = $_GET['order'];
  }
  else {
    $order = "id";
  }
  
  $tproc->set("order",$order);
  
  $userList = $db->QueryArray("id,uco,name","kts_users",null,$order);
  $users = $tproc->loop("Users", "userId", "userUco", "userName");
  foreach ($userList as $d) {    
    $users->push($d[0], $d[1], $d[2]);
  }
  $users->commit();

//$password = crypt($clearTextPassword, base64_encode($clearTextPassword));
//echo $password;
?>