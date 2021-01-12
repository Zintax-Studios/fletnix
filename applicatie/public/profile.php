<!DOCTYPE php>

<?php
    session_start();

    require 'phpfunction/SQL_connection.php';
    global $dbh;

    if(isset($_SESSION['email'])){
        $email = $_SESSION['email'];
        $password = $_SESSION['password'];
    }

    $querry = $dbh->prepare("SELECT * FROM Customer WHERE customer_mail_address = '$email'");
    $querry->execute();

    $result = $querry->fetchAll();

    $person = $result[0];

    var_dump($person);
?>



<php lang="en">

    <head>
        <link rel="icon" href="images/logo.png">
        <meta http-equiv="Content-Type" content="text/php; charset=utf-8">
        <title>Fletnix - Profiel</title>
        <link rel="stylesheet" href="CSS/profile.css">
    </head>

    <body>
        <?php
            require("shared/header.html");
        ?>

        <main class="colorwhite">
            <form action="exelogin.php", method="POST">
                <input type='submit' value='Logout' name='loggout'>
                <div><h2>Name</h2><?php echo $person['firstname'] . " " . $person['lastname']; ?></div>
            <div><h2>Email</h2><?php echo $person['customer_mail_address']?></div>
            <div><h2>Gebruikersnaam</h2><?php echo $person['user_name']?></div>
            <div><h2>Abbonement</h2><?php echo $person['contract_type']?></div>
            <div><h2>Kaart nummer</h2><?php echo $person['payment_method'] . ' ' . $person['payment_card_number']; ?></div>
            </form>
        </main>
    </body>
</php>