<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Sadece CDN üzerinden Bootstrap kullanılıyor -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

    <title>Adres Listesi</title>
</head>

<?php 

try {
    $db=new PDO("mysql:host=localhost;dbname=adres_defteri;charset=utf8","root","");
}catch(PDOException $e) {

    echo "Veritabanına bağlatı yapılamadı". $e->getMessage();
}

$rows=$db->query("SELECT * FROM adres_defteri",PDO::FETCH_ASSOC);





?>

<body class="container mt-5">

    <h2 class="mb-4">Adres Listesi</h2>
    
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>K.No</th>
                <th>Ad</th>
                <th>Soyad</th>
                <th>Adres</th>
                <th>Web</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Fecebook</th>
                <th>Twitter</th>
                <th>GooglePlus</th>
                <th>note</th>
                <th>Birtdhday</th>
            </tr>
        </thead>
        <tbody>
            <!-- foreach dizideki değer kadar kendini kopyalar -->
            <?php foreach($rows as $row){?>
            <tr>
                <td><?php echo $row["id"];?></td>
                <td><?php echo $row["name"];?></td>
                <td><?php echo $row["lastname"];?></td>
                <td><?php echo $row["adres"];?></td>
                <td><?php echo $row["web"];?></td>
                <td><?php echo $row["email"];?></td>
                <td><?php echo $row["phone"];?></td>
                <td><?php echo $row["fecebook"];?></td>
                <td><?php echo $row["twitter"];?></td>
                <td><?php echo $row["googlePlus"];?></td>
                <td><?php echo $row["note"];?></td>
                <td><?php echo $row["birtdhday"];?></td>
            </tr>
            <?php }?>
        </tbody>
    </table>

</body>
</html>
