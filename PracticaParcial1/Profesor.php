<?php
require_once '../PracticaParcial1/datos.php';
require_once '../PracticaParcial1/Token.php';
class Profesor{

    public $nombre;
    public $legajo;

    public function __construct($nombre,$legajo){
        $this->nombre=$nombre;
        $this->legajo=$legajo;
    }

    //Metodo magicos
    public function __get($var)
    {
        return $this->$var;
    }
    public function __set($var, $value)
    {
        $this->$var=$value;
    }
    public function guardar(){
        $save=Datos::GuardarJSON_Serializado("Archivos/Profesores.json",$this);

        var_dump($save);
        return $save;
    }
    public static function validarProfesorRepetido($legajo){

        $leer=Datos::LeerJSON_Serializado("Archivos/Profesores.json");
        $mensaje = false;

        if($leer!=false){
            foreach($leer as $value){
                if($value->legajo==$legajo){
                    $mensaje=true;
                break;
                }
            }
        }
        return $mensaje;
    }
}



?>