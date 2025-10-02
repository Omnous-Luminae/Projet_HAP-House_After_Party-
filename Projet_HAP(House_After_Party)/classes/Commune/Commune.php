<?php

require_once  "../../config/db.php";

Class Commune{

    private $id_commune = "";
    private $code_insee = "";
    private $nom_commune = "";
    private $cp_commune = "";
    private $lat_commune = "";
    private $long_commune = "";
    private $ville_slug = "";
    private $ville_nom_reel = "";
    private $ville_nom_soundex = "";
    private $ville_nom_metaphone = "";
    private $ville_departement = "";
    private $ville_arrondissement = "";
    private $ville_canton = "";
    private $ville_code_commune = "";
    private $ville_commune = "";
    private $ville_surface = "";
    private $ville_zmin = "";
    private $ville_zmax = "";


    public function __construct($id_commune, $code_insee, $nom_commune, $cp_commune, $lat_commune, $long_commune, $ville_slug, $ville_nom_reel, $ville_nom_soundex, $ville_nom_metaphone, $ville_departement, $ville_arrondissement, $ville_canton, $ville_code_commune, $ville_commune, $ville_surface, $ville_zmin, $ville_zmax){
        $this->id_commune = $id_commune;
        $this->code_insee = $code_insee;
        $this->nom_commune = $nom_commune;
        $this->cp_commune = $cp_commune;
        $this->lat_commune = $lat_commune;
        $this->long_commune = $long_commune;
        $this->ville_slug = $ville_slug;
        $this->ville_nom_reel = $ville_nom_reel;
        $this->ville_nom_soundex = $ville_nom_soundex;
        $this->ville_nom_metaphone = $ville_nom_metaphone;
        $this->ville_departement = $ville_departement;
        $this->ville_arrondissement = $ville_arrondissement;
        $this->ville_canton = $ville_canton;
        $this->ville_code_commune = $ville_code_commune;
        $this->ville_commune = $ville_commune;
        $this->ville_surface = $ville_surface;
        $this->ville_zmin = $ville_zmin;
        $this->ville_zmax = $ville_zmax;

    }

    public function getIdCommune() { return $this->id_commune; }
    public function getCodeInsee() { return $this->code_insee; }
    public function getNomCommune() { return $this->nom_commune; }
    public function getCpCommune() { return $this->cp_commune; }
    public function getLatCommune() { return $this->lat_commune; }
    public function getLongCommune() { return $this->long_commune; }
    public function getVilleSlug() { return $this->ville_slug; }
    public function getVilleNomReel() { return $this->ville_nom_reel; }
    public function getVilleNomSoundex() { return $this->ville_nom_soundex; }
    public function getVilleNomMetaphone() { return $this->ville_nom_metaphone; }
    public function getVilleDepartement() { return $this->ville_departement; }
    public function getVilleArrondissement() { return $this->ville_arrondissement; }
    public function getVilleCanton() { return $this->ville_canton; }
    public function getVilleCodeCommune() { return $this->ville_code_commune; }
    public function getVilleCommune() { return $this->ville_commune; }
    public function getVilleSurface() { return $this->ville_surface; }
    public function getVilleZmin() { return $this->ville_zmin; }
    public function getVilleZmax() { return $this->ville_zmax; }

    public function setNomCommune($nom_commune) { $this->nom_commune = $nom_commune; }
    public function setCpCommune($cp_commune) { $this->cp_commune = $cp_commune; }
    public function setLatCommune($lat_commune) { $this->lat_commune = $lat_commune; }
    public function setLongCommune($long_commune) { $this->long_commune = $long_commune; }
    public function setVilleSurface($ville_surface) { $this->ville_surface = $ville_surface; }
    public function setVilleZmin($ville_zmin) { $this->ville_zmin = $ville_zmin; }
    public function setVilleZmax($ville_zmax) { $this->ville_zmax = $ville_zmax; }

}