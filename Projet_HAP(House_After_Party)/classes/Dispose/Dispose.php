<?php

require_once  "../../config/db.php";

Class Dispose{

    private $distance = "";

    public function __construct($distance){
        $this->distance = $distance;
    }
    public function getDistance() { return $this->distance; }
    public function setDistance($distance) { $this->distance = $distance; }
}