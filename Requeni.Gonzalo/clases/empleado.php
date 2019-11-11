<?php

class Empleado
{
    private $_perfil;
    private $_legajo;
    private $_clave;

    public function __construct($perfil,$legajo,$clave)
    {
        $this->_perfil = $perfil;
        $this->_legajo = $legajo;
        $this->_clave = $clave;
    }

    public function ToJSON()
    {
        return '{"perfil":"'.$this->_perfil.'","legajo":"'.$this->_legajo.'","clave":"'.$this->_clave.'"}';
    }

    public function GuardarEnArchivo()
    {
        $arrayEmp = array();
        $path = "./archivos/empleados.json";
        if(file_exists($path))
        {
            $resultado = FALSE;
            $arc = fopen($path,"r+");
            $leo = fread($arc,100000000);
            fclose($arc);
        
            $arrayEmp = json_decode($leo);
            array_push($arrayEmp,json_decode($this->ToJSON()));
            $arc = fopen($path,"w+");
            $cant = fwrite($arc,json_encode($arrayEmp));
        
            if($cant > 0)
		    {
			    $resultado = TRUE;			
		    }
            fclose($arc);
            return '{"exito":"'.$resultado.'","mensaje":"Se ha guardado correctamente"}';
        }
        else
        {
            $resultado = FALSE;
            $arc = fopen($path,"w+");
            array_push($arrayEmp,json_decode($this->ToJSON()));
            $cant = fwrite($arc,json_encode($arrayEmp));
            if($cant > 0)
            {
                $resultado = TRUE;			
            }
            fclose($arc);
            return '{"exito":"'.$resultado.'","mensaje":"Se ha guardado correctamente"}';
        }
    }

    public static function TraerTodos()
    {
        $traigoTodos=array();
        $archivo = fopen("./archivos/empleados.json", "r");
		
        $archAux = fread($archivo,filesize("./archivos/empleados.json"));
		$traigoTodos = json_decode($archAux);
		fclose($archivo);
		
		return $traigoTodos;
    }

    public static function VerificarExistencia($empleado)
    {
        $arrayEmp = Empleado::TraerTodos();
        $retorno = "";
        foreach ($arrayEmp as $emp) 
        {
            if($emp->clave == $empleado->clave && $emp->legajo == $empleado->legajo)
            {
                $retorno= '{"existe":true,"mensaje":"El empleado existe"}';
                break;
            }
            else
            {
                $retorno='{"existe":false,"mensaje":"El empleado no existe"}';
            }
        }
        return $retorno;
    }
}