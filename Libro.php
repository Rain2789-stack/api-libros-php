<?php
include "conexion.php";

class Libro {

    public static function obtenerTodos() {
        global $conn;
        $sql = "SELECT * FROM libros";
        return $conn->query($sql);
    }

    public static function obtenerPorId($id) {
        global $conn;
        $sql = "SELECT * FROM libros WHERE id = $id";
        return $conn->query($sql);
    }

    public static function crear($titulo, $autor, $anio) {
        global $conn;
        $sql = "INSERT INTO libros (titulo, autor, anio) 
                VALUES ('$titulo', '$autor', $anio)";
        return $conn->query($sql);
    }

    public static function actualizar($id, $titulo, $autor, $anio) {
        global $conn;
        $sql = "UPDATE libros 
                SET titulo='$titulo', autor='$autor', anio=$anio 
                WHERE id=$id";
        return $conn->query($sql);
    }

    public static function eliminar($id) {
        global $conn;
        $sql = "DELETE FROM libros WHERE id=$id";
        return $conn->query($sql);
    }
}
?>