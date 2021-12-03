<?php 
    $bdd = new PDO('mysql:host=localhost;dbname=melody.duna_db', 'root');


                            // On insère dans la base de données
                            $insert = $bdd->prepare('INSERT INTO articles(titre, contenu, date) VALUES(:titre, :contenu, :date)');
                            $insert->execute(array(
                              
                                'titre' => $login,
                                'contenu' => $password,
                                'date' => $date
                            ));
             