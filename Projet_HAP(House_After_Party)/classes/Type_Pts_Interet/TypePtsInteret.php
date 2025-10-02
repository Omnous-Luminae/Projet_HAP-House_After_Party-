<?php 

require_once  "../../config/db.php";

Class TypePtsInteret {

    private $id_type_points_interet = "";
    private $lib_type_points_interet = "";

    public function __construct($id_type_points_interet,$lib_type_points_interet){
        $this->id_type_points_interet = $id_type_points_interet;
        $this->lib_type_points_interet = $lib_type_points_interet;
    }

    public function getIdTypePointsInteret() { return $this->id_type_points_interet; }
    public function getLibTypePointsInteret() { return $this->lib_type_points_interet;}
    public function setLibTypePointsInteret($lib_type_points_interet) { $this->lib_type_points_interet = $lib_type_points_interet; }

    
}

?>