<?php
namespace App\Controllers;
use App\Models\GetProducts;

class HomeController 

{
    public function showHomePage()
    {

        $getProducts = new GetProducts();

        $products = $getProducts->findAll();

        require __DIR__ . '/../Views/HomePage.php';
    }
}