<?php 
include('../connections.php');
if (isset($_GET['status'])) {
    $status = $_GET['status'];
} else {
    $status = '';
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN PRODUCT</title>
    <link rel="stylesheet" href="css/admin-product.css">
    
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
                    <li class=""><i class="fa-solid fa-flag"></i><a href="admin-report.php">Report</a></li>
                </ul>
            </div>
            <div class="logout"><a href=""><i class="fa-solid fa-right-from-bracket"></i> Log Out</a></div>
        </div>
        <div class="container-main">
            <?php
            if ($status == 'ok') {
                echo '<b>Berhasil ditambahkan</b>';
            } elseif ($status == 'ok_daftar') {
                echo '<b>gagal ditambahkan</b>';
            }
            ?>
            <div class="add-product">
                <a href="admin-AddProduct.php">Add Product <i class="fa-solid fa-cart-shopping"></i></a>
            </div>
            <div class="list-product">
                <div class="product">
                    <div class="product-img">
                        <img src="img/icelandmango30ml.png" alt="">
                    </div>
                    <div class="product-info">
                        <h2>Iceland Mango 30ml</h2>
                        <p>Rp. 110.000</p>
                    </div>
                    <div class="product-action">
                        <a href="">Delete</a>
                        <a href="">Edit</a>
                    </div>
                </div>
                <div class="product">
                    <div class="product-img">
                        <img src="img/icelandmango30ml.png" alt="">
                    </div>
                    <div class="product-info">
                        <h2>Iceland Mango 30ml</h2>
                        <p>Rp. 110.000</p>
                    </div>
                    <div class="product-action">
                        <a href="">Delete</a>
                        <a href="">Edit</a>
                    </div>
                </div>
                <div class="product">
                    <div class="product-img">
                        <img src="img/icelandmango30ml.png" alt="">
                    </div>
                    <div class="product-info">
                        <h2>Iceland Mango 30ml</h2>
                        <p>Rp. 110.000</p>
                    </div>
                    <div class="product-action">
                        <a href="">Delete</a>
                        <a href="">Edit</a>
                    </div>
                </div>
                <div class="product">
                    <div class="product-img">
                        <img src="img/icelandmango30ml.png" alt="">
                    </div>
                    <div class="product-info">
                        <h2>Iceland Mango 30ml</h2>
                        <p>Rp. 110.000</p>
                    </div>
                    <div class="product-action">
                        <a href="">Delete</a>
                        <a href="">Edit</a>
                    </div>
                </div>
                <div class="product">
                    <div class="product-img">
                        <img src="img/icelandmango30ml.png" alt="">
                    </div>
                    <div class="product-info">
                        <h2>Iceland Mango 30ml</h2>
                        <p>Rp. 110.000</p>
                    </div>
                    <div class="product-action">
                        <a href="">Delete</a>
                        <a href="">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/73bcd336f4.js" crossorigin="anonymous"></script>
</body>

</html>