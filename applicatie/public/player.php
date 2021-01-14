<!DOCTYPE html>

<?php
    session_start();
?>

<php lang="en">
    <head>
        <?php require 'shared/head.html'?>
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