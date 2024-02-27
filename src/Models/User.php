<?php

namespace App\Models;

use PDOException;

class User extends DatabaseLog{


    public function register($firstname, $lastname, $email, $password) {
        try {
            $pdo = $this->getBdd();
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hashage du mot de passe
            $query = "INSERT INTO User (firstname, lastname, email, password) VALUES (?, ?, ?, ?)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$firstname, $lastname, $email, $hashedPassword]);
            return true; // Succès de l'insertion
        } catch (PDOException $e) {
            // Gérer les erreurs de requête SQL
            echo "Erreur SQL : " . $e->getMessage() . "<br>";
            echo "Requête SQL : " . $query . "<br>";
            echo "Paramètres : " . implode(", ", [$firstname, $lastname, $email, $password]) . "<br>";
            return false; // Échec de l'insertion
        }
    }
    

    public function emailExists($email) {
        try {
            $pdo = $this->getBdd();
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM User WHERE email = ?");
            $stmt->execute([$email]);
            $count = $stmt->fetchColumn();
            return $count > 0;
        } catch (PDOException $e) {
            // Gérer les erreurs de requête SQL
            return false;
        }
    }
    

    public function login($email, $password) {
        try {
            $pdo = $this->getBdd();
            $stmt = $pdo->prepare("SELECT * FROM User WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password'])) {
                return $user; // user authentifié avec succès
            } else {
                return false; // Nom d'user ou mot de passe incorrect
            }
        } catch (PDOException $e) {
            // Gérer les erreurs de sélection
            return false; // ou lancer une exception, etc.
        }
    }
}
