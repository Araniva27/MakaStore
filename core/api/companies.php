<?php
/* inclusion de archivos */
require_once('../../core/helpers/database.php'); 
require_once('../../core/helpers/validator.php');
require_once('../../core/models/companies.php');

//Comprobacion de si existe una petición del sitio web y la acción a realizar, de lo contrario se muestra una página de error
if(isset($_GET['site']) && isset($_GET['action'])){
    session_start();
    
    $compañia= new companies; /*Instanciacion de clase companies  */
    $result=array('status'=>0, 'exception'=> '');
  
    if($_GET['site'] == 'dashboard' && isset($_SESSION['idAdmin'])){/* verificacion si el sitio es el dashboard */
        switch($_GET['action']){/* verificacion de la accion a realizar en el switch */
            case 'read':            
                /* Procesos a realizar si el caso es leer */
                if($result['dataset']=$compañia->readCompanies()){
                    $result['status'] = 1;                    
                }else{
                    $result['exception']='No hay proveedores registrados';
                }
                break;
            case 'search':
                /*Procesos a realizar si el proceso es la busqueda  */
                $_POST = $compañia->validateForm($_POST);
                if ($_POST['busqueda'] != ''){/* verificacion de que se reciba un parametro de busqueda */
                    if($result['dataset']=$compañia->searchCompanies($_POST['busqueda'])){/* uso del metodo searchCompanies de la clase companies y envio del parametro con el que se buscara */
                        $result['status']=1;
                    }else{
                        $result['exception']="No hay coincidencias";
                    }
                } else{
                    
                } 
                break;
            case 'create':
                /* Procesos a realizar si el caso es crear */
                $_POST=$compañia->validateForm($_POST);
                /* Asignacion de valor a los atributos de la clase companies */
                if($compañia->setNombre($_POST['create_nombre'])){
                    if($compañia->setDireccion($_POST['create_direccion'])){
                        if($compañia->setTelefono($_POST['create_telefono'])){
                            if($compañia->setCorreo($_POST['create_correo'])){
                                if($compañia->checkProveedor()){
                                    $result['exception'] = 'Proveedor ya se encuentra registrado';
                                }else{
                                    if($compañia->createCompanie()){/* uso de la funcion createCompanies */
                                        $result['status']=1;                                    
                                    }else{
                                        $result['status']=2;
                                        $result['exception'] = 'Operación fallida';
                                    }    
                                }                                
                            }else{
                            $result['exception']='Correo incorrecto';
                          }
                        }else{
                            $result['exception']='Telefono incorrecto';
                        }
                    }else{
                        $result['exception']='Direccion incorrecta';
                    }
                }else{
                    $result['exception']='Nombre incorrecto';
                }
                break;
            case 'get':
                /*Obtencion de registro para mostrarlo en el modal */
                if ($compañia->setId($_POST['idProveedor'])) {
                    if ($result['dataset'] = $compañia->getCompanie()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Compañia inexistente';
                    }
                } else {
                    $result['exception'] = 'Compañia incorrecta';
                }
            	break;    
            case 'update':
                /*Operaciones a realizar si la funcion es actualizar */
                $_POST=$compañia->validateForm($_POST);
                /*Asignacion de valor para realizar el proceso a actualizar*/
                if($compañia->setid($_POST['idProveedor'])){
                    if($compañia->getCompanie()){
                        if($compañia->setNombre($_POST['update_nombre'])){
                            if($compañia -> setDireccion($_POST['update_direccion'])){
                                if($compañia->setTelefono($_POST['update_telefono'])){
                                    if($compañia->setCorreo($_POST['update_correo'])){
                                        if($compañia->setEstado(isset($_POST['update_state']) ? 1 : 0)){
                                            if($compañia->updateCompanie()){/* Aplicacion del metodo actualizar companie*/
                                                $result['status']=1;
                                            }else{
                                                $result['status']=2;
                                                $result['exception']='Proceso fallido';
                                            }
                                        }else{
                                            $result['exception']='Estado incorrecto';
                                        }                                       
                                    }else{
                                        $result['exception']='Correo incorrecto';
                                    }
                                }else{
                                    $result['exception']='Telefono incorrecto';
                                }
                            }else{
                                $result['exception']='Dirección incorrecta';
                            }
                        }else{
                            $result['exception']='Nombre incorrecto';
                        }
                    }else{
                        $result['exception']='Proveedor inexistente';
                    }
                }else{
                    $result['exception']='Proveedor incorrecto';
                }
                break;
            case 'delete':
                /* Procesos a realizar si el caso es eliminar */
                if ($compañia->setId($_POST['idProveedor'])) {
                    if ($compañia->getCompanie()) {
                        if($compañia->setEliminacion(0)){
                            if ($compañia->updateEliminacion()) {
                                $result['status']=1;
                            } else {
                                $result['exception'] = 'Operación fallida';
                            }
                        }                           
                    } else {
                        $result['exception'] = 'Proveedor inexistente';
                    }
                } else {
                    $result['exception'] = 'Proveedor incorrecto';
                }
            break;
            case 'readEliminados':
                if($result['dataset']=$compañia->readProveedoresEliminados()){
                    $result['status']=1;
                }else{
                    $result['exception']='No hay proveedores eliminados';
                }
             break;
             case 'enable':
             if($compañia->setId($_POST['idProveedor'])){
                 if ($compañia->getCompanie()) {
                     if($compañia->setEliminacion(1)){
                         if ($compañia->updateEliminacion()) {
                             $result['status']=1;
                         } else {
                             $result['exception'] = 'Operación fallida';
                         }
                     }                           
                 } else {
                     $result['exception'] = 'Proveedor inexistente';
                 }
             }else{
                 $result['exception'] = 'Proveedor incorrecto';
             }
         break;
            default:           
            exit('Acción no disponible'); 
        }
    }else{
        exit('Acceso no disponible');
    }
    print (json_encode($result));
}else{
    exit('Recurso denegado');
}
?>