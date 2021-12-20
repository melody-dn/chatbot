<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <style>
        nav{
            text-align:right;

        }

        nav a{
            margin-left:10px;
        }
    </style>
</head>

<?php 
    session_start();
    
    require_once 'config.php'; // ajout connexion bdd 
   // si la session existe on redirige
    if(isset($_SESSION['user'])){
        echo "bonjour ". $_SESSION['login'];
    }

    // if(!isset($_SESSION['user'])){
    //     echo "bonjour visiteur ";
    // }
   

    $articles=getArticles($bdd);

    function getArticles($bdd) // fonction qui permet de réccupérer tous les articles
    {
    
        $req = $bdd->prepare('SELECT id_articles,titre,contenu, date FROM articles ORDER BY id_articles DESC LIMIT 3');
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        $req->closeCursor();
    }
  
?>

<body>
    <nav>
        <a href="accueil.php">Accueil</a>
        <a href="landing.php"> Archives</a>
        <a href="connexion.php">Connexion</a>
        <a href="deconnexion.php">Deconnexion</a>
    </nav>
    
</body>

<div class="container">
            <div class="col-md-12">

            <h1>Articles:</h1> 

            <!-- Affiche l'article et ce qui lui est associé -->
            <?php
            foreach ($articles as $article){ 
	echo "<h2>Titre: ".$article["titre"]."<br></h2>  ";
    echo "<p>Contenu: ".$article["contenu"]."</p>";
    echo "<p>Auteur: propriétaires". "</p>";
    echo "<p>Date:".$article["date"]. "</p>";
    echo "<a href='articles.php?id=".$article["id_articles"]. "'>Voir les commentaires</a><br><br>";
    
}

?>

<!-- Si nous sommes connectés en tant que proprio, le bouton écrire est présent -->
                <?php 
                        if(isset ($_SESSION) && $_SESSION['proprio']==1){
                           echo' <a href="redaction.php"><button>Ecrire un article</button></a>';
                        }
                    ?>

            </div>
           
        </div>  
        
</html>