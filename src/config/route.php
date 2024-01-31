<?php
use App\Controllers\TestController;

$router->map( 'GET', '/test', function(){

    $testController = new TestController;
    $testController->showtestPage();
},'test' );

