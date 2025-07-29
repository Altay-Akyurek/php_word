<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=i̇nsaat;charset=utf8", "root", "");
} catch (PDOException $e) {
    echo $e->getMessage();
}

$insert = $db->prepare("INSERT INTO inşaat_teklif SET
    insaat_sahibi = :insaat_sahibi,
    teklif = :teklif,
    metrekare = :metrekare,
    katsayisi = :katsayisi");

$data = array(
    "insaat_sahibi" => "Altay Akyürek",
    "teklif" => "12558",
    "metrekare" => "123",
    "katsayisi" => "5"
);

$result = $insert->execute($data);

if ($result) {
   echo "<span style='color:green;'>Ekleme işi başarılıdır...</span>";

} else {
     echo "<span style='color:red;'>Ekleme işi başarısızdır...</span>";
}
?>
