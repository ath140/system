<?php
include_once("parametre.php");
try {
    $cone = "mysql:" . HOST . ";dbname=access";
    $dn = new PDO($cone, 'root', '');
} catch (PDOException $e) {
    die('pas de connection') . $e->getMessage();
}
