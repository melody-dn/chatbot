<?php 
    $bdd = new PDO('mysql:host=localhost;dbname=melody.duna_db', 'root');

    // Si les variables existent et qu'elles ne sont pas vides
    if(!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['password_retype']))
    {
       // Permet d'éviter la faille de sécurité XSS
        $login = htmlspecialchars($_POST['login']);
        $password = htmlspecialchars($_POST['password']);
        $password_retype = htmlspecialchars($_POST['password_retype']);

        // On vérifie si l'utilisateur existe
        $check = $bdd->prepare('SELECT login, password FROM utilisateurs WHERE login = ?');
        $check->execute(array($login));
        $data = $check->fetch();
        $row = $check->rowCount();

    
        // Si la requete renvoie un 0 alors l'utilisateur n'existe pas 
        if($row == 0){ 
                if(strlen($login) <= 50){ // On verifie que la longueur du login<50
                    
                        if($password === $password_retype){ // si les deux mdp saisis sont bons

                            // On hash le mot de passe avec Bcrypt, via un coût de 12
                            $cost = ['cost' => 12];
                            $password = password_hash($password, PASSWORD_BCRYPT, $cost);
                            

                            // On insère dans la base de données
                            $insert = $bdd->prepare('INSERT INTO utilisateurs(login, password, token) VALUES(:login, :password, :token)');
                            $insert->execute(array(
                              
                                'login' => $login,
                                'password' => $password,
                                'token' => bin2hex(openssl_random_pseudo_bytes(64))
                            ));
                            // On redirige avec le message de succès
                            header('Location:inscription.php?reg_err=success');
                            die();
                        }else{ header('Location: inscription.php?reg_err=password'); die();}
                    
                }else{ header('Location: inscription.php?reg_err=login_length'); die();}
          
        }else{ header('Location: inscription.php?reg_err=already'); die();}
    }