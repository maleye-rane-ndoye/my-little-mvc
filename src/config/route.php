<?php

use App\Controllers\UserController;
use App\Controllers\ShopController;

/// Route pour afficher le formulaire d'inscription
$router->map('GET', '/register', [new UserController(), 'register']);

// Route pour traiter la soumission du formulaire d'inscription
$router->map('POST', '/register', [new UserController(), 'register']);

// Route pour afficher le formulaire de connexion
$router->map('GET', '/login', [new UserController(), 'login']);

// Route pour traiter la soumission du formulaire de connexion
$router->map('POST', '/login', [new UserController(), 'login']);

// Route pour afficher la page du magasin (existant dans votre code)
$router->map('GET', '/shop', function(){
    $shopController = new ShopController;
    $shopController->showshopPage();
}, 'shop');
