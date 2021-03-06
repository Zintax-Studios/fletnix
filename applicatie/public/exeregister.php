<?php

    require("phpfunction/SQL_connection.php");
    global $dbh;

    session_start();

    $return = true;

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

    foreach($_POST as $data){
        if($data == ''){
            error('alles moet ingevult zijn!');
        }
    }

    if($password != $password2){
        error("Wachtwoorden komen niet overeen!");
    }

    $startdate = date("Y/m/d");
    $enddate = '';

    switch($sub){
        case 'basic':
            $enddate = date("Y/m/d", strtotime("+1 Months"));
            break;
        case 'permium':
            $enddate = date("Y/m/d", strtotime("+2 Months"));
            break;
        case 'pro':
            $enddate = date("Y/m/d", strtotime("+4 Months"));
            break;
        default:
            error("Kies een abbonement");
    }

    switch($payment_method){
        case 'Amex':
            break;
        case 'Mastercard':
            break;
        case 'Visa':
            break;
        default:
            error('kies een betaalmethode');
    }

    $password = hash('crc32', $password);
    
    $sql = "
        INSERT INTO Customer
        VALUES(
            '$email',
            '$lastname',
            '$firstname',
            '$payment_method',
            '$card',
            '$sub',
            '$startdate',
            '$enddate',
            '$username',
            '$password',
            '$country',
            null,
            null )
    ";

    try {
        $dbh->query($sql);
    } catch(Exception $e) {
        error('account already exists');
    }

    function error($error){
        global $return;
        if($return){
            $_SESSION['error'] = $error;
            header("Location: register.php");
            $return = false;
        }
    }

    if($return){
        header("Location: login.php");
    }
?>
    