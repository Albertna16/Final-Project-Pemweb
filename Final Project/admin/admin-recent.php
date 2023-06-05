<?php
include("../connections.php");

// Mengambil data dari tabel transaksi_item
$query = "SELECT transaksi_item.ID, user.NAMA_USER, product.NAME_PRODUCT, transaksi_item.JUMLAH, transaksi_item.HARGA, (transaksi_item.JUMLAH * transaksi_item.HARGA) AS TOTAL_HARGA, transaksi.TANGGAL_TRANSAKSI
FROM transaksi_item
INNER JOIN transaksi ON transaksi_item.id_transaksi = transaksi.id_transaksi
INNER JOIN user ON transaksi.id_user = user.id_user
INNER JOIN product ON transaksi_item.id_product = product.id_product";

$results = []; // Inisialisasi variabel $results dengan array kosong

try {
    // Menjalankan query
    $stmt = $connection->query($query);

    // Mengambil semua hasil query
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $err) {
    echo "Failed to retrieve data: " . $err->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Recent</title>
    <link rel="stylesheet" href="css/admin-recent.css">
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <div class="logo"><img src="img/Vape.png" alt=""></div>
            <div class="profile-preview">
                <img src="img/userprofile.jpg" alt="">
                <h3>Jonathan Roy</h3>
                <p>Admin</p>
            </div>
            <div class="list-link">
                <ul>
                    <li class=""><i class="fa-solid fa-house"></i><a href="admin-dashboard.php">Dashboard</a></li>
                    <li class=""><i class="fa-solid fa-bag-shopping"></i><a href="admin-product.php"> Product</a></li>
                    <li class="active"><i class="fa-solid fa-stopwatch"></i><a href="admin-recent.php"> Recent Activity</a></li>
                    <li class=""><i class="fa-solid fa-flag"></i><a href="admin-report.php">Report</a></li>
                </ul>
            </div>
            <div class="logout"><a href=""><i class="fa-solid fa-right-from-bracket"></i> Log Out</a></div>
        </div>
        <div class="container-main">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>User</th>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Total harga</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($results as $row) : ?>
                        <tr>
                            <td><?php echo $row['ID']; ?></td>
                            <td><?php echo $row['NAMA_USER']; ?></td>
                            <td><?php echo $row['NAME_PRODUCT']; ?></td>
                            <td><?php echo $row['JUMLAH']; ?></td>
                            <td><?php echo 'Rp. ' . number_format($row['TOTAL_HARGA'], 0, ',', '.'); ?></td>
                            <td><?php echo $row['TANGGAL_TRANSAKSI']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/73bcd336f4.js" crossorigin="anonymous"></script>
</body>

</html>
