<?php
use App\Controllers\TestController;

$router->map( 'GET', '/shop', function(){

    $testController = new TestController;
    $testController->showshopPage();
},'shop' );

