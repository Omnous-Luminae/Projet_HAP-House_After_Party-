<?php 

require_once "../../config/db.php";

Class Compose{

    private $quantite = "";

    public function __construct($quantite){
        $this->quantite = $quantite;

    }

    public function getQuantite() {return $this->quantite;}

    public function setQuantite($quantite) {$this->quantite = $quantite;}
}

?>