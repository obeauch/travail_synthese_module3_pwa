<?php

require_once "bases/BaseModel.php";

class Activites extends BaseModel
{

    protected $table = "activites";

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

    public function tousAvecAdministrateur()
    {
        $sql = "
        SELECT $this->table.*, administrateurs.prenom, administrateurs.nom
        FROM $this->table
        INNER JOIN administrateurs ON fk_administrateur_id = administrateurs.id
        ";

        $stmt = $this->pdo()->prepare($sql);
        $stmt->execute([]);
        return $stmt->fetchAll();
    }

    public function tousAvecCategories()
    {
        $sql = "
        SELECT $this->table.*, activites_categories.type
        FROM $this->table
        INNER JOIN activites_categories ON fk_activite_categorie_id = activites_categories.id
        ";

        $stmt = $this->pdo()->prepare($sql);
        $stmt->execute([]);
        return $stmt->fetchAll();
    }

    // /**
    //  * Supprimer une activités
    //  */
    // public function deleteActivite($id)
    // {

    //     $sql = "DELETE FROM $this->table
    //             WHERE id = :id
    //             ";

    //     $stmt = $this->pdo()->prepare($sql);
    //     $stmt->execute([
    //         ":id" => $id,
    //     ]);

    //     return $stmt->fetch();

    // }

}
