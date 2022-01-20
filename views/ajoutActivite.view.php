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
            <div class="liens">
                <a href="admin">Retour vers admin</a>
            </div>

            <h1>Ajouter une activité</h1>

            <div class="cote-vide"></div>
        </header>

            <?php if (isset($_GET['erreur'])) {?>
                <div>
                    <p>
                        Une erreur est survenue.
                    </p>
                </div>
            <?php }?>

            <div class="login ajout-form">
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

                    <div class="soum">
                        <input type="submit" name="submit" value="Ajouter">
                    </div>
                </form>
            </div>

        </div>
    </body>
</html>