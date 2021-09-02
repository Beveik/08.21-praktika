<?php 
    require_once("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Naujas vartotojas</title>

    <?php require_once("includes.php");
    require_once("includes/menu.php"); ?>
    
    <style>
        h1 {
            text-align: center;
        }

        .container {
            position:absolute;
            top:60%;
            left:50%;
            transform: translateY(-50%) translateX(-50%);
        }

        .hide {
            display:none;
        }
    </style>

</head>
<body>
<?php 


if(!isset($_COOKIE["prisijungta"])) { 
    header("Location: index.php");    
}


if(isset($_GET["submit"])) {
    if(isset($_GET["vardas"]) && isset($_GET["teises_id"]) &&  isset($_GET["pavarde"]) && !empty($_GET["vardas"]) && !empty($_GET["pavarde"]) && isset($_GET["slapyvardis"]) && isset($_GET["slaptazodis"])  && !empty($_GET["slapyvardis"]) && !empty($_GET["slaptazodis"])) {

        $vardas = $_GET["vardas"];
        $pavarde = $_GET["pavarde"];
        $slapyvardis = $_GET["slapyvardis"];
        $slaptazodis = $_GET["slaptazodis"];

        $teises_id = intval($_GET["teises_id"]);

        $sql = "INSERT INTO `vartotojai`(`vardas`, `slapyvardis`, `slaptazodis`, `teises_id`, `pavarde`, `registracijos_data`, `paskutinis_prisijungimas` ) 
            VALUES ('$vardas','$slapyvardis','$slaptazodis','$teises_id','$pavarde', (NOW()), (NOW()) )";

        if(mysqli_query($prisijungimas, $sql)) {
            $message =  "Vartotojas pridėtas sėkmingai.";
            $class = "success";
        } else {
            $message =  "Vartotojas nepridėtas.";
            $class = "danger";
        }
    } else {
        $message =  "Užpildykite visus laukelius";
        $class = "danger";
    }
}

?>

<div class="container">
        <h1>Vartotojo kūrimas</h1>
            <form action="naujasvartotojas.php" method="get">

                <div class="form-group">
                    <label for="vardas">Vardas</label>
                    <input class="form-control" type="text" name="vardas" placeholder="Vardas" />
                </div>
                <div class="form-group">
                    <label for="pavarde">Pavardė</label>
                    <input class="form-control" type="text" name="pavarde" placeholder="Pavardė" />
                </div>
                <div class="form-group">
                    <label for="slapyvardis">Slapyvardis</label>
                    <input class="form-control" type="text" name="slapyvardis" placeholder="Slapyvardis" />
                </div>
                <div class="form-group">
                    <label for="slaptazodis">Slaptažodis</label>
                    <input class="form-control" type="text" name="slaptazodis" placeholder="Slaptažodis" />
                </div>

                <div class="form-group">
                    <label for="teises_id">Teisės</label>
                    <select class="form-control" name="teises_id">
                        <?php 
                         $sql = "SELECT * FROM vartotojai_teises";
                         $result = $prisijungimas->query($sql);
                         while($clientRights = mysqli_fetch_array($result)) {
                            echo "<option value='".$clientRights["ID"]."'>";
                                echo $clientRights["aprasymas"];
                            echo "</option>";
                        }
                        ?>
                    </select>
                </div>
<button class="btn btn-primary" type="submit" name="submit">Pridėti vartotoją</button><br>
                <a href="vartotojai.php">Back</a>
                
            </form>

            <?php if(isset($message)) { ?>
                <div class="alert alert-<?php echo $class; ?>" role="alert">
                <?php echo $message; ?>
                </div>
            <?php } ?>
        
              
    </div>
</body>
</html>