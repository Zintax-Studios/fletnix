<?php
    require('phpfunction/SQL_connection.php');
    global $dbh;

    session_start();

    $loggedin = false;

    $username = $_POST['username'];
    $password = $_POST['password'];

    foreach($_POST as $data){
        if($data == ''){
            err('vul alles in.');
        }
    }

    $password = hash('crc32', $password);

    $sql = "
        SELECT user_name, password
        FROM Customer
        WHERE password = '$password' AND user_name = '$username'
    ";

    try{
        $data = $dbh->query($sql);
    } catch(Exception $e){
        err('cant query server');
    }

    $rij = $data->fetch();

    if($username != $rij['user_name'] || $password != $rij['password']){
        err('foute inlog gegevens');
        
    }
    else{
        $loggedin = true;
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
    }

    function err($error){
        $_SESSION['error'] = $error;
        header("Location: login.php");
    }

    if($loggedin){
        header('Location: index.php');
    }
?>