<?php
session_start();
include "db.php";


if(isset($_POST["addPassword"])){
    if(empty(($_SESSION["fileName"]))){$_SESSION["fileName"] = "0000000000.jpg";}
    $password1    = addslashes(strip_tags(htmlspecialchars(trim($_POST["password1"]))));
    $password2    = addslashes(strip_tags(htmlspecialchars(trim($_POST["password2"]))));
    $passwordName = addslashes(strip_tags(htmlspecialchars(trim($_POST["passwordName"]))));

    if($password1 == $password2 && strlen($passwordName) <= 11){
        //$password = $db->query("INSERT INTO `password` (`id`, `logo`, `name`, `password`) VALUES (NULL, '100', '111', 'qwrwefsdfs');", PDO::FETCH_OBJ)->fetch();
        echo "kxlvnjkv";
    }
}