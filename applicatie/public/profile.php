<!DOCTYPE php>

<?php
    session_start();
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
            </form>
        </main>
    </body>
</php>