<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
h5 {
    float: right;
}
        .container {
            position:absolute;
            float: right;
             top:10%; 
             left:50%;
            transform: translateX(-50%);
            
        }
        .form-group {
            margin-top: -11px;
            float: left;
        }
        form.atsijungti{
float: right;
margin-right: -150px;
        }


    </style>
</head>
<body>
    
<?php

require_once ("connection.php");
require_once("includes.php");
require_once("includes/menu.php");
?>
<div class="container">
<form action="klientai.php" method="get">

<div class="form-group">
    <select class="form-control" name="rikiavimas_id">
        <option value="ASC"> MIN-MAX</option>
        <option value="DESC"> MAX-MIN</option>
    </select>
    <br>
    <button class="btn btn-primary" name="rikiuoti" type="submit">Rikiuoti</button>
</div>

</form>

<?php    

if(!isset($_COOKIE["prisijungta"])) { 
    header("Location: index.php");    
} else {
    echo "<h5>Sveiki prisijungę!</h5><br>";
    echo "<form action='klientai.php' class='atsijungti' method ='get'>";
    echo "<br><button class='btn btn-primary' type='submit' name='logout'>Atsijungti</button>";
    echo "</form><br>";
    if(isset($_GET["logout"])) {
        setcookie("prisijungta", "", time() - 3600, "/");
        header("Location: index.php");
    }
}    
?>
<?php

if(isset($_GET["ID"])){
    $id= $_GET["ID"];
    $prisijungimas->query ("DELETE FROM `klientai` WHERE `ID` = $id");
    header("location:klientai.php");
    if(mysqli_query($prisijungimas, $sql)){
        $message= "Įrašas ištrintas.";
        $class="success";
    } else{
        $message= "Įrašo ištrinti nepavyko.";
        $class="danger";
    }
}
?>
<?php if(isset($message)){?>
<div class="alert alert-<?php echo $class;?>"</div>

<?php } ?>

<?php if(isset($_GET["search"]) && !empty($_GET["search"])) { ?>
    <a class="btn btn-primary" href="klientai.php">Išvalyti paiešką</a>
<?php } ?>



<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Vardas</th>
      <th scope="col">Pavardė</th>
      <th scope="col">Teisės</th>
      <th scope="col">Veiksmai</th>
    </tr>
  </thead>
  <tbody>

    <?php
// 0 - naujas
//1 - ilgalaikis
//2 - neaktyvus
//3 - nemokus
//4 - Ne EU klientas
//5 - EU klientas
if(isset($_GET["rikiavimas_id"]) && !empty($_GET["rikiavimas_id"])) {
    $rikiavimas = $_GET["rikiavimas_id"];
} else {
    $rikiavimas = "DESC";
}

$sql = "SELECT * FROM `klientai` ORDER BY `ID` $rikiavimas";
if(isset($_GET["search"]) && !empty($_GET["search"])) {
    $search = $_GET["search"];

$sql="SELECT * FROM `klientai` WHERE `vardas` LIKE '%".$search."%' OR `pavarde` LIKE '%".$search."%' ORDER BY `ID` $rikiavimas";
} //užklausa
$rezultatas=$prisijungimas->query($sql); // užklausos vykdymas
while ($klientai=mysqli_fetch_array($rezultatas)){

    echo "<tr><th>".$klientai["ID"]."</th>";
    echo "<th>".$klientai["vardas"]."</th>";
    echo "<th>".$klientai["pavarde"]."</th>";

    $teises_id = $klientai["teises_id"];
    $sql = "SELECT * FROM klientai_teises WHERE reiksme = $teises_id";
    $result_teises = $prisijungimas->query($sql); //vykdoma uzklausa

    if($result_teises->num_rows == 1) {
        $rights = mysqli_fetch_array($result_teises);
        echo "<td>";
             echo $rights["pavadinimas"];
        echo "</td>";
    } else {
        echo "<td>Nepatvirtintas klientas</td>";
    }

    echo "<th>";
    echo "<a href='klientaiedit.php?ID=".$klientai["ID"]."'>Redaguoti</a>";    
    echo "<br>";
    echo "<a href='klientai.php?ID=".$klientai["ID"]."'>Ištrinti</a>";

    echo "</th></tr>";
}

?>
  </tbody>
</table>
    
    <?php

// require_once ("connection.php"); 
// require_once("includes.php");





?>
</div>
</body>
</html>