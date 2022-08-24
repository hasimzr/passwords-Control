<?php
    include "db/db.php";
    session_start();

    if(empty($_SESSION["userİnfox1"]) & empty($_SESSION["userİnfox2"])){
        header("location:login1.php");
    }

?>
<!DOCTYPE html>
<html lang="tr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="css/General.css">
        <script>
                <?php  
                    $passwords = $db->query("SELECT * FROM `passwords`", PDO::FETCH_OBJ)->fetchAll();
                    $i = 0;
                    foreach($passwords as $password){  
                        $i++;
                    }
                    echo "var passwordNumberY = ".$i.";";
                ?>
        </script>
        <script src="js/jquery.js"></script>
        <script src="js/index.js"></script>
        <script src="js/appLogoUpldate.js"></script>
        <script src="js/alertx.js"></script>
    </head>
    <body>
        <div class="mother">
                    <?php
                        $appLogos = glob('logo/*');
                        $logoFileNumber = 0;
                        foreach($appLogos as $appLogo){
                            $logoFileNumber++;
                        }
                    ?>
                    <input type="hidden" id="logoFileNumber" value="<?php echo $logoFileNumber; ?>">
            <div id="alert"><h3></h3></div>
            <?php
            $passwords = $db->query("SELECT * FROM `passwords`", PDO::FETCH_OBJ)->fetchAll();
            
            $i = 0;
            foreach($passwords as $password){
                $i++;
                $sifreliMetin = $password->pasword;
                $encrypt = 'AES-256-CBC'; //şifreleme yöntemi
                $secret_key = '14*435_33'; //şifreleme anahtarı (şifreleme keyi)
                $key = hash('sha256', $secret_key); //anahtar hash fonksiyonu ile sha256 algoritması ile şifreleniyor
                
                $secret_iv = '_**--.,2021'; //gerekli şifrelemeye başlama vektörü (istediğinizi yazın)
                $iv = substr(hash('sha256', $secret_iv), 0, 16);
                
                $sifre_cozuldu = openssl_decrypt($sifreliMetin, $encrypt, $key, false, $iv);
                ?>
            <!--sdfhsdhjfnjkdsmfkdsfdsfsdf-->
            <script>
                
            $(document).ready(function () {
                $("#img<?php echo $i; ?>").change(function (e) {
                    $("#imgPreview<?php echo $i; ?>").css("border", "none"); 
                    $("#h3İmgSelect<?php echo $i; ?>").show(); 
                    $("#imgPreview<?php echo $i; ?>").show();
                    $("#uploadİmg<?php echo $i; ?>").show();
                    $("#uploadİmg<?php echo $i; ?>").css("margin-top", "0");
                    $("#imgPreview<?php echo $i; ?>").attr('src',URL.createObjectURL(e.target.files[0]));
                });
            });

            </script>
            <div id="photoGalery<?php echo $i; ?>" class="photoGalery">
                <div class="imgUpload">
                    <div onclick="photoGaleryExit(<?php echo $i; ?>)" id="photoGaleryExit"><i class="demo-icon icon-cancel">&#xe808;</i></div>
                        <form action="javascript:void(0);" name="dosyayukle"  enctype="multipart/form-data">
                            <input type="file" name="dosya" class="imgx" id="img<?php echo $i; ?>">
                            <div onclick="imgTriger(<?php echo $i; ?>)" class="img"><img class="imgPreview" id="imgPreview<?php echo $i; ?>" src="" /><i class="demo-icon icon-picture">&#xe807;</i></div>
                            <h3 class="h3İmgSelect" id="h3İmgSelect<?php echo $i; ?>">Resim Seçildi</h3>
                            <div class="uploadİmg" id="uploadİmg<?php echo $i; ?>"><input type="submit"value="Resmi Yükle"  /></div>
                        </form>
                    <div class="load1" id="load1<?php echo $i; ?>"><div id="load2<?php echo $i; ?>" class="load2">0%</div></div>
                </div>
                <div id="galery<?php echo $i; ?>" class="galery">
                    <?php
                        $appLogos = glob('logo/*');
                        $logoFileNumber = 0;
                        foreach($appLogos as $appLogo){
                            $logoFileNumber++;
                            echo "<li onclick='selectAppİcon($i, $logoFileNumber)' id='logoFileNumber".$logoFileNumber."'><img src='$appLogo'></li>";
                            echo "<input type='hidden' id='logoFileNumberid$logoFileNumber' value='$appLogo'>";
                        }
                    ?>
                </div>
            </div>
            <!--sdgdfgfdgfdgfdfdgfdg-->
            <div id="detail<?php echo $i; ?>" class="app">
                <div class="head" onclick="detail(<?php echo $i; ?>);">
                    <div class="logo"><img src="logo/<?php echo $password->logo; ?>" ></div>
                    <h2><?php echo $password->name; ?></h2>
                    <i id="down<?php echo $password->id; ?>" class="demo-icon icon-down-open-1">&#xe802;</i>
                    <i id="up<?php echo $password->id; ?>" class="demo-icon icon-up-open">&#xe801;</i>
                </div>
                <div class="moreDetail">
                    <input type="password" id="password<?php echo $password->id; ?>" value="<?php echo $sifre_cozuldu; ?>" readonly>
                    <button onclick="showPasswords(<?php echo $password->id; ?>)"><i id="eye<?php echo $password->id; ?>" class="demo-icon icon-eye">&#xe800;</i></button>
                    <button onclick="copy(<?php echo $password->id; ?>)"><i class="demo-icon icon-docs">&#xf0c5;</i></button>
                    <button onclick="edit(<?php echo $i; ?>)"><i class="demo-icon icon-edit">&#xe804;</i></button>
                    <button onclick="deletePassword(<?php echo $password->id; ?>)"><i class="demo-icon icon-trash">&#xe805;</i></button>
                </div>
            </div>
            
                <div id="edit<?php echo $i; ?>" class="app edit">
                    <div class="head">
                        <div class="logo"><img id="editLogo<?php echo $i; ?>" onclick="selectPhoto(<?php echo $i; ?>)" src="logo/<?php echo $password->logo; ?>" ></div>
                        <input type="hidden" id="logoValue<?php echo $i; ?>" value="">
                        <input onkeydown="NameLength(<?php echo $password->id; ?>)" onkeyup="NameLength(<?php echo $password->id; ?>)" type="text" value="<?php echo $password->name; ?>" class="h2" id="editname<?php echo $password->id; ?>">
                        <small class="smallNameLengh" id="showNameLength<?php echo $password->id; ?>"><?php echo strlen($password->name); ?>/11</small>
                        <i id="up<?php echo $password->id; ?>" class="demo-icon icon-up-open">&#xe801;</i>
                    </div>
                    <div class="moreDetail">
                        <input type="password" id="edit<?php echo $password->id; ?>Password1" value="<?php echo $sifre_cozuldu; ?>" >
                        <input type="password" id="edit<?php echo $password->id; ?>Password2" value="<?php echo $sifre_cozuldu; ?>" >
                        <button onclick="editClose()"><i class="demo-icon icon-logout">&#xf02d;</i></button>
                        <button onclick="showPasswordsEdit(<?php echo $password->id; ?>)"><i id="eyeE<?php echo $password->id; ?>" class="demo-icon icon-eye">&#xe800;</i></button>
                        <button onclick="changeSave(<?php echo $password->id; ?>, <?php echo $i; ?>)"><i class="demo-icon icon-floppy">&#xe806;</i></button>
                    </div>
                </div>
                <?php
            }
            
            ?>
            <div class="fakePasswordButton"></div>
            <div class="addPassword">
                <button onclick="window.location='add-passwords.php'"> ŞİFRE EKLE</button>
            </div>
        </div>
    </body>
</html>