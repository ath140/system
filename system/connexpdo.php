<?php
include_once("define.php");
function connexpdo($base){
    $root = USER;
    try{
      $local ="mysql:host=".HOST.";dbname=".$base;
      $dns = new PDO($local,$root,'');
    }catch(PDOException $e){
      die("connection impossible").$e->getMessage();
    }
    return $dns;
} 
?>