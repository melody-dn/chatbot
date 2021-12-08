<?php
  session_start(); // Démarrage de la session
  require_once 'config.php'; // On inclu la connexion à la base de données

  if (isset($_GET['id']) AND !empty($_GET['id'])){
    $getid = htmlspecialchars($_GET['id']); //évite problèmes d'accent

    $article = $bdd->prepare('SELECT * FROM articles WHERE id_articles = ?');  //On réccupère tout ce qui est dans la table article et qui possède 'id_articles'
    $article->execute(array($getid));
    $article = $article->fetch();


   

    if(isset($_POST['submit_commentaire'])){
        if(isset($_POST['auteur'], $_POST['commentaire'], $_POST['date']) AND !empty($_POST['auteur']) AND !empty($_POST['commentaire']) AND !empty($_POST['date'])){
            $auteur = htmlspecialchars($_POST['auteur']);
            $commentaire = htmlspecialchars($_POST['commentaire']);
            $date = htmlspecialchars($_POST['date']);
            if(strlen($auteur) < 35) {
                $ins = $bdd->prepare('INSERT INTO commentaires ( auteur, commentaire, articlesid, date) VALUES (?, ?, ?, ?)');
                $ins->execute(array($auteur,$commentaire,$getid,$date));
                $c_msg = " <span style='color:green'> Votre commentaire a bien été posté</span>";

            }else{
                $c_msg = "Erreur: Le nom de l'auteur ne doit pas dépasser 35 caractères";
            }

        } else{
                $c_msg = "Erreur: Tous les champs doivent être complétés";
            }
        }
    
        $commentaire = $bdd->prepare('SELECT * FROM commentaires WHERE articlesid = ? ORDER BY id DESC ');
        $commentaire->execute(array($getid));

  ?>



  <h2>Article:</h2>
  <p><?= $article['contenu'] ?></p>

  <br>

  <h2>Commentaires:</h2>
  <br>
  <form method="POST">
      <input type="text" name="auteur" placeholder="Votre pseudo"> <br>
      <textarea name="commentaire" placeholder="Votre commentaire" cols="30" rows="10"></textarea> <br>
      <input type="date" name="date" ><br>
      <input type="submit" name="submit_commentaire" value="Poster le commentaire">

      
  </form>
  <?php if(isset($c_msg)){
      echo $c_msg;
  }
  ?>
<br>
  <?php while($c = $commentaire->fetch()) { ?>
  <em><?= $c['date'] ?>➔</em> <b><?= $c['auteur'] ?> :</b> <?= $c['commentaire'] ?> <br>
  <?php } ?>

  <?php
}
?>
 
