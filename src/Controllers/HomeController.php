<?php
namespace App\Controllers;
use App\Models\GetProducts;

class HomeController 

{
    public function showHomePage()
    { 
         // Vérifier si l'utilisateur est connecté
        $userLoggedIn = isset($_SESSION['user_id']);

        $getProducts = new GetProducts();

        $products = $getProducts->findAll();

        require __DIR__ . '/../Views/HomePage.php';
    }
}