<?php

require_once "bases/BaseModel.php";

class Administrateurs extends BaseModel
{

    protected $table = "administrateurs";

    public function verifierConnexion($courriel, $mdp)
    {
        // Lire le mot de passe du user avec le courriel
        $sql = "
            SELECT id, mot_de_passe
            FROM $this->table
            WHERE courriel = :courriel
        ";

        $stmt = $this->pdo()->prepare($sql);

        $stmt->execute([
            ":courriel" => $courriel,
        ]);

        $entree = $stmt->fetch();

        if ($entree != false) {

            // vérifier si mot de passe correspond
            $mot_passe_ok = password_verify($mdp, $entree["mot_de_passe"]);

            if ($mot_passe_ok) {
                // sauvegarde seulement le id de celui qui est connecté
                $_SESSION["administrateur_id"] = $entree["id"];
            }
            //Retourner true ou false
            return $mot_passe_ok;
        } else {
            return false;
        }

        var_dump($entree);
        exit();
    }

    // public function activitesAdministrateur()
    // {
    //     $sql = "
    //     SELECT $this->table.*, activites.titre, activites.image, activites.fk_activite_id
    //     FROM $this->table
    //     INNER JOIN activites ON fk_administrateur_id = administrateurs.id
    //     ";

    //     $stmt = $this->pdo()->prepare($sql);
    //     $stmt->execute([]);
    //     return $stmt->fetchAll();
    // }
}
