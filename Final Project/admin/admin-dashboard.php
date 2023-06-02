<?php 
include('../connections.php');
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN DASHBOARD</title>
    <link rel="stylesheet" href="css/admin-dashboard.css">
    
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
                    <li class="active"><i class="fa-solid fa-bag-shopping"></i><a href="admin-product.php"> Product</a></li>
                    <li class=""><i class="fa-solid fa-stopwatch"></i><a href="admin-recent.php"> Recent Activity</a></li>
                    <li><i class="fa-solid fa-flag"></i><a href="">Report</a></li>
                </ul>
            </div>
            <div class="logout"><a href=""><i class="fa-solid fa-right-from-bracket"></i> Log Out</a></div>
        </div>
        <div class="container-main">
            <div class="section1">
                <div class="greeting">
                    <p>Hello, Welcome Back</p>
                    <h3>MANAGE YOUR MARKETPLACE</h3>
                </div>
                <div class="logo"><img src="img/Vape.png" alt=""></div>
            </div>
            <div class="section2">
                <div class="keuangan">
                    <div class="keuangan-detail">
                        <p>Pemasukan</p>
                        <h2>2.530.123.123</h2>
                    </div>
                    <div class="keuangan-detail">
                        <p>Jumlah Produk</p>
                        <h2>6</h2>
                    </div>
                    <div class="keuangan-detail">
                        <p>Keuntungan</p>
                        <h2>1.512.762.124</h2>
                    </div>
                </div>
                <div class="user-info">
                    <div class="user-info-detail">
                        <div class="icon"><i class="fa-solid fa-users"></i></div>
                        <div class="information">
                            <p>user yang sudah registrasi</p>
                            <h2>10</h2>
                        </div>
                    </div>
                    <div class="user-info-detail">
                        <div class="icon"><i class="fa-solid fa-basket-shopping"></i></div>
                        <div class="information">
                            <p>Jumlah Pesanan</p>
                            <h2>3</h2>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://kit.fontawesome.com/73bcd336f4.js" crossorigin="anonymous"></script>
</body>

</html>