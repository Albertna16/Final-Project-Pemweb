<?php
//memanggil file conn.php yang berisi koneski ke database
//dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
include('../connections.php');

$status = '';
//melakukan pengecekan apakah ada form yang dipost
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name_produk = ($_POST["NAME_PRODUCT"]);
    $price_product = ($_POST["PRICE_PRODUCT"]);
    $desk_product = ($_POST["DESK_PRODUCT"]);

    //query dengan PDO
    $query = $connection->prepare("INSERT INTO product (name_product, price_product, desk_product) VALUES(:NAME_PRODUCT, :PRICE_PRODUCT, :DESK_PRODUCT)");

    //binding data
    $query->bindParam(':NAME_PRODUCT', $name_produk);
    $query->bindParam(':PRICE_PRODUCT', $price_product);
    $query->bindParam(':DESK_PRODUCT',  $desk_product);

    //eksekusi query
    if ($query->execute()) {
        $status = 'ok_daftar';
        header('Location: ../admin/admin-product.php?status=' . $status);
        exit();
    } else {
        $status = 'err';
    }
}

?>

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
        <form action="" method="POST">
            <div class="add-product">
                <h1>Tambah Produk</h1>
                <form action="">
                    <div class="add1">
                        <div class="add-gambar-konfr">
                            <div class="add-gambar">
                                <i class="fa-regular fa-image"></i>
                                <p>Tambah gambar produk</p>
                            </div>
                            <button class="button-choice" type="submit">
                                Add Produk
                            </button>
                        </div>

                        <div class="addPrdct">
                            <div class="add2">
                                <i class="fa-solid fa-pen"></i>
                                <input type="text" class="form-control" name="NAME_PRODUCT" id="NAME_PRODUCT" placeholder="Nama produk">
                            </div>
                            <div class="add2">
                                <i class="fa-solid fa-pen"></i>
                                <input type="text" class="form-control" name="PRICE_PRODUCT" id="PRICE_PRODUCT" placeholder="Harga produk">
                            </div>
                            <div class="add3">
                                <i class="fa-solid fa-pen"></i>
                                <textarea class="form-control" name="DESK_PRODUCT" id="DESK_PRODUCT" placeholder="Deskripsi produk"></textarea>
                            </div>
                            <i class="fa-solid fa-pen-line"></i>
                        </div>
                    </div>
                </form>
            </div>
        </form>
    </div>

    <script src="https://kit.fontawesome.com/73bcd336f4.js" crossorigin="anonymous"></script>
</body>

</html>