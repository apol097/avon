<?php
function getClients() {
    $db = Flight::db();
    $query = $db->prepare("SELECT * FROM clientes");
    $query->execute();
    $data = $query->fetchAll();
    $array = [];
    foreach ($data as $row) {
        $array[] = [
            "id" => $row['id'],
            "name" => $row['nombre'],
            "direccion" => $row['direccion'],
            "created_at" => $row['fecha_creacion']
        ];
    }
    return $array;
}

function insertOrUpdateClient($name, $direccion, $id = null) {
    $db = Flight::db();
    if ($id) {
        $query = $db->prepare("UPDATE clientes SET nombre = :name, direccion = :direccion WHERE id = :id");
    } else {
        $query = $db->prepare("INSERT INTO clientes (nombre, direccion) VALUES (:name, :direccion)");
    }
    $array = [
        "error" => "error al cargar los registros",
        "status" => "error"
    ];
    $params = [
        ":name" => $name,
        ":direccion" => $direccion
    ];
    if ($id) {
        $params[":id"] = $id;
    }
    if ($query->execute($params)) {
        $array = [
            "data" => [
                "id" => $id ? $id : $db->lastInsertId(),
                "name" => $name,
                "direccion" => $direccion,
            ],
            "status" => "success"
        ];
    }
    return $array;
}

function getClient($id) {
    $db = Flight::db();
    $query = $db->prepare("SELECT * FROM clientes WHERE id = :id");
    $query->execute([":id" => $id]);
    $data = $query->fetch();

    $array = [
        "name" => $data['nombre'],
        "direccion" => $data['direccion']
    ];

    return $array;
}