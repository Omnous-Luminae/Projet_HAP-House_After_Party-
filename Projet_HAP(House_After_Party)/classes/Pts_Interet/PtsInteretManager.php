<?php


require_once '../../config/db.php';

class PtsInteretManager
{
    private $pdo;

    public function __construct()
    {
        global $pdo;
        $this->pdo = $pdo;
    }

   
}
?>