<?php
session_start();


if ($_FILES["dosya"]) {
    $_SESSION["fileName"] = rand(100000000, 1000000000).".jpg";
  
    $yol = "../logo/";
    $yuklemeYeri = __DIR__ . DIRECTORY_SEPARATOR . $yol . DIRECTORY_SEPARATOR . $_SESSION["fileName"];
  
    if ( file_exists($yuklemeYeri) ) {

        echo "Dosya daha önceden yüklenmiş";
    } else {
        if ($_FILES["dosya"]["size"]  > 10000000) {

            echo "Dosya boyutu sınırı";
        } else {

            $dosyaUzantisi = pathinfo($_FILES["dosya"]["name"], PATHINFO_EXTENSION);
            if ($dosyaUzantisi != "jpg" && $dosyaUzantisi != "png" && $dosyaUzantisi != "jpeg" && $dosyaUzantisi != "ico") { # Dosya uzantı kontrolü
                echo "Desteklenmeyen dosya formatı.";
            } else {

                $sonuc = move_uploaded_file($_FILES["dosya"]["tmp_name"], $yuklemeYeri);
                echo $sonuc ? "Dosya başarıyla yüklendi ".$_SESSION["fileName"]  : "Hata oluştu";
            }
        }
    }
}else {
    echo "Lütfen bir dosya seçin";
}

?>