<?php
session_start();

// membuat koneksi ke database system
$dbServer = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = "pemwebvape";

try {
    //membuat object PDO untuk koneksi ke database
    $conn = new PDO("mysql:host=$dbServer;dbname=$dbName", $dbUser, $dbPass);
    // setting ERROR mode PDO: ada tiga mode error mode silent, warning, exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $err) {
    echo "Failed Connect to Database Server : " . $err->getMessage();
}

if (!isset($_SESSION['login']) || $_SESSION['login'] != 1 || !isset($_SESSION['userId'])) {
    header('location: ../login/login_user.php');
    exit;
}

$query = "SELECT * FROM user WHERE ID_USER = :userId";
$stmt = $conn->prepare($query);
$stmt->bindParam(':userId', $_SESSION['userId']);
$stmt->execute();
$data = $stmt->fetch(PDO::FETCH_ASSOC);

$query_pesanan = "SELECT 
    product.NAME_PRODUCT, 
    transaksi.ID_TRANSAKSI, 
    transaksi.TANGGAL_TRANSAKSI, 
    transaksi.JUMLAH, 
    transaksi.HARGA
    FROM 
        product
    JOIN 
        transaksi ON product.ID_PRODUCT = transaksi.ID_PRODUCT
    WHERE
        transaksi.ID_USER = :userId";

$stmt_pesanan = $conn->prepare($query_pesanan);
$stmt_pesanan->bindParam(':userId', $_SESSION['userId']);
$stmt_pesanan->execute();
$data_pesanan = $stmt_pesanan->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER PROFIL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link rel="stylesheet" href="../user/user-profil-style.css">
</head>

<body>
    <div class="sidebar">
        <div class="logo">
            <img src="image/Vape.png" alt="">
        </div>
        <center>
            <img class="user-photo" src="../user/image/user.svg">
            <div class="name">
                <p><?php echo $data['USERNAME_USER']; ?></p>
            </div>
            <div class="balance">
                <i class="fas fa-wallet balance-icon"></i>
                <span>Saldo</span>
                <span class="balance-amount">Rp<?php echo $data['SALDO']; ?></span>
            </div>
        </center>
        <div class="navigation">
            <a href="../home/home.php" class="navigation-item">
                <i class="fas fa-home navigation-icon"></i>
                <span>Home</span>
            </a> &nbsp
            <a href="../login/logout.php" class="navigation-item">
                <i class="fas fa-sign-out-alt navigation-icon"></i>
                <span>Logout</span>
            </a>
        </div>
    </div>

    <div class="content">
        <h1 class="welcome-text">Hello, Welcome <?php echo $data['USERNAME_USER']; ?></h1>

        <div class="box">
            <div class="box-row">
                <h2 class="box-title">Akun Saya</h2>
                <button class="box-button" onclick="openPopup('popup-akun')">Ubah</button>
            </div>
            <div class="box-content">
                <p class="box-text"><?php echo $data['USERNAME_USER']; ?></p>
                <p class="box-text"><?php echo $data['EMAIL_USER']; ?></p>
            </div>
        </div>

        <div class="box">
            <div class="box-row">
                <h2 class="box-title">Alamat Saya</h2>
                <button class="box-button" onclick="openPopup('popup-alamat')">Ubah</button>
            </div>
            <div class="box-content">
                <p class="box-text"><?php echo $data['NAMA_USER']; ?></p>
                <p class="box-text"><?php echo $data['ADDRESS']; ?></p>
                <p class="box-text"><?php echo $data['NUMBER_PHONE']; ?></p>
            </div>
        </div>

        <?php if (!empty($data_pesanan)) : ?>
            <div class="box">
                <h2 class="box-title">Pesanan Saya</h2>
                <div class="box-content">
                    <table class="order-table">
                        <thead>
                            <tr>
                                <th>No Pesanan</th>
                                <th>Dipesan pada</th>
                                <th>Barang</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data_pesanan as $pesanan) : ?>
                                <tr>
                                    <td><?php echo $pesanan['ID_TRANSAKSI']; ?></td>
                                    <td><?php echo $pesanan['TANGGAL_TRANSAKSI']; ?></td>
                                    <td><?php echo $pesanan['NAME_PRODUCT']; ?></td>
                                    <td><?php echo $pesanan['JUMLAH']; ?></td>
                                    <td><?php echo $pesanan['HARGA']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endif; ?>

        <?php include('pop-up-akun.php'); ?>
        <?php include('pop-up-alamat.php'); ?>
    </div>

    <script>
        function openPopup(popupId) {
            var popup = document.getElementById(popupId);
            popup.style.display = "block";
        }

        function closePopup(popupId) {
            var popup = document.getElementById(popupId);
            popup.style.display = "none";
        }
    </script>
</body>

</html>