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

        form {
            margin-left: 330px;
        }

        button.btn.btn-primary {
            margin-left: 0px;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_GET["submit"])) {
        if (isset($_GET["username"]) && isset($_GET["password"]) && !empty($_GET["username"]) && !empty($_GET["password"])) {
            $username = $_GET["username"];
            $password = $_GET["password"];


            $sql = "SELECT * FROM `uzsiregistrave_vartotojai` WHERE slapyvardis='$username' AND slaptazodis='$password'";
            $result = $prisijungimas->query($sql);

            if ($result->num_rows == 1) {

                $user_info = mysqli_fetch_array($result);
                var_dump($user_info);
                $cookie_array = array(
                    $user_info["ID"],
                    $user_info["slapyvardis"],
                    $user_info["slaptazodis"],
                    $user_info["teises_id"]
                );
                $cookie_array = implode("|", $cookie_array);
                setcookie("prisijungta", $cookie_array, time() + 3600, "/");
                header("Location: klientai.php");
            } else {
                $message = "Neteisingi prisijungimo duomenys.";
            }

        } else {
            $message = "Laukeliai yra tušti arba duomenys neteisingi";
        }
    }


    ?>
    <?php
    if (!isset($_COOKIE["prisijungta"])) { ?>
        <div class="container">
            <h1>Klientų valdymo sistema</h1>
            <br>
            <form>
                <div class="form-group">
                    <label for="username">Slapyvardis</label>
                    <input type="text" name="username" />
                </div>
                <div class="form-group">
                    <label for="password">Slaptažodis</label>
                    <input type="password" name="password" />
                </div>

                <button class="btn btn-primary" type="submit" name="submit">Prisijungti</button>
                <!-- <br><br> -->
                <button class="btn btn-primary" type="submit" name="create">Registracija</button>
            </form>
            <?php
            if (isset($message)) { ?>
                <div class="alert alert-danger" role="alert"> <?php echo $message; ?>
                </div>
        <?php
            }
        }
        ?>
        </div>
        <?php
        if (isset($_GET["create"])) {
            header('Location: registracija.php');
        }




        ?>

</body>

</html>