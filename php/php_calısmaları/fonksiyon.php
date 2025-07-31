<?php
    function kareal($a){
        
        echo $a*$a."<br>";
    }
    function baslık1($metin){
        echo "<h1>$metin<h1>";
    }
    function kup($a){
        $kup=$a*$a*$a;
        return $kup;
    }
    kareal(2);
    baslık1("Altay Akyürek");
    $sayi=10;
    $toplam=$sayi+kup($sayi);
    echo $toplam;

?>