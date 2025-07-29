<?php
    include("db.php");
    /* PHP’de query() metodu, PDO (PHP Data Objects) sınıfı içinde bir SQL sorgusunu doğrudan çalıştırmak için kullanılır. */
    $posts = $pdo->query("SELECT * FROM posts ORDER BY created_at DESC")->fetchAll(PDO::FETCH_ASSOC);
    /*summary: String özetlemek için kullandık */
    function summary($text,$len=120)
    {
        /* mb_strlen() karakter setleriyle yazılmış metinlerde, karakter 
        sayısını doğru şekilde hesaplamak için kullanılır. */

        /* mb_substr() fonksiyonu, çok baytlı (multibyte) 
        karakter setleriyle yazılmış metinlerden belirli
        - bir kısmı almak (substring) için kullanılır. */
        return mb_strlen($text)>$len? mb_substr($text,0,$len) : $text;
    };
?>


<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Blog Yazıları</title>
    <!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- AOS CSS -->
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #222; color: #eee; }
        .card { box-shadow: 0 6px 24px #111; }
        .card-title { color: #3693ff; }
        .card-text { color: #ccc; }
        .btn-custom { background: #3693ff; color: #fff; border: none; }
        .btn-custom:hover { background: #2763b8; }
        .badge-date { background: #222; color: #93caff; position: absolute; top: 0.5rem; right: 0.5rem; }
        .modal-content { background: #222; color: #eee; }
        .btn-close-white { filter: invert(1); }
    </style>
</head>
<body>
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-2 row-cols-xl-3 justify-content-center">
            <?php foreach($posts as $post): ?>
            <div class="col mb-5" data-aos="fade-up">
                <div class="card h-100 position-relative">
                    <span class="badge badge-date"><?= htmlspecialchars($post['created_at']) ?></span>
                    <?php
                        $img_src = (!empty($post['img']) && file_exists($post['img'])) 
                            ? $post['img'] 
                            : "https://dummyimage.com/450x250/222/3693ff.png&text=Blog";
                    ?>
                    <img class="card-img-top" src="<?= htmlspecialchars($img_src) ?>" alt="Blog Görseli" />
                    <div class="card-body p-4">
                        <div class="text-center">
                            <h5 class="card-title fw-bolder"><?= htmlspecialchars($post['title']) ?></h5>
                            <p class="card-text"><?= htmlspecialchars(summary($post['content'])) ?></p>
                        </div>
                    </div>
                    <div class="card-footer p-3 pt-0 border-top-0 bg-transparent d-flex justify-content-center gap-2">
                        <a href="edit_post.php?id=<?= $post['id'] ?>" class="btn btn-outline-warning btn-sm">Düzenle</a>
                        <a href="delete_post.php?id=<?= $post['id'] ?>" onclick="return confirm('Silmek istediğine emin misin?')" class="btn btn-outline-danger btn-sm">Sil</a>
                        <button type="button" class="btn btn-custom btn-sm" data-bs-toggle="modal" data-bs-target="#modal<?= $post['id'] ?>">
                            Detay
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modal<?= $post['id'] ?>" tabindex="-1" aria-labelledby="modalLabel<?= $post['id'] ?>" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel<?= $post['id'] ?>"><?= htmlspecialchars($post['title']) ?></h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Kapat"></button>
                  </div>
                  <div class="modal-body">
                    <?php if(!empty($post['img']) && file_exists($post['img'])): ?>
                        <img src="<?= htmlspecialchars($post['img']) ?>" alt="Blog Görseli" class="img-fluid mb-3" style="max-height: 350px;">
                    <?php endif; ?>
                    <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
                  </div>
                  <div class="modal-footer">
                    <span class="badge bg-info"><?= htmlspecialchars($post['created_at']) ?></span>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-4">
            <a href="ekleme_post.php" class="btn btn-success btn-lg">Yeni Yazı Ekle</a>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS JS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
    AOS.init();
</script>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>