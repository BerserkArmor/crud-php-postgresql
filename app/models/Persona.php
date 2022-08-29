<?php
namespace app\models;

require_once "../../vendor/autoload.php";

use app\config\Connection;
use \PDO;
use \PDOException;

class Persona extends Connection
{
    public static function mostrarDatos(): array
    {
        try {
            $sql = "SELECT * FROM persona ORDER BY id ASC";
            $stmt = Connection::getConnection()->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);

            return ($stmt->rowCount() > 0) ? $result : 'sin datos';

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die('error en modelo persona mostrar datos');
        }
    }

    public static function buscarPersonaById(int $id)
    {
        try {
            $sql = "SELECT * FROM persona WHERE id=:id";
            $stmt = Connection::getConnection()->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_OBJ);

            return ($stmt->rowCount() > 0) ? $result : 'sin datos';

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die('error en modelo persona mostrar datos');
        }
    }

    public static function insertarPersona(array $persona): bool
    {
        try {
            $sql = "INSERT INTO persona (nombre, apellido, edad) VALUES (:nombre, :apellido, :edad)";
            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->bindParam(':nombre', $persona['nombre'], PDO::PARAM_STR);
            $stmt->bindParam(':apellido', $persona['apellido'], PDO::PARAM_STR);
            $stmt->bindParam(':edad', $persona['edad'], PDO::PARAM_INT);
            $stmt->execute();
            return ($stmt->rowCount() > 0) ? true : false;

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die('error en modelo persona mostrar datos');
        }
    }

    public static function actualizarPersona(array $persona): bool
    {
        try {
            $sql = "UPDATE public.persona
            SET nombre= :nombre, apellido= :apellido, edad=  :edad
            WHERE id = :id";
            $stmt = Connection::getConnection()->prepare($sql);
            $stmt->bindParam(':id', $persona['id'], PDO::PARAM_INT);
            $stmt->bindParam(':nombre', $persona['nombre'], PDO::PARAM_STR);
            $stmt->bindParam(':apellido', $persona['apellido'], PDO::PARAM_STR);
            $stmt->bindParam(':edad', $persona['edad'], PDO::PARAM_INT);
            $stmt->execute();

            return ($stmt->rowCount() > 0) ? true : false;

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die('error en modelo persona mostrar datos');
        }
    }

    public static function eliminarPersona(int $id): bool
    {
        try {
            $sql = "DELETE FROM  persona WHERE id = :id";
            $stmt = Connection::getConnection()->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return ($stmt->rowCount() > 0) ? true : false;

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die('error en modelo persona mostrar datos');
        }
    }
}
