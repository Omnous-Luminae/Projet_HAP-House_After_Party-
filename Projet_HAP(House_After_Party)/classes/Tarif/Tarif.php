<?php

require_once  "../../config/db.php";


Class Tarif{

    private $id_tarif = "";
    private $semaine_tarif = "";
    private $annee_tarif = "";
    private $tarif = "";

    public function __construct($id_tarif, $semaine_tarif, $annee_tarif, $tarif){
        $this->id_tarif = $id_tarif;
        $this->semaine_tarif = $semaine_tarif;
        $this->annee_tarif = $annee_tarif;
        $this->tarif = $tarif;
    }

    public function getIdTarif() { return $this->id_tarif; }
    public function getSemaineTarif() { return $this->semaine_tarif; }
    public function getAnneeTarif() { return $this->annee_tarif; }
    public function getTarif() { return $this->tarif; }

    public function setSemaineTarif($semaine_tarif) { $this->semaine_tarif = $semaine_tarif; }
    public function setAnneeTarif($annee_tarif) { $this->annee_tarif = $annee_tarif; }
    public function setTarif($tarif) { $this->tarif = $tarif; }

}

?>