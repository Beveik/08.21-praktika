<?php
require_once("connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prisijungimas</title>

    <?php require_once("includes.php");

    ?>
    <style>
        h1 {
            text-align: center;
        }

        .container {

            position: absolute;
            top: 50%;
            left: 50%;
            transform: translateY(-50%) translateX(-50%);
        }

        .button.btn.btn-primary {
            float: left;
            margin-right: auto;
        }

        /* .form-group {
            float: left;
            margin-left: 330px;
        } */
        .jungtis {
            float: left;
            margin-top: 35px;
            margin-left: -230px;
        }

        .alert.alert-success,
        .alert.alert-danger {
            margin-top: 8rem;

        }

        .form-group {
            float: left;
            margin-left: 330px;
        }
    </style>
</head>

<body>

    <?php
    if (isset($_POST["submit"])) {
        if (isset($_POST["slapyvardis"]) && isset($_POST["slaptazodis"]) && !empty($_POST["slapyvardis"]) && !empty($_POST["slaptazodis"])) {
            $slapyvardis = $_POST["slapyvardis"];
            $slaptazodis = $_POST["slaptazodis"];


            $sql = "SELECT * FROM `vartotojai` WHERE slapyvardis='$slapyvardis' AND slaptazodis='$slaptazodis'";
            $result = $prisijungimas->query($sql);

            if ($result->num_rows == 1) {

                $user_info = mysqli_fetch_array($result);
                // var_dump($user_info);
                $cookie_array = array(
                    $user_info["ID"],
                    $user_info["slapyvardis"],
                    $user_info["slaptazodis"],
                    $user_info["teises_id"]
                );
                $cookie_array = implode("|", $cookie_array);
                setcookie("prisijungta", $cookie_array, time() + 36000, "/");
                header("Location: klientai.php");
                $sql =  "UPDATE `vartotojai` SET `paskutinis_prisijungimas`=now() WHERE slapyvardis='$slapyvardis' AND slaptazodis='$slaptazodis'";
                $result = $prisijungimas->query($sql);
            } else {
                $message = "Neteisingi prisijungimo duomenys.";
            }
        } else {
            $message = "Laukeliai yra tušti arba duomenys neteisingi.";
        }
    }


    ?>
    <?php
    if (!isset($_COOKIE["prisijungta"])) { ?>
        <div class="container">
            <h1>Klientų valdymo sistema</h1>
            <br>
            <form action="index.php" method="post">
                <div class="form-group">
                    <label for="slapyvardis">Slapyvardis</label>
                    <input type="text" name="slapyvardis" />
                </div>
                <div class="form-group">
                    <label for="slaptazodis">Slaptažodis</label>
                    <input type="password" name="slaptazodis" />
                </div>
                <div class="jungtis">
                    <button class="btn btn-primary" type="submit" name="submit">Prisijungti</button>

                    <button class="btn btn-primary" type="submit" name="create"><a class='mygt' href='registracija.php'>Užsiregistruoti</button>
                </div>
            </form>
            <?php
            if (isset($message)) { ?>
                <div class="alert alert-danger" role="alert"> <?php echo $message; ?>
                </div>
        <?php
            }
        }
        ?>
        <?php

        if (isset($_POST["create"])) {
            $sql = "SELECT * FROM `registracija` WHERE `ID`=1 AND `isjungimas`=1 ";
            $result = $prisijungimas->query($sql);

            if ($result->num_rows == 1) {
                // <div class="alert alert-success" role="alert">Registracija galima</div> 
                // header('Location: registracija.php');
            } else { ?>
                <div class="alert alert-danger" role="alert">Šiuo metu registracija yra uždaryta.<br>Atsiprašome už nepatogumus.</div>
        <?php }
        }
        ?>
        </div>


</body>

</html>