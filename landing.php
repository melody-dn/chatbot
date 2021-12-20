<?php 
    session_start();
    require_once 'config.php'; // ajout connexion bdd 
   // si la session existe on redirige


    $articles=getArticles($bdd);

    function getArticles($bdd) // fonction qui permet de réccupérer tous les articles
    {
    
        $req = $bdd->prepare('SELECT id_articles,titre,contenu, date FROM articles ORDER BY id_articles DESC');
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        $req->closeCursor();
    }
  
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Espace membre</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <style>
        nav{
            text-align:right;

        }

        nav a{
            margin-left:10px;
        }
    </style>

  <body>

  <nav>
        <a href="accueil.php">Accueil</a>
        <a href="landing.php"> Archives</a>
        <a href="connexion.php">Connexion</a>
        <a href="deconnexion.php">Deconnexion</a>
    </nav>
        <div class="container">
            <div class="col-md-12">

            <h1>Articles:</h1> 

            <?php

    //Affiche l'article et les données qui lui sont associées
            foreach ($articles as $article){ 
	echo "<h2>Titre: ".$article["titre"]."<br></h2>  ";
    echo "<p>Contenu: ".$article["contenu"]."</p>";
    echo "<p>Auteur: proprietaires". "</p>";
    echo "<p>Date:".$article["date"]. "</p>";
    echo "<a href='articles.php?id=".$article["id_articles"]. "'>Voir les commentaires</a>";
    
}

?>       
            </div>
            
        </div>  
  </body>
</html>