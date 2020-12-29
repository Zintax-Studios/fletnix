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
                <h1>Login</h1>
                <form class="loginform" action="profile.php">
                    <label for="UsernameLog">Username</label>
                    <input id="UsernameLog" type="text">
                    <label for="PasswordLog">Password</label>
                    <input id="PasswordLog" type="password">
                    <input type="submit" value="Login">
                </form>
        </main>

        <footer>
            <div>
            </div>
        </footer>
    </body>
</php>