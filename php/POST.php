<?php

if($_POST)
{
    $personelAdi=$_POST["personeladi"];
    $email=$_POST["email"];

    echo "Personel Adi:".$personelAdi."<br>";
    echo "Email :  ".$email."<br>";
}

?>