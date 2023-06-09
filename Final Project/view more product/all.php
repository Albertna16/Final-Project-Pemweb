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
        <div class="box">
            <div class="card" style="background-color: #b5b0b0;">
                <div class="image">
                    <img src="image/card1.png" class="card-img-top" alt="...">
                </div>
                <div class="text">
                    <h4>RDA Druga 24mm</h4>
                    <p>Rp.115.000</p>
                </div>
                <button>
                    <a href="#">beli</a>
                </button>
            </div>
        </div>
        <div class="box">
            <div class="card" style="background-color: #b5b0b0;">
                <div class="image">
                    <img src="image/card1.png" class="card-img-top" alt="...">
                </div>
                <div class="text">
                    <h4>RDA Druga 24mm</h4>
                    <p>Rp.115.000</p>
                </div>
                <button>
                    <a href="#">beli</a>
                </button>
            </div>
        </div>
        <div class="box">
            <div class="card" style="background-color: #b5b0b0;">
                <div class="image">
                    <img src="image/card1.png" class="card-img-top" alt="...">
                </div>
                <div class="text">
                    <h4>RDA Druga 24mm</h4>
                    <p>Rp.115.000</p>
                </div>
                <button>
                    <a href="#">beli</a>
                </button>
            </div>
        </div>
        <div class="box">
            <div class="card" style="background-color: #b5b0b0;">
                <div class="image">
                    <img src="image/card1.png" class="card-img-top" alt="...">
                </div>
                <div class="text">
                    <h4>RDA Druga 24mm</h4>
                    <p>Rp.115.000</p>
                </div>
                <button>
                    <a href="#">beli</a>
                </button>
            </div>
        </div>
        <div class="box">
            <div class="card" style="background-color: #b5b0b0;">
                <div class="image">
                    <img src="image/card1.png" class="card-img-top" alt="...">
                </div>
                <div class="text">
                    <h4>RDA Druga 24mm</h4>
                    <p>Rp.115.000</p>
                </div>
                <button>
                    <a href="#">beli</a>
                </button>
            </div>
        </div>
        <div class="box">
            <div class="card" style="background-color: #b5b0b0;">
                <div class="image">
                    <img src="image/card1.png" class="card-img-top" alt="...">
                </div>
                <div class="text">
                    <h4>RDA Druga 24mm</h4>
                    <p>Rp.115.000</p>
                </div>
                <button>
                    <a href="#">beli</a>
                </button>
            </div>
        </div>
        <div class="box">
            <div class="card" style="background-color: #b5b0b0;">
                <div class="image">
                    <img src="image/card1.png" class="card-img-top" alt="...">
                </div>
                <div class="text">
                    <h4>RDA Druga 24mm</h4>
                    <p>Rp.115.000</p>
                </div>
                <button>
                    <a href="#">beli</a>
                </button>
            </div>
        </div>
        <div class="box">
            <div class="card" style="background-color: #b5b0b0;">
                <div class="image">
                    <img src="image/card1.png" class="card-img-top" alt="...">
                </div>
                <div class="text">
                    <h4>RDA Druga 24mm</h4>
                    <p>Rp.115.000</p>
                </div>
                <button>
                    <a href="#">beli</a>
                </button>
            </div>
        </div>
        <div class="box">
            <div class="card" style="background-color: #b5b0b0;">
                <div class="image">
                    <img src="image/card1.png" class="card-img-top" alt="...">
                </div>
                <div class="text">
                    <h4>RDA Druga 24mm</h4>
                    <p>Rp.115.000</p>
                </div>
                <button>
                    <a href="#">beli</a>
                </button>
            </div>
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
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
            </div>
        </div>
    </div>

    <footer><p>Copyright 2023 © VAP.COM</p></footer>
</body>
</html>
