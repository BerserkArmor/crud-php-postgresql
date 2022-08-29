<?php
namespace app\controllers;

require_once "../../vendor/autoload.php";
use app\models\Persona;

echo json_encode(Persona::mostrarDatos());
