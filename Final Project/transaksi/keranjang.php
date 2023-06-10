<?php
include('../connections.php');
session_start();
if (!$_SESSION['login'] == 1 && !isset($_SESSION['userId'])) {
    header('location: ../login/login_user.php');
    exit;
}
$totalPrice = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="keranjang.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <div class="bgheader" id="home">
        <header>
            <p>Welcome to Vape. salah satu online vape shop terbaik di Indonesia</p>
        </header>
    </div>
    <div class="bar">
        <div class="gambar">
            <a href="../home/HOME.php"><img src="../view more product/image/logovapehitam.png" alt=""></a>
        </div>
        <div class="tombol">
            <a href="#home">HOME</a>
            <a href="#aboutus">ABOUT US</a>
            <a href="#product">PRODUCT</a>
            <a href="#report">REPORT</a>
            <div class="tombol1">
                <a href="../view more product/all.php"><i class="bi bi-cart-plus-fill"></i></a>
            </div>

            <div class="tombol1">
                <a href="../user/user-profil.php"><i class="fa-solid fa-user"></i></a>
            </div>
            <div class="tombol2">
                <a href="../login/logout.php"><i class="fa-solid fa-right-from-bracket"></i></a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="keranjang">
            <h2>Keranjang Belanja</h2>
            <?php if (isset($_SESSION["cart_item"])) {
                foreach ($_SESSION["cart_item"] as $item) : ?>
                    <div class="item">
                        <div class="checkItem">
                            <a href="addToCart.php?action=remove&codeProduct=<?php echo $item["id"] . '-' . $item['name']; ?>&link=keranjang"><i class="bi bi-x-lg"></i></a>
                        </div>

                        <div class="namaItem">
                            <img src="../resource/product/img/<?php echo $item["image"]; ?>" alt="">
                            <p><?php echo $item["name"]; ?></p>
                        </div>
                        <div class="hargaItem">
                            <p>Rp. <span class="harga"><?php echo $item["price"]; ?></span></p>
                        </div>
                        <div class="jumlahItem">
                            <a href="addToCart.php?action=min&id=<?php echo $item["id"]; ?>&link=keranjang" class="<?php echo $item['quantity'] == 1 ? 'disabled' : '' ?>">
                                <i class="bi bi-dash"></i>
                            </a>
                            <span class="quantity"><?php echo $item["quantity"]; ?></span>
                            <a href="addToCart.php?action=plus&id=<?php echo $item["id"]; ?>&link=keranjang" class="<?php echo $item['quantity'] == 10 ? 'disabled' : '' ?>">
                                <i class="bi bi-plus"></i>
                            </a>
                        </div>
                        <div class="totalItem">
                            <p>Rp. <span class="hargaTotal"><?php echo $item["quantity"] * $item["price"] ?></span></p>
                        </div>
                    </div>
            <?php
                    $totalPrice += $item["quantity"] * $item["price"];
                endforeach;
            } else {
                echo "Belum ada produk yang ditambahkan";
            }

            ?>
        </div>
        <?php
        $idUser = $_SESSION['userId'];
        $query = "SELECT * FROM user where ID_USER = :id";
        $stmt = $connection->prepare($query);
        $stmt->bindParam(':id', $idUser);
        $stmt->execute();
        $info = $stmt->fetch(PDO::FETCH_ASSOC);
        ?>
        <div class="pembayaran">

            <h2>Pembayaran</h2>
            <div class="alamat">
                <h3>Nama</h3>
                <p><?php echo $info["NAMA_USER"] ?></p>
                <h3>Alamat</h3>
                <p><?php echo $info["ADDRESS"] ?></p>
                <h3>Saldo</h3>
                <p>Rp. <?php echo $info["SALDO"] ?></p>
            </div>
            <a href="../user/user-profil.php">Ubah Data</a>
            <div class="totalBayar">
                <h3>Total</h3>
                <p>Rp. <span class="totalSemua"><?php echo $totalPrice; ?></span></p>
            </div>
            <div class="button-choice">
                <form action="transaksi.php" method="post">
                    <input type="hidden" name="totalBayar" value="<?php echo $totalPrice ?>">
                    <button type="submit">Bayar</button>
                </form>
            </div>
        </div>

    </div>
    <script src="https://kit.fontawesome.com/73bcd336f4.js" crossorigin="anonymous"></script>
</body>


</html>