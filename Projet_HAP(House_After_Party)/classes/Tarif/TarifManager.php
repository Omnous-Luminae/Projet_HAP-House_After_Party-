<?php
require_once  "../../config/db.php";

class TarifManager
{
    private $pdo;

    public function __construct()
    {
        global $pdo;
        $this->pdo = $pdo;
    }

    // CREATE

}  

?>