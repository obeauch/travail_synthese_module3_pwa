<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="data:;base64,iVBORw0KGgo=">
        <link rel="stylesheet" href="<?=BASE?>/public/css/style.css">
        <title>Accueil</title>
    </head>
    <body class="accueil">
        <div class="conteneur">
            <h1>Connexion</h1>
            <?php if (isset($_GET['erreur'])) {?>
                    <div class="erreur">
                        <p>
                            Les information de connexion fournis, sont inexactes.
                        </p>
                    </div>
                <?php }?>
            <div class="login">
                <form action="login-submit" method="POST">
                    <input type="text" name="courriel" placeholder="Courriel">
                    <input type="password" name="mot_de_passe" placeholder="Mot de passe">
                    <input type="submit" name="submit" value="Se connecter">
                </form>
            </div>

            <div class="liens">
                <a href="accueil">Retour à l'accueil</a>
            </div>
        </div>
    </body>
</html>
