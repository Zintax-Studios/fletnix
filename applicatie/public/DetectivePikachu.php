<!DOCTYPE html>

<?php
    session_start();
?>

<html lang="en">
    <head>
        <link rel="icon" href="images/logo.png">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Fletnix - FilmInfo</title>
        <link rel="stylesheet" href="styles.css"/>
        <link rel="stylesheet" href="product.css"/>
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

        <main class="main">
            <div class="text">
                <h1>Pokemon Detective Pikachu</h1>
                <div>samenvatting:</div>
                <ul>
                    <li>
                        detective Harry Goodman raakt op mysterieuze wijze vermist, zijn 21-jarige zoon Tim gaat uit zoeken wat er is gebeurd. 
                        Bij het onderzoek krijt hij hulp van Harry's voormalige Pokémon-partner, de wijze krakende, schattige superdetective Pikachu. 
                        ze ontdekken dat ze perfect samen kunnen werken, omdat Tim het enige mens is dat met Pikachu kan praten.
                        ze bundelen hun krachten samen om het mysterie te ontrafelen.
                    </li>
                </ul>
                <div>filmen:</div>
                <ul>
                    <li>John Mathieson, cameraman</li>
                    <li>Rob Letterman, regisseur</li>
                </ul>

                <div>editors:</div>
                <ul>
                    <li>Moving Picture Company</li>
                </ul>

                <div>muziek:</div>
                <ul>
                    <li>Henry Jackman</li>
                </ul>

                <div>cast:</div>
                <ul>
                    <li>Ryan Reynolds</li>
                    <li>Kathryn Newton</li>
                    <li>Justice Smith</li>
                    <li>Suki Waterhouse</li>
                    <li>Omar Chaparro</li>
                    <li>Chris Geere</li>
                    <li>Ken Watanabe</li>
                    <li>Bill Nighy</li>
                </ul>

                <div>publicatiejaar: 2019</div>
                <div>tijdsduur: 104 minuten</div>
            </div>

            <div class="CoverImage">
                <a class="afspeelknop" href="player.php" >
                    <img src="images/cover.jpg" alt="logo">
                    <img src="images/playknop.png" alt="afspeelknop">
                     
                </a>
            </div>
        </main>

        <footer>
            <div>
            </div>
        </footer>
    </body>
</html>

<?php
                                if(isset($_SESSION['username'])){
                                    echo "
                                        <a href='profile.php' class='button'>
                                            <div>
                                                " . $_SESSION['username'] . "
                                            </div>
                                        </a>
                                    ";
                                }
                                else{
                                    echo "
                                        <a href='login.php' class='button'>
                                            <div>
                                                inloggen
                                            </div>
                                        </a>
                                    ";
                                }
                            ?>