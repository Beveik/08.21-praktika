<?php
require_once("connection.php"); //būtina, ypač, kai yra forma
require_once("includes.php");
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klientų pildymo forma</title>
    <style>

.container {
    position:absolute;
     top:50%; 
     left:50%;
    transform: translateX(-50%) translateY(-50%);
    
}
h2 {
    
    text-align: center;
}
.form {
    left: 500px;
    
}

</style>
</head>
<body>
    <div class="container">
    <h2>Pridėkite naują klientą</h2><br>
    <form action="klientupildymoforma.php" method="get">
        <input type="text" value="test" name="vardas"/>
        <input type="text" value="test" name="pavarde"/>
        <!-- <input type="text" value="5" name="teises_id"/> -->
        <label for="teises">Teisės:</label>
  <select name="teises" id="teises">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
  </select>
  <br><br>
        <button type="submit" name="prideti">Pridėti klientą</button>
    </form>
</div>
 <?php
if(isset($_GET["prideti"])){
    if(isset($_GET["vardas"]) && !empty($_GET["vardas"]) && isset($_GET["pavarde"]) && !empty($_GET["pavarde"]) && isset($_GET["teises"])){
$vardas=$_GET["vardas"];
$pavarde=$_GET["pavarde"];
$teisesID=$_GET["teises"];

        $sql="INSERT INTO `klientai`( `vardas`, `pavarde`, `teises_id`) VALUES ('$vardas', '$pavarde', $teisesID)";
if(mysqli_query($prisijungimas, $sql)){
    echo "Įrašas pridėtas.";
} else{
    echo "Įrašo pridėti nepavyko.";
}
    }
}



?>   
</body>
</html>
