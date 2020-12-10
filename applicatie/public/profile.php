<!DOCTYPE php>

<php lang="en">

    <head>
        <link rel="icon" href="images/logo.png">
        <meta http-equiv="Content-Type" content="text/php; charset=utf-8">
        <title>Fletnix - Profiel</title>
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="profile.css">
    </head>

    <body>
        <header>
            <div class="upperbar">
                <a href="index.php">
                    <img src="images/logo.PNG" alt="logo">
                </a>

                <div class="searchbar">
                    <form action="search.php">
                        <input type="text" name="searchMessage">
                        <input type="submit" id="go" value="Zoek">
                        
                    </form>
                </div>
            
                <div class="buttonlist">
                    <a href="overons.php" class="button">
                        <div>
                            overons
                        </div>
                    </a>
                    <a href="login.php" class="button">
                        <div>
                            Jantje
                        </div>
                    </a>
                    <a href="profile.php" class="button">
                        <div>
                            Profiel
                        </div>
                    </a>
                </div>  
            </div>                                         
        </header>

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