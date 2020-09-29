<?php
require_once '../PracticaParcial1/datos.php';
require_once '../PracticaParcial1/Token.php';
class Asignacion{

    public $legajoProfesor;
    public $idMateria;
    public $turno;

    public function __construct($legajoProfesor,$idMateria,$turno){
        $this->legajoProfesor=$legajoProfesor;
        $this->idMateria=$idMateria;
        $this->turno=$turno;
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
        $save=Datos::GuardarJSON_Serializado("Archivos/Materias-Profesores.json",$this);

        var_dump($save);
        return $save;
    }
    public static function validarAsignacionRepetido($legajo){

        $leer=Datos::LeerJSON_Serializado("Archivos/Materias-Profesores.json");
        $mensaje = false;

        if($leer!=false){
            foreach($leer as $value){
                if ($value->legajoProfesor == $asignacion->legajoProfesor && $value->idMateria == $asignacion->idMateria 
                && $value->turno == $asignacion->turno) {                 
                     $retorno = true;
                     break;
                }
            }
        }
        return $mensaje;
    }
}



?>