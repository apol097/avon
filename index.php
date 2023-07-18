<?php
require 'vendor/autoload.php';
Flight::register('db', 'PDO', array('mysql:host=localhost;dbname=avon','root',''));

Flight::route('GET /users', function(){
    $db = Flight::db();
    $query = $db->prepare("SELECT * FROM usuarios");
    $query->execute();
    $data = $query->fetchAll();
    $array = [];
    foreach($data as $row){
        $array = [
            "id"=> $row['id'],
            "name"=> $row['nombre'],
            "email"=> $row['correo'],
            "role"=> $row['rol'],
            "image"=> $row['imagen'],
        ];
    }
    Flight::json([
        "total_rows" => $query->rowCount(),
        "data" => $array
    ]);
});

Flight::start();