<?php 
    require_once("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Naujas klientas</title>

    <?php require_once("includes.php");
    require_once("includes/menu.php"); ?>
    
    <style>
        h1 {
            text-align: center;
        }

        .container {
            position:absolute;
            top:45%;
            left:50%;
            transform: translateY(-50%) translateX(-50%);
            width: 765px;
        }

        .hide {
            display:none;
        }
        .form-control {
            width: 730px;
        }
    </style>

</head>
<body>
<?php 


if(!isset($_COOKIE["prisijungta"])) { 
    header("Location: index.php");    
}


if(isset($_GET["submit"])) {
    if(isset($_GET["vardas"]) && isset($_GET["pavarde"]) && isset($_GET["teises_id"]) && !empty($_GET["vardas"]) && !empty($_GET["pavarde"] && isset($_GET["aprasymas"])) ) {

        $vardas = $_GET["vardas"];
        $pavarde = $_GET["pavarde"];
        $teises_id = intval($_GET["teises_id"]);
        $aprasymas = $_GET["aprasymas"];

        // $sql = "UPDATE `klientai` SET `vardas`='$vardas',`pavarde`='$pavarde',`teises_id`=$teises_id WHERE ID = $id";

        $sql = "INSERT INTO `klientai`(`vardas`, `pavarde`, `teises_id`, `aprasymas`) VALUES ('$vardas','$pavarde',$teises_id, '$aprasymas')";
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
        <h1>Kliento kūrimas</h1>
            <form action="naujasklientas.php" method="get">

                <div class="form-group">
                    <label for="vardas">Vardas</label>
                    <input class="form-control" type="text" name="vardas" placeholder="Vardas" />
                </div>
                <div class="form-group">
                    <label for="pavarde">Pavardė</label>
                    <input class="form-control" type="text" name="pavarde" placeholder="Pavardė" />
                </div>
                <div class="form-group">
                    <label for="teises_id">Teisės</label>
                    <select class="form-control" name="teises_id">
                        <?php 
                         $sql = "SELECT * FROM klientai_teises";
                         $result = $prisijungimas->query($sql);
                        //  $client["teises_id"] - sita kintamaji
                        // kam jis turi buti lygus is duomenu bazes stulpelio?
                         while($clientRights = mysqli_fetch_array($result)) {
                            echo "<option value='".$clientRights["reiksme"]."'>";
                                echo $clientRights["pavadinimas"];
                            echo "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                <label for="aprasymas">Aprašymas</label>
                <div class="row">

                        <div class="col-lg-12">
                <textarea id="summernote" name="editordata" class="form-control" name="aprasymas"></textarea>
                </div>
                </div>
                </div>
<button class="btn btn-primary" type="submit" name="submit">Pridėti klientą</button><br>
                <a href="klientai.php">Back</a>
                
            </form>

            <?php if(isset($message)) { ?>
                <div class="alert alert-<?php echo $class; ?>" role="alert">
                <?php echo $message; ?>
                </div>
            <?php } ?>
            <script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>
              
    </div>
</body>
</html>