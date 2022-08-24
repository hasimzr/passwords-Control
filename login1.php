<!DOCTYPE html>
<html lang="tr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/General.css">
    </head>
    <body style="background-color: rgb(219, 219, 219);">
        <div class="mother">
            <?php
                session_start();

                if($_POST){
                    if(isset($_POST["userPassword"])){
                        $password = $_POST["userPassword"];
                        if($password == "1234"){
                            $_SESSION["userİnfox1"] = "1";
                            header("location:login2.php");
                        }
                    }
                }




                
                if(empty(($_SESSION["userİnfo1"]))){?>
                    <form action="" method="post">
                        <div  class="midle">
                            <input type="password" class="userPassword" name="userPassword" value="1234" placeholder="Şifreniz" />
                            <input type="submit" class="userSubmit" value="Giriş Yap" />
                        </div>
                    </form>
                    <?php
                }
            ?>
        </div>
    </body>
</html>