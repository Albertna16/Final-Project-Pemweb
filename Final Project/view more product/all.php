<?php include('../connections.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATOMIZER</title>
    <link rel="stylesheet" href="styleviewmore.css" />
    <link rel="stylesheet" href="reset.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="viewmoreproduct.css">
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

    <div class="bars">
        <div class="button-choice">
            <a class="active" href="">All</a>
            <a href="atomizer.php">Atomizer</a>
            <a href="mod.php">Mod</a>
            <a href="liquid.php">Liquid</a>
            <a href="baterai.php">Baterai</a>
        </div>
    </div>

    <?php foreach ($result as $data):?>

    <div class="card rounded-4" style="background-color: #b5b0b0;">
        <div class="img-box">
            <img src="../resource/product/img/<?php echo $data['GAMBAR_PRODUCT']; ?>" class="card-img-top" alt="...">
        </div>
        <div class="card-body">
            <h5 class="card-title"><?php echo $data['NAME_PRODUCT']; ?></h5>
            <p class="card-text"><?php echo $data['PRICE_PRODUCT']; ?></p>
            <a href="#" class="btn btn-primary w-100">beli</a>
        </div>
    </div>
    <?php endforeach;?>
    <div class="bgfooter">
        <div class="box3">
            <img src="image/logo.png" alt="">
        </div>
        <div class="box4">
            <p>Follow us on</p>
            <div class="sosmed">
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-whatsapp"></i>
            </div>
        </div>
    </div>

    <footer>Copyright 2023 © VAP.COM</footer>

    <script src="https://kit.fontawesome.com/73bcd336f4.js"></script>

</body>

</html>