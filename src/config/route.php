<?php

use App\Controllers\UserController;
use App\Controllers\ShopController;
use App\Controllers\HomeController;


$router->map('GET', '/', [new HomeController(), 'showHomePage']);

// Route pour afficher le formulaire d'inscription
$router->map('GET', '/register', [new UserController(), 'register']);

// Route pour traiter la soumission du formulaire d'inscription
$router->map('POST', '/register', [new UserController(), 'register']);

// Route pour afficher le formulaire de connexion
$router->map('GET', '/login', [new UserController(), 'login']);

// Route pour traiter la soumission du formulaire de connexion
$router->map('POST', '/login', [new UserController(), 'login']);

// Route pour afficher la page du magasin (existant dans votre code)

$router->map('GET', '/shop', [new ShopController(), 'showshopPage']);

// Route pour la déconnexion
$router->map('GET', '/logout', [new UserController(), 'logout']);
// Route pour la page de profile
$router->map('GET', '/profile', [new UserController(), 'showProfilePage']);

$router->map('POST', '/update-user', [new UserController(), 'updateUser']);



