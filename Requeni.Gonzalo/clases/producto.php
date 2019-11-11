<?php

require "IParte2.php";
require_once 'AccesoDatos.php';
class Producto implements IParte2
{
    public $codigoBarra;
    public $descripcion;
    public $precio;
    public $pathFoto;

    public function __construct($codigoBarra=NULL, $descripcion=NULL, $precio=NULL,$pathFoto=NULL)
	{
        if($codigoBarra!=NULL)
            $this->codigoBarra = $codigoBarra;
        if($descripcion!=NULL)
            $this->descripcion = $descripcion;
        if($precio!=NULL)
            $this->precio = $precio;
        if($pathFoto!=NULL)
            $this->pathFoto = $pathFoto;
    }
    
    public function ToJSON()
    {
        return '{"codigoBarra":"'.$this->codigoBarra.'","descripcion":"'.$this->descripcion.'","precio":"'.$this->precio.'","pathFoto":"'.$this->pathFoto.'"}';
    }
}