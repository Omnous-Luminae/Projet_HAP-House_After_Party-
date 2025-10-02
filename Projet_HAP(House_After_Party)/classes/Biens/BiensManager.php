<?php

require_once  "../../config/db.php";

class BiensManager
{
    private $pdo;

    public function __construct()
    {
        global $pdo;
        $this->pdo = $pdo;
    }

    // CREATE
    public function createBiens($nom_biens, $rue_biens, $superficie_biens, $description_biens, $animal_biens, $nb_couchage)
    {
        $stmt = $this->pdo->prepare("INSERT INTO Biens (nom_biens, rue_biens, superficie_biens, description_biens, animal_biens, nb_couchage) VALUES (:nom, :rue, :superficie, :description, :animal, :couchage)");
        return $stmt->execute([
            'nom' => $nom_biens,
            'rue' => $rue_biens,
            'superficie' => $superficie_biens,
            'description' => $description_biens,
            'animal' => $animal_biens,
            'couchage' => $nb_couchage
        ]);
    }

    // READ (all)
    public function getAllBiens()
    {
        $stmt = $this->pdo->query("SELECT * FROM Biens");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // READ (one)
    public function getBiensById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM Biens WHERE id_biens = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // UPDATE
    public function updateBiens($id, $nom_biens, $rue_biens, $superficie_biens, $description_biens, $animal_biens, $nb_couchage)
    {
        $stmt = $this->pdo->prepare("UPDATE Biens SET nom_biens = :nom, rue_biens = :rue, superficie_biens = :superficie, description_biens = :description, animal_biens = :animal, nb_couchage = :couchage WHERE id_biens = :id");
        return $stmt->execute([
            'nom' => $nom_biens,
            'rue' => $rue_biens,
            'superficie' => $superficie_biens,
            'description' => $description_biens,
            'animal' => $animal_biens,
            'couchage' => $nb_couchage,
            'id' => $id
        ]);
    }

    // DELETE
    public function deleteBiens($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM Biens WHERE id_biens = :id");
        return $stmt->execute(['id' => $id]);
    }
}
?>