<?php

require_once "../config/db.php";

Class Prestation{

    private $id_prestation = "";
    private $lib_prestation = "";

public function __construct($id_prestation, $lib_prestation){
    $this->id_prestation = $id_prestation;
    $this->lib_prestation = $lib_prestation;
}

public function getidprestation () {return $this->id_prestation; }
public function getlibprestation () {return $this->lib_prestation;}

public function setlibprestation($lib_prestation) {$this->lib_prestation = $lib_prestation;}

}




?>