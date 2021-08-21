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

//mes pagal ID turetume isvesti visus duomenis i input apie klienta
//ir naujus duomenis per UPDATE sukelti i duomenu baze

if(!isset($_COOKIE["prisijungta"])) { 
    header("Location: index.php");    
}

if(isset($_GET["ID"])) {
    $id = $_GET["ID"];
    $sql = "SELECT * FROM klientai WHERE ID = $id";

    //kiek rezultatu gaunam? 1 

    $result = $prisijungimas->query($sql);//vykdome uzklausa 

    if($result->num_rows == 1) {
        //veiksmai
        $klientai = mysqli_fetch_array($result);
        $hideForm = false;
    
    } else {
        //ivyko kazkas blogai
        // header("clients.php");
        //header("error.php");
        //header("createClient.php");
        //galime paslepti forma
        $hideForm = true;
    }
}

if(isset($_GET["submit"])) {
    //Turime pasiimti visus kintamuosius
    //Kokia uzklausa atlikti? UPDATE
    if(isset($_GET["vardas"]) && isset($_GET["pavarde"]) && isset($_GET["teises_id"]) && !empty($_GET["vardas"]) && !empty($_GET["pavarde"]) && !empty($_GET["teises_id"])) {
        $id = $_GET["ID"];
        $vardas = $_GET["vardas"];
        $pavarde = $_GET["pavarde"];
        $teises_id = intval($_GET["teises_id"]);

        $sql = "UPDATE `klientai` SET `vardas`='$vardas',`pavarde`='$pavarde',`teises_id`=$teises_id WHERE ID = $id";

        if(mysqli_query($prisijungimas, $sql)) {
            $message =  "Vartotojas redaguotas sėkmingai.";
            $class = "success";
        } else {
            $message =  "Redagavimas nepavyko.";
            $class = "danger";
        }
    } else {
        $id = $klientai["ID"];
        $vardas = $klientai["vardas"];
        $pavarde = $klientai["pavarde"];
        $teises_id = intval($klientai["teises_id"]);

        $sql = "UPDATE `klientai` SET `vardas`='$vardas',`pavarde`='$pavarde',`teises_id`=$teises_id WHERE ID = $id";
        if(mysqli_query($prisijungimas, $sql)) {
            $message =  "Vartotojas redaguotas sėkmingai";
            $class = "success";
        } else {
            $message =  "Redagavimas nepavyko.";
            $class = "danger";
        }
    }
}

?>

<div class="container">
        <h1>Vartotojo redagavimas</h1>
        <?php if($hideForm == false) { ?>
            <form action="klientaiedit.php" method="get">
                
                <input class="hide" type="text" name="ID" value ="<?php echo $klientai["ID"]; ?>" />

                <div class="form-group">
                    <label for="vardas">Vardas</label>
                    <input class="form-control" type="text" name="vardas" value="<?php echo $klientai["vardas"]; ?>" />
                </div>
                <div class="form-group">
                    <label for="pavarde">Pavardė</label>
                    <input class="form-control" type="text" name="pavarde" value="<?php echo $klientai["pavarde"]; ?>"/>
                </div>
                <?php 
                
                // 0 - Naujas klientas
                // 1 - Ilgalaikis klientas
                // 2 - Neaktyvus klientas
                // 3 - Nemokus klientas
                // 4 - Uzsienio(Ne EU) klientas
                // 5 - Uzsienio(EU) klientas
                ?>
                <div class="form-group">
                    <label for="teises_id">Teisės</label>
                  
                    <select class="form-control" name="teises_id">
                        <?php 
                         $sql = "SELECT * FROM klientai_teises";
                         $result = $prisijungimas->query($sql);

                         while($clientRights = mysqli_fetch_array($result)) {

                            if($klientai["teises_id"] == $clientRights["reiksme"] ) {
                                echo "<option value='".$clientRights["reiksme"]."' selected='true'>";
                            }  else {
                                echo "<option value='".$clientRights["reiksme"]."'>";
                            }  
                                
                                echo $clientRights["pavadinimas"];
                            echo "</option>";
                       }
                        ?>
                    </select>
                </div>

                <a href="klientai.php">Back</a><br>
                <button class="btn btn-primary" type="submit" name="submit">Išsaugoti pakeitimus</button>
            </form>
            <?php if(isset($message)) { ?>
                <div class="alert alert-<?php echo $class; ?>" role="alert">
                <?php echo $message; ?>
                </div>
            <?php } ?>
        <?php } else { ?>
            <h2> Tokio kliento nėra. </h2>
            <a href="klientai.php">Back</a>
        <?php }?>    
    </div>
</body>
</html>