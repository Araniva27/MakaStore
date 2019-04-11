<?php
require_once('../../core/helpers/database.php'); 
require_once('../../core/helpers/validator.php');
require_once('../../core/models/adminRegistration.php');

//Se comprueba si existe una petición del sitio web y la acción a realizar, de lo contrario se muestra una página de error
if(isset($_GET['site']) && isset($_GET['action'])){
    session_start();
    $admin = new admin;
    $result= array('status'=> 0, 'exception' => '');
    if($_GET['site']=='dashboard'){
        switch ($_GET['action']){
            case 'create':           
                $_POST= $admin->validateForm($_POST);
                if($admin->setNombre($_POST['nombre_admin'])){
                    if($admin->setApellido($_POST['apellido_admin'])){
                        if($admin->setCorreo($_POST['correo_admin'])){
                            if($admin->setUsuario($_POST['usuario_admin'])){
                                if($admin->setContra($_POST['contra_admin'])){
                                    if($admin->setTelefono($_POST['telefono_admin'])){
                                        if($admin->setDireccion($_POST['direccion_admin'])){
                                            if($admin->checkExistencia()){
                                                $result['exception']='Usuario ya existente';
                                            }else{
                                                if($admin->createAdmin()){
                                                    $result['status'] = 1;
                                                }else{
                                                    $result['exception']='Operacion fallida';
                                                }
                                            }
                                            
                                        }else{
                                            $result['exception']='Direccion incorrecta';                                        }
                                       
                                    }else{
                                        $result['exception']='Telefono incorrecto';
                                    }
                                }else{
                                    $result['exception']= 'Contraseña incorrecta';
                                }
                            }else{
                                $result['exception']='Usuario incorrecto';
                            }
                        }else{
                            $result['exception']='Correo incorrecto';
                        }
                    }else{
                        $status['exception']='Apellido incorrecto';
                    }
                }else{
                    $result['exception']='Nombre incorrecto';
                }
            break;
        }
    }
    print(json_encode($result));
} else {
	exit('Recurso denegado');
}
?>