<?php
/* inclusion de archivos */
require_once('../../core/helpers/database.php'); 
require_once('../../core/helpers/validator.php');
require_once('../../core/models/categories.php');

//Comprobacion de si existe una petición del sitio web y la acción a realizar, de lo contrario se muestra una página de error
if(isset($_GET['site']) && isset($_GET['action'])){
    session_start();
    $categoria= new Categorias(); /*Instanciacion de clase categories  */
    $result=array('status'=>0, 'exception'=> '');
  
    if($_GET['site'] == 'dashboard' && isset($_SESSION['idAdmin'])){/* verificacion si el sitio es el dashboard */
        switch($_GET['action']){/* verificacion de la accion a realizar en el switch */
            case 'readCategorias':            
                /* Procesos a realizar si el caso es leer */
                if($result['dataset']=$categoria->readCategoria()){
                    $result['status'] = 1;                    
                }else{
                    $result['exception']='No hay categorías registradas';
                }
                break;
            case 'search':
                /*Procesos a realizar si el proceso es la busqueda  */
                $_POST = $categoria->validateForm($_POST);
                if ($_POST['busqueda'] != ''){/* verificacion de que se reciba un parametro de busqueda */
                    if($result['dataset']=$categoria->searchCategoria($_POST['busqueda'])){/* uso del metodo searchCategoria de la clase categories y envio del parametro con el que se buscara */
                        $result['status']=1;
                    }else{
                        $result['exception']="No hay coincidencias";
                    }
                } else{
                    
                } 
                break;
                case 'create':
                $_POST=$categoria->validateForm($_POST);
                if($categoria->setNombre($_POST['create_nombreC'])){
                     if($categoria->setDescripcion($_POST['descripcion'])){
                         if($categoria->setEstado(isset($_POST['create_estado']) ? 1 : 0)){
                             if (is_uploaded_file($_FILES['create_archivo']['tmp_name'])) {
                                if ($categoria->setFoto($_FILES['create_archivo'], null)) {
                                    if($categoria->checkCategoria()){
                                        $result['exception']='Categoria ya se encuentra registrada';
                                            }else{
                                                 if ($categoria->createCategoria()) {
                                                    if ($categoria->saveFile($_FILES['create_archivo'], $categoria->getRuta(), $categoria->getImagen())) {
                                                        $result['status'] = 1;
                                                            } else {
                                                                $result['status'] = 2;
                                                                $result['exception'] = 'No se guardó el archivo';
                                                            }
                                                        } else {
                                                            $result['exception'] = 'Operación fallida';
                                                        }
                                                    }
                                                } else {
                                                    $result['exception'] = $categoria->getImageError();
                                                }
                                            } else {
                                                $result['exception'] = 'Seleccione una imagen';
                                            }
                                        }else{
                                            $result['exception']='Estado incorrecto';
                                        }
                                 }else{
                            $result['exception']='Descripcion incorrecta';
                        }
                }else{
                    $result['exception']='Nombre de categoría incorrecto';
                }
            break;
            case 'get':
            if ($categoria->setId($_POST['idCategoria'])) {
                if ($result['dataset'] = $categoria->getCategoria()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'Categoría inexistente';
                }
            } else {
                $result['exception'] = 'Categoría incorrecta';
            }
            break;  
            case 'update':
                $_POST=$categoria->validateForm($_POST);
                if($categoria->setId($_POST['idCategoria'])){
                    if($categoria->getCategoria()){
                        if($categoria->setNombre($_POST['update_categoria'])){
                             if($categoria->setDescripcion($_POST['update_descripcion'])){
                                 if($categoria->setEstado(isset($_POST['update_estado']) ? 1 : 0)){
                                    if (is_uploaded_file($_FILES['update_archivo']['tmp_name'])) {
                                        if ($categoria->setFoto($_FILES['update_archivo'], null)) {
                                                $archivo = true;
                                             } else {
                                                $result['exception'] = $categoria->getImageError();
                                                    $archivo = false;
                                             }
                                                } else {
                                                    if ($categoria->setFoto(null, $_POST['imagen_categoria'])) {
                                                        $result['exception'] = 'No se subió ningún archivo';
                                                    } else {
                                                        $result['exception'] = $producto->getImageError();
                                                    }
                                                    $archivo = false;
                                                }
                                                if ($categoria->updateCategoria()) {
                                                    if ($archivo) {
                                                        if ($producto->saveFile($_FILES['update_archivo'], $producto->getRuta(), $producto->getImagen())) {
                                                            $result['status'] = 1;
                                                        } else {
                                                            $result['status'] = 2;
                                                            $result['exception'] = 'No se guardó el archivo';
                                                        }
                                                    } else {
                                                        $result['status'] = 3;
                                                    }
                                                } else {
                                                    $result['exception'] = 'Operación fallida';
                                                }
                                            }else{
                                                $result['exception']='Estado incorrecto';
                                            }
                                }else{
                                    $result['exception']='Descripcion incorrecta';
                                }
                        }else{
                            $result['exception']='Nombre incorrecto';
                        }
                    }else{
                        $result['exception']='Categoría inexistente';
                    }
                }else{
                    $result['exception']='Categoría incorrecta';
                }
            break;  
            case 'delete':
                if ($categoria->setId($_POST['idCategoria'])) {
                    if ($categoria->getCategoria()) {
                        if($categoria->setEliminacion(0)){
                            if ($categoria->updateEliminacion()) {
                                $result['status']=1;
                            } else {
                                $result['exception'] = 'Operación fallida';
                            }
                        }                           
                    } else {
                        $result['exception'] = 'Categoría inexistente';
                    }
                } else {
                    $result['exception'] = 'Categoría incorrecta';
                }
            break;
            case 'readEliminados':
                if($result['dataset']=$categoria->readCategoriasEliminadas()){
                    $result['status']=1;
                }else{
                    $result['exception']='No hay productos eliminados';
                }
            break;
            case 'enable':
                if($categoria->setId($_POST['idCategoria'])){
                    if ($categoria->getCategoria()) {
                        if($categoria->setEliminacion(1)){
                            if ($categoria->updateEliminacion()) {
                                $result['status']=1;
                            } else {
                                $result['exception'] = 'Operación fallida';
                            }
                        }                           
                    } else {
                        $result['exception'] = 'Categoria inexistente';
                    }
                }else{
                    $result['exception'] = 'Categoria incorrecto';
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