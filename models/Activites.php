<?php

require_once "bases/BaseModel.php";

class Activites extends BaseModel
{

    protected $table = "activites";

    // Fonction qui crée dans la base de données
    public function creer($titre, $image, $categorie)
    {

        $sql = "
        INSERT INTO $this->table (titre, image, fk_activite_categorie_id, fk_administrateur_id)
        VALUES (:titre, :image, :fk_activite_categorie_id, :fk_administrateur_id);
        ";

        $stmt = $this->pdo()->prepare($sql);

        $success = $stmt->execute([
            ":titre" => $titre,
            ":image" => $image,
            ":fk_activite_categorie_id" => $categorie,
            ":fk_administrateur_id" => $_SESSION["administrateur_id"],
        ]);

        return $success;

    }

    //Pour ne pas créer deux fonctions différentes et appeler différentes variables à l'intérieur.

    // public function tousAvecAdministrateur()
    // {
    //     $sql = "
    //     SELECT $this->table.*, administrateurs.prenom, administrateurs.nom
    //     FROM $this->table
    //     INNER JOIN administrateurs ON fk_administrateur_id = administrateurs.id
    //     ";

    //     $stmt = $this->pdo()->prepare($sql);
    //     $stmt->execute([]);
    //     return $stmt->fetchAll();
    // }

    // public function tousAvecCategories($id_admin = null)
    // {
    //     $parametres = [];

    //     $sql = "
    //     SELECT $this->table.*, activites_categories.type, administrateurs.prenom, administrateurs.nom
    //     FROM $this->table
    //     INNER JOIN activites_categories ON fk_activite_categorie_id = activites_categories.id
    //     INNER JOIN administrateurs ON fk_administrateur_id = administrateurs.id
    //     ";

    //     if ($id_admin != null) {
    //         $sql = $sql . " WHERE administrateurs.id = :id_admin";
    //         $parametres[":id_admin"] = $id_admin;
    //     }

    //     $stmt = $this->pdo()->prepare($sql);
    //     $stmt->execute($parametres);
    //     return $stmt->fetchAll();
    // }

    // Fonction qui permet d'obtenir tout. Les admins et les catégories avec des INNER JOIN
    public function tousAvecCategories()
    {
        $sql = "
        SELECT $this->table.*, activites_categories.type, administrateurs.prenom, administrateurs.nom
        FROM $this->table
        INNER JOIN activites_categories ON fk_activite_categorie_id = activites_categories.id
        INNER JOIN administrateurs ON fk_administrateur_id = administrateurs.id
        ";

        $stmt = $this->pdo()->prepare($sql);
        $stmt->execute([]);
        return $stmt->fetchAll();
    }

    // Deuxième fonction très semblable à la précédente, mais
    // qui permet de mettre en paramètre le id de l'admin.
    public function tousAvecCategoriesPourAdmin($id_admin)
    {
        $sql = "
        SELECT $this->table.*, activites_categories.type, administrateurs.prenom, administrateurs.nom
        FROM $this->table
        INNER JOIN activites_categories ON fk_activite_categorie_id = activites_categories.id
        INNER JOIN administrateurs ON fk_administrateur_id = administrateurs.id
        WHERE administrateurs.id = :id_admin
        ";

        $stmt = $this->pdo()->prepare($sql);
        $stmt->execute([
            ":id_admin" => $id_admin,
        ]);
        return $stmt->fetchAll();
    }

    /**
     * Supprimer une activités
     */
    public function deleteActivite($id)
    {

        $sql = "DELETE FROM $this->table
                WHERE id = :id
                ";

        $stmt = $this->pdo()->prepare($sql);
        $stmt->execute([
            ":id" => $id,
        ]);

        return $stmt->fetch();

    }

}
