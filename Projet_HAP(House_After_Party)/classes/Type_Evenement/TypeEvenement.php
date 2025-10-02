<?php

require_once  "../config/db.php";

Class TypeEvenement {

    private $id_type_evenement = "";
    private $lib_type_evenement = "";

    public function __construct($id_type_evenement,$lib_type_evenement){
        $this->id_type_evenement = $id_type_evenement;
        $this->lib_type_evenement = $lib_type_evenement;
    }

    public function getIdTypeEvenement() { return $this->id_type_evenement; }
    public function getLibTypeEvenement() { return $this->lib_type_evenement;}
    public function setLibTypeEvenement($lib_type_evenement) { $this->lib_type_evenement = $lib_type_evenement; }

    
}

?>