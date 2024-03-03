<?php
// session.php

// Démarrez la session
session_start();


// Vérifiez l'authentification de l'utilisateur dans d'autres scripts
if (isset($_SESSION['user_id'])) {
    // L'utilisateur est connecté
    $userId = $_SESSION['user_id'];
    $username = $_SESSION['username'];
    // Vous pouvez utiliser ces informations pour personnaliser l'expérience de l'utilisateur
} else {
    // L'utilisateur n'est pas connecté, vous pouvez rediriger vers la page de connexion
    header("Location: /B2/my-little-mvc/login");
    exit();
}

$userLoggedIn = isset($_SESSION['user_id']);
