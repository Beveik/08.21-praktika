<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="duomenubazespildymas.php" method="get">
        <button type="submit" name="sukurti">Sukurti klientus</button>
    </form>
<?php

// Užduotis: "Klientų valdymas"

// 1. Sukurti dokumentą duomenubazesupildymas.php. Šis dokumentas turi sukurti 200 įrašų Klientai lentelėje.
// 2. Papildyti dokumentą klientupildymoforma.php.
// *Po kliento pridėjimo, turi parodyti informaciją apie klientą.
// *Tikrinti,ar teises_id laukelyje yra įvestas skaičius.
// 3. Sukurti dokumentą, klientai.php. Jame turi būti atvaizduojami visi klientai esantys duomenų bazėje.
// 4. Paspaudus ant kliento, turi būti įmanoma redaguoti jo duomenis ir išsaugoti.
// 5. Kiekvieną klientą turi būti galimybė ištrinti iš duomenų bazės.

require_once ("connection.php");

if(isset($_GET["sukurti"])){
$klientai=array();
// $name="";
// $surname="";
for($i=0; $i<200; $i++){
    $name="name".($i+1);
    $surname="surname".($i+1);
    $rights=rand(0,6);
    $sql="INSERT INTO `klientai`( `vardas`, `pavarde`, `teises_id`) VALUES ('$name', '$surname', $rights)";

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