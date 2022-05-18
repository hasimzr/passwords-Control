<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="css/General.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="js/index.js"></script>
    </head>
    <body>
        <div class="mother">
            <div class="photoGalery">
                <div class="imgUpload">
                    <div id="photoGaleryExit"><i class="demo-icon icon-cancel">&#xe808;</i></div>
                    <input type="file" name="resim" id="img">
                    <div onclick="imgTriger()" class="img"><img id="imgPreview" src="" /><i class="demo-icon icon-picture">&#xe807;</i></div>
                    <h3 id="h3İmgSelect">Resim Seçildi</h3>
                    <div class="uploadİmg"><input type="submit"value="Resmi Yükle"  /></div>
                    <div class="load1"><div class="load2">10%</div></div>
                </div>
                <div class="galery">
                    <li><img src="logo/instagram.icon"></li>
                    <li><img src="logo/instagram.icon"></li>
                    <li><img src="logo/instagram.icon"></li>
                    <li><img src="logo/instagram.icon"></li>
                    <li><img src="logo/instagram.icon"></li>
                    <li><img src="logo/instagram.icon"></li>
                    <li><img src="logo/instagram.icon"></li>
                    <li><img src="logo/instagram.icon"></li>
                    <li><img src="logo/instagram.icon"></li>
                    <li><img src="logo/instagram.icon"></li>
                </div>
            </div>
            <div id="alert"><h3>Şifre Kopyalandı</h3></div>
            <div id="detail1" class="app">
                <div class="head" onclick="detail(1);">
                    <div class="logo"><img src="logo/instagram.icon" ></div>
                    <h2>İnstagram</h2>
                    <i id="down1" class="demo-icon icon-down-open-1">&#xe802;</i>
                    <i id="up1" class="demo-icon icon-up-open">&#xe801;</i>
                </div>
                <div class="moreDetail">
                    <input type="password" id="password1" value="şifre" readonly>
                    <button onclick="showPasswords(1)"><i id="eye1" class="demo-icon icon-eye">&#xe800;</i></button>
                    <button onclick="copy(1)"><i class="demo-icon icon-docs">&#xf0c5;</i></button>
                    <button onclick="edit(1)"><i class="demo-icon icon-edit">&#xe804;</i></button>
                    <button><i class="demo-icon icon-trash">&#xe805;</i></button>
                </div>
            </div>
            
                <div id="edit1" class="app edit">
                    <div class="head">
                        <div class="logo"><img onclick="selectPhoto()" src="logo/instagram.icon" ></div>
                        <input type="text" value="İnstagram" class="h2" id="editname1">
                        <i id="up1" class="demo-icon icon-up-open">&#xe801;</i>
                    </div>
                    <div class="moreDetail">
                        <input type="password" id="edit1Password1" value="şifre" >
                        <input type="password" id="edit1Password2" value="şifre" >
                        <button onclick="editClose()"><i class="demo-icon icon-logout">&#xf02d;</i></button>
                        <button onclick="showPasswordsEdit(1)"><i id="eyeE1" class="demo-icon icon-eye">&#xe800;</i></button>
                        <button><i class="demo-icon icon-floppy">&#xe806;</i></button>
                    </div>
                </div>
            <div class="fakePasswordButton"></div>
            <div class="addPassword">
                <button onclick="window.location='add-passwords.php'"> ŞİFRE EKLE</button>
            </div>
        </div>
    </body>
</html>