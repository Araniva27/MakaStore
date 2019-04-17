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
            if($cliente->setId($_POST['idCliente'])){
                if($cliente->deleteCliente()){
                    $result['status']=1;
                }else{
                    $result['exception']='Operacion fallida';
                }
            }else{  
                $result['exception']='Cliente incorrecto';
            }       
        }
    }else{
        exit('Acceso no disponible');
    }
    print(json_encode($result));
}else{
    exit('Recurso denegado');
}

?>