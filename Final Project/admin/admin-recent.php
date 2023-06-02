<?php 
include('../connections.php');
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
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Bryan Yang</td>
                        <td>RDA Druga 24mm</td>
                        <td>Rp. 115.000</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Bryan Yang</td>
                        <td>RDA Druga 24mm</td>
                        <td>Rp. 115.000</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Bryan Yang</td>
                        <td>RDA Druga 24mm</td>
                        <td>Rp. 115.000</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/73bcd336f4.js" crossorigin="anonymous"></script>
</body>

</html>