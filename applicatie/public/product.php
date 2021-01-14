<!DOCTYPE html>

<?php
    require "phpfunction/SQL_connection.php";
    global $dbh;

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    else{
        header("Location: 404.php");
        return;
    }

    if(!is_numeric($id)){
        header("Location: 404.php");
        return;
    }

    // check if the movie exists, if not header to 404.php
    $query = $dbh->prepare("SELECT * 
                            FROM Movie 
                            WHERE Movie.movie_id = $id");
                            
    $query->execute();

    $result = $query->fetchAll();

    if(!isset($result)){
        header('Location: 404.php');
        return;
    }

    $movie = $result[0];

    // get cast info
    $query = $dbh->query("SELECT *
                            FROM Movie_cast
                            LEFT OUTER JOIN Person
                                ON Movie_cast.person_id = Person.person_id
                            WHERE Movie_cast.movie_id = $id");
    
    $result = $query->fetchAll();

    $movie['cast'] = $result;

    // get directors
    $query = $dbh->query("SELECT *
                            FROM Movie_Director
                            LEFT OUTER JOIN Person
                                ON Movie_Director.person_id = Person.person_id
                            WHERE Movie_Director.movie_id = $id");
    
    $result = $query->fetchAll();

    $movie['director'] = $result;
?>

<html>
    <head>
    <link rel="stylesheet" href="CSS/product.css"/>
    </head>

    <body>
        <?php
            require("shared/header.html");
        ?>
        <main>
            <div class="grid">
                <div class="title">
                    <h1><?php echo $movie['title']; ?></h1>
                    <?php echo $movie['description']; ?>
                    <h2>Jaar</h2>
                    <?php echo $movie['publication_year']; ?>
                    <h2>Duur</h2>
                    <?php echo $movie['duration']; ?>
                </div>
                <div class="info">
                </div>
                <div class="cast">
                    <div><h2>Cast: </h2> <?php foreach($movie['cast'] as $person){ echo $person['firstname'] . ' ' . $person['lastname'] . $person['role']  . ", "; } ?></div>
                </div>
                <div class="director">
                    <div><h2>Regisseurs: </h2> <?php foreach($movie['director'] as $person){ echo $person['firstname']; } ?></div>
                </div>
                <div class="img">
                    <img src="images/placeholder.png">
                </div>
                <div class="play">
                    <a href="player.php">
                        <img src="images/playknop.png">
                    </a>
                </div>
            </div>
        </main>
    </body>
</html>