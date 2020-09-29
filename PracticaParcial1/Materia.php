<?php
require_once '../PracticaParcial1/datos.php';
class Materia{

    public $nombre;
    public $cuatrimestre;
    public $id;

    public function __construct($nombre,$cuatrimestre){
        $this->nombre=$nombre;
        $this->cuatrimestre=$cuatrimestre;
        $this->id=Materia::asignarId();
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
        $save=Datos::GuardarJSON_Serializado("Archivos/Materias.json",$this);
        echo 'Entro aqui';

        var_dump($save);
        return $save;
    }
    public static function validarUsuarioRepetido($id){

        //echo 'Entro a validar repetido';
        $leer=Datos::LeerJSON_Serializado("Archivos/Materias.json");
        $mensaje = false;

        if($leer!=false){
            foreach($leer as $value){
                if($value->id==$id){
                    $mensaje=true;
                break;
                }
            }
        }
        echo $mensaje;
        return $mensaje;
    }
    public static function asignarId(){
        $leer=Datos::LeerJSON_Serializado("Archivos/Materias.json");
        $id;
        if($leer==false){
            $id=0;
        }
        else{
            $id=count($leer) + 1;
        }
        return $id;
    }

}










?>