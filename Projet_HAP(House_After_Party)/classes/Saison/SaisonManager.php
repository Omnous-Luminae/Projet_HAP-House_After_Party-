<?php

require_once "../../config/db.php";

class SaisonManager
{
    private $pdo;

    public function __construct()
    {
        global $pdo; // suppose que $pdo est défini dans db.php
        $this->pdo = $pdo;
    }

    // CREATE
    public function createSaison($lib_saison)
    {
        $stmt = $this->pdo->prepare("INSERT INTO Saison (lib_saison) VALUES (:lib_saison)");
        return $stmt->execute(['lib_saison' => $lib_saison]);
    }

    // READ (all)
    public function readAllSaison()
    {
        $stmt = $this->pdo->query("SELECT * FROM Saison");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // READ (one)
    public function readSaisonById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM Saison WHERE id_saison = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // UPDATE
    public function updateSaison($id, $lib_saison)
    {
        $stmt = $this->pdo->prepare("UPDATE Saison SET lib_saison = :lib_saison WHERE id_saison = :id");
        return $stmt->execute(['lib_saison' => $lib_saison, 'id' => $id]);
    }

    // DELETE
    public function deleteSaison($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM Saison WHERE id_saison = :id");
        return $stmt->execute(['id' => $id]);
    }
}
?>