<?php
session_start();
$LOGIN_ERRORS = NULL;
if ($_POST) {

    //DB-Connections!
    $conn = "";
    include "db_key.php";
    try {
        $conn = connect_db();
    } catch (Exception $e) {
        echo "CONECTION FAILED";
    }

    //registration script
    if (isset($_POST['register'])) {
        echo "REG PAGE - ";
        $key = $_POST['key'];
        $key_h =  password_hash($key, PASSWORD_DEFAULT);
        // mysqli_query($conn,"insert into users (key) values ('$key');");
        mysqli_query($conn, "INSERT INTO users (`id`, `key`, `timestamp`) VALUES (NULL, '$key_h', current_timestamp());");
        echo "MESSGAE => Registerd key successfully!";
        echo "$key_h <br>";
        echo "$key";
    }

    //Login Script
    if (isset($_POST['login'])) {
        $key = $_POST['key'];
        $res = mysqli_query($conn, "SELECT * FROM users");
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            $verify = password_verify($key, $row['key']);
            // echo $verify;
            if ($verify == 1) {
                $_SESSION['IS_LOGIN'] = true;
                $_SESSION['USERNAME'] = $row['username'];
                header('location:dashboard.php');
                die();
            } else {
                $LOGIN_ERRORS = "Wrong Key Entered!";
            }
        } else {
            echo "No RESULT";
        }
    }

    //Recording the expense / income
    $SCR = NULL; // Script to be run affter the successful entry recorded.
    $ENTRY_ERRORS = NULL;
    $ENTRY_ERRORS = [];
    if (isset($_POST['record-entry'])) {
        if (!is_numeric($_POST['amount']) || $_POST['amount'] <= 0) {
            array_push($ENTRY_ERRORS, "Amount is Not in proper format.");
        } else if ($_POST['type'] != "expense"  && $_POST['type'] != "income") {
            array_push($ENTRY_ERRORS, "Type is Not selected.");
        } else if ($_POST['date'] > date('Y-m-d')) {
            array_push($ENTRY_ERRORS, "Future entries cant be recorded.");
        } else {
            $amount = $_POST['amount'];
            $date = $_POST['date'];
            $type = $_POST['type'];
            $desc = $_POST['desc'];
        }
        if (sizeof($ENTRY_ERRORS) == 0) {
            // echo " ENTRY PROPER!!!!!!" ; 
            // $desc = "NA";
            // echo $amount." ".$date." ".$type;
            $sql = "INSERT INTO `transactions` (`id`, `date`, `amount`, `type`, `catagory`, `description`) VALUES (NULL, '2023-05-05', '$amount', 'expense', '0', '$desc');";
            mysqli_query($conn, $sql);
            $MODAL_DATA = "Expense Recorded ✅";
            $SCR = "<script>
            var myModal = new bootstrap.Modal(document.getElementById('exampleModalCenter'),{});
            myModal.show();
            </script>";
        }
        // print_r($ENTRY_ERRORS);
    }
}
