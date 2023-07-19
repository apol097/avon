<?php
// Función para obtener todos los usuarios
function getUsuarios() {
    $db = Flight::db();
    $query = $db->prepare("SELECT * FROM usuarios");
    $query->execute();
    $data = $query->fetchAll();
    $array = [];
    foreach ($data as $row) {
        $array[] = [
            "id" => $row['id'],
            "name" => $row['nombre'],
            "email" => $row['correo'],
            "role" => $row['rol'],
            "image" => $row['imagen'],
        ];
    }
    return $array;
}

// Función para obtener un usuario por su ID
function getUsuario($id) {
    $db = Flight::db();
    $query = $db->prepare("SELECT * FROM usuarios WHERE id = :id");
    $query->execute([":id" => $id]);
    $data = $query->fetch();

    $array = [
        "id" => $data['id'],
        "name" => $data['nombre'],
        "email" => $data['correo'],
        "role" => $data['rol'],
        "image" => $data['imagen']
    ];

    return $array;
}

// Función para insertar o actualizar un usuario                        
function insertOrUpdateUsuario($name, $email, $password, $image, $id = null) {
    $db = Flight::db();
    $role = "USER";
    if ($id) {
        $query = $db->prepare("UPDATE usuarios SET nombre = :name, correo = :email, contrasena = :password, imagen = :image, rol = :role WHERE id = :id");
    } else {
        $query = $db->prepare("INSERT INTO usuarios (nombre, correo, contrasena, imagen, rol) VALUES (:name, :email, :password, :image, :role)");
    }
    $array = [
        "error" => "error al cargar los registros",
        "status" => "error"
    ];
    $params = [
        ":name" => $name,
        ":email" => $email,
        ":password" => $password,
        ":image" => $image,
        ":role" => $role,
    ];

    if ($id) {
        $params[":id"] = $id;
    }

    if ($query->execute($params)) {
        $array = [
            "data" => [
                "id" => $id ? $id : $db->lastInsertId(),
                "name" => $name,
                "email" => $email,
                "role" => $role,
                "image" => $image,
            ],
            "status" => "success"
        ];
    }

    return $array;
}

// Función para eliminar un usuario por su ID
function deleteUsuario($id) {
    $db = Flight::db();
    $query = $db->prepare("DELETE FROM usuarios WHERE id = :id");
    $array = [
        "error" => "error al cargar los registros",
        "status" => "error"
    ];

    if ($query->execute([":id" => $id])) {
        $array = [
            "data" => [
                "id" => $id
            ],
            "status" => "success"
        ];
    }

    return $array;
}
