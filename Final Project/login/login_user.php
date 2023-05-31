<?php
//memanggil file conn.php yang berisi koneski ke database
//dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
include('connection/connections.php');

session_start(); // Mulai sesi

// Memeriksa apakah tombol login ditekan
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk memeriksa data pengguna di database
    $query = "SELECT * FROM USER WHERE (USERNAME_USER = '$username' OR EMAIL_USER = '$username') AND PASSWORD_USER = '$password'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) == 1) {
        // Jika data pengguna ditemukan, set sesi dan alihkan ke halaman lain
        $_SESSION['username'] = $username;
        header('Location: ../login/forgot_pass_user.php'); // Ganti "dashboard.php" dengan halaman tujuan setelah login berhasil
        exit();
    } else {
        // Jika data pengguna tidak ditemukan, tampilkan pesan kesalahan
        $error_message = "Invalid username/email or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../login/css/login_user.css">
</head>

<body>
    <div class="container">
        <div class="login-box">
            <img class="logo" src="../login/image/logo.png" alt="Logo" style="width: 100px;">

            <div class="user-type-container">
                <div class="user-type user">User</div>
                <div class="user-type admin">Admin</div>
            </div>

            <div class="form-container">
                <label for="username">Username/Email:</label><br>
                <input type="text" id="username" name="username">
            </div>

            <div class="form-container">
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password">
                <div class="forgot-password"><a href="../login/forgot_pass_user.php">Forgot Password</a></div>
            </div>

            <div class="checkbox-container">
                <input type="checkbox" id="age-check" name="age-check">
                <label for="age-check">I am 18 years or older</label>
            </div>

            <button class="login-button">Login</button>

            <div class="account-text">
                You don't have an account? <a href="../create_acc_user.html">Create account</a>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const userTypes = document.querySelectorAll('.user-type');
            const accountText = document.querySelector('.account-text');
            const forgotPassword = document.querySelector('.forgot-password');

            userTypes.forEach(userType => {
                userType.addEventListener('click', () => {
                    userTypes.forEach(userType => userType.classList.remove('clicked'));
                    userType.classList.add('clicked');

                    if (userType.classList.contains('admin')) {
                        const checkboxContainer = document.querySelector('.checkbox-container');
                        checkboxContainer.classList.add('hide-checkbox');
                        accountText.style.display = 'none';
                        forgotPassword.style.display = 'none';
                    } else {
                        const checkboxContainer = document.querySelector('.checkbox-container');
                        checkboxContainer.classList.remove('hide-checkbox');
                        accountText.style.display = 'block';
                        forgotPassword.style.display = 'block';
                    }
                });
            });

            // Menambahkan kelas 'clicked' ke kolom "User" secara otomatis
            const defaultUserType = document.querySelector('.user-type.user');
            defaultUserType.classList.add('clicked');

            // Menangani klik tombol login
            const loginButton = document.querySelector('.login-button');
            loginButton.addEventListener('click', () => {
                const username = document.querySelector('#username').value;
                const password = document.querySelector('#password').value;

                // Kirim data login ke server menggunakan AJAX
                const xhr = new XMLHttpRequest();
                xhr.open('POST', '../login/login_user.php'); // Ganti "login.php" dengan nama file PHP yang Anda gunakan
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        const response = xhr.responseText;
                        if (response === 'success') {
                            window.location.href = '../login/forgot_pass_user.php'; // Ganti "dashboard.php" dengan halaman tujuan setelah login berhasil
                        } else {
                            // Tampilkan pesan kesalahan jika login gagal
                            alert(response);
                        }
                    }
                };
                xhr.send(`username=${username_user}&password=${password_user}`);
            });
        });
    </script>
</body>

</html>