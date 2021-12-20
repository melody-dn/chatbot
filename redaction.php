<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="author" content="NoS1gnal"/>

            <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <title>Inscription</title>
        </head>
        <body>

        <!-- Formulaire -->
        <div class="login-form">
            
            <form action="redaction_traitement.php" method="POST">
                <h2 class="text-center">Rédaction d'article</h2>       

                <div class="form-group">
                    <input type="text" name="titre" class="form-control" placeholder="titre" required="required">
                </div>
                <div class="form-group">
                    <textarea name="contenu"  class="form-control" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <input type="date" name="date" class="form-control" required="required" >
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Poster l'article</button>
                </div>   
                 
            </form>
        </div>
        <style>
            .login-form {
                width: 340px;
                margin: 50px auto;
            }
            .login-form form {
                margin-bottom: 15px;
                background: #f7f7f7;
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                padding: 30px;
            }
            .login-form h2 {
                margin: 0 0 15px;
            }
            .form-control, .btn {
                min-height: 38px;
                border-radius: 2px;
            }
            .btn {        
                font-size: 15px;
                font-weight: bold;
            }
        </style>
        </body>
</html>


