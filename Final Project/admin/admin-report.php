<?php
session_start();
if (!$_SESSION['login']==1 && !isset($_SESSION['adminId'])) {
    header('location: ../login/login_user.php');
	exit;
}

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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Report</title>
    <link rel="stylesheet" href="../admin/css/admin-report.css">
    <script src="https://kit.fontawesome.com/73bcd336f4.js" crossorigin="anonymous"></script>
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
                    <li class=""><i class="fa-solid fa-stopwatch"></i><a href="admin-recent.php"> Recent Activity</a></li>
                    <li class="active"><i class="fa-solid fa-flag"></i><a href="#">Report</a></li>
                </ul>
            </div>
            <div class="logout"><a href=""><i class="fa-solid fa-right-from-bracket"></i> Log Out</a></div>
        </div>

        <div class="container-main">
            <h1>Report from user</h1>
            <?php
            $query = "SELECT user.NAMA_USER, user.EMAIL_USER, report.DESK_REPORT
                      FROM report
                      INNER JOIN user ON report.ID_USER = user.ID_USER";
            $stmt = $connection->prepare($query);
            $stmt->execute();
            $reports = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($reports as $report) {
                $namaUser = $report['NAMA_USER'];
                $emailUser = $report['EMAIL_USER'];
                $deskReport = $report['DESK_REPORT'];
            ?>
                <div class="report1">
                    <div class="data-report">
                    <img src="img/user-solid.svg" alt="">
                        <div class="nama-report">
                            <h3><?php echo $namaUser; ?></h3>
                            <p><?php echo $emailUser; ?></p>
                        </div>
                    </div>

                    <div class="isi-report">
                        <p><?php echo $deskReport; ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    .