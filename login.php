<!DOCTYPE html>
<html lang="en">
<?php require("backend.php"); ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/colors.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <div class="container">
        <div class="form">
            <h1 class="mb-3 title">Spandex</h1>
            <?php
            if (isset($_SESSION['IS_LOGIN'])) {
                echo '<h6 class="loggedin">ALEADY LOGIN FOUND! </h6>';
                echo '<a href="dashboard.php"> <div class="btn btn-secondary custom-btn">To Dashboard</div></a>';
                echo "<br>";
                echo '<a href="logout.php"> <div class="btn btn-secondary custom-btn">Logout</div></a>';
            } 
            else {?>

                <form class="myForm" method="post">

                    <div class="form-group mb-4">
                        <!-- <input class="form-control input-lg uname" type="text" name="email" id="email" placeholder="Username" /> -->
                    </div>
                    <div class="form-group mb-2">
                        <input class="form-control input-lg pass" type="password" name="key" placeholder="Key" />
                    </div>
                    <input type="submit" name="login" class="btn btn-success login-btn" value="Login" />
                </form>
            <?php
            }
            ?>

            <h6 class="login-error">
                <?php
                if ($LOGIN_ERRORS) {
                    echo $LOGIN_ERRORS;
                }

                ?>
            </h6>
            
        </div>
        
    </div>

</body>

</html>