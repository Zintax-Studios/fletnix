<!DOCTYPE html>

<?php
    session_start();
?>

<html lang="en">
    <head>
        <?php
            require 'shared/head.html';
        ?>
        <link rel="stylesheet" href="CSS/register.css"/>
    </head>

    <?php
        require 'shared/header.html'
    ?>

    <main>
        <div>
                <form class="registerform" action="exeregister.php" method="POST">
                    <h1>Registreer</h1>
                    <div>
                    <div>
                        <label for="firstname">Voornaam</label>
                        <input id="firstname" type="text" name="firstname">
                    </div>
                    <div>
                        <label for="lastname">Achternaam</label>
                        <input id="lastname" type="text" name="lastname">
                    </div>
                    <div>
                        <label for="username">Gebruikersnaam</label>
                        <input id="username" type="text" name="username">
                    </div>
                    <div>
                        <label for="country">Land</label>
                        <input id="country" type="text" name="country">
                    </div>
                    <div>
                        <label for="email">Email</label>
                        <input id="email" type="email" name="email">
                    </div>
                    <div>
                        <label for="Password">Password</label>
                        <input id="Password" type="password" name="password">
                    </div>
                    <div>
                        <label for="password2">Bevestig password</label>
                        <input id="password2" type="password" name="password2">
                    </div>
                    <div>
                        <label for="subscription">Abbonement</label>
                        <input list="subs" id="subscription" name="sub">
                        <datalist id="subs">
                            <option value="basic">
                            <option value="premium">
                            <option value="pro">
                        </datalist>
                    </div>
                    <div>
                        <label for="payment">betaal methode</label>
                        <input id="payment" list="paymentlist" name="payment_method">
                        <datalist id="paymentlist">
                            <option value="Amex">
                            <option value="Mastercard">
                            <option value="Visa">
                        </datalist>
                    </div>
                    <div>
                        <label for="paymentnum">rekening nummer</label>
                        <input id="paymentnum" type="text" name="card">
                    </div>
                    </div>
                    <input type="submit" value="registreer!">
                    <?php
                        if(isset($_SESSION['error'])){
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        }
                    ?>
                </form>
            </div>
    </main>
</html> 