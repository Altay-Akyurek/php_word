<?php
include("db.php");

$error = "";

if (!isset($_GET['id'])) {
    header("Location: list_posts.php");
    exit();
}

$id = intval($_GET['id']);
$stmt = $pdo->prepare("SELECT * FROM posts WHERE id=?");
$stmt->execute([$id]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$post) {
    header("Location: list_posts.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST["title"]);
    $content = trim($_POST["content"]);

    // Varsayılan olarak mevcut img
    $img = $post['img'];

    // Yeni görsel yüklendiyse işle
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

    if ($title == "" || $content == "") {
        $error = "Başlık ve içerik boş bırakılamaz";
    }
    else {
        $stmt = $pdo->prepare("UPDATE posts SET title=?, content=?, img=? WHERE id=?");
        $stmt->execute([$title, $content, $img, $id]);
        header("Location: list_posts.php");
        exit();
    }
} else {
    $title = $post['title'];
    $content = $post['content'];
    $img = $post['img'];
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Düzenleme</title>
    <!-- Bootstrap ekle istersen -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container my-4">
        <h2>Düzenleme</h2>
        <?php if($error):?><div class="error"><?= $error?></div><?php endif;?>
        <form method="post" enctype="multipart/form-data">
            <label>Başlık:</label>
            <input type="text" name="title" value="<?= htmlspecialchars($title)?>" required class="form-control mb-2">
            <label>İçerik:</label>
            <textarea name="content" required class="form-control mb-2"><?= htmlspecialchars($content)?></textarea>
            <label>Mevcut Görsel:</label><br>
            <?php if(!empty($img) && file_exists($img)): ?>
                <img src="<?= htmlspecialchars($img) ?>" alt="Blog görseli" style="max-width:200px;max-height:150px;" class="mb-2"><br>
            <?php else: ?>
                <img src="https://dummyimage.com/200x150/222/3693ff.png&text=Blog" alt="Varsayılan görsel" class="mb-2"><br>
            <?php endif; ?>
            <label>Yeni Görsel Yükle (isteğe bağlı):</label>
            <input type="file" name="img" accept="image/*" class="form-control mb-2">
            <button type="submit" class="btn btn-primary">Güncelle</button>
        </form>
        <a href="list_posts.php" class="btn btn-link mt-3">Yazı listesine dön</a>
    </div>
</body>
</html>