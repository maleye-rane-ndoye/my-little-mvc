<?php

namespace App\Models;

use PDO;
use PDOException;

abstract class DatabaseLog
{
    protected $pdo;

    protected function getBdd()
    {
        
        $host = "localhost";
        $dbname = "draft_shop";
        $username = "root";
        $password = "";

        try {
            
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

            
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $this->pdo;
        } catch (PDOException $e) {
            
            die("Connexion error ! : " . $e->getMessage());
        }
    }
}