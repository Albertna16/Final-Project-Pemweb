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
                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="text" id="email" name="email" value="<?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?>">
                </div>
                <div class=" form-group">
                    <label for="newPass">New password :</label>
                    <input type="password" id="newPass" name="newPass">
                </div>
                <div class="form-group">
                    <label for="confirmPass">Confirm password:</label>
                    <input type="password" id="confirmPass" name="confirmPass">
                </div>
                <button class="submit-button" type="submit">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>
