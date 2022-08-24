<?php
session_start();

if(empty($_SESSION["userİnfox1"]) & empty($_SESSION["userİnfox2"])){
    header("location:login1.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="css/add-passwoerds.css">
        <link rel="stylesheet" href="css/General.css">
        <script src="js/jquery.js"></script>
        <script src="js/add-passwords.js"></script>
        <script src="js/action.js"></script>
        <script src="js/alertx.js"></script>
    </head>
    <body>
        <div class="mother">
            <div id="alert"><h3></h3></div>
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <div onclick="window.location='index.php'" class="exit"><i class="demo-icon icon-cancel">&#xe808;</i></div>
                <div onclick="imgTriger()" class="imgUpload"><img id="imgPreview" src="" /><i class="demo-icon icon-picture">&#xe807;</i></div>
                <form action="javascript:void(0);" name="dosyayukle" id="dosyayukle" enctype="multipart/form-data">
                    <input type="file" name="dosya" id="img" />
                    <input type="submit" id="imgUploadButton" value="Resmi Yükle" />
                </form> 
                <div class="load1"><div style="background='red'" id="load2" class="load2">0%</div></div>
                <input onkeydown="NameLength()" onkeyup="NameLength()" style="margin-top: 30px;" id="appName" class="inputText" type="text" placeholder="Uygulama Adı">
                <small id="showNameLength">0/11</small>
                <br>
                <input style="margin-top: 30px;" class="inputText" id="edit1Password1" type="password" placeholder="Şifrenizi Girin">
                <input class="inputText" type="password" id="edit1Password2" placeholder="Şifrenizi Girin">
                <button onclick="showPasswordsEdit(1)"><i id="eye" class="demo-icon icon-eye">&#xe800;</i></button>

                <input class="submitButton" onclick="sumitValue()" type="submit" value="Şifre Ekle" />
            </div>
        </div>
    </body>
</html>