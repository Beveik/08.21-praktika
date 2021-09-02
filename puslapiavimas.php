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
    <title>Document</title>
</head>
<body>
<div class="container">
    <!-- rodoma 15 įrašų kiekviename puslapyje -->
    <table class="table table-striped">
    <thead>
      <tr>
      <th scope="col">ID</th>
      <th scope="col">Vardas</th>
      <th scope="col">Pavardė</th>
      <th scope="col">Teisės</th>
      </tr>
    </thead>
    <tbody>
    
<?php
if (isset($_GET["pusl_limit"])){
    $pusl_limit=$_GET["pusl_limit"]*15-15;
} else {
    $pusl_limit=0;
}


$sql= "SELECT * FROM klientai ORDER BY klientai.ID ASC LIMIT $pusl_limit,15";


    $rezultatas=$prisijungimas->query($sql);
    while ($klientai=mysqli_fetch_array($rezultatas)){

        echo "<tr><th>".$klientai["ID"]."</th>";
    echo "<th>".$klientai["vardas"]."</th>";
    echo "<th>".$klientai["pavarde"]."</th>";
    echo "<th>".$klientai["teises_id"]."</th>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>
    <?php
    $sql="SELECT CEILING(COUNT(ID)/15), COUNT(ID) FROM klientai"; //gražina tik vieną skaičių, kiek yra vartotojų
    
    $rezultatas=$prisijungimas->query($sql);
    if($rezultatas->num_rows== 1) {
        $klientai_pusl=mysqli_fetch_array($rezultatas);
        // var_dump($klientai_pusl); nulinis elementas - CEILING(COUNT(ID/15))
        // pirmasis elementas - COUNT(ID)

        for ($i=1; $i<=intval($klientai_pusl[0]); $i++) {

            echo "<a href='puslapiavimas.php?pusl_limit=$i'>"; 
            echo $i." </a>";
        }

        echo "<p>iš viso puslapių: ".$klientai_pusl[0]."</p>";
        echo "<p>iš viso klientų: ".$klientai_pusl[1]."</p>";
        
    } else {
        echo "Nepavyko suskaičiuoti.";
    }
    ?>
    
    
    
    
    </div>
</body>
</html>