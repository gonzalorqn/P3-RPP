<?php

require_once "./clases/empleado.php";

$perfil = $_POST["perfil"];
$legajo = $_POST["legajo"];
$clave = $_POST["clave"];
$empleado = new Empleado($perfil,$legajo,$clave);
$retorno = $empleado->GuardarEnArchivo();
echo $retorno;