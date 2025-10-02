<?php

require_once  "../../config/db.php";

Class Locataire{

    private $id_locataire = "";
    private $nom_locataire = "";
    private $prenom_locataire = "";
    private $date_naissance_locataire = "";
    private $mdp_locataire = "";
    private $rue_locataire = "";
    private $complement_rue_locataire = "";
    private $email_locataire = "";
    private $tel_locataire = "";

    public function __construct($id_locataire, $nom_locataire, $prenom_locataire, $email_locataire, $tel_locataire, $date_naissance_locataire, $mdp_locataire, $rue_locataire, $complement_rue_locataire){
        $this->id_locataire = $id_locataire;
        $this->nom_locataire = $nom_locataire;
        $this->prenom_locataire = $prenom_locataire;
        $this->email_locataire = $email_locataire;
        $this->tel_locataire = $tel_locataire;
        $this->date_naissance_locataire = $date_naissance_locataire;
        $this->mdp_locataire = $mdp_locataire;
        $this->rue_locataire = $rue_locataire;
        $this->complement_rue_locataire = $complement_rue_locataire;
    }

    public function getIdLocataire() { return $this->id_locataire; }
    public function getNomLocataire() { return $this->nom_locataire; }
    public function getPrenomLocataire() { return $this->prenom_locataire; }
    public function getEmailLocataire() { return $this->email_locataire; }
    public function getTelLocataire() { return $this->tel_locataire; }
    public function getDateNaissanceLocataire() { return $this->date_naissance_locataire; }
    public function getMdpLocataire() { return $this->mdp_locataire; }
    public function getRueLocataire() { return $this->rue_locataire; }
    public function getComplementRueLocataire() { return $this->complement_rue_locataire; }

    public function setNomLocataire($nom_locataire) { $this->nom_locataire = $nom_locataire; }
    public function setPrenomLocataire($prenom_locataire) { $this->prenom_locataire = $prenom_locataire; }
    public function setEmailLocataire($email_locataire) { $this->email_locataire = $email_locataire; }
    public function setTelLocataire($tel_locataire) { $this->tel_locataire = $tel_locataire; }
    public function setDateNaissanceLocataire($date_naissance_locataire) { $this->date_naissance_locataire = $date_naissance_locataire; }
    public function setMdpLocataire($mdp_locataire) { $this->mdp_locataire = $mdp_locataire; }
    public function setRueLocataire($rue_locataire) { $this->rue_locataire = $rue_locataire; }
    public function setComplementRueLocataire($complement_rue_locataire) { $this->complement_rue_locataire = $complement_rue_locataire; }

}