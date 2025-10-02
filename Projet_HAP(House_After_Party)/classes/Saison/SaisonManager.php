<?php

require_once "../../config/db.php";

class SaisonManager
{
    private $pdo;

    public function __construct()
    {
        global $pdo; // suppose que $pdo est défini dans db.php
        $this->pdo = $pdo;
    }


}
?>