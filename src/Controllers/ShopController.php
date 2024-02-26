<?php
namespace App\Controllers;
use App\Models\GetProducts;

class ShopController 

{
    public function showshopPage()
    {

        $getProducts = new GetProducts();

        $products = $getProducts->findAll();

        require __DIR__ . '/../Views/shop.php';
    }
}