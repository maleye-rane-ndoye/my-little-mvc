<?php

namespace App\Models;

use PDOException;

class User extends Databaselog {




    public function register($firstname, $lastname, $email, $password) {
        try {
            $pdo = $this->getBdd();
            $stmt = $pdo->prepare("INSERT INTO User (firstname, lastname, email, password) VALUES (?, ?, ?, ?)");
            $stmt->execute([$firstname, $lastname, $email, $password]);
            return true; // ou une autre indication de succès
        } catch (PDOException $e) {
            // Gérer les erreurs d'insertion
            return false; // ou lancer une exception, etc.
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
