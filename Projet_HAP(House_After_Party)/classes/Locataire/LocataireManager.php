<?php

require_once '../../config/db.php';

class LocataireManager
{
    private $pdo;

    public function __construct()
    {
        global $pdo;
        $this->pdo = $pdo;
    }

    // CREATE
    public function createLocateire($nom, $prenom, $email, $tel, $date_naissance, $mdp, $rue, $complement, $siret = null, $raison_sociale = null)
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO Locataire (nom_locataire, prenom_locataire, email_locataire, tel_locataire, date_naissance_locataire, mdp_locataire, rue_locataire, complement_rue_locataire, siret, raison_sociale)
            VALUES (:nom, :prenom, :email, :tel, :date_naissance, :mdp, :rue, :complement, :siret, :raison_sociale)"
        );
        return $stmt->execute([
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'tel' => $tel,
            'date_naissance' => $date_naissance,
            'mdp' => $mdp,
            'rue' => $rue,
            'complement' => $complement,
            'siret' => $siret,
            'raison_sociale' => $raison_sociale
        ]);
    }

    // READ (all)
    public function getAllLocataire()
    {
        $stmt = $this->pdo->query("SELECT * FROM Locataire");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // READ (one)
    public function getLocataireById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM Locataire WHERE id_locataire = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // UPDATE
    public function updateLocataire($id, $nom, $prenom, $email, $tel, $date_naissance, $mdp, $rue, $complement, $siret = null, $raison_sociale = null)
    {
        $stmt = $this->pdo->prepare(
            "UPDATE Locataire SET nom_locataire = :nom, prenom_locataire = :prenom, email_locataire = :email, tel_locataire = :tel, date_naissance_locataire = :date_naissance, mdp_locataire = :mdp, rue_locataire = :rue, complement_rue_locataire = :complement, siret = :siret, raison_sociale = :raison_sociale WHERE id_locataire = :id"
        );
        return $stmt->execute([
            'id' => $id,
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'tel' => $tel,
            'date_naissance' => $date_naissance,
            'mdp' => $mdp,
            'rue' => $rue,
            'complement' => $complement,
            'siret' => $siret,
            'raison_sociale' => $raison_sociale
        ]);
    }

    // DELETE
    public function deleteLocataire($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM Locataire WHERE id_locataire = :id");
        return $stmt->execute(['id' => $id]);
    }
}
?>