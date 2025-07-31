<?php
$sayi1=10;
$sayi2= 20;
/*
if ($sayi1!= $sayi2){
//dogru olduğu taktirde yapılacaktır

echo "iki sayı birbirine eşittir Değildir...";
}
if ($sayi1== $sayi2){
echo "<br>"."sayılar birbirine eşittir";
}
if   ($sayi1>= $sayi2){
echo "<br>"."Sayi1 :".$sayi1."  büyüktür".$sayi2."'den";
}
if   ($sayi2>= $sayi2){
echo "<br>"."sayi2 :".$sayi2." büyüktür".$sayi2."'den";
}
*/



/*
$kullaniciAdi="Altay Akyurek";
$password="1234556";

if($kullaniciAdi== "Altay Akyurek"){  
    //echo"Kullanici bulundu";
    if($password== "1234556"){
        echo "Hoşgerldiniz".$kullaniciAdi;
    }
    else{
        echo "kullanici adi veya parola yanlış girildi..";
    }
}
else{
    echo "kullanici adi veya parola yanlış girildi..";
}
*/
/*
$kullaniciAdi="Altay Akyurek";

$sifre="1234";

if($kullaniciAdi=="Altay Akyurek"&& $sifre== "1234"){
    echo"hoşgeldiniz"."<br>".$kullaniciAdi;
}
else{
    echo "kullanici adi veya parola yanlış girildi..";
}*/

$gun="sali";

if($gun== "Pazartertesi"){
    echo $gun." sendromu"."<br>";
}
else if($gun== "sali"){
    echo $gun." sendromu"."<br>";
}
else if($gun== "çarsamba"){
    echo $gun." sendromu"."<br>";
}
else if($gun== "persembe"){
    echo $gun." sendromu"."<br>";
}
else if($gun== "cuma"){
    echo $gun." sendromu"."<br>";
}
else if($gun== "cumartesi"){
    echo $gun." sendromu"."<br>";
}
else if($gun== "pazar"){
    echo $gun." sendromu"."<br>";
}
switch($gun){
    case "Pazartertesi":
        echo "pazartesi sendromu";
        break;
    case "sali":
        echo "sali günü bitmiyor";
        break;
    case "carsamba":
        echo "haftanın ortasi";
        break;
    case "perşembe":
        echo "hafta bitmesine son 2 gün";
        break;
    case "cuma":
        echo "hafta bitti";
        break;
}
    
?>
