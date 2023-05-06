<?php 
session_start();
    $LOGIN_ERRORS = NULL;
    if($_POST){ 

        //DB-Connections!
        $conn="";
        include "db_key.php";
        try{
            $conn = connect_db();
            // echo " connected";
        }
        catch(Exception){
            echo "CONECTION FAILED" ;
            // die( );
        }   


        //registration script
        if(isset($_POST['register'])){
            echo "REG PAGE - ";
            $key = $_POST['key'];
            $key =  password_hash($key,PASSWORD_DEFAULT);
            // mysqli_query($conn,"insert into users (key) values ('$key');");
            mysqli_query($conn,"INSERT INTO users (`id`, `key`, `timestamp`) VALUES (NULL, '$key', current_timestamp());");
            echo "MESSGAE => Registerd key successfully!";
        }


        //Login Script
        if(isset($_POST['login'])){
            $key = $_POST['key'];
            $res = mysqli_query($conn,"SELECT * FROM users");
            if (mysqli_num_rows($res) > 0){
                $row = mysqli_fetch_assoc($res);
                $verify = password_verify($key,$row['key']);
                echo $verify;
                if($verify == 1){
                    // echo "Hurrat";
                    $_SESSION['IS_LOGIN']=true;
                    $_SESSION['USERNAME']=$row['username'];
                    header('location:dashboard.php');
                    die(); 
                }
                else{
                    $LOGIN_ERRORS = "Wrong Key Entered!";
                }
            }
            else{
                echo "No RESULT";
            }

        }



    }
