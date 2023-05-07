



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
        try{
session_start();
session_unset();
session_destroy();
echo '<h6 class="loggedin">Logged out!</h6>';

echo '<a href="login.php"> <div class="btn btn-secondary custom-btn">Login?</div></a>';
        }
        catch(Exception $e){
            echo "EROOR LOGGING OUT!!!";
        }

?>


            
        </div>
        
    </div>

</body>

</html>

