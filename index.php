<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

require 'vendor/autoload.php';
require 'controllers/usuarios-table.php';
require 'controllers/clientes-table.php';

Flight::register('db', 'PDO', array('mysql:host=localhost;dbname=avon','root',''));


// Rutas
function getToken(){
    $headers = apache_request_headers();
    $authorization = $headers["Authorization"];
    $authArray = explode(" ", $authorization);  
    $jwt= $authArray[1];
    $decoded = JWT::decode($jwt, new Key('avon_key','HS256'));
    if($decoded->data->role == 'USER') return true;
    else return false;
}

Flight::route('GET /clients', function(){
    if(getToken()){
        Flight::halt(401, json_encode([
            "error" => 'Unauthorized',
            "status" => "error"
        ]));
    }
    $array = getClients();
    Flight::json([
        "data" => $array
    ]); 
});


Flight::route('GET /users', function(){
    if(getToken()){
        Flight::halt(401, json_encode([
            "error" => 'Unauthorized',
            "status" => "error"
        ]));
    }
    $array = getUsuarios();
    Flight::json([
        "data" => $array
    ]);
});

Flight::route('GET /users/@id', function($id){
    $array = getUsuario($id);
    Flight::json([
        "data" => $array
        
    ]);
});

Flight::route('GET /clients/@id', function($id){
    if(getToken()){
        Flight::halt(401, json_encode([
            "error" => 'Unauthorized',
            "status" => "error"
        ]));
    }
    $array = getClient($id);
    Flight::json([
        "data" => $array,
        "status" => "success"
    ]);
});

Flight::route('POST /clients', function(){
    if(getToken()){
        Flight::halt(401, json_encode([
            "error" => 'Unauthorized',
            "status" => "error"
        ]));
    }
    $name = Flight::request()->data->name;
    $direccion = Flight::request()->data->direccion;

    $array = insertOrUpdateClient($name, $direccion);

    Flight::json([
        "data" => $array
    ]);
});


Flight::route('POST /users', function(){
    if(getToken()){
        Flight::halt(401, json_encode([
            "error" => 'Unauthorized',
            "status" => "error"
        ]));
    }
    $name = Flight::request()->data->name;
    $email = Flight::request()->data->email;
    $password = Flight::request()->data->password;
    $image = Flight::request()->data->image;

    $array = insertOrUpdateUsuario($name, $direccion ,$id);

    Flight::json([
        "data" => $array
    ]);
});

Flight::route('PUT /clients', function(){
    if(getToken()){
        Flight::halt(401, json_encode([
            "error" => 'Unauthorized',
            "status" => "error"
        ]));
    }
    $id = Flight::request()->data->id;
    $name = Flight::request()->data->name;
    $direccion = Flight::request()->data->direccion;

    $array = insertOrUpdateClient($name, $direccion, $id);

    Flight::json([
        "data" => $array
    ]);
});


Flight::route('PUT /users', function(){
    if(getToken()){
        Flight::halt(401, json_encode([
            "error" => 'Unauthorized',
            "status" => "error"
        ]));
    }
    $id = Flight::request()->data->id;
    $name = Flight::request()->data->name;
    $email = Flight::request()->data->email;
    $password = Flight::request()->data->password;
    $image = Flight::request()->data->image;

    $array = insertOrUpdateUsuario($name, $email, $password, $image, $id);

    Flight::json([
        "data" => $array
    ]);
});

Flight::route('DELETE /users', function(){
    if(getToken()){
        Flight::halt(401, json_encode([
            "error" => 'Unauthorized',
            "status" => "error"
        ]));
    }
    $id = Flight::request()->data->id;
    $array = deleteUsuario($id);

    Flight::json([
        "data" => $array
    ]);
});

Flight::route('POST /auth', function(){
    $db = Flight::db();
    $email = Flight::request()->data->email;
    $password = Flight::request()->data->password;
    $query = $db->prepare("SELECT * FROM usuarios WHERE correo = :email AND contrasena = :password");
    $array = [
        "error" => "Usuario no válido",
        "status" => "error"
    ];
    $params = [
        ":email" => $email,
        ":password" => $password,
    ];
    if ($query->execute($params)) {
        $key = "avon_key";
        $data = $query->fetch();

        // Validar si la consulta devolvió resultados antes de acceder a los valores
        if ($data) {
            $respuesta = [
                "id" => $data['id'],
                "name" => $data['nombre'],
                "email" => $data['correo'],
                "role" => $data['rol'],
            ];
            $payload = [
                'exp' => strtotime("now") + 3600,
                "data" => $respuesta
            ];
            $jwt = JWT::encode($payload, $key, 'HS256');
            $redirect = true;
            if($data['rol'] =="USER"){
                $redirect = false;
            }
            $array = [
                "token" => $jwt,
                "status" => "success",
                "redirect"=> $redirect,
                "profile" => [
                    "id" => $data['id'],
                    "name" => $data['nombre'],
                    "email" => $data['correo']
                ]
            ];
        } else {
            // El correo o la contraseña son incorrectos
            $array = [
                "error" => "Credenciales incorrectas",
                "status" => "error"
            ];
        }
    }
    Flight::json([
        "data" => $array
    ]);
});


Flight::start();