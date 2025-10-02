<?php

require_once '../config/db.php';

class TypeBien{

    private $id_type_bien = "";
    private $description_type_bien = "";

    public function __construct($id_type_bien, $description_type_bien){
        $this->id_type_bien = $id_type_bien;
        $this->description_type_bien = $description_type_bien;
    }

    public function getIdTypeBien() { return $this->id_type_bien; }
    public function getLibTypeBien() { return $this->description_type_bien; }

    public function setLibTypeBien($description_type_bien) { $this->description_type_bien = $description_type_bien; }

}