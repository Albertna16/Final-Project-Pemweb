<?php
//memanggil file conn.php yang berisi koneski ke database
//dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
include('connection/connections.php');

$status = '';
//melakukan pengecekan apakah ada form yang dipost
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email_user = ($_POST["email_user"]);
    $username_user = ($_POST["username_user"]);
    $password_user = ($_POST["password_user"]);

    $query = "INSERT INTO user (email_user, username_user, password_user) VALUES('$email_user', '$username_user', '$password_user')";

    //eksekusi query
    $result = mysqli_query(connection(), $query);
    if ($result) {
        $status = 'ok';
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
    <title>Create account user</title>
    <link rel="stylesheet" type="text/css" href="../login/css/create_acc_user.css">
</head>

<body>
    <div class="background-image"></div>
    <div class="form-container">
        <div class="form">
            <?php
            if ($status == 'ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data user berhasil disimpan</div>';
            } elseif ($status == 'err') {
                echo '<br><br><div class="alert alert-danger" role="alert">Data user gagal disimpan</div>';
            }
            ?>
            <h2>Create an account</h2>
            <form action="../login/create_acc_user.php" method="POST">
                <div class="form-group">
                    <label for="username_user">Username:</label>
                    <input type="text" id="username_user" name="username_user" placeholder="username">
                </div>
                <div class="form-group">
                    <label for="email_user">Email:</label>
                    <input type="email" id="email_user" name="email_user" placeholder="email">
                </div>
                <div class="form-group">
                    <label for="password_user">Password:</label>
                    <input type="password" id="password_user" name="password_user" placeholder="password">
                </div>
                <button class="submit-button">Create account</button>
            </form>
        </div>
    </div>
</body>

</html>