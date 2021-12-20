<?php 
   session_start(); // Démarrage de la session
   require_once 'config.php'; // On inclu la connexion à la base de données

    if (isset($_POST['submit'])){
        $titre= $_POST['titre'];
        $contenu= $_POST['contenu'];
        $date = $_POST['date'];

        //Si les catégories sont vides, les remplir avec les informations rentrés au préalable

        if (!empty($titre) && !empty($contenu)){
           
            $insert = "INSERT INTO articles(titre, contenu, date) VALUES('$titre', '$contenu', '$date')";
            $bdd->exec($insert);
            echo "validé";
        }
        else{
            echo 'Veuillez remplir tous les champs';
        }
    }

    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <a href="landing.php"><button>Retour</button></a>
    </body>
    </html>

                          

