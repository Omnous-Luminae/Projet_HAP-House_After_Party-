<?php

require_once "../../config/db.php";
Class Saison {

    private $idSaison;
    private $lib_Saison;

    public function __construct($idSaison, $lib_Saison) {
        $this->idSaison = $idSaison;
        $this->lib_Saison = $lib_Saison;
    }

    public function getIdSaison() {
        return $this->idSaison;
    }

    public function getlibSaison() {
        return $this->lib_Saison;
    }
    public function setlibSaison($lib_Saison) {
        $this->lib_Saison = $lib_Saison;
    }

}

?>