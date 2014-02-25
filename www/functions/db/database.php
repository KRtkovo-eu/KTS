<?php
/**************************************/
/*   KTS Database connection module   */
/*      License GNU GPL v3 2013       */
/*       Author: OndĹ™ej Kotas         */
/*    URL: http://soft.krtkovo.eu/    */
/**************************************/

class ktsDatabase {
  var $host;
  var $user;
  var $password;
  var $database;
  var $conn;
  
  function ktsDatabase($host, $user, $password, $database) {
    $this->host = $host;
    $this->user = $user;
    $this->password = $password;
    $this->database = $database;
    
    $this->conn = mysql_connect($this->host, $this->user, $this->password) or die("Database connection failed.");
    
    mysql_select_db($this->database) or die("Choosing database failed.");      
    mysql_query("SET CHARACTER SET utf8");
    mysql_query("SET NAMES 'utf8'");
    
    return $this->conn;
  }
  
    
  function Query($sql, $limitstart = 0, $limitend = -1) {   
    if ($limitend != -1) $sql .= " LIMIT $limitstart,$limitend";    
    
    return mysql_query($sql);
  }
    
    
  function QueryValue($what,$from,$cond="") {
    if($cond!="") {
      $sql = "SELECT {$what} FROM {$from} WHERE {$cond}";
    }
    else {
      $sql = "SELECT {$what} FROM {$from}";
    }
    
    $query = mysql_fetch_row($this->Query($sql));
    return $query[0];
  }
    
    
  function QueryArray($what,$from,$cond="",$order="") {
    $sql = "SELECT {$what} FROM {$from}";
  
    if($cond!="") {
      $sql .= " WHERE {$cond}";
    }
    
    if($order!="") {
      $sql .= " ORDER BY {$order} ASC";
    }
    
    $array = array(); 
    
    $query = $this->Query($sql);
    for($i=0; $i<($this->NumRows($query)); $i++) {
      array_push($array, mysql_fetch_row($query));
    }
    return $array;
  }
  
  function QueryToArray($what,$from) {
    return QueryArray($what,$from);
  }
  
  function NumRows($query) {
    return mysql_num_rows($query);
  }
  
  function Update($from,$array,$cond) {
    $sql = "UPDATE {$from} SET ";
    
    $count = count($array);
    $i=1;
    while(list($index, $content) = each($array)){
      if($i==$count) {
        $sql .= "{$index}='{$content}' ";
      }
      else {
        $sql .= "{$index}='{$content}', ";
      }
      $i++;
    }
    $sql .= "WHERE {$cond};";
    
    return $this->Query($sql);
  }
  
  function Insert($where,$heads,$values) {
    $sql = "INSERT INTO {$where}";
    
    $sql .= " (";
    foreach($heads as $elem) {
      $sql .= "{$elem}";
      if ($elem === end($heads)) {
        $sql .= ")";
      }
      else {
        $sql .= ", ";
      }
    }
    
    $sql .= " VALUES (";
    
    foreach($values as $elem) {
      $sql .= "'{$elem}'";
      if ($elem === end($values)) {
        $sql .= ")";
      }
      else {
        $sql .= ", ";
      }
    }
    
    $sql .= ";";
    
    return $this->Query($sql);
  }
  
  function Delete($from, $cond) {
    $sql = "DELETE FROM {$from} WHERE {$cond}";
    
    return $this->Query($sql);
  }
  
  function Close() {
    mysql_close($this->conn);
  }
  
  function __destruct() {
    $this->Close();
  }   

}

$db = new ktsDatabase($ktsDbHost, $ktsDbUser, $ktsDbPasswd, $ktsDbName);
?>