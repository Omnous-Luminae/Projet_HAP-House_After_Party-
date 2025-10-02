<?php

require_once '../../config/db.php';

class TypeEvenementManager
{
    private $pdo;

    public function __construct()
    {
        global $pdo;
        $this->pdo = $pdo;
    }

    