<!DOCTYPE php>

<html lang="en">
    <head>
        <link rel="icon" href="images/logo.png">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Fletnix - Login</title>
        <link rel="stylesheet" href="CSS/login.css">
    </head>
    <body>
        <?php
            require("shared/header.html");
        ?>

        <main>
            <div>
                <h1>Login</h1>
                <form class="loginform" action="profile.php">
                    <label for="UsernameLog">Username</label>
                    <input id="UsernameLog" type="text">
                    <label for="PasswordLog">Password</label>
                    <input id="PasswordLog" type="password">
                    <input type="submit" value="Login">
                </form>
            </div>
            <div>
                <h1>Registreer</h1>
                <form class="registerform" action="index.php" method="GET">
                    <label for="name">Volledige naam</label>
                    <input id="name" type="text" name="name">
                    <label for="username">gebruikersnaam</label>
                    <input id="username" type="text" name="username">
                    <label for="country">Land</label>
                    <input id="country" type="text" name="country">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email">
                    <label for="Password">Password</label>
                    <input id="Password" type="password" name="password">
                    <label for="password2">bevestig password</label>
                    <input id="password2" type="password" name="password2">
                    <label for="subscription">Abbonement</label>
                    <input list="subs" id="subscription" name="subs">
                    <datalist id="subs">
                        <option value="1 maand €2">
                        <option value="2 maand €5">
                            <option value="4 maand €13">
                    </datalist>
                    <label for="payment">betaal methode</label>
                    <input id="payment" list="paymentlist" name="payment">
                    <datalist id="paymentlist">
                        <option value="paypal">
                        <option value="sven">
                    </datalist>
                    <label for="paymentnum">rekening nummer</label>
                    <input id="paymentnum" type="text">
                    <input type="submit" value="registreer!">
                </form>
            </div>
        </main>

        <footer>
            <div>
            </div>
        </footer>
    </body>
</php>