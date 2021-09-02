<?php require_once("connection.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos</title>
</head>
<body>

<form action="datos.php" method="get">
<input type="text" name="username" placeholder="Enter your username">
<button type="submit" name="submit">Submit</button>
</form>    


<?php

//getdate ir date testavimas
$today= getdate();
var_dump($today);
echo "<br>";
echo $today["year"]."-".$today["mon"]."-".$today["mday"];
echo "<br>";
// 0 - timestamp, kompiuterio datos atvaizdavimas

// date(formatas, timestamp) - $today[0] masyvo elementą (timestamp) paverčia į datą
$formatas="Y-m-d";
$formated_date=date( $formatas, $today[0]);
// var_dump($formated_date);
echo $formated_date;
echo "<br>";
/////////////////////////////////////////////////////////////////////////
// mygtuko paspaudimu yra paimama data
// data įrašoma į duomenų bazę
// įsirašo į tą laukelį, su kuriuo sutampa username


if (isset($_GET["submit"])){
// $formated_date_1=date("Y-m-d H:i:s");
// date_default_timezone_set('UTC+3'); // date_default_timezone_set('Europe/Vilnius');
//  echo $formated_date_1;
if(isset($_GET["username"]) && !empty($_GET["username"])){
    $username=$_GET["username"];
//  $sql="UPDATE `vartotojai` SET `paskutinis_prisijungimas`='$formated_date_1' WHERE `slapyvardis`='$username'";
 $sql="UPDATE `vartotojai` SET `paskutinis_prisijungimas`=NOW() WHERE `slapyvardis`='$username'";
 if(mysqli_query($prisijungimas, $sql)) {
    $message =  "data pakeista.";
   
} else {
    $message =  "Data nepakeista.";
    
}
echo $message;
}
}

    ?>
</body>
</html>