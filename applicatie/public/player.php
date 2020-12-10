<!DOCTYPE php>
<php lang="en">
    <head>
        <link rel="icon" href="images/logo.png">
        <meta http-equiv="Content-Type" content="text/php; charset=utf-8">
        <title>Fletnix - Film</title>
        <link rel="stylesheet" href="player.css"/>
        <link rel="stylesheet" href="styles.css"/>
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
                            inloggen
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