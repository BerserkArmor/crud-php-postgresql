<?php
namespace app\controllers;

require_once "../../vendor/autoload.php";
use app\models\Persona;

$respuesta = Persona::eliminarPersona($_POST['id']);
echo json_encode(array('respuesta' => intval($respuesta)));
