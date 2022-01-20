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
            <header>
                <div class="cote-vide"></div>
                <h1>Accueil</h1>

                <div class="liens">
                    <a href="login">Se connecter à l'administration</a>
                </div>
            </header>

            <h3>Liste de toutes les activités</h3>
            <div class="activites">

                <?php foreach ($posts as $post) {?>
                <div class="activite">
                    <div class="image">
                        <img src="<?=$post["image"]?>" alt="">
                    </div>

                    <div class="activite-type">
                        <p class="titre"><?=$post["titre"]?></p>
                        <p class="type"><?=$post["type"]?></p>
                    </div>
                </div>
                <p class="admin"><?=$post["prenom"]?> <?=$post["nom"]?></p>
                <div class="ligne"></div>
                <?php }?>
            </div>

        </div>
    </body>
</html>