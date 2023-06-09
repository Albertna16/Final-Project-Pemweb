<?php 
include('../connections.php')

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALL</title>

    <link rel="stylesheet" href="styleviewmore.css">
    <link rel="stylesheet" href="reset.css">

    <!--link font awesome-->
    <script src="https://kit.fontawesome.com/ad6991be8a.js" crossorigin="anonymous"></script>
</head>

<?php
$query = "SELECT * FROM product";
$stmt = $connection->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<body>
    <div class="bgheader">
        <header>
            <p>Welcome to Vape. salah satu online vape shop terbaik di Indonesia</p>
        </header>
    </div>

    <div class="bar">
        <div class="gambar">
            <a href="../home/home.php"><img src="image/logovapehitam.png" alt=""></a>
        </div>
        <div class="button-choice">
            <a class="nav-link active" href="all.php">All</a>
            <a href="atomizer.php">Atomizer</a>
            <a href="mod.php">Mod</a>
            <a href="liquid.php">Liquid</a>
            <a href="baterai.php">Baterai</a>
        </div>
    </div>

    <div class="container-main">
        <?php foreach ($result as $data) : ?>
            <div class="box">
                <div class="card" style="background-color: #b5b0b0;">
                    <div class="image">
                        <img src="../resource/product/img/<?php echo $data['GAMBAR_PRODUCT']; ?>" class="card-img-top" alt="...">
                    </div>
                    <div class="text">
                        <h4><?php echo $data['NAME_PRODUCT']; ?></h4>
                        <p><?php echo $data['PRICE_PRODUCT']; ?></p>
                    </div>
                    <button>
                        <a href="#">beli</a>
                    </button>
                </div>
            </div>
        <?php endforeach; ?>
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

    <footer>
        <p>Copyright 2023 © VAP.COM</p>
    </footer>
</body>

</html>