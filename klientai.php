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
    <title>Klientų sąrašas</title>
    <style>
        /* h5 {
            float: right;
            margin-top: 5px;
        } */
       

        /* form.atsijungti {
            float: right;
            margin-right: -153px;
            margin-top: -3px;
        } */
    </style>
</head>

<body>

    <div class="container">
   
        <form action="klientai.php" method="get">
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
         <form class="form-inline my-2 my-lg-0" action="klientai.php" method="get">
         <input class="form-control mr-sm-2" name="search" type="search" placeholder="Įveskite klientą" aria-label="Search Client">
         <button class="btn btn-primary" type="submit" name="search_button">Klientų paieška</button>
       </form>
    </div>
    
    <div class="naujas">
        <form action="klientai.php" method="get">
            
                <button class='btn btn-primary' type='submit' name='naujas'><a class="mygt" href='naujasklientas.php'>Naujas klientas</a></button>
 </form>
</div>

        <?php
if ($vartotojas[3]!=3){ 
if (isset($_GET["ID"])) {
    $id = $_GET["ID"];
    $sql="DELETE FROM `klientai` WHERE `ID` = $id";
    
    if (mysqli_query($prisijungimas, $sql)) {
        $message = "Klientas ištrintas sėkmingai.";
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
                        <th scope="col">Vardas</th>
                        <th scope="col">Pavardė</th>
                        <th scope="col">Teisės</th>
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
                    $sql = "SELECT klientai.ID, klientai.vardas, klientai.pavarde, klientai_teises.pavadinimas FROM klientai 
    LEFT JOIN klientai_teises ON klientai_teises.reiksme = klientai.teises_id 
    WHERE 1 
    ORDER BY klientai.ID $rikiavimas";

                    // $sql = "SELECT * FROM `klientai` ORDER BY `ID` $rikiavimas";
                    if (isset($_GET["search"]) && !empty($_GET["search"])) {
                        $search = $_GET["search"];

                        $sql = "SELECT klientai.ID, klientai.vardas, klientai.pavarde, klientai_teises.pavadinimas FROM klientai 
    LEFT JOIN klientai_teises ON klientai_teises.reiksme = klientai.teises_id 
    WHERE klientai.vardas LIKE '%" . $search . "%' OR klientai.pavarde LIKE '%" . $search . "%' OR klientai_teises.pavadinimas LIKE '%" . $search . "%'
    ORDER BY klientai.ID $rikiavimas";

                        // $sql="SELECT * FROM `klientai` WHERE `vardas` LIKE '%".$search."%' OR `pavarde` LIKE '%".$search."%' ORDER BY `ID` $rikiavimas";
                    }
                    $rezultatas = $prisijungimas->query($sql); // užklausos vykdymas
                    while ($klientai = mysqli_fetch_array($rezultatas)) {

                        echo "<tr><th>" . $klientai["ID"] . "</th>";
                        echo "<th>" . $klientai["vardas"] . "</th>";
                        echo "<th>" . $klientai["pavarde"] . "</th>";
                        echo "<th>" . $klientai["pavadinimas"] . "</th>";
                        // $teises_id = $klientai["teises_id"];
                        // $sql = "SELECT * FROM klientai_teises WHERE reiksme = $teises_id";
                        // $result_teises = $prisijungimas->query($sql); //vykdoma uzklausa

                        // if($result_teises->num_rows == 1) {
                        //     $rights = mysqli_fetch_array($result_teises);
                        //     echo "<td>";
                        //          echo $rights["pavadinimas"];
                        //     echo "</td>";
                        // } else {
                        //     echo "<td>Nepatvirtintas klientas</td>";
                        // }
                         if ($vartotojas[3]!=3){
                        echo "<th>";
                        echo "<a href='klientaiedit.php?ID=" . $klientai["ID"] . "'>Redaguoti</a>";
                        echo "<br>";
                        echo "<a href='klientai.php?ID=" . $klientai["ID"] . "'>Ištrinti</a>";
 } 
                        echo "</th></tr>";
                    }
                    
                    ?>
                    <?php if (isset($_GET["search"]) && !empty($_GET["search"])) { ?>
                <div class="isvalyti">
                <a class="btn btn-primary" href="klientai.php">Išvalyti paiešką</a></div>
            <?php } ?>
                </tbody>
            </table>
            </div>
         
</body>

</html>