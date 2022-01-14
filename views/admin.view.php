<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="data:;base64,iVBORw0KGgo=">
        <link rel="stylesheet" href="<?=BASE?>/public/css/style.css">
        <title>Admin</title>
    </head>
    <body class="accueil">
        <div class="conteneur">
            <header>
                <h1>Admin</h1>

                <div class="liens">
                    <a href="accueil">Se déconnecter</a>
                </div>
            </header>

            <div class="liens">
                <a href="ajout-activite">Ajouter une activité</a>
            </div>

            <h3>Liste des activités pour <?=$user["prenom"]?> <?=$user["nom"]?></h3>
            <div class="activites">

                <?php foreach ($posts as $post) {?>
                <div class="activite">
                    <div class="activite-type">
                        <p hidden><?=$post["id"]?></p>
                        <p class="titre"><?=$post["titre"]?></p>
                        <p class="type"><?=$post["type"]?></p>
                    </div>
                    <div class="supprimer">
                        <div>
                            <a href="supprimer-activite?id=<?=$post["id"]?>">Supprimer</a>
                        </div>
                    </div>
                </div>
                <div class="ligne"></div>
                <?php }?>
            </div>
<!--

            <div class="liens">
                <a href="accueil">Se déconnecter</a>
            </div> -->

        </div>
    </body>
</html>