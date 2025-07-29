<?php
    /* dosya bağlama */
    include("db.php");
    $title=$content="";

    $error= "";

    if($_SERVER["REQUEST_METHOD"]== "POST"){
        /* trim :metinin başında ve sonundaki boşlukları ve ozel karekteri temizler */
        $title=trim($_POST["title"]);
        $content=trim($_POST["content"]);
        $img=null;

    if (isset($_FILES["img"]) && $_FILES["img"]["error"] == UPLOAD_ERR_OK) {

        $tmp_name = $_FILES["img"]["tmp_name"];
        $name = uniqid() . "_" . basename($_FILES["img"]["name"]);
        $target_dir = "uploads/";
        if (!is_dir($target_dir)) mkdir($target_dir, 0777, true);
        $target_file = $target_dir . $name;
        if (move_uploaded_file($tmp_name, $target_file)) {
            $img = $target_file;
        } else {
            $error = "Görsel yüklenemedi!";
        }
    }


        if($title== ""|| $content== ""){
            $error= "Başlık ve içerik boş bırakılamaz!";
        }
        else{
            /*stmt PDO sorgu temsili  */
            $stmt = $pdo->prepare("INSERT INTO posts(title, content, created_at) VALUES(?, ?, NOW())");
            $stmt->execute([$title, $content]);
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
    <form method="post" enctype="multipart/form-data">
        <label>Başlık:</label>
        <!--htmlspecialchars() fonksiyonu, HTML etiketlerini özel karakterlere çevirerek etkisiz hale getirir.  -->
        <input type="text", name="title" value="<?= htmlspecialchars($title)?>" required>
        <label for="içerik:"></label>
        <!--<textarea>, çok satırlı metin girişi yapmak için kullanılan form elemanıdır.
        Kullanıcılar uzun metin, açıklama, yorum gibi içerikleri buraya yazabilir. -->
        <textarea name="content" required><?= htmlspecialchars($content)?></textarea>
        <label>Görsel</label>
        <input type="file" name="img" accept="image/*">
        <button type="submit">Kaydet</button>       
    </form>
    <a href="list_posts.php">Yazı listesine Dön</a>
    </div>
</body>
</html>