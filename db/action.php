<?php
session_start();
include "db.php";


if(isset($_POST["addPassword"])){
    if(empty(($_SESSION["fileName"]))){$_SESSION["fileName"] = "0000000000.jpg";}
    $password1    = addslashes(strip_tags(htmlspecialchars(trim($_POST["password1"]))));
    $password2    = addslashes(strip_tags(htmlspecialchars(trim($_POST["password2"]))));
    $passwordName = addslashes(strip_tags(htmlspecialchars(trim($_POST["passwordName"]))));

    if($password1 == $password2 && strlen($passwordName) <= 11){
        
        $sifrele = $password1;
        $encrypt = 'AES-256-CBC'; //şifreleme yöntemi
        $secret_key = '14*435_33'; //şifreleme anahtarı (şifreleme keyi)
        $key = hash('sha256', $secret_key); //anahtar hash fonksiyonu ile sha256 algoritması ile şifreleniyor
        $secret_iv = '_**--.,2021'; //gerekli şifrelemeye başlama vektörü (istediğinizi yazın)
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        $sifreliMetin = openssl_encrypt($sifrele, $encrypt, $key, false, $iv);


        $password = $db->query("INSERT INTO `passwords` (`id`, `logo`, `name`, `pasword`) VALUES (NULL, '{$_SESSION["fileName"]}', '$passwordName', '$sifreliMetin');", PDO::FETCH_OBJ)->fetch();
        echo "Şifre başarı ile eklendi";
    }
}
if(isset($_POST["passwordDeleteİd"])){
    $password = $db->query("DELETE FROM `passwords` WHERE `passwords`.`id` = {$_POST["passwordDeleteİd"]}", PDO::FETCH_OBJ)->fetch();
}