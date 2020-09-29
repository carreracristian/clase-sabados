<?php
require_once '../PracticaParcial1/Usuario.php';
require_once '../PracticaParcial1/datos.php';
require_once '../PracticaParcial1/Materia.php';
require_once '../PracticaParcial1/Respuestas.php';
require_once '../PracticaParcial1/Profesor.php';
require_once '../PracticaParcial1/Asignacion.php';

$method= $_SERVER["REQUEST_METHOD"];
$path=  $_SERVER["PATH_INFO"]??"ruta inexistente";

$mensaje= new Respuestas();
switch($path){
    case '/Usuario':
        switch ($method) {
            case 'POST':
                $email=$_POST['email'] ?? null; 
                $clave =$_POST['clave'] ?? null;
                $name=$_FILES["imagen"]["name"]??null;
                $tmp_name=$_FILES["imagen"]["tmp_name"]??null;
                //echo "entro en post";
                if (isset($email)&&isset($clave)&&isset($name)){
                    //echo "entro al if";
                    $usuario=new Usuario($email,$clave,$name);
                    //echo "entro creo el usuario";
                    //echo "<br/>";
                    //var_dump($usuario);
                    if(Usuario::validarUsuarioRepetido($usuario)){
                        
                        $mensaje->data = "usuario repetido";
                    }else{
                        $Usuario->foto=Datos::GuardarFoto($name,$tmp_name);
                        $respuesta=$usuario->guardar();
                        $mensaje->data =  'Se guardo exitosamente';
                    }
                }
                break;
            
            default:
                # code...
                break;
        }
    break;
    case '/login':
            $email=$_POST['email'] ?? null; 
            $clave =$_POST['clave'] ?? null;

            if (isset($email)&&isset($clave)){
                $respuesta=Usuario::validarUsuario($email,$clave);
                $mensaje->data =  $respuesta;
            }
            else
            $mensaje->data =  'Usuario inexistente';
    break;
    case '/Materia':
        switch ($method) {
            case 'POST':
                $headers=getallheaders();
                $nombre=$_POST['nombre'] ?? null; 
                $cuatrimestre =$_POST['cuatrimestre'] ?? null;
                $Token=$headers["token"]??"";
                $payload = Token::ValidarToken($Token);

                if($payload!=null){
                   if (isset($nombre)&&isset($cuatrimestre)){
                      $materia=new Materia($nombre,$cuatrimestre);
                      $respuesta=$materia->guardar();
                      $mensaje->data = 'Se guardo la materia';
                    }
                    else{
                        $mensaje->data = 'Campos incompletos';
                    }
                }
                else{
                    $mensaje->data =  'El token esta invalido';
                 }
             break;
            case 'GET':
                $headers=getallheaders();
                $Token=$headers["token"]??"";
                $payload = Token::ValidarToken($Token);

                if($payload!=null){
                     //$lista= Datos::LeerJSON("Productos.json");
                     $lista= Datos::LeerJSON_Serializado("Archivos/Materias.json");
                     if ($lista!=false) {
         
                        $mensaje->data = $lista;
                     } 
                     else {
                        $mensaje->data =  "Lista vacia";
                        $mensaje->status= "Fallo";
                        }
               }
                else{
                    $mensaje->data =  "Lista vacia";
                    $mensaje->status= "Fallo";
                }
                
                break;
        }
            
    break;
    case '/Profesor':
        switch ($method) {
            case 'POST':
                $headers=getallheaders();
                $nombre=$_POST['nombre'] ?? null; 
                $legajo =$_POST['legajo'] ?? null;
                $Token=$headers["token"]??"";
                $payload = Token::ValidarToken($Token);

                if($payload!=null){
                   if (isset($nombre)&&isset($legajo)){
                      $profesor=new Profesor($nombre,$legajo);
                      $respuesta=$profesor->guardar();
                      $mensaje->data = 'Se guardo el docente';
                    }
                    else{
                        $mensaje->data = 'Campos incompletos';
                    }
                }
                else{
                    $mensaje->data =  'El token esta invalido';
                 }
             break;
            case 'GET':
                $headers=getallheaders();
                $Token=$headers["token"]??"";
                $payload = Token::ValidarToken($Token);

                if($payload!=null){
                     //$lista= Datos::LeerJSON("Productos.json");
                     $lista= Datos::LeerJSON_Serializado("Archivos/Profesores.json");
                     if ($lista!=false) {
         
                        $mensaje->data = $lista;
                     } 
                     else {
                        $mensaje->data =  "Lista vacia";
                        $mensaje->status= "Fallo";
                        }
               }
                else{
                    $mensaje->data =  "Lista vacia";
                    $mensaje->status= "Fallo";
                }
                
                break;
        }
            
    break;
    case '/Asignacion':
        switch ($method) {
            case 'POST':
                $headers=getallheaders();
                $id=$_POST['id'] ?? null; 
                $legajo =$_POST['legajo'] ?? null;
                $turno =$_POST['turno'] ?? null;
                $Token=$headers["token"]??"";
                $payload = Token::ValidarToken($Token);

                if($payload!=null){
                   if (isset($id)&&isset($legajo)&&isset($turno)){
                       if($turno=='mañana' || $turno=='noche'){
                            if(Profesor::validarProfesorRepetido($legajo) && Materia::validarUsuarioRepetido($id)){
                                $asignacion=new Asignacion($legajo,$id,$turno);
                                if(Asignacion::validarAsignacionRepetido($asignacion)==false){
                                    $respuesta=$asignacion->guardar();
                                    $mensaje->data = 'Se guardo la asignacion';
                                }
                                else{
                                    $mensaje->data = 'Error, no se puede asignar mismo turno y/o materia al mismo profesor';
                                }
                      
                            }
                            else{
                               $mensaje->data ='profesor o materia inexistente';
                            }
                       }
                       else{
                        $mensaje->data = 'Turno invalido';
                       }
                       
                      
                    }
                    else{
                        $mensaje->data = 'Campos incompletos';
                    }
                }
                else{
                    $mensaje->data =  'El token esta invalido';
                 }
             break;
            case 'GET':
                $headers=getallheaders();
                $Token=$headers["token"]??"";
                $payload = Token::ValidarToken($Token);

                if($payload!=null){
                     //$lista= Datos::LeerJSON("Productos.json");
                     $lista= Datos::LeerJSON_Serializado("Archivos/Materias-Profesores.json");
                     if ($lista!=false) {
         
                        $mensaje->data = $lista;
                     } 
                     else {
                        $mensaje->data =  "Lista vacia";
                        $mensaje->status= "Fallo";
                        }
               }
                else{
                    $mensaje->data =  "Lista vacia";
                    $mensaje->status= "Fallo";
                }
                
                break;
        }
            
    break;
 
}
echo json_encode($mensaje);
?>