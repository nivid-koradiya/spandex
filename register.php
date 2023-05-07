<?php
session_start();
if (isset($_SESSION['IS_LOGIN'])) {
    header('location:login.php');
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/colors.css">
</head>

<body>
    <div class="container">
        <div class="form">
            <h1 class="mb-3 title">Spandex</h1>
            <h6 class="mb-3 title">Registration</h6>
            <form class="myForm" method="post" action="backend.php">
                <div class="form-group mb-2">
                    <input class="form-control input-lg pass" type="text" name="username" placeholder="Username" />
                </div>
                <div class="form-group mb-2">
                    <input class="form-control input-lg pass" type="password" name="password" placeholder="Passsowrd" />
                </div>
                    <input type="submit" name="register" class="btn btn-success login-btn" value="Signup" />
            </form>
        </div>
    </div>

</body>

</html>