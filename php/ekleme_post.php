<?php
    /* dosya bağlama */
    include("db.php");
    $title=$content="";

    $error= "";

    if($_SERVER["REQUEST_METHOD"]== "POST"){
        /* trim :metinin başında ve sonundaki boşlukları ve ozel karekteri temizler */
        $title=trim($_POST["title"]);
        $content=trim($_POST["content"]);
        if($title== ""|| $content== ""){
            $error= "Başlık ve içerik boş bırakılamaz!";
        }
        else{
            /*stmt PDO sorgu temsili  */
            $db=$PDO->prepare("INSERT INTO posts(title,content,created_at) VALUES(?,?,?)");
            /* header: HTTP başlıği göndermek için kullanıldı */
            header("Location:list_posts.php");
            exit();
        }

    }
?>



<!-- HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>BLOG</title>
</head>
<body>
    <div class="container">
    <h2>BLOG Yazısı Ekle </h2>
    <!-- bir php kodu içerisinden bir div oluşturduk ve sınıfın isimini error verdik ve if dongüsü
     bitiridik -->
    <?php if($error): ?><div class="error"><?= $error ?></div><?php endif; ?>
    <form method="post" >
        <label>Başlık:</label>
        <!--htmlspecialchars() fonksiyonu, HTML etiketlerini özel karakterlere çevirerek etkisiz hale getirir.  -->
        <input type="text", name="title" value="<?= htmlspecialchars($title)?>" required>
        <label for="içerik:"></label>
        <!--<textarea>, çok satırlı metin girişi yapmak için kullanılan form elemanıdır.
        Kullanıcılar uzun metin, açıklama, yorum gibi içerikleri buraya yazabilir. -->
        <textarea name="content" required><?= htmlspecialchars($content)?></textarea>
        <button type="submit">Kaydet</button>       
    </form>
    <a href="list_posts.php">Yazı listesine Dön</a>
    </div>
</body>
</html>