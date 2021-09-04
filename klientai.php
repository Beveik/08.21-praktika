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
        .col-lg-6 {
            float: right;
            margin-left: 290px;
        }

        a.btn.btn-primary {
            /* margin-left: -215px; */
            margin-top: 90px;
            margin-left: -482px;

        }

        /* form.atsijungti {
            float: right;
            margin-right: -153px;
            margin-top: -3px;
        } */
    </style>
</head>

<body>

    <div class="container">

        <!-- <form action="klientai.php" method="get">
            <div class="form-group">
                <br>
                <select class="form-control" name="rikiavimas_id">
                    <option value="ASC"> min-max</option>
                    <option value="DESC"> max-min</option>
                </select>
                <br><br>
                <button class="btn btn-primary" name="rikiuoti" type="submit">Rikiuoti</button>
            </div>
        </form> -->
        <div class="paieska">
            <form class="form-inline my-2 my-lg-0" action="klientai.php" method="get">
                <input class="form-control mr-sm-2" name="search" type="search" placeholder="Įveskite klientą" aria-label="Search Client">
                <button class="btn btn-primary" type="submit" name="search_button">Klientų paieška</button>
            </form>
        </div>
        <?php if (isset($_GET["search"]) && !empty($_GET["search"])) { ?>
            <div class="isvalyti">
                <a class="btn btn-primary" href="klientai.php">Išvalyti paiešką</a>
            </div>
        <?php } ?>
        <div class="naujas">
            <form action="klientai.php" method="get">

                <button class='btn btn-primary' type='submit' name='naujas'><a class="mygt" href='naujasklientas.php'>Naujas klientas</a></button>
            </form>
        </div>

        <?php
        if ($vartotojas[3] != 3) {
            if (isset($_GET["ID"])) {
                $id = $_GET["ID"];
                $sql = "DELETE FROM `klientai` WHERE `ID` = $id";

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
                <?php echo $message; ?>
            </div>

        <?php } ?>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Vardas</th>
                    <th scope="col">Pavardė</th>
                    <th scope="col">Teisės</th>
                    <th scope="col">Aprašymas</th>
                    <?php if ($vartotojas[3] != 3) { ?>
                        <th scope="col">Veiksmai</th>
                    <?php   } ?>
                </tr>
            </thead>
            <tbody>


                <div class="row">
                    <div class="col-lg-6 col-md-12">

                        <form action="klientai.php" method="get">

                            <!-- <select class="form-control" name="rikiuoti_pagal"> -->
                            <?php
                            // $sql = "SELECT * FROM `klientai_rikiavimas`";
                            // $rezultatas = $prisijungimas->query($sql);

                            // $rikiavimo_stulpelis = array();

                            // $skaitiklis = 1;

                            // while($sortColumns = mysqli_fetch_array($rezultatas)) {

                            //     if($skaitiklis == 1) {
                            //         $numatytoji_reiksme = $sortColumns["ID"]; //paskutine reiksme
                            //     }


                            //     if(isset($_GET["rikiuoti_pagal"]) && $_GET["rikiuoti_pagal"] == $sortColumns["ID"]) {
                            //         echo "<option value='".$sortColumns["ID"]."' selected='true'>".$sortColumns["rikiavimo_pavadinimas"]."</option>";
                            //     } else {
                            //         echo "<option value='".$sortColumns["ID"]."'>".$sortColumns["rikiavimo_pavadinimas"]."</option>";    
                            //     }

                            //     $rikiavimo_stulpelis[$sortColumns["ID"]] =  $sortColumns["rikiavimo_stulpelis"];

                            //     $skaitiklis++;
                            // }

                            ?>
                            <!-- </select> -->
                            <select class="form-control" name="rikiavimas_id">
                                <?php if ((isset($_GET["rikiavimas_id"]) && $_GET["rikiavimas_id"] == "DESC") || !isset($_GET["rikiavimas_id"])) {  ?>
                                    <option value="DESC" selected="true">MAX-MIN</option>
                                    <option value="ASC">MIN-MAX</option>
                                <?php } else { ?>
                                    <option value="DESC">MAX-MIN</option>
                                    <option value="ASC" selected="true">MIN-MAX</option>
                                <?php } ?>
                            </select><br>
                            <select class="form-control" name="filtravimas_id">


                                <?php if (isset($_GET["filtravimas_id"]) && !empty($_GET["filtravimas_id"]) && $_GET["filtravimas_id"] != "default") { ?>
                                    <option value="default">Rodyti visus</option>
                                <?php } else { ?>
                                    <option value="default" selected="true">Rodyti visus</option>
                                <?php } ?>

                                <?php
                                $sql = "SELECT * FROM klientai_teises";
                                $rezultatas = $prisijungimas->query($sql);

                                while ($clientRights = mysqli_fetch_array($rezultatas)) {
                                    if (isset($_GET["filtravimas_id"]) && $_GET["filtravimas_id"] == $clientRights["reiksme"]) {
                                        echo "<option value='" . $clientRights["reiksme"] . "' selected='true'>";
                                    } else {
                                        echo "<option value='" . $clientRights["reiksme"] . "'>";
                                    }
                                    echo $clientRights["pavadinimas"];
                                    echo "</option>";
                                }
                                ?>
                            </select>
                            <button class="btn btn-primary" name="filtruoti" type="submit">Vykdyti</button>
                        </form>

                    </div>
                </div>
                <?php
                // if(isset($_GET["rikiuoti_pagal"]) && !empty($_GET["rikiuoti_pagal"])) {
                //     $rikiuoti_pagal = $rikiavimo_stulpelis[$_GET["rikiuoti_pagal"]];
                // } else {
                //     $rikiuoti_pagal = $rikiavimo_stulpelis[$numatytoji_reiksme];
                // }

                if (isset($_GET["filtravimas_id"]) && !empty($_GET["filtravimas_id"]) && $_GET["filtravimas_id"] != "default") {
                    $filtravimas = "klientai.teises_id =" . $_GET["filtravimas_id"];
                    $filtravimas_id=$_GET["filtravimas_id"];
                } else {
                    $filtravimas = 1;
                    $filtravimas_id=0;
                }
                $sql_skaiciavimas = "SELECT CEILING(count(ID)/15), count(ID) FROM klientai WHERE $filtravimas"; 

                if (isset($_GET["rikiavimas_id"]) && !empty($_GET["rikiavimas_id"])) {
                    $rikiavimas = $_GET["rikiavimas_id"];
                } else {
                    $rikiavimas = "DESC";
                }
                if (isset($_GET["pusl_limit"])) {
                    $pusl_limit = $_GET["pusl_limit"] * 15 - 15;
                } else {
                    $pusl_limit = 0;
                }

                $sql = "SELECT klientai.ID, klientai.vardas, klientai.pavarde, klientai_teises.pavadinimas, klientai.aprasymas FROM klientai 
    LEFT JOIN klientai_teises ON klientai_teises.reiksme = klientai.teises_id 
    WHERE $filtravimas
    ORDER BY klientai.ID $rikiavimas LIMIT $pusl_limit,15";
$search = 1;
                if (isset($_GET["search"]) && !empty($_GET["search"])) {
                    $search = $_GET["search"];

                    $sql = "SELECT klientai.ID, klientai.vardas, klientai.pavarde, klientai_teises.pavadinimas, klientai.aprasymas FROM klientai 
    LEFT JOIN klientai_teises ON klientai_teises.reiksme = klientai.teises_id 
    WHERE klientai.vardas LIKE '%" . $search . "%' OR klientai.pavarde LIKE '%" . $search . "%' 
    ORDER BY klientai.ID $rikiavimas LIMIT $pusl_limit,15";

    $sql_skaiciavimas = "SELECT CEILING(count(ID)/15), count(ID) FROM klientai WHERE klientai.vardas LIKE '%" . $search . "%' OR klientai.pavarde LIKE '%" . $search . "%' ";
                    // $sql="SELECT * FROM `klientai` WHERE `vardas` LIKE '%".$search."%' OR `pavarde` LIKE '%".$search."%' ORDER BY `ID` $rikiavimas";
                }
                $rezultatas = $prisijungimas->query($sql); // užklausos vykdymas
                $klientuSk = 0;
                while ($klientai = mysqli_fetch_array($rezultatas)) {
                    
                    $klientuSk = $klientuSk+1;
                    echo "<tr><th>" . $klientai["ID"] . "</th>";
                    echo "<th>" . $klientai["vardas"] . "</th>";
                    echo "<th>" . $klientai["pavarde"] . "</th>";
                    echo "<th>" . $klientai["pavadinimas"] . "</th>";
                    echo "<th>" . $klientai["aprasymas"] . "</th>";
                    if ($vartotojas[3] != 3) {
                        echo "<th>";
                        echo "<a href='klientaiedit.php?ID=" . $klientai["ID"] . "'>Redaguoti</a>";
                        echo "<br>";
                        echo "<a href='klientai.php?ID=" . $klientai["ID"] . "'>Ištrinti</a>";
                    }
                    echo "</th></tr>";

                } 


                ?>

            </tbody>
        </table>

    <?php
    // if (isset($_GET["search"])) {
    //     $sql = "SELECT CEILING(count(ID)/15), count(ID) FROM klientai WHERE klientai.vardas LIKE '$search' OR klientai.pavarde LIKE '$search' OR klientai_teises.pavadinimas LIKE '$search'";    
    //    }
    //   else {            
    //    $sql = "SELECT CEILING(count(ID)/15), count(ID) FROM klientai WHERE $filtravimas"; 
    // }

    $sql=$sql_skaiciavimas;     


$rezultatas = $prisijungimas->query($sql);
if ($rezultatas->num_rows == 1) {
    $klientai_pusl = mysqli_fetch_array($rezultatas);
    // var_dump($klientai_pusl);
    for ($i = 1; $i <= intval($klientai_pusl[0]); $i++) {

        // echo "<a href='klientai.php?pusl_limit=$i'>";
        echo "<a href='klientai.php?rikiavimas_id=".$rikiavimas."&filtravimas_id=".$filtravimas_id."&search=".$search."&pusl_limit=$i'>";
        // echo "<a href='klientai.php?rikiavimas_id=".$rikiavimas."&filtravimas_id=".$filtravimas_id."&search=".$search."&pusl_limit=$i'>";
        echo $i . " </a>";
    }

    echo "<p>iš viso puslapių: " . $klientai_pusl[0] . "</p>";
    echo "<p>iš viso klientų: " . $klientai_pusl[1] . "</p>";
} else {
    echo "Nepavyko suskaičiuoti.";
}


?>

    </div>

</body>

</html>