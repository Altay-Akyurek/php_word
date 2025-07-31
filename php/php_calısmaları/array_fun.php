<?php
        $personeller=array("ali","ihlas","ahmet","altay","hüseyin");
        /* print_r($personeller); */
        echo "<hr>";
        /* Boyut alani.. Elaman sayısını alan fonksiyonlar */

        echo sizeof($personeller);
        /* Eklemem fonk.. */

        array_push($personeller,"pogca");
        array_unshift($personeller,"Boncuk");

        /* print_r($personeller); */
        /* BAŞTAN ÇIKARMA  */
        array_pop($personeller);
        /* SONDAN CIKARMA */
        array_shift($personeller); 
        /* print_r($personeller) */;
        /* Hangi elamanla birşetirilkeceğini yapıyoruz */

        echo implode(",", $personeller);

        /* toplama Fonk */

        $sayılar=array(1,2,3,4,5,6);
         
        echo "<hr><br>".array_sum($sayılar);

        /* Array içinde arama  */

        echo "<hr><br>".in_array("altay",$personeller);    



?>