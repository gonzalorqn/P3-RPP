<?php

$json = json_decode($_GET["json"]);
$legajo = $json->legajo;
date_default_timezone_set('America/Argentina/Buenos_Aires');
if(isset($_COOKIE[$legajo]))
{
    echo '{"exito":true,"mensaje":"'.$_COOKIE[$legajo].'"}';
}
else
{
    echo '{"exito":false,"mensaje":"La cookie no existe"}';
}
