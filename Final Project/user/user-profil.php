<?php
    include('conn.php');
?>

<?php
    $query = "SELECT * FROM user";
    // data user
    $result = $conn->query($query);
    $data = $result->fetch(PDO::FETCH_ASSOC);
?>

<?php
    $query_pesanan = "SELECT 
    product.name_product, 
    transaksi.id_transaksi, 
    transaksi.tanggal_transaksi, 
    transaksi_item.jumlah, 
    transaksi_item.harga
    FROM 
        product
    JOIN 
        transaksi_item ON product.id_product = transaksi_item.id_product
    JOIN 
        transaksi ON transaksi.id_transaksi = transaksi_item.id_transaksi;";
    
    // data pesanan-user
    $result_pesanan = $conn->query($query_pesanan);
    $data_pesanan = $result_pesanan->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER PROFIL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
    <link rel="stylesheet" href="user-profile-style.css">
</head>
<body>
    
    <?php if (!empty($result)): ?>
    <div class="sidebar">
        <div class="logo">
            <img src="image/Vape.png" alt="">
        </div>
        <center>
            <?php if ($data['FOTO_USER'] == "") { ?>
                <img class="user-photo" src="https://via.placeholder.com/500x500.png?text=TIDAK+ADA+FOTO">
            <?php }else{ ?>
                <img class="user-photo" src="foto-profil-user/<?php echo $data['FOTO_USER']; ?>">
            <?php } ?>

            <div class="name">
                <p><?php echo $data['USERNAME_USER'];  ?></p>
            </div>
            <div class="balance">
                <i class="fas fa-wallet balance-icon"></i>
                <span>Saldo</span>
                <span class="balance-amount">Rp<?php echo $data['SALDO'];  ?></span>
            </div>
        </center>
        <div class="navigation">
            <a href="#" class="navigation-item">
                <i class="fas fa-home navigation-icon"></i>
                <span>Home</span>
            </a> &nbsp
            <a href="#" class="navigation-item">
                <i class="fas fa-sign-out-alt navigation-icon"></i>
                <span>Logout</span>
            </a>
        </div>
    </div>

    <div class="content">
        <h1 class="welcome-text">Hello, Welcome <?php echo $data['USERNAME_USER'];  ?></h1>

        <div class="box">
            <div class="box-row">
                <h2 class="box-title">Akun Saya</h2>
                <button class="box-button" onclick="openPopup('popup-akun')">Ubah</button>
            </div>
            <div class="box-content">
                <p class="box-text"><?php echo $data['USERNAME_USER'];  ?></p>
                <p class="box-text"><?php echo $data['EMAIL_USER'];  ?></p>
            </div>
        </div>

        <div class="box">
            <div class="box-row">
                <h2 class="box-title">Alamat Saya</h2>
                <button class="box-button" onclick="openPopup('popup-alamat')">Ubah</button>
            </div>
            <div class="box-content">
                <p class="box-text"><?php echo $data['NAMA_USER'];  ?></p>
                <p class="box-text"><?php echo $data['ADDRESS'];  ?></p>
                <p class="box-text"><?php echo $data['NUMBER_PHONE'];  ?></p>
            </div>
        </div>
    <?php endif; ?>

    <?php if (!empty($result_pesanan)): ?>
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
                        <tr>
                            <td><?php echo $data_pesanan['id_transaksi'];  ?></td>
                            <td><?php echo $data_pesanan['tanggal_transaksi'];  ?></td>
                            <td><?php echo $data_pesanan['name_product'];  ?></td>
                            <td><?php echo $data_pesanan['jumlah'];  ?></td>
                            <td><?php echo $data_pesanan['harga'];  ?></td>
                        </tr>
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