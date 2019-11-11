<?php

require_once "./clases/empleado.php";

$legajo = $_POST["legajo"];
$clave = $_POST["clave"];
$empleado = new StdClass();
$empleado->legajo = $legajo;
$empleado->clave = $clave;
$obj = Empleado::VerificarExistencia($empleado);
$obj = json_decode($obj);
if($obj->existe == true)
{
    setcookie($empleado->legajo,date('d/m/y h:i:s')."--".$obj->mensaje);
    header("Location:ListadoEmpleados.php");
}
else
{
    echo '{"exito":false,"mensaje":"El empleado no existe"}';
}