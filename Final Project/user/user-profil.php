<?php 
    include('../connections.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER PROFIL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
    <link rel="stylesheet" href="user-profil-style.css">
</head>
<body>

    <div class="sidebar">
        <div class="logo">
            <img src="image/Vape.png" alt="">
        </div>
        <center>
            <img class="user-photo" src=image/profil.jpg>
            <div class="name">
                <p>Brian Yang</p>
            </div>
            <div class="balance">
                <i class="fas fa-wallet balance-icon"></i>
                <span>Saldo</span>
                <span class="balance-amount">Rp0</span>
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
        <h1 class="welcome-text">Hello, Welcome Brian Yang</h1>

        <div class="box">
            <div class="box-row">
                <h2 class="box-title">Akun Saya</h2>
                <button class="box-button" onclick="openPopup('popup-akun')">Ubah</button>
            </div>
            <div class="box-content">
                <p class="box-text">Brian Yang</p>
                <p class="box-text">brianyang@gmail.com</p>
            </div>
        </div>

        <div class="box">
            <div class="box-row">
                <h2 class="box-title">Alamat Saya</h2>
                <button class="box-button" onclick="openPopup('popup-alamat')">Ubah</button>
            </div>
            <div class="box-content">
                <p class="box-text">Brian Yang</p>
                <p class="box-text">Jln. Medokan Asri No. 35 Kec Rungkut, Surabaya, Jawa Timur</p>
                <p class="box-text">085129863457</p>
            </div>
        </div>

        <div class="box">
            <h2 class="box-title">Pesanan Saya</h2>
            <div class="box-content">
                <table class="order-table">
                    <thead>
                        <tr>
                            <th>No Pesanan</th>
                            <th>Dipesan pada</th>
                            <th>Barang</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>001</td>
                            <td>2023-01-15</td>
                            <td>Swag Vape</td>
                            <td>Rp450.000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="popup-overlay" id="popup-akun">
            <div class="popup-content">
                <h2 class="popup-title">Akun Saya</h2>
                <span class="popup-close" onclick="closePopup('popup-akun')"><i class="fas fa-times"></i></span>
                <form class="popup-form">
                    <label for="upload-foto">Foto Profil</label>
                    <input type="file" id="upload-foto">
                    <label for="ubah-nama">Nama</label>
                    <input type="text" id="ubah-nama">
                    <button class="btn-save" type="submit">Simpan</button>
                </form>
            </div>
        </div>


        <div class="popup-overlay" id="popup-alamat">
            <div class="popup-content">
                <h2 class="popup-title">Alamat Saya</h2>
                <span class="popup-close" onclick="closePopup('popup-alamat')"><i class="fa fa-times"></i></span>
                <form class="popup-form">
                    <label for="ubah-nama-penerima">Nama Penerima</label>
                    <input type="text" id="ubah-nama-penerima">
                    <label for="ubah-alamat">Alamat</label>
                    <input type="text" id="ubah-alamat">
                    <label for="ubah-no-telepon">Nomor telepon</label>
                    <input type="text" id="ubah-no-telepon">
                    <button class="btn-save" type="submit">Simpan</button>
                </form>
            </div>
        </div>

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