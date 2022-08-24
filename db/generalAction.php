<?php
include "db.php";






if(isset($_POST["totalİcon"])){
    $appLogos = glob('../logo/*');
    $logoFileNumber = 0;
    foreach($appLogos as $appLogo){
        $logoFileNumber++;
        if($_POST["id"] == $logoFileNumber){
            echo "<li style=' filter: grayscale(100%);' onclick='selectAppİcon({$_POST["totalİcon"]}, $logoFileNumber)' id='logoFileNumber".$logoFileNumber."'><img src='passwords-Control/$appLogo'></li>";
        }else{
            echo "<li onclick='selectAppİcon({$_POST["totalİcon"]}, $logoFileNumber)' id='logoFileNumber".$logoFileNumber."'><img src='passwords-Control/$appLogo'></li>";
        }
        $bolunmus = explode("/", $appLogo);
        echo "<input type='hidden' id='logoFileNumberid$logoFileNumber' value='logo/$bolunmus[2]'>";
    }
}





if(isset($_POST["fileName"])){
    $appLogos = glob('../logo/*');
    $logoFileNumber = 0;
    foreach($appLogos as $appLogo){
        $logoFileNumber++;
        if("../logo/".$_POST["fileName"] == $appLogo){
            echo "<li style=' filter: grayscale(100%);' onclick='selectAppİcon({$_POST["totalİconx"]}, $logoFileNumber)' id='logoFileNumber".$logoFileNumber."'><img src='passwords-Control/$appLogo'></li>";
        }else{
            echo "<li onclick='selectAppİcon({$_POST["totalİconx"]}, $logoFileNumber)' id='logoFileNumber".$logoFileNumber."'><img src='passwords-Control/$appLogo'></li>";
        }
        $bolunmus = explode("/", $appLogo);
        echo "<input type='hidden' id='logoFileNumberid$logoFileNumber' value='logo/$bolunmus[2]'>";
    }
}







if(isset($_POST["editname"])){
    $id        = addslashes(strip_tags(htmlspecialchars(trim($_POST["id"]))));
    $editname  = addslashes(strip_tags(htmlspecialchars(trim($_POST["editname"]))));
    $password1 = addslashes(strip_tags(htmlspecialchars(trim($_POST["password1"]))));
    $password2 = addslashes(strip_tags(htmlspecialchars(trim($_POST["password2"]))));

    if(strlen($_POST["logoValue"]) == 0){
        $logoValue = "0.jpg";
    }else{
        $logoValue = addslashes(strip_tags(htmlspecialchars(trim($_POST["logoValue"]))));
        $logoValue = explode("/", $logoValue);
    }

    if($password1 == $password2 && strlen($editname) <= 11){
        
        $sifrele = $password1;
        $encrypt = 'AES-256-CBC'; //şifreleme yöntemi
        $secret_key = '14*435_33'; //şifreleme anahtarı (şifreleme keyi)
        $key = hash('sha256', $secret_key); //anahtar hash fonksiyonu ile sha256 algoritması ile şifreleniyor
        $secret_iv = '_**--.,2021'; //gerekli şifrelemeye başlama vektörü (istediğinizi yazın)
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        $sifreliMetin = openssl_encrypt($sifrele, $encrypt, $key, false, $iv);


        $password = $db->query("UPDATE `passwords` SET `logo` = '{$logoValue[1]}', `name` = '$editname', `pasword` = '$sifreliMetin' WHERE `passwords`.`id` = $id;", PDO::FETCH_OBJ)->fetch();
        echo "Şifre başarı ile güncellendi";
    }
}