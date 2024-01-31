<?php
namespace App\Controllers;

class TestController 

{
    public function showtestPage()
    {
        require __DIR__ . '/../Views/test.php';
    }
}