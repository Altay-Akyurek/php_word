<!DOCTYPE html>
<html lang="tr"">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Kullanımı</title>
</head>
<body>
    <h3><?php echo "Bu bir PHP'ifadesibnden Gelenn Başlıklar "?></h3>
    <p><?php echo "dolar "?></p>
    <?php 
    $sayi = 10; 
    $fontBoyutu="20px";
    $renk="red";
    $fontStil="italic";
?>
<span style="color:<?php echo $renk?>;  font-size:<?php echo $fontBoyutu?>; font-style:<?php echo $fontStil?>">
<strong>
    <?php 
        echo $sayi;
    ?>
</strong>
</span>
</body>
</html>