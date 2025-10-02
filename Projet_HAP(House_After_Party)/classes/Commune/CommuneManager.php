<?php


require_once '../../config/db.php';

class CommuneManager
{
    private $pdo;

    public function __construct()
    {
        global $pdo;
        $this->pdo = $pdo;
    }

    // CREATE
    public function createCommune($code_insee, $nom_commune, $cp_commune, $lat_commune, $long_commune, $ville_slug, $ville_nom_reel, $ville_nom_soundex, $ville_nom_metaphone, $ville_departement, $ville_arrondissement, $ville_canton, $ville_code_commune, $ville_commune, $ville_surface, $ville_zmin, $ville_zmax)
    {
        $stmt = $this->pdo->prepare("INSERT INTO Commune (code_insee, nom_commune, cp_commune, latitude_commune, longitude_commune, ville_slug, ville_nom_reel, ville_nom_soundex, ville_nom_metaphone, ville_departement, ville_arrondissement, ville_canton, ville_code_commune, ville_commune, ville_surface, ville_zmin, ville_zmax) VALUES (:code_insee, :nom_commune, :cp_commune, :lat, :long, :slug, :nom_reel, :soundex, :metaphone, :departement, :arrondissement, :canton, :code_commune, :commune, :surface, :zmin, :zmax)");
        return $stmt->execute([
            'code_insee' => $code_insee,
            'nom_commune' => $nom_commune,
            'cp_commune' => $cp_commune,
            'lat' => $lat_commune,
            'long' => $long_commune,
            'slug' => $ville_slug,
            'nom_reel' => $ville_nom_reel,
            'soundex' => $ville_nom_soundex,
            'metaphone' => $ville_nom_metaphone,
            'departement' => $ville_departement,
            'arrondissement' => $ville_arrondissement,
            'canton' => $ville_canton,
            'code_commune' => $ville_code_commune,
            'commune' => $ville_commune,
            'surface' => $ville_surface,
            'zmin' => $ville_zmin,
            'zmax' => $ville_zmax
        ]);
    }

    // READ (all)
    public function getAllCommune()
    {
        $stmt = $this->pdo->query("SELECT * FROM Commune");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // READ (one)
    public function getCommuneById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM Commune WHERE id_commune = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // UPDATE
    public function updateCommune($id, $nom_commune, $cp_commune, $lat_commune, $long_commune, $ville_surface, $ville_zmin, $ville_zmax)
    {
        $stmt = $this->pdo->prepare("UPDATE Commune SET nom_commune = :nom_commune, cp_commune = :cp_commune, latitude_commune = :lat, longitude_commune = :long, ville_surface = :surface, ville_zmin = :zmin, ville_zmax = :zmax WHERE id_commune = :id");
        return $stmt->execute([
            'nom_commune' => $nom_commune,
            'cp_commune' => $cp_commune,
            'lat' => $lat_commune,
            'long' => $long_commune,
            'surface' => $ville_surface,
            'zmin' => $ville_zmin,
            'zmax' => $ville_zmax,
            'id' => $id
        ]);
    }

    // DELETE
    public function deleteCommune($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM Commune WHERE id_commune = :id");
        return $stmt->execute(['id' => $id]);
    }
}
?>