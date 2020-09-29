<?php
require_once '../PracticaParcial1/datos.php';
require_once '../PracticaParcial1/Token.php';
class Usuario{

    public $email;
    public $clave;
    public $foto;

    public function __construct($email,$clave,$foto){
        $this->email=$email;
        $this->clave=$clave;
        $this->foto=$foto;
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
        $save=Datos::GuardarJSON_Serializado("Archivos/Usuarios.json",$this);
        echo 'Entro aqui';

        var_dump($save);
        return $save;
    }
    public static function validarUsuario($_correo,$_clave){
        $leer=Datos::LeerJSON_Serializado("Archivos/Usuarios.json");
        $mensaje = "Usuario no encontrado";

        foreach($leer as $value){
            if($value->email==$_correo && $value->clave==$_clave){
                $payload=array("email"=>$value->email);
                $mensaje=Token::CrearToken($payload);
            break;
            }
        }
        return $mensaje; 
    } 
    public static function validarUsuarioRepetido($usuario){

        //echo 'Entro a validar repetido';
        $leer=Datos::LeerJSON_Serializado("Archivos/Usuarios.json");
        $mensaje = false;

        if($leer!=false){
            foreach($leer as $value){
                if($value->email==$usuario->email){
                    $mensaje=true;
                break;
                }
            }
        }
        echo $mensaje;
        return $mensaje;
    }
}



?>