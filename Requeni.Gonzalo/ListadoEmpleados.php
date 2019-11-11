<?php

require_once "./clases/empleado.php";

$traigoTodos = Empleado::TraerTodos();
echo json_encode($traigoTodos);