<?php

require_once '../../config.php';

Class EvenementManager{

        private $pdo;

    public function __construct()
    {
        global $pdo;
        $this->pdo = $pdo;
    }

public function addEvenement($nom_evenement,$date_debut_evenement,$date_fin_evenement,$description_evenement){
    $stmt=$this->pdo->prepare("INSERT INTO Evenement (nom_evenement,date_debut_evenement,date_fin_evenement,description_evenement) VALUES (:nomevenement,:datedebutevenement,:datefinevenement,:descriptionevenement)");
    return $stmt->execute([
        'nom_evenement' => $nom_evenement,
        'date_debut_evenement' => $date_debut_evenement,
        'date_fin_evenement' => $date_fin_evenement,
        'description_evenement' => $description_evenement
    ]);
}

public function readAllEvenement(){
    $stmt=$this->pdo->query("SELECT * FROM Evenement");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);

}

public function readIdEvenement($id_evenement){
    $stmt=$this->pdo->prepare("SELECT * FROM Evenement WHERE id_evenement=:idevenement");
    $stmt->execute(['idevenement'=>$id_evenement]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function updateEvenement($id_evenement,$nom_evenement,$date_debut_evenement,$date_fin_evenement,$description_evenement){
    $stmt=$this->pdo->prepare("UPDATE Evenement SET nom_evenement=:nomevenement,date_debut_evenement=:datedebutevenement,date_fin_evenement=:datefinevenement,description_evenement=:descriptionevenement WHERE id_evenement=:idevenement");
    return $stmt->execute(['
    idevenement'=>$id_evenement,
    'nomevenement'=>$nom_evenement,
    'datedebutevenement'=>$date_debut_evenement,
    'date_fin_evenement' => $date_fin_evenement,
     'descriptionevement'=>$description_evenement
    ]);
}
}

?>