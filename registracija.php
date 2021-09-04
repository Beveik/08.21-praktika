<?php

require_once("connection.php");
require_once("includes.php");
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

        .form-group {
            margin-left: 330px;
            float: left;
        }

        .alert.alert-success, .alert.alert-danger {
    margin-top: 13rem;
    
        }
        button.btn.btn-primary {
    margin-top: 33px;
    float: left;
}
button.btn.btn-primary.pris {
    margin-left: -200px;
    
}
button.btn.btn-primary.kurt {
    margin-left: -340px;
}
    </style>

</head>

<body>

   

    <div class="container">
        <?php

        if (isset($_POST["create"])) {
            if (isset($_POST["slapyvardis"]) && isset($_POST["slaptazodis"]) && !empty($_POST["slapyvardis"]) && !empty($_POST["slaptazodis"]) && isset($_POST["slaptazodis2"]) && !empty($_POST["slaptazodis2"]) && isset($_POST["vardas"]) && !empty($_POST["vardas"]) && isset($_POST["pavarde"]) && !empty($_POST["pavarde"])) {
                $slapyvardis = $_POST["slapyvardis"];
                $vardas = $_POST["vardas"];
                $pavarde = $_POST["pavarde"];
                $slaptazodis = $_POST["slaptazodis"];
                $slaptazodis2 = $_POST["slaptazodis2"];

                $sql = "SELECT * FROM `vartotojai` WHERE slapyvardis='$slapyvardis' ";
       $result = $prisijungimas->query($sql);
       $class= "danger";
       if($result->num_rows == 1) {
           $message = "Toks slapyvardis jau egzistuoja.";
       } else {
                if ($slaptazodis == $slaptazodis2) {
                    $sql = "INSERT INTO `vartotojai`(`vardas`, `slapyvardis`, `slaptazodis`, `teises_id`, `pavarde`, `registracijos_data`, `paskutinis_prisijungimas` ) 
            VALUES ('$vardas','$slapyvardis','$slaptazodis',2,'$pavarde', (NOW()), (NOW()) )";
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
                    <label for="slapyvardis">Slapyvardis</label>
                    <input type="text" name="slapyvardis" required="true" value="<?php 
                    if(isset($slapyvardis)) {
                        echo $slapyvardis;                        
                        ?>"<?php
                    } else {
                        echo "";
                        echo '" placeholder="Įveskite slapyvardį"';
                    }?>/>
                </div>
                <div class="form-group">
                    <label for="vardas">Vardas</label>
                    <input type="text" name="vardas" required="true" value="<?php 
                    if(isset($vardas)) {
                        echo $vardas;
                        ?>"<?php
                    } else {
                        echo "";
                        echo '" placeholder="Įveskite vardą"';
                    }?>
                   />
                </div>
                <div class="form-group">
                    <label for="pavarde">Pavardė</label>
                    <input type="text" name="pavarde" required="true" value="<?php 
                    if(isset($pavarde)) {
                        echo $pavarde;                        
                        ?>"<?php
                    } else {
                        echo "";
                        echo '" placeholder="Įveskite pavardę"';
                    }?>/>
                </div>
                <div class="form-group">
                    <label for="slaptazodis">Slaptažodis</label>
                    <input type="password" name="slaptazodis" placeholder="Įveskite slaptažodį" />
                </div>
                <div class="form-group">
                    <label for="slaptazodis">Pakartokite slaptažodį</label>
                    <input type="password" name="slaptazodis2" placeholder="Pakartokite slaptažodį" />
                </div>

                <button class="btn btn-primary kurt" type="submit" name="create">Užsiregistruoti</button>
                <br><br>
                


            </form>
            <form action="registracija.php" method="POST">
                <button class="btn btn-primary pris" type="submit" name="prisijungti" ><a class='mygt' href='index.php'>Prisijungti</button>     
            </form>
            
            
             <?php if (isset($message)) { ?>
                    <div class="alert alert-<?php echo $class; ?>" role="alert"><?php echo $message; ?></div>

                <?php }

                ?>         
    </div>

<?php
        } else {
            header('Location: klientai.php');
        } ?>

<?php
if (isset($_COOKIE["prisijungta"])) {
    header('Location: klientai.php');
}
// if (isset($_POST["prisijungti"])) {
//     header('Location: index.php');
// }

?>

</body>

</html>