<?php
    $bolum = array(
        "php_sinifi"=>array(
            "Mehmet"=>450,
            "Altay"=> 550,
        ),
        "java_sinifi"=>array(
            "ali"=> 100,
            "mahmut"=> 890,
        ),
        "argular_sinifi"=>array(
            "ilker"=>563,
            "tunç"=> 550,


        )
    ) ;
    print_r($bolum["argular_sinifi"]);
    foreach ($bolum as $sinif) {
        print_r($sinif);
    }
?>