<?php
    session_start();

    require("phpfunction/SQL_connection.php");
    require("phpfunction/page.php");

    if(isset($_GET['page'])){
        $page = $_GET['page'];
        if($page < 0){
            header("Location: index.php?page=0");
        }
    }

    function getMovies()
    {
        global $dbh;
        global $page;

        if(isset($page)){
            $startingRow = $page * 100;
        }
        else{
            $startingRow = 0;
        }

        $query = $dbh -> prepare("SELECT * FROM Movie ORDER BY movie_id OFFSET $startingRow ROWS FETCH NEXT 100 ROWS ONLY");

        $query->execute();

        $result = $query->fetchALL();

        return $result;
    }

    $filmlijst = getMovies();

    if(empty($filmlijst)){
        header('Location: index.php?page=0');
    }

    function filmsNaarHTMl($films) {
        $html = '';

        foreach($films as $film)
        {
            $image_src = 'images/placeholder.png';
            $image = "<img src='$image_src' alt='img'>";

            $link = 'product.php?id=' . $film['movie_id']; 

            $html = $html . "<div><a href=$link>" . $film['title'] . $image . "</a></div>";
        }  

        return $html;
    }
?>

<!DOCTYPE php>
<html lang="en">
    <head>
        <link rel="icon" href="images/logo.png">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Fletnix - Main</title>
        <link rel="stylesheet" href="CSS/index.css"/>
    </head>

    <body>
        <?php
            require("shared/header.html");
        ?>

        <main>
            <h1> Films from A to Z </h1>
            <!--Recent bekeken-->
            <?php echoPage('index.php', ''); ?>
            <div class ="filmlist">
                <?=filmsNaarHTMl($filmlijst)?>
            </div>

            <!--Willekeurige films-->

            <!--films met willekeurig genre #1-->

            <!--films met willekeurig genre #2-->

            <!--films met willekeurig genre #3-->

            <?php echoPage('index.php', ''); ?>
        </main>

        <footer>
            <div>
            </div>
        </footer>
    </body>

</html>