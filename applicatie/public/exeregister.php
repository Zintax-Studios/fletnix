<?php

    require("phpfunction/SQL_connection.php");
    session_start();

    $email = $_POST['email'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $payment_method = $_POST['payment_method'];
    $card = $_POST['card'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $username = $_POST['username'];
    $country = $_POST['country'];
    $sub = $_POST['sub'];

    if($password != $password2){
        $_SESSION["error"] = "Wachtwoorden komen niet overeen!";
        header('Location: register.php');
    }

    $startdate = date("Y/m/d");
    $enddate = 
    
    $sql = "
        INSERT INTO Customer
        VALUES(
            '$email',
            '$lastname',
            '$firstname',
            '$payment_method',
            '$card',
            '$sub',
            
        )
    "
?>
    