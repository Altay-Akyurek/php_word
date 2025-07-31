<?php
/* /eski usul aşağıdaki gibi yazılıyor/ */
/* try {
    $db = new PDO("mysql:host=localhost;dbname=i̇nsaat;charset=utf8", "root", ""); 
    // echo "Bağlantı başarılı";
} catch (PDOException $e) {
    echo "Bağlantı hatası: " . $e->getMessage();
    exit; // Hata varsa devam etmesin
} */

     
require_once("connet.php");

/* /Bu alaln gerekli olan listelelemeri yaparr/ */
/* $rows = $db->query("SELECT * FROM inşaat_teklif", PDO::FETCH_ASSOC); */
/* PDO admindeki verileri bir liste gibi gösterdik */
/* if ($rows && $rows->rowCount() > 0) {
    foreach ($rows as $row) {
        echo "İnşşat sahibi id:". $row["id"]."<br>"; 
        echo "İnşaat sahibi: ". $row["insaat_sahibi"]."<br>";
 */        
        /* print_r($row); */
/*         echo "İnsaata yapılan teklif: ".$row["teklif"]."<br>";
        echo "<hr>";
    }
} else {
    echo "Kayıt bulunamadı.";
} */

$id = 5;
$rows = $db->prepare("SELECT * FROM posts WHERE id = :id"); // :id parametresi
$rows->execute(array("id" => $id)); // parametre buraya bağlanır
$result= $rows->fetchALL(PDO::FETCH_ASSOC);
print_r($result);
/* if ($rows && $rows->rowCount() > 0) {
    foreach ($rows as $row) {
        print_r($result);
        echo "<hr><br>";
    }
} else {
    echo "Kayıt bulunamadı.";
} */



?>
 