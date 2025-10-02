<?php

require_once '../../config/db.php';

class TypeBienManager
{
    private $pdo;

    public function __construct()
    {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function createTypeBien($description_type_bien)
    {
        $stmt = $this->pdo->prepare("INSERT INTO Type_Bien (designation_type_bien) VALUES (:desc)");
        return $stmt->execute(['desc' => $description_type_bien]);
    }

    public function readAllTypeBien()
    {
        $stmt = $this->pdo->query("SELECT * FROM Type_Bien");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function readTypeBienById($id_type_bien)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM Type_Bien WHERE id_type_biens = :id");
        $stmt->execute(['id' => $id_type_bien]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateTypeBien($id, $description_type_bien)
    {
        $stmt = $this->pdo->prepare("UPDATE Type_Bien SET designation_type_bien = :desc WHERE id_type_biens = :id");
        return $stmt->execute(['desc' => $description_type_bien, 'id' => $id]);
    }

    public function deleteTypeBien($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM Type_Bien WHERE id_type_biens = :id");
        return $stmt->execute(['id' => $id]);
    }
}
?>