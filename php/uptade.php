<?php
/* veriğ tabanına bağlantı */
    try {
    $db = new PDO("mysql:host=localhost;dbname=i̇nsaat;charset=utf8", "root", "");
} catch (PDOException $e) {
    echo $e->getMessage();
}


$update=$db->prepare("UPDATE inşaat_teklif SET  
    insaat_sahibi=:insaat_sahibi,
    teklif=:teklif,
    metrekare=:metrekare,
    katsayisi=:katsayisi
    WHERE id=:id");

    $data=array(
        "insaat_sahibi"=>"Altay Akyürek",
        "teklif"=>"12341655",
        "metrekare"=> "12223",
        "katsayisi"=> "5",
        "id"=>1908
    );

    $result=$update->execute($data);

    if($result){
       echo "<span style='color:green;'>Güncelle işi Başrılı..</span>";
    }else{
        echo "<span style='color:red;'>Güncelle işi Başrısız..</span>";
    }
    echo $result;
?>