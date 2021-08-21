<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
//prisijungti prie duomenų bazės
//Atlikti užklausas(Select, update, delete, insert)
//uždaryti prisijungimą

//1. Prisijungimas - connection.php
require_once ("connection.php"); //imituoja, kad tas failas yra šioje vietoje
//visi kintamieji, kurie yra connection.php faile, dabar yra pasiekiami

//$uzklausa=""; 
$sql="SELECT * FROM `klientai` WHERE ID=10";//tekstas
$rezultatas=mysqli_query($prisijungimas, $sql); //vykdo užklausą

//$klientai=mysqli_fetch_array($rezultatas); // iš užklausos paimk rezulattaus ir sudėk į masyvą, išveda tik vieną klientą
//su ciklu grąžina ne vieną klientą, o visus
while ($klientai=mysqli_fetch_array($rezultatas)){

    echo $klientai["ID"].". ";
    echo $klientai["vardas"].", ";
    echo $klientai["pavarde"].", ";
    echo $klientai["teises_id"]."<br>";
}
//var_dump($klientai);
//mysqli_close($prisijungimas); - uždarome tik pabaigoje, po visų užklausų

$sql="INSERT INTO `klientai`( `vardas`, `pavarde`, `teises_id`) VALUES ('pridetas','perPHP','6')";
if(mysqli_query($prisijungimas, $sql)){
    echo "Įrašas pridėtas.";
} else{
    echo "Įrašo pridėti nepavyko.";
}

$sql="UPDATE `klientai` SET `vardas`='PakeistasPHP' WHERE ID=7";
if(mysqli_query($prisijungimas, $sql)){
    echo "Įrašas pakeistas.";
} else{
    echo "Įrašo pakeisti nepavyko.";
}
// for($i=19; $i<619; $i++){
// $sql="DELETE FROM `klientai` WHERE ID=$i";
// if(mysqli_query($prisijungimas, $sql)){
//     echo "Įrašas ištrintas.";
// } else{
//     echo "Įrašo ištrinti nepavyko.";
// }
//}
mysqli_close($prisijungimas);

?>
</body>
</html>