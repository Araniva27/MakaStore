<?php
require_once('../../core/helpers/database.php'); 
require_once('../../core/helpers/validator.php');
require_once('../../core/models/adminRegistration.php');

//Se comprueba si existe una petición del sitio web y la acción a realizar, de lo contrario se muestra una página de error
if(isset($_GET['site']) && isset($_GET['action'])){
    session_start();
    $admin = new admin;
    $result= array('status'=> 0, 'exception' => '');
    if(isset($_SESSION['idAdmin']) && $_GET['site']=='dashboard'){
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
            case 'read':
            if ($result['dataset'] = $admin->readAdmin()) {
                $result['status'] = 1;
            } else {
                $result['exception'] = 'No hay administradores registrados';
            }
            break;
            case 'logout':
            if (session_destroy()) {
                header('location: ../../views/dashboard/');
            } else {
                header('location: ../../views/dashboard/main.php');
            }
            break;
            case 'readProfile':
                if($admin->setId($_SESSION['idAdmin'])){
                    if($result['dataset']=$admin->getProfile()){
                        $result['status'] = 1;
                    }else{
                        $result['exception'] = 'Administrador inexistente';
                    }

                }else{
                    $result['exception']='Administrador incorrecto';
                }
            break;    
            case 'editProfile':
            if ($admin->setId($_SESSION['idAdmin'])) {
                if ($admin->getAdmin()) {
                    $_POST = $admin->validateForm($_POST);
                    if ($admin->setNombre($_POST['profile_nombre'])) {
                        if ($admin->setApellido($_POST['profile_apellido'])) {
                            if ($admin->setCorreo($_POST['profile_correo'])) {
                                if($admin->setDireccion($_POST['profile_direccion'])){
                                    if($admin->setTelefono($_POST['profile_telefono'])){
                                        if ($admin->setUsuario($_POST['profile_usuario'])) {                                                                           
                                            if ($admin->updateAdmin()) {
                                                $_SESSION['usuario'] = $_POST['profile_usuario'];
                                                $result['status'] = 1;
                                            } else {
                                                $result['exception'] = 'Operación fallida';
                                            }                     
                                        } else {
                                            $result['exception'] = 'Usuario incorrecto';
                                        }
                                    }else{
                                        $result['exception'] = 'Telefono incorrecto';
                                    }    
                                }else{
                                    $result['exception'] = 'Direccion incorrecta';
                                }                             
                               
                            } else {
                                $result['exception'] = 'Correo incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Apellidos incorrectos';
                        }
                    } else {
                        $result['exception'] = 'Nombres incorrectos';
                    }
                } else {
                    $result['exception'] = 'Usuario inexistente';
                }
            } else {
                $result['exception'] = 'Usuario incorrecto';
            } 
            break;       
            case 'password':
                if ($admin->setId($_SESSION['idAdmin'])) {
                    $_POST = $admin->validateForm($_POST);
                    if ($_POST['clave_actual_1'] == $_POST['clave_actual_2']) {
                        if ($admin->setContra($_POST['clave_actual_1'])) {
                            if ($admin->checkContra()) {
                                if ($_POST['clave_nueva_1'] == $_POST['clave_nueva_2']) {
                                    if ($admin->setContra($_POST['clave_nueva_1'])) {
                                            if ($admin->changeContra()) {
                                            $result['status'] = 1;
                                        } else {
                                            $result['exception'] = 'Operación fallida';
                                        }
                                    } else {
                                        $result['exception'] = 'Clave nueva menor a 6 caracteres';
                                    }
                                } else {
                                    $result['exception'] = 'Claves nuevas diferentes';
                                }
                            } else {
                                $result['exception'] = 'Clave actual incorrecta';
                            }
                        } else {
                            $result['exception'] = 'Clave actual menor a 6 caracteres';
                        }
                    } else {
                        $result['exception'] = 'Claves actuales diferentes';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
            break;
        }
    }else if($_GET['site']=='dashboard'){
        switch ($_GET['action']){
            case 'login':
            $_POST = $admin->validateForm($_POST);
            if ($admin->setUsuario($_POST['usuario'])) {
                if ($admin->checkUser()) {
                    if ($admin->setContra($_POST['contrasena'])) {
                        if ($admin->checkContra()) {
                            $_SESSION['idAdmin'] = $admin->getId();  
                            $_SESSION['nombre'] = $admin->getNombre();
                            $_SESSION['apellido'] = $admin->getApellido();  
                            $_SESSION['usuario'] = $admin->getUsuario();                                                                  
                            $result['status'] = 1;                                
                        } else {
                            $result['exception'] = 'Clave inexistente';
                        }
                    } else {
                        $result['exception'] = 'Clave menor a 6 caracteres';
                    }
                } else {
                    $result['exception'] = 'Usuario inexistente';
                }
            } else {
                $result['exception'] = 'Usuario incorrecto';
            }
        break;   
        }
    }
    print(json_encode($result));
} else {
	exit('Recurso denegado');
}
?>