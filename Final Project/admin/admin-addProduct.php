<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Add Product</title>
    <link rel="stylesheet" href="css/admin-addProduct.css">
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
        <div class="add-product">
            <h1>Tambah Produk</h1>
            <div class="add1">
                <div class="add-gambar-konfr">
                    <div class="add-gambar">
                        <i class="fa-regular fa-image"></i>
                        <p>Tambah gambar produk</p>
                    </div>
                    <button>Add Produk</button>
                </div>

                <div class="addPrdct">
                    <div class="add2">
                        <i class="fa-solid fa-pen"></i>
                        <p>Nama Produk</p>
                    </div>
                    <div class="add2">
                        <i class="fa-solid fa-pen"></i>
                        <p>Harga Produk</p>
                    </div>
                    <div class="add3">
                        <i class="fa-solid fa-pen"></i>
                        <p>Deskripsi Produk</p>
                    </div>
                    <i class="fa-solid fa-pen-line"></i>
                </div>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/73bcd336f4.js" crossorigin="anonymous"></script>
</body>

</html>