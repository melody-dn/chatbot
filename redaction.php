<?php
 require_once 'config.php'; // ajout connexion bdd 

 if(isset($_POST['article_titre'], $_POST['article_contenu'])){
     if(!empty($_POST['article_titre']) AND !empty($_POST['article_contenu'])){

         $article_titre = htmlspecialchars($_POST['article_titre']);
         $article_contenu = htmlspecialchars($_POST['article_contenu']);

         $req = $bdd->prepare('INSERT INTO articles(titre, contenu, date) VALUES(:titre, :contenu, :date)');
         $req->execute(array($article_titre, $article_contenu));
       
        
        $message = 'Votre article a bien été posté';
     }else{
         $message = 'Veuillez remplir tous les champs';
 }
}
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Rédaction</title>
 </head>
 <body>
     <form action="" method="POST">
         <input type="text" name="article_titre" placeholder="titre">
         <textarea name="article_contenu"  cols="30" rows="10"></textarea>
         <input type="submit" value="Poster l'article">
     </form>

   <br/>

   <?php
   if(isset($message)) {
       echo $message;} 
           ?>
     
 </body>
 </html>