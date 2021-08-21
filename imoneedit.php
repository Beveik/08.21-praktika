<?php 
    require_once("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients Edit</title>

    <?php require_once("includes.php"); 
    require_once("includes/menu.php");?>
    
    <style>
        h1 {
            text-align: center;
        }

        .container {
            position:absolute;
            top:50%;
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

if(isset($_GET["ID"])) {
    $id = $_GET["ID"];
    $sql = "SELECT * FROM imones WHERE ID = $id";


    $result = $prisijungimas->query($sql);//vykdome uzklausa 

    if($result->num_rows == 1) {
        //veiksmai
        $imones = mysqli_fetch_array($result);
        $hideForm = false;
    
    } else {

        $hideForm = true;
    }
}

if(isset($_GET["submit"])) {

    if(isset($_GET["pavadinimas"]) && isset($_GET["aprasymas"]) && isset($_GET["tipas_id"]) && !empty($_GET["pavadinimas"]) && !empty($_GET["aprasymas"]) && !empty($_GET["tipas_id"])) {
        $id = $_GET["ID"];
        $pavadinimas = $_GET["pavadinimas"];
        $aprasymas = $_GET["aprasymas"];
        $tipas_id = intval($_GET["tipas_id"]);

        $sql = "UPDATE `imones` SET `pavadinimas`='$pavadinimas',`aprasymas`='$aprasymas',`tipas_id`=$tipas_id WHERE ID = $id";

        if(mysqli_query($prisijungimas, $sql)) {
            $message =  "Vartotojas redaguotas sėkmingai.";
            $class = "success";
        } else {
            $message =  "Redagavimas nepavyko.";
            $class = "danger";
        }
    } else {
        $id = $imones["ID"];
        $vardas = $imones["pavadinimas"];
        $pavarde = $imones["aprasymas"];
        $teises_id = intval($imones["tipas_id"]);

        $sql = "UPDATE `imones` SET `pavadinimas`='$pavadinimas',`aprasymas`='$aprasymas',`tipas_id`=$tipas_id WHERE ID = $id";
        if(mysqli_query($prisijungimas, $sql)) {
            $message =  "Įmonė pakeista sėkmingai";
            $class = "success";
        } else {
            $message =  "Redagavimas nepavyko.";
            $class = "danger";
        }
    }
}

?>

<div class="container">
        <h1>įmonės redagavimas</h1>
        <?php if($hideForm == false) { ?>
            <form action="imoneedit.php" method="get">
                
                <input class="hide" type="text" name="ID" value ="<?php echo $imones["ID"]; ?>" />

                <div class="form-group">
                    <label for="pavadinimas">Pavadinimas</label>
                    <input class="form-control" type="text" name="pavadinimas" value="<?php echo $imones["pavadinimas"]; ?>" />
                </div>
                <div class="form-group">
                    <label for="aprasymas">Aprašymas</label>
                    <input class="form-control" type="text" name="aprasymas" value="<?php echo $imones["aprasymas"]; ?>"/>
                </div>
              
                <div class="form-group">
                    <label for="tipas_id">Teisės</label>
                  
                    <select class="form-control" name="tipas_id">
                        <?php 
                         $sql = "SELECT * FROM imones_tipas";
                         $result = $prisijungimas->query($sql);

                         while($clientRights = mysqli_fetch_array($result)) {

                            if($imones["tipas_id"] == $clientRights["ID"] ) {
                                echo "<option value='".$clientRights["ID"]."' selected='true'>";
                            }  else {
                                echo "<option value='".$clientRights["ID"]."'>";
                            }  
                                
                                echo $clientRights["aprasymas"];
                            echo "</option>";
                       }
                        ?>
                    </select>
                </div>

                <a href="imones.php">Back</a><br>
                <button class="btn btn-primary" type="submit" name="submit">Išsaugoti pakeitimus</button>
            </form>
            <?php if(isset($message)) { ?>
                <div class="alert alert-<?php echo $class; ?>" role="alert">
                <?php echo $message; ?>
                </div>
            <?php } ?>
        <?php } else { ?>
            <h2> Tokio kliento nėra. </h2>
            <a href="imones.php">Back</a>
        <?php }?>    
    </div>
</body>
</html>