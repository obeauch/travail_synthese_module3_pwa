<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="data:;base64,iVBORw0KGgo=">
        <link rel="stylesheet" href="<?=BASE?>/public/css/style.css">
        <title>Ajout</title>
    </head>
    <body class="accueil">
        <div class="conteneur">

        <header>
            <h1>Ajouter une activité</h1>

        </header>

            <?php if (isset($_GET['erreur'])) {?>
                <div>
                    <p>
                        Une erreur est survenue.
                    </p>
                </div>
            <?php }?>

            <form action="ajout-activite-submit" method="post" enctype="multipart/form-data">
                <label>
                    <span>Titre</span>
                    <input type="text" name="titre" required>
                </label>

                <label>
                    <span>Image</span>
                    <input type="file" name="image">
                </label>

                <label>
                    <span>Catégorie</span>
                    <select name="categorie">
                        <option name="type" value="1">Intérieure</option>
                        <option name="type" value="2">Extérieure</option>
                    </select>
                </label>
<!--
                <label>
                    <span>Admin</span>
                    <select name="admin">
                        <option name="type" value="1">Olivier</option>
                        <option name="type" value="2">Pierre</option>
                    </select>
                </label> -->
                <div>
                    <input type="submit" name="submit" value="Ajouter">
                </div>
            </form>

            <div class="liens">
                <a href="admin">Retour vers votre page administrateur</a>
            </div>

        </div>
    </body>
</html>