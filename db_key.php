<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "spandex";

function connect_db()
 {
    global $host, $user, $password, $database;
    $conn=new mysqli($host,$user,$password);
    if($conn->connect_error) {
        return false;
    }
    $conn -> select_db($database);
    // echo "Connected Successfully";
    return $conn ;
}

?>