<?php
header("Content-Type: application/json");
include "Libro.php";

$method = $_SERVER['REQUEST_METHOD'];

switch($method) {

    // 📌 GET (Obtener libros)
    case 'GET':
        if (isset($_GET['id'])) {
            $result = Libro::obtenerPorId($_GET['id']);
            echo json_encode($result->fetch_assoc());
        } else {
            $result = Libro::obtenerTodos();
            $libros = [];

            while ($row = $result->fetch_assoc()) {
                $libros[] = $row;
            }

            echo json_encode($libros);
        }
        break;

    // 📌 POST (Crear libro)
    case 'POST':
        $data = json_decode(file_get_contents("php://input"));

        if (Libro::crear($data->titulo, $data->autor, $data->anio)) {
            echo json_encode(["mensaje" => "Libro creado"]);
        } else {
            echo json_encode(["mensaje" => "Error"]);
        }
        break;

    // 📌 PUT (Actualizar libro)
    case 'PUT':
        $data = json_decode(file_get_contents("php://input"));

        if (Libro::actualizar($data->id, $data->titulo, $data->autor, $data->anio)) {
            echo json_encode(["mensaje" => "Libro actualizado"]);
        } else {
            echo json_encode(["mensaje" => "Error"]);
        }
        break;

    // 📌 DELETE (Eliminar libro)
    case 'DELETE':
        $data = json_decode(file_get_contents("php://input"));

        if (Libro::eliminar($data->id)) {
            echo json_encode(["mensaje" => "Libro eliminado"]);
        } else {
            echo json_encode(["mensaje" => "Error"]);
        }
        break;
}
?>