<?php
require_once  "../../config/db.php";

class TarifManager
{
    private $pdo;

    public function __construct()
    {
        global $pdo;
        $this->pdo = $pdo;
    }

    // CREATE
    public function createTarif($semaine_tarif, $annee_tarif, $tarif)
    {
        $stmt = $this->pdo->prepare("INSERT INTO Tarif (semaine_tarif, annee_tarif, tarif) VALUES (:semaine, :annee, :tarif)");
        return $stmt->execute([
            'semaine' => $semaine_tarif,
            'annee' => $annee_tarif,
            'tarif' => $tarif
        ]);
    }

    // READ (all)
    public function getAllTarif()
    {
        $stmt = $this->pdo->query("SELECT * FROM Tarif");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // READ (one)
    public function getTarifById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM Tarif WHERE id_tarif = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // UPDATE
    public function updateTarif($id, $semaine_tarif, $annee_tarif, $tarif)
    {
        $stmt = $this->pdo->prepare("UPDATE Tarif SET semaine_tarif = :semaine, annee_tarif = :annee, tarif = :tarif WHERE id_tarif = :id");
        return $stmt->execute([
            'semaine' => $semaine_tarif,
            'annee' => $annee_tarif,
            'tarif' => $tarif,
            'id' => $id
        ]);
    }

    // DELETE
    public function deleteTarif($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM Tarif WHERE id_tarif = :id");
        return $stmt->execute(['id' => $id]);
    }
}  

?>