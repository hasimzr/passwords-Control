<?php

if($_SERVER["HTTP_HOST"] == "localhost"){
    $db = new PDO('mysql:host=localhost; dbname=passwords; charset=utf8', 'root', '');
}else{
    $db = new PDO('mysql:host=localhost; dbname=********; charset=utf8', '**********', '*********');
}

// ******* ların olduğu yere kullanıcı kendi adını girmeli