<?php

require_once("connection.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registracija</title>
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

        form {
            margin-left: 330px;
        }
    </style>

</head>

<body>

    <?php require_once("includes.php"); ?>
    <div class="container">
        <?php
        if (isset($_POST["create"])) {
            if (isset($_POST["username"]) && isset($_POST["password"]) && !empty($_POST["username"]) && !empty($_POST["password"]) && isset($_POST["password2"]) && !empty($_POST["password2"]) && isset($_POST["name"]) && !empty($_POST["name"]) && isset($_POST["surname"]) && !empty($_POST["surname"])) {
                $username = $_POST["username"];
                $name = $_POST["name"];
                $surname = $_POST["surname"];
                $password = $_POST["password"];
                $password2 = $_POST["password2"];

                $sql = "SELECT * FROM `uzsiregistrave_vartotojai` WHERE slapyvardis='$username' ";
       $result = $prisijungimas->query($sql);
       $class= "danger";
       if($result->num_rows == 1) {
           $message = "Toks slapyvardis jau egzistuoja.";
       } else {
                if ($password == $password2) {
                    $sql = "INSERT INTO `uzsiregistrave_vartotojai`(`name`, `slapyvardis`, `slaptazodis`, `teises_id`, `surname`) 
            VALUES ('$name','$username','$password',0,'$surname')";
                    if (mysqli_query($prisijungimas, $sql)) {
                        $message =  "Paskyra sukurta sėkmingai. Prašome prisijungti.";
                        $class = "success";
                    } else {
                        $message =  "Įvyko klaida.";
                        $class = "danger";
                    }
                } else {
                    $message =  "Slaptažodžiai nesutampa.";
                    $class = "danger";
                }
            }
        }
    }
        ?>
        <?php
        if (!isset($_COOKIE["prisijungta"])) { ?>
            <h1>Registracija</h1>
            <br>
            <form action="registracija.php" method="POST">

                <div class="form-group">
                    <label for="username">Slapyvardis</label>
                    <input type="text" name="username" required="true" value="<?php 
                    if(isset($username)) {
                        echo $username;                        
                        ?>"<?php
                    } else {
                        echo "";
                        echo '" placeholder="Įveskite slapyvardį"';
                    }?>/>
                </div>
                <div class="form-group">
                    <label for="name">Vardas</label>
                    <input type="text" name="name" required="true" value="<?php 
                    if(isset($name)) {
                        echo $name;
                        ?>"<?php
                    } else {
                        echo "";
                        echo '" placeholder="Įveskite vardą"';
                    }?>
                   />
                </div>
                <div class="form-group">
                    <label for="surname">Pavardė</label>
                    <input type="text" name="surname" required="true" value="<?php 
                    if(isset($surname)) {
                        echo $surname;                        
                        ?>"<?php
                    } else {
                        echo "";
                        echo '" placeholder="Įveskite pavardę"';
                    }?>/>
                </div>
                <div class="form-group">
                    <label for="password">Slaptažodis</label>
                    <input type="password" name="password" placeholder="Įveskite slaptažodį" />
                </div>
                <div class="form-group">
                    <label for="password">pakartokite slaptažodį</label>
                    <input type="password" name="password2" placeholder="Pakartokite slaptažodį" />
                </div>

                <button class="btn btn-primary" type="submit" name="create">Užsiregistruoti</button>
                <br><br>
                <?php if (isset($message)) { ?>
                    <div class="alert alert-<?php echo $class; ?>" role="alert"><?php echo $message; ?></div>

                <?php }

                ?>


            </form>
            <form action="registracija.php" method="POST">
                <button class="btn btn-primary" type="submit" name="prisijungti">Prisijungti</button>     
            </form>           
    </div>

<?php
        } else {
            header('Location: klientai.php');
        } ?>

<?php
if (isset($_COOKIE["prisijungta"])) {
    header('Location: klientai.php');
}
if (isset($_POST["prisijungti"])) {
    header('Location: index.php');
}

?>

</body>

</html>