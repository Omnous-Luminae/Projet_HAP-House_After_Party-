<?php 

require_once "../../config/db.php";

Class Biens{
private $id_biens = "";
private $nom_biens = "";
private $rue_biens = "";
private $superficie_biens = "";
private $description_biens = "";
private $animal_biens = "";
private $nb_couchage = "";

public function __construct($id_biens,$nom_biens,$rue_biens,$superficie_biens,$description_biens,$animal_biens,$nb_couchage){
    $this->id_biens = $id_biens;
    $this->nom_biens = $nom_biens;
    $this->rue_biens = $rue_biens;
    $this->superficie_biens = $superficie_biens;
    $this->description_biens = $description_biens;
    $this->animal_biens = $animal_biens;
    $this->nb_couchage = $nb_couchage;
}

public function getIdBiens() {return $this->id_biens;}
public function getNomBiens() {return $this->nom_biens;}
public function getRueBiens() {return $this->rue_biens;}
public function getSuperficieBiens() {return $this->superficie_biens;}
public function getDescriptionBiens() {return $this->description_biens;}
public function getAnimalBiens() {return $this->animal_biens;}
public function getNbCouchage() {return $this->nb_couchage;}

public function setNomBiens($nom_biens) {$this->nom_biens = $nom_biens;}
public function setRueBiens($rue_biens) {$this->rue_biens = $rue_biens;}
public function setSuperficieBiens($superficie_biens) {$this->superficie_biens = $superficie_biens;}
public function setDescriptionBiens($description_biens) {$this->description_biens = $description_biens;}
public function setAnimalBiens($animal_biens) {$this->animal_biens = $animal_biens;}
public function setNbCouchage($nb_couchage) {$this->nb_couchage = $nb_couchage;}


}
?>