<?php

session_start();

if (!isset($_SESSION['IS_LOGIN'])) {
    header('location:login.php');
}

?>





<!DOCTYPE html>
<html lang="en">
<?php require("backend.php"); ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="assets/js/bootstrap.js"></script>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/colors.css">
    <link rel="stylesheet" href="assets/css/style.css">


    <style>
        .entry-modal{
            background: var(--tertiary);
        }
        .entry-modal-dialog{
            background: var(--secondary);
        }

    </style>
</head>

<?php
$month = date('m');
$day = date('d');
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;
?>

<body>
    <div class="container">
        <div class="form">
            <h1 class="mb-3 title">Spandex</h1>
            <h5 class="mb-3 title">ENTRY PORTAL</h5>
            <form action="" method="post" autocomplete="off" onsubmit="return validateForm()" name="form">
                <div class="form-group">
                    <select class="form-select btn btn-primary custom-btn" aria-label="Default select example" name="type">
                        <option selected>Select Transaction type ⬇</option>
                        <option value="expense">🔴 Expense </option>
                        <option value="income">🟢 Income </option>
                        <option value="3" disabled>🔵 Transfer Funds </option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="date" id="entry-date" name="date" class="form-control uname" max="<?php echo $today; ?>" value="<?php echo $today; ?>">
                </div>
                <div class="form-group">
                    <input type="text" name="amount" class="form-control input uname" placeholder="Amount">
                </div>
                <div class="form-group">
                    <input type="text" name="desc" class="form-control input uname" placeholder="Description">
                </div>
                <input type="submit" name="record-entry" class="btn btn-success custom-btn" value="Record Entry" />
            </form>
            <h6 class="login-error">
                <?php
                if ($ENTRY_ERRORS) {
                    foreach ($ENTRY_ERRORS as  $value) {
                        echo $value;
                    }
                }
                ?>
            </h6>

        </div>


    </div>


    <script>
        function validateForm() {
            var x = document.forms["form"]["amount"].value;
            if (x == "") {
                alert("Amount must be filled out");
                return false;
            }
        }
    </script>

    <div class="modal fade entry-modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Success</h5>
                </div>
                <div class="modal-body">
                    <?php
                    echo $MODAL_DATA;
                    ?> </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <?php
    if ($SCR) {
        echo $SCR;
    }
    ?>
</body>

</html>