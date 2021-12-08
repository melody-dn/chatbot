<?php 
    session_start();
    require_once 'config.php'; // ajout connexion bdd 
   // si la session existe on redirige
    if(isset($_SESSION['user'])){
        echo "bonjour ". $_SESSION['login'];
    }

    if(!isset($_SESSION['user'])){
        echo "bonjour";
    }
   

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
            foreach ($articles as $article){ 
	echo "<h2>Titre: ".$article["titre"]."<br></h2>  ";
    echo "<p>Contenu: ".$article["contenu"]."</p>";
    echo "<p>Auteur: proprietaires". "</p>";
    echo "<p>Date:".$article["date"]. "</p>";
    if(isset($_SESSION['login'])){
        echo "<a href='articles.php?id=".$article["id_articles"]. "'>Voir les commentaires</a>";
    }
    
}

?>

<a href="articles.php">Voir les commentaires</a>
          

                <?php 
                        if(isset($_GET['err'])){
                            $err = htmlspecialchars($_GET['err']);
                            switch($err){
                                case 'current_password':
                                    echo "<div class='alert alert-danger'>Le mot de passe actuel est incorrect</div>";
                                break;

                                case 'success_password':
                                    echo "<div class='alert alert-success'>Le mot de passe a bien été modifié ! </div>";
                                break; 
                            }
                        }
                    ?>


                        
               
            </div>
            
        </div>  
        
       
        

    
  </body>
</html>