<?php
include("../connections.php");
session_start();
if (!$_SESSION['login'] == 1 && !isset($_SESSION['adminId'])) {
    header('location: ../login/login_user.php');
    exit;
}

// Mengambil data dari tabel transaksi
$query = "SELECT transaksi.ID_TRANSAKSI, user.NAMA_USER, product.NAME_PRODUCT, transaksi.JUMLAH, transaksi.HARGA, (transaksi.JUMLAH * transaksi.HARGA) AS TOTAL_HARGA, transaksi.TANGGAL_TRANSAKSI
FROM transaksi
INNER JOIN user ON transaksi.ID_USER = user.ID_USER
INNER JOIN product ON transaksi.ID_PRODUCT = product.ID_PRODUCT";

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
            <div class="logout"><a href="../login/login_user.php"><i class="fa-solid fa-right-from-bracket"></i> Log Out</a></div>
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
                            <td><?php echo $row['ID_TRANSAKSI']; ?></td>
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