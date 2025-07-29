<?php
include("db.php"); // db.php içinde $pdo tanımlı olmalı

/* intval() — Integer (Tam Sayı) Değeri Almak */
/* isset() — Bir Değişken Tanımlı mı? */

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Güvenlik için sayıya çeviriyoruz

    $stmt = $pdo->prepare("DELETE FROM posts WHERE id = ?");
    $stmt->execute([$id]);
}

header("Location: list_posts.php");
exit();
?>
