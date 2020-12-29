<!DOCTYPE php>

<?php
    session_start();
?>

<php lang="en">
    <head>
        <link rel="icon" href="images/logo.png">
        <meta http-equiv="Content-Type" content="text/php; charset=utf-8">
        <title>Fletnix - Film</title>
        <link rel="stylesheet" href="CSS/player.css"/>
    </head>

    <body>
        <?php
            require("shared/header.html");
        ?>

        <main>
            <div class="playknop">
                <!--img src="images/afspeelknop.png" alt="||"-->
            </div>
            <video class="video" width="320" height="240" controls>
                <source src="images/trailer.mp4" type="video/mp4">
            </video>
        </main>

        <footer>
            <div>
            </div>
        </footer>
    </body>
</php>