<?php

require_once "../../config/db.php";

Class PtsInteret{

    private $id_pts_interet = "";
    private $lib_pts_interet = "";
    private $description_pts_interet = "";

public function __construct($id_pts_interet,$lib_pts_interet,$description_pts_interet){
    $this->id_pts_interet = $id_pts_interet;
    $this->lib_pts_interet = $lib_pts_interet;
    $this->description_pts_interet = $description_pts_interet;
}

public function getIdPtsInteret() {return $this->id_pts_interet;}
public function getLibPtsInteret() {return $this->lib_pts_interet;}
public function getDescriptionPtsInteret() {return $this->description_pts_interet;}


public function setLibPtsInteret($lib_pts_interet) {$this->lib_pts_interet = $lib_pts_interet;}
public function setDescription($description_pts_interet) {$this->description_pts_interet = $description_pts_interet;}
}

?>