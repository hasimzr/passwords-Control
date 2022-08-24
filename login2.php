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
                    if(isset($_POST["questionResult"])){
                        $number = $_POST["questionResult"];
                        $minusNumber = $_SESSION["rand"];
                        if($number == $minusNumber){
                            $_SESSION["userİnfox2"] = "1";
                            header("location:index.php");
                        }
                    }
                }

                $_SESSION["rand"] = rand(1, 2090);

                if(empty($_SESSION["userİnfo2"])){
                ?>
                    <div class="question">
                        <h1><?php echo $_SESSION["rand"]; ?></h1>
                        <form action="" method="post">
                            <input type="number" value="<?php echo $_SESSION["rand"]; ?>" name="questionResult"/>
                            <input type="submit" class="userSubmit" value="Giriş Yap" />
                        </form>
                    </div>
                <?php
                }
            ?>
        </div>
    </body>
</html>