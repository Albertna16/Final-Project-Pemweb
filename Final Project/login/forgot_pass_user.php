<?php
//memanggil file conn.php yang berisi koneski ke database
//dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
include('connection/connections.php');

$status = '';
$result = '';
//melakukan pengecekan apakah ada variable GET yang dikirim
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id_user'])) {
        //query SQL
        $id_user = $_GET['id_user'];
        $query = "SELECT password_user FROM user WHERE id_user = '$id_user'";

        //eksekusi query
        $result = mysqli_query(connection(), $query);
    }
}

//melakukan pengecekan apakah ada form yang dipost
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password_user = ($_POST["password_user"]);

    $sql = "UPDATE user SET password_user='$password_user' WHERE id_user='$id_user'";

    //eksekusi query
    $result = mysqli_query(connection(), $sql);
    if ($result) {
        $status = 'ok';
    } else {
        $status = 'err';
    }

    header('Location: login_user.php?status=' . $status);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot password user</title>
    <link rel="stylesheet" href="../login/css/forgot_pass_user.css">
</head>

<body>
    <div class="background-image"></div>
    <div class="form-container">
        <div class="form">
            <h2>Change password</h2>
            <form action="forgot_pass_user.php" method="POST">
                <?php while ($data = mysqli_fetch_array($result)) { ?>
                    <div class="form-group">
                        <label for="newPass">New password :</label>
                        <input type="text" id="newPass" name="newPass">
                    </div>
                    <div class="form-group">
                        <label for="confirmPass">Confirm password:</label>
                        <input type="password" id="confirmPass" name="confirmPass">
                    </div>
                <?php } ?>
                <button class="submit-button">Create account</button>
            </form>
        </div>
    </div>
</body>

</html>