<?php 

require_once "../../config/db.php";

Class Reservation{
private $id_reservation = "";
private $date_debut_reservation = "";
private $date_fin_reservation = "";

public function __construct($id_reservation,$date_debut_reservation,$date_fin_reservation){
    $this->id_reservation = $id_reservation;
    $this->date_debut_reservation = $date_debut_reservation;
    $this->date_fin_reservation = $date_fin_reservation;
}

public function getIdReservation() {return $this->id_reservation;}
public function getDateDebutReservation() {return $this->date_debut_reservation;}
public function getDateFinReservation() {return $this->date_fin_reservation;}

public function setDateDebutReservation($date_debut_reservation) {$this->date_debut_reservation = $date_debut_reservation;}
public function setDateFinReservation($date_fin_reservation) {$this->date_fin_reservation = $date_fin_reservation;}



}

?>