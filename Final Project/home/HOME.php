<?php

// membuat koneksi ke system
$dbServer = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = "pemwebvape";

try {
    //membuat object PDO untuk koneksi ke database
    $connection = new PDO("mysql:host=$dbServer;dbname=$dbName", $dbUser, $dbPass);
    // setting ERROR mode PDO: ada tiga mode error mode silent, warning, exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $err) {
    echo "Failed Connect to Database Server : " . $err->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    if (!$_SESSION['login'] == 1 && !isset($_SESSION['userId'])) {
        header('location: ../login/login_user.php');
        exit;
    }
    $nama = $_POST['FN'];
    $email = $_POST['email'];
    $deskripsi = $_POST['issue'];

    // Mencari ID_USER berdasarkan email yang diinputkan
    $query = "SELECT ID_USER FROM user WHERE EMAIL_USER = :email";
    $statement = $connection->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);

    if ($result && isset($result['ID_USER'])) {
        $id_user = $result['ID_USER'];

        // Menyimpan data ke tabel report
        $query = "INSERT INTO report (ID_USER, DESK_REPORT) VALUES (:id_user, :deskripsi)";
        $statement = $connection->prepare($query);
        $statement->bindValue(':id_user', $id_user);
        $statement->bindValue(':deskripsi', $deskripsi);
        $statement->execute();

        // Menampilkan pesan setelah data berhasil disimpan
        echo "Report submitted successfully!";
    } else {
        echo "User not found!";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>

    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="reset.css">

    <!--import gfonts-->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400&display=swap');
    </style>

    <!--link font awesome-->
    <script src="https://kit.fontawesome.com/ad6991be8a.js" crossorigin="anonymous"></script>


</head>

<body>
    <div class="bgheader" id="home">
        <header>
            <p>Welcome to Vape. salah satu online vape shop terbaik di Indonesia</p>
        </header>
    </div>

    <div class="bar">
        <div class="gambar">
            <a href="#"><img src="image/logovapehitam.png" alt=""></a>
        </div>
        <div class="tombol">
            <a href="#home">HOME</a>
            <a href="#aboutus">ABOUT US</a>
            <a href="#product">PRODUCT</a>
            <a href="#report">REPORT</a>
            <div class="tombol1">
                <a href="../user/user-profil.php"><i class="fa-solid fa-user"></i></a>
            </div>
            <div class="tombol2">
                <a href=""><i class="fa-solid fa-right-from-bracket"></i></a>
            </div>
        </div>
    </div>

    <div class="jumbotron">
        <img src="image/home.png" alt="">
    </div>

    <div class="aboutus" id="aboutus">
        <div class="box1">
            <img src="image/pod.png" alt="">
        </div>
        <div class="box2">
            <h2>About Us</h2>
            <p>Selamat datang di VapeStore.com, destinasi terpercaya Anda untuk semua kebutuhan vaping!
                Kami adalah toko online yang berkomitmen untuk menyediakan produk-produk vape berkualitas
                tinggi, aksesori terbaru, serta informasi dan layanan pelanggan yang luar biasa. <br><br>
                VapeStore.com, kami memahami bahwa vaping telah menjadi fenomena global yang meraih popularitas
                yang luar biasa. Kami berdedikasi untuk menyediakan platform yang lengkap dan mudah digunakan
                bagi para penggemar vaping dari berbagai kalangan, baik bagi pemula yang tertarik untuk memulai
                vaping maupun bagi vapers berpengalaman yang mencari produk terbaru dan terbaik.</p>
        </div>
    </div>

    <div class="product" id="product">
        <div class="kalimat_kategori">
            <h2>Product Categories</h2>
            <p>Kami bangga menyajikan beragam produk vape berkualitas tinggi di VapeStore.com. Dari rokok
                elektronik inovatif hingga e-liquid dengan rasa terbaik, kami memiliki semua yang Anda butuhkan
                untuk mengalami vaping yang memuaskan.
            </p>
        </div>
        <div class="kategori">
            <a href="../view more product/atomizer.php"><img src="image/product1.png" alt=""></a>
            <a href="../view more product/mod.php"><img src="image/product2.png" alt=""></a>
            <a href="../view more product/liquid.php"><img src="image/product3.png" alt=""></a>
            <a href="../view more product/baterai.php"><img src="image/product4.png" alt=""></a>
        </div>
        <div class="view-more">
            <a href="">View More</a>
        </div>
    </div>

    <div class="report" id="report">
        <div class="box2">
            <div class="box2-1">
                <h2>Report</h1>
                    <p>Kami menghargai setiap saran dan kritik yang Anda miliki untuk meningkatkan pengalaman Anda
                        di Vape Store. Jika Anda ingin melaporkan, jangan ragu untuk. Tim kami siap menjadi
                        penghubung dan merespons setiap umpan balik yang Anda berikan.
                    </p>
            </div>
            <div class="box2-2">
                <form action="" method="POST">
                    <div class="nama">
                        <div class="nama1">
                            <i class="fa-regular fa-user"></i>
                            <input type="text" name="FN" placeholder="Name">
                        </div>
                    </div>
                    <div class="email">
                        <i class="fa-regular fa-envelope"></i>
                        <input type="text" name="email" placeholder="email">
                    </div>
                    <div class="desc">
                        <textarea type="text" name="issue" placeholder="Describe your issue"></textarea>
                    </div>
                    <div class="send">
                        <button type="submit">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="bgfooter">
        <div class="box3">
            <img src="image/logo.png" alt="">
        </div>
        <div class="box4">
            <p>Follow us on</p>
            <div class="sosmed">
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
            </div>
        </div>
    </div>

    <footer>Copyright 2023 © VAP.COM</footer>

    <script src="https://kit.fontawesome.com/73bcd336f4.js"></script>

</body>

</html>
