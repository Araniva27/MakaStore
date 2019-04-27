<?php
require_once('../../core/helpers/database.php');
require_once('../../core/helpers/validator.php');
require_once('../../core/models/customer.php');

//Se comprueba si existe una petición del sitio web y la acción a realizar, de lo contrario se muestra una página de error
if(isset($_GET['site']) && isset($_GET['action'])){
    session_start();
    $cliente= new Clientes();
    $result= array('status'=>0, 'exception'=> '');
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
    if($_GET['site']=='dashboard' && isset($_SESSION['idAdmin'])){        
        switch ($_GET['action']){
            case 'read';            
                if($result['dataset']=$cliente->readCliente()){
                    $result['status']=1;
                }else{
                    $result['exception']='No hay clientes registrados';
                }
                break;
            case 'get':
                if($cliente->setId($_POST['idCliente'])){
                    if($result['dataset']=$cliente->getCliente()){
                        $result['status'] = 1;
                    }else{
                        $result['exception'] = 'Cliente inexistente';
                    }
                }else{
                    $result['exception'] = 'Cliente incorrecto';
                }   
            break;
            case 'update':
                $_POST=$cliente->validateForm($_POST);
                if($cliente->setId($_POST['idCliente'])){
                    if($cliente->setEstado(isset($_POST['update_estado']) ? 1:0)){
                        if($cliente->updateEstado()){
                            $result['status'] = 1;
                        }else{
                            $result['exception'] = 'Operación fallida';
                        }
                    }else{
                        $result['exception'] = 'Estado incorrecto';
                    }
                }else{
                    $result['exception'] = 'Cliente incorrecto';
                }  
            break;
            case 'delete':
                if ($cliente->setId($_POST['idCliente'])) {
                    if ($cliente->getCliente()) {
                        if($cliente->setEliminacion(0)){
                            if ($cliente->updateEliminacion()) {
                                $result['status']=1;
                            } else {
                                $result['exception'] = 'Operación fallida';
                            }
                        }                           
                    } else {
                        $result['exception'] = 'Cliente inexistente';
                    }
                } else {
                    $result['exception'] = 'Cliente incorrecto';
                }
            break;
            case 'readEliminados':
                if($result['dataset']=$cliente->readClientesEliminados()){
                    $result['status']=1;
                }else{
                    $result['exception']='No hay clientes eliminados';
                }
            break;  
            case 'enable':
                if($cliente->setId($_POST['idCliente'])){
                    if ($cliente->getCliente()) {
                        if($cliente->setEliminacion(1)){
                            if ($cliente->updateEliminacion()) {
                                $result['status']=1;
                            } else {
                                $result['exception'] = 'Operación fallida';
                            }
                        }                           
                    } else {
                        $result['exception'] = 'Cliente inexistente';
                    }
                }else{
                    $result['exception'] = 'Cliente incorrecto';
                }
            break;     
        }

    }else if($_GET['site']=='public'){
        switch ($_GET['action']){
            case 'createC':             
                $_POST=$cliente->validateForm($_POST);
                if($cliente->setNombre($_POST['nombre'])){
                    if($cliente->setApellido($_POST['apellido'])){
                        if($cliente->setCorreo($_POST['correo'])){
                            if($cliente->setUsuario($_POST['usuario'])){
                                if($cliente->setContra($_POST['contra'])){
                                    if($cliente->setTelefono($_POST{'telefono'})){
                                        if($cliente->setDireccion($_POST['direccion'])){
                                            if($cliente->setEstado($_POST['estado'])){
                                                if($cliente->verificarUsuario()){
                                                    $result['exception']='Usuario ya existente';
                                                }else{
                                                    if (isset($_POST["check"])) {
                                                        if($cliente->createCliente()){
                                                            $result['status'] = 1;
                                                        }else{
                                                            $result['status']=2;
                                                            $result['exception']='Operacion fallida';
                                                        }
                                                    }else{
                                                        $result['exception']='Debe de aceptar los terminos y condiciones';
                                                    }                                                    
                                                }                                                
                                            }else{
                                                $result['exception']='Estado incorrecto';
                                            }                                           
                                        }else{
                                            $result['exception']='Direccion incorrecta';
                                        }
                                    }else{
                                        $result['exception']='Telefono incorrecto';
                                    }
                                }else{
                                    $result['exception']='Contraseña incorrecta';
                                }
                            }else{
                                $result['exception']='Usuario incorrecto';
                            }
                        }else{
                            $result['exception']='Correo incorrecto';
                        }
                    }else{
                        $result['exception']='Apellido incorrecto';
                    }
                }else{
                    $result['exception']='Nombre incorrecto';
                }
            break;
            case'login':
                $_POST=$cliente->validateForm($_POST);
                if($cliente->setUsuario($_POST['usuarioCliente'])){
                    if($cliente->checkUser()){
                        if($cliente->setContra($_POST['ContraseñaCliente'])){
                            if($cliente->checkContra()){
                                $_SESSION['idCliente']=$cliente->getId();
                                $_SERVER['nombre']=$cliente->getNombre();
                                $result['status'] = 1;                                 
                            }else{
                                $result['exception'] = 'Clave inexistente';
                            }
                        }else{
                            $result['exception'] = 'Clave menor a 6 caracteres';
                        }
                    }else{
                        $result['exception']='Usuario inexistente';
                    }
                }else{  
                    $result['exception']='Usuario incorrecto';
                }
            break;          
        }     
    }else{
        exit('Acceso no disponible');
    }
    print(json_encode($result));
 }else{
    exit('Recurso denegado');
} 

?>