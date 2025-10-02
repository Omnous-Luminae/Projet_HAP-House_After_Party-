<?php

require_once  "../../config/db.php";

class Evenement{

    private $id_evenement = "";
    private $nom_evenement = "";
    private $description_evenement = "";
    private $date_debut_evenement = "";
    private $date_fin_evenement = "";

    public function __construct($id_evenement, $nom_evenement, $description_evenement,$date_debut_evenement, $date_fin_evenement){
        $this->id_evenement = $id_evenement;
        $this->nom_evenement = $nom_evenement;
        $this->description_evenement = $description_evenement;
        $this->date_debut_evenement = $date_debut_evenement;
        $this->date_fin_evenement = $date_fin_evenement;
    }

    public function getIdEvenement() { return $this->id_evenement; }
    public function getNomEvenement() { return $this->nom_evenement; }
    public function getDescriptionEvenement() { return $this->description_evenement; }
    public function getDateDebutEvenement() { return $this->date_debut_evenement; }
    public function getDateFinEvenement() { return $this->date_fin_evenement; }

    public function setNomEvenement($nom_evenement) { $this->nom_evenement = $nom_evenement; }
    public function setDescriptionEvenement($description_evenement) { $this->description_evenement = $description_evenement; }
    public function setDateDebutEvenement($date_debut_evenement) { $this->date_debut_evenement = $date_debut_evenement; }
    public function setDateFinEvenement($date_fin_evenement) { $this->date_fin_evenement = $date_fin_evenement; }

}