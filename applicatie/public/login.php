<!DOCTYPE php>

<?php
    session_start();
?>

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
                <form class="loginform" action="exelogin.php" method="POST">
                    <div>
                        <label for="UsernameLog">Email</label>
                        <input id="UsernameLog" type="text" name="email">
                    </div>
                    <div>
                        <label for="PasswordLog">Password</label>
                        <input id="PasswordLog" type="password" name="password">
                    </div>
                    <input type="submit" value="Login">
                    <?php
                        if(isset($_SESSION['error'])){
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        }
                    ?>
                </form>
                <a href='register.php'>Nog geen account?</a>
        </main>

        <footer>
            <div>
            </div>
        </footer>
    </body>
</php>