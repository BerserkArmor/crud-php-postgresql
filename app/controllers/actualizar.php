<?php
namespace app\controllers;

require_once "../../vendor/autoload.php";
use app\models\Persona;

$persona = array(
    'id' => $_POST['id'],
    'nombre' => $_POST['nombre'],
    'apellido' => $_POST['apellido'],
    'edad' => intval($_POST['edad']),
);

$respuesta = Persona::actualizarPersona($persona);

echo json_encode(array('respuesta' => intval($respuesta)));
