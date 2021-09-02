<?php

require_once("includes/menu.php");
require_once("connection.php");
require_once("includes.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>

<body>
    
    <div class="container">
   
        <form action="imones.php" method="get">
            <div class="form-group">
                <br>
                <select class="form-control" name="rikiavimas_id">
                    <option value="ASC"> min-max</option>
                    <option value="DESC"> max-min</option>
                </select>
                <br><br>
                <button class="btn btn-primary" name="rikiuoti" type="submit">Rikiuoti</button>
            </div>
        </form>
        <div class="paieska">
         <form class="form-inline my-2 my-lg-0" action="imones.php" method="get">
         <input class="form-control mr-sm-2" name="search" type="search" placeholder="Įveskite įmonę" aria-label="Search Client">
         <button class="btn btn-primary" type="submit" name="search_button">Įmonių paieška</button>
       </form>
    </div>
    
    <div class="naujas">
        <form action="imones.php" method="get">
                <button class='btn btn-primary' type='submit' name='naujas'><a class="mygt" href='naujaimone.php'>Nauja įmonė</a></button>
 </form>
 </div>



        <?php
if ($vartotojas[3]!=3){ 
if (isset($_GET["ID"])) {
    $id = $_GET["ID"];
    $sql="DELETE FROM `imones` WHERE `ID` = $id";
    
    if (mysqli_query($prisijungimas, $sql)) {
        $message = "Įmonė ištrinta sėkmingai.";
        $class = "success";
    } else {
        $message = "Įrašo ištrinti nepavyko.";
        $class = "danger";
    }
}
}
?>
<?php if (isset($message)) { ?>
    <div class="alert alert-<?php echo $class; ?>">
    <?php echo $message;?>
    </div>

    <?php } ?>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Pavadinimas</th>
                        <th scope="col">Aprašymas</th>
                        <th scope="col">Tipas</th>
                        <?php    if ($vartotojas[3]!=3){ ?>
                        <th scope="col">Veiksmai</th>
                        <?php   } ?>
                    </tr>
                </thead>
                <tbody>

                    <?php

                    if (isset($_GET["rikiavimas_id"]) && !empty($_GET["rikiavimas_id"])) {
                        $rikiavimas = $_GET["rikiavimas_id"];
                    } else {
                        $rikiavimas = "DESC";
                    }
                    $sql = "SELECT imones.ID, imones.pavadinimas, imones.aprasymas, imones_tipas.im_aprasymas FROM imones 
    LEFT JOIN imones_tipas ON imones_tipas.ID = imones.tipas_id 
    WHERE 1 
    ORDER BY imones.ID $rikiavimas";

                    if (isset($_GET["search"]) && !empty($_GET["search"])) {
                        $search = $_GET["search"];

                        $sql = "SELECT imones.ID, imones.pavadinimas, imones.aprasymas, imones_tipas.im_aprasymas FROM imones 
    LEFT JOIN imones_tipas ON imones_tipas.ID = imones.tipas_id 
    WHERE imones.pavadinimas LIKE '%" . $search . "%' OR imones.aprasymas LIKE '%" . $search . "%' OR imones_tipas.im_aprasymas LIKE '%" . $search . "%'
    ORDER BY imones.ID $rikiavimas";

                    }
                    $rezultatas = $prisijungimas->query($sql); // užklausos vykdymas
                    while ($imones = mysqli_fetch_array($rezultatas)) {

                        echo "<tr><th>" . $imones["ID"] . "</th>";
                        echo "<th>" . $imones["pavadinimas"] . "</th>";
                        echo "<th>" . $imones["aprasymas"] . "</th>";
                        echo "<th>" . $imones["im_aprasymas"] . "</th>";

                        if ($vartotojas[3]!=3){
                        echo "<th>";
                        echo "<a href='imoneedit.php?ID=" . $imones["ID"] . "'>Redaguoti</a>";
                        echo "<br>";
                        echo "<a href='imones.php?ID=" . $imones["ID"] . "'>Ištrinti</a>";
                        }
                        echo "</th></tr>";
                    }
                    
                    ?>
                    <?php if (isset($_GET["search"]) && !empty($_GET["search"])) { ?>
                <div class="isvalyti">
                <a class="btn btn-primary" href="imones.php">Išvalyti paiešką</a></div>
            <?php } ?>
                </tbody>
            </table>
            </div>
          

</body>

</html>