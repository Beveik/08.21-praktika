<?php 
    require_once("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nauja įmonė</title>

    <?php require_once("includes.php");
    require_once("includes/menu.php"); ?>
    
    <style>
        h1 {
            text-align: center;
        }

        .container {
            position:absolute;
            top:50%;
            left:50%;
            transform: translateY(-50%) translateX(-50%);
            width: 500px;
            
        }

        .hide {
            display:none;
        }

        .form-control {
            width: 500px;
        }
    </style>

</head>
<body>
<?php 


if(!isset($_COOKIE["prisijungta"])) { 
    header("Location: index.php");    
}


if(isset($_GET["submit"])) {
    if(isset($_GET["pavadinimas"]) && isset($_GET["aprasymas"]) && !empty($_GET["pavadinimas"]) && !empty($_GET["aprasymas"]) && isset($_GET["tipas_id"])  ) {

        $pavadinimas = $_GET["pavadinimas"];
        $aprasymas = $_GET["aprasymas"];
        $tipas_id = intval($_GET["tipas_id"]);

        // $sql = "UPDATE `klientai` SET `vardas`='$vardas',`pavarde`='$pavarde',`teises_id`=$teises_id WHERE ID = $id";

        $sql = "INSERT INTO `imones`(`pavadinimas`, `aprasymas`, `tipas_id`) VALUES ('$pavadinimas','$aprasymas', $tipas_id)";
        if(mysqli_query($prisijungimas, $sql)) {
            $message =  "Įmonė pridėta sėkmingai.";
            $class = "success";
        } else {
            $message =  "Įmonė nepridėta.";
            $class = "danger";
        }
    } else {
        $message =  "Užpildykite visus laukelius";
        $class = "danger";
    }
}

?>

<div class="container">
        <h1>Įmonės pridėjimas</h1><br>
            <form action="naujaimone.php" method="get">

                <div class="form-group">
                    <label for="pavadinimas">Pavadinimas</label>
                    <input class="form-control" type="text" name="pavadinimas" placeholder="Pavadinimas" />
                </div>
               
                <div class="form-group">
                    <label for="aprasymas">Aprašymas</label>
                    <input class="form-control" type="text" name="aprasymas" placeholder="Aprašymas" />
                </div>
                <div class="form-group">
                    <label for="tipas_id">Tipas</label>
                    <select class="form-control" name="tipas_id">
                        <?php 
                         $sql = "SELECT * FROM imones_tipas";
                         $result = $prisijungimas->query($sql);

                         while($clientRights = mysqli_fetch_array($result)) {
                            echo "<option value='".$clientRights["ID"]."'>";
                                echo $clientRights["im_aprasymas"];
                            echo "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                <label for="aprasymas">Aprašymas</label>
                <textarea class="form-control" name="aprasymas"></textarea>
                </div>
                <br>
                <div class="form-group">
<button class="btn btn-primary" type="submit" name="submit">Pridėti įmonę</button><br>
                <a href="imones.php">Back</a>
                </div>
            </form>

            <?php if(isset($message)) { ?>
                <div class="alert alert-<?php echo $class; ?>" role="alert">
                <?php echo $message; ?>
                </div>
            <?php } ?>
        
              
    </div>
</body>
</html>