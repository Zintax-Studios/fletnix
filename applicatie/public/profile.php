<!DOCTYPE php>

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
            <form>
                <label for="Fullname">Volledige naam</label>
                <input id="Fullname" type="text" value="Tom Janssen">
                <label for="username">Username</label>
                <input id="username" type="text" value="__FilKijker69420__">
                <label for="password">Wachtwoord</label>
                <input id="password" type="password" value="Urmom">
                <label for="sub">Abbonnement</label>
                <input list="subs" id="sub">
                <datalist id="subs">
                    <option value="per maarnd €2">
                    <option value="per 2 maanden €5">
                    <option value="per 4 maanden €12">
                </datalist>
                <label for="mail">mailadress</label>
                <input id="mail" type="email" value="Tom Janssen">
            </form>
        </main>
    </body>
</php>