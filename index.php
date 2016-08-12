<?php

require 'vendor/autoload.php';
require 'app/models/Usuarios.php';
require 'app/include/config.php';
 
$app = new Slim\App();
$container = $app->getContainer();
$capsule = new Illuminate\Database\Capsule\Manager;
$capsule->addConnection($config['settings']['db']);
$capsule->bootEloquent();

$app->get('/hello/{name}', function ($request, $response, $args) {
    $response->write("Hello, " . $args['name']);
    return $response;
});

$app->get('/usuarios', function ($request, $response, $args) {
    
    /*R::setup( 'mysql:host=localhost;dbname=potestad',
        'root', '**' );
    R::freeze(true);
    // // // // // $usuarios = R::findAll('usuarios');
    $usuarios = R::getAll('SELECT * FROM usuarios');*/
    // $response->withJson($usuarios = Usuarios::all());
    $usuarios = array("data"=>Usuarios::all(),"errors"=> 0, "meta"=>Usuarios::count());

    return json_encode($usuarios);
});

$app->get('/', function ($request, $response, $args) {
    $response->write("Hello, there");
    return $response;
});

$app->run();
