<?php

require_once "bases/BaseController.php";
require_once "models/Activites.php";
require_once "models/Administrateurs.php";
require_once "utils/Upload.php";

class SiteController extends BaseController
{
    public function accueil()
    {
        $id = $_SESSION["administrateur_id"];

        $administrateur_model = new Administrateurs();
        $user = $administrateur_model->parId($id);

        $activites = new Activites();
        $posts = $activites->tousAvecCategories();

        // $administrateur = new Activites();
        // $admins = $administrateur->tousAvecAdministrateur();

        include "views/accueil.view.php";
    }

    public function login()
    {
        include "views/login.view.php";
    }

    public function loginSubmit()
    {
        $estEnvoye = isset($_POST["submit"]);

        if ($estEnvoye) {
            $courriel = $_POST["courriel"];
            $mot_de_passe = $_POST["mot_de_passe"];

            $administrateur = new Administrateurs();
            $success = $administrateur->verifierConnexion($courriel, $mot_de_passe);

            if ($success) {
                // redirigé vers feed
                header("location:admin");
            } else {
                header("location:login?erreur=1");
                exit();
            }

        } else {
            header("location:login?erreur=1");
            exit();
        }
    }

    public function admin()
    {
        $id = $_SESSION["administrateur_id"];

        $administrateur_model = new Administrateurs();
        $user = $administrateur_model->parId($id);

        $activites = new Activites();
        $posts = $activites->tousAvecCategories($id);
        // $admins = $activites->tousAvecAdministrateur($id);
        include "views/admin.view.php";
    }

    public function supprimerActivite()
    {
        // Id de l'activité' à supprimer
        $id = $_GET['id'];

        $model_activites = new Activites();
        $activite = $model_activites->deleteActivite($id);
        // $success = $activite;

        header("location:admin");
        exit();
        // include "views/admin.view.php";
        // ????

        // Si la suppression a fonctionnée
        // if ($success) {
        //     header("location:admin.php");
        //     exit();

        //     // Si la suppression n'a pas fonctionnée
        // } else {
        //     header("location:admin.php?erreur=1");
        //     exit();
        // }

    }

    public function ajoutActivite()
    {

        include "views/ajoutActivite.view.php";
    }

    // Envoie du form en POST pour la création d'une activité
    public function ajoutActiviteSubmit()
    {

        // Vérifier si c'est envoyé
        $formEnvoye = isset($_POST["submit"]);

        // Récupère
        if ($formEnvoye) {
            $titre = $_POST["titre"];
            $categorie = $_POST["categorie"];
            // $admin = $_POST["admin"];

            $upload = new Upload("image");
            $image = $upload->placerDans("public/uploads");

            // Appelle le modèle avec une méthode creer
            $activite = new Activites();
            $success = $activite->creer($titre, $image, $categorie);

            if ($success) {
                header("location:admin");
                exit();
            } else {
                header("location:ajout-activite?erreur=1");
                exit();
            }

        } else {
            header("location:ajout-activite?erreur=1");
            exit();
        }

        exit();
    }
}
