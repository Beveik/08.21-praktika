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
<form action="imones.php" method="get">

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
    echo "<form action='imones.php' class='atsijungti' method ='get'>";
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
    $prisijungimas->query ("DELETE FROM `imones` WHERE `ID` = $id");
    header("location:imones.php");
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
    <a class="btn btn-primary" href="imones.php">Išvalyti paiešką</a>
<?php } ?>



<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Pavadinimas</th>
      <th scope="col">Aprašymas</th>
      <th scope="col">Tipas</th>
      <th scope="col">Veiksmai</th>
    </tr>
  </thead>
  <tbody>

    <?php

if(isset($_GET["rikiavimas_id"]) && !empty($_GET["rikiavimas_id"])) {
    $rikiavimas = $_GET["rikiavimas_id"];
} else {
    $rikiavimas = "DESC";
}

$sql = "SELECT * FROM `imones` ORDER BY `ID` $rikiavimas";
if(isset($_GET["search"]) && !empty($_GET["search"])) {
    $search = $_GET["search"];

$sql="SELECT * FROM `imones` WHERE `pavadinimas` LIKE '%".$search."%' OR `tipas_id` LIKE '%".$search."%' ORDER BY `ID` $rikiavimas";
} //užklausa
$rezultatas=$prisijungimas->query($sql); // užklausos vykdymas
while ($imones=mysqli_fetch_array($rezultatas)){

    echo "<tr><th>".$imones["ID"]."</th>";
    echo "<th>".$imones["pavadinimas"]."</th>";
    echo "<th>".$imones["aprasymas"]."</th>";
    // echo "<th>".$imones["tipas_id"]."</th>";

    $teises_id = $imones["tipas_id"];
    $sql = "SELECT * FROM imones_tipas WHERE ID = $teises_id";
    $result_teises = $prisijungimas->query($sql); //vykdoma uzklausa

    if($result_teises->num_rows == 1) {
        $rights = mysqli_fetch_array($result_teises);
        echo "<td>";
             echo $rights["pavadinimas"];
        echo "</td>";
    } else {
        echo "<td>Nepatvirtinta įmonė.</td>";
    }

    echo "<th>";
    echo "<a href='imoneedit.php?ID=".$imones["ID"]."'>Redaguoti</a>";    
    echo "<br>";
    echo "<a href='imones.php?ID=".$imones["ID"]."'>Ištrinti</a>";

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