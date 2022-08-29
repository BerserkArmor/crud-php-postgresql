<?php
namespace app\controllers;

require_once "../../vendor/autoload.php";
use app\models\Persona;

$persona = array(
    'nombre' => $_POST['nombre'],
    'apellido' => $_POST['apellido'],
    'edad' => intval($_POST['edad']),
);

$respuesta = Persona::insertarPersona($persona);

echo json_encode(array('respuesta' => intval($respuesta)));
