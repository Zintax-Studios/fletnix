<?php
    require('phpfunction/SQL_connection.php');
    global $dbh;

    session_start();

    $loggedin = false;

    function err($error = ""){
        $_SESSION['error'] = $error;
        header("Location: login.php");
    }

    // First check if this is an loggout command
    if(isset($_POST['loggout'])){
        session_destroy();
        header('Location: index.php');
    } 
    // Second, if there is no loggout, the command has to be an login command.
    else {
        // Check if the login info is complete
        foreach($_POST as $data){
            if($data == ''){
                err('vul alles in.');
            }
        }

        // Get the login data
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Hash the password
        $password = hash('crc32', $password);

        // Get the login data from the SQL server
        $sql = "
            SELECT customer_mail_address, password
            FROM Customer
            WHERE password = '$password' AND customer_mail_address = '$email'
        ";
        try{
            $data = $dbh->query($sql);
        } catch(Exception $e){
            err('cant query server');
        }

        $rij = $data->fetch();

        // Chech if the login info is the same
        if($email != $rij['customer_mail_address'] || $password != $rij['password']){
            err('foute inlog gegevens');
        
        }
        else{
            $loggedin = true;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
        }

        // For some reason the site redirects, whitout running the err function, and still runs this last header.
        // To make sure this is not the last header, we make sure this header is not even run when there was an error.
        if($loggedin){
            header('Location: index.php');
        }
    }
?>