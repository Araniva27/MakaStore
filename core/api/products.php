<?php
require_once('../../core/helpers/database.php');
require_once('../../core/helpers/validator.php');
require_once('../../core/models/products.php');

//Se comprueba si existe una petición del sitio web y la acción a realizar, de lo contrario se muestra una página de error
if (isset($_GET['site']) && isset($_GET['action'])) {
    session_start();
    $producto= new Productos;
    $result=array('status'=> 0, 'exception' => '');
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
    if (isset($_SESSION['idAdmin']) && $_GET['site'] == 'dashboard') {
        switch ($_GET['action']){
            case 'readProductos':
                if($result['dataset']=$producto->readProductos()){
                    $result['status']=1;
                }else{
                    $result['exception']='No hay productos registrados';
                }
            break;
            case 'readProveedores':
                if($result['dataset']=$producto->readProveedores()){
                    $result['status']=1;
                }else{
                    $result['exception']= 'No hay proveedores';
                }
            break;
            case 'readCategoria':
                if($result['dataset']=$producto->readCategoria()){
                    $result['status']=1;
                }else{
                    $result['exception']= 'No hay categorias';
                }
            break;    
            case 'create':
                $_POST=$producto->validateForm($_POST);
                if($producto->setNombre($_POST['create_nombreP'])){
                    if($producto->setPrecio($_POST['create_precioP'])){
                        if($producto->setDescripcion($_POST['descripcion'])){
                            if($producto->setCategoria($_POST['create_categoria'])){
                                if($producto->setProveedor($_POST['create_proveedor'])){
                                    if($producto->setCantidad($_POST['create_cantidadP'])){
                                        if($producto->setEstado($_POST['create_estado'] ? 1 : 0)){
                                            if (is_uploaded_file($_FILES['create_archivo']['tmp_name'])) {
                                                if ($producto->setFoto($_FILES['create_archivo'], null)) {
                                                    if($producto->checkProducto()){
                                                        $result['exception']='Producto ya se encuentra registrado';
                                                    }else{
                                                        if ($producto->createProducto()) {
                                                            if ($producto->saveFile($_FILES['create_archivo'], $producto->getRuta(), $producto->getImagen())) {
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
                                                    $result['exception'] = $producto->getImageError();
                                                }
                                            } else {
                                                $result['exception'] = 'Seleccione una imagen';
                                            }
                                        }else{
                                            $result['exception']='Estado incorrecto';
                                        }
                                    }else{
                                        $result['exception'] = 'Cantidad incorrecta';
                                    }
                                    
                                }else{
                                    $result['exception']='Seleccione proveedor';
                                }
                            }else{
                                $result['exception']='Seleccione categoria';
                            }
                        }else{
                            $result['exception']='Descripcion incorrecta';
                        }
                    }else{
                        $result['exception']='Precio incorrecto';
                    }
                }else{
                    $result['exception']='Nombre incorrecto';
                }
            break;
            case 'get':
            if ($producto->setId($_POST['idProducto'])) {
                if ($result['dataset'] = $producto->getProducto()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'Producto inexistente';
                }
            } else {
                $result['exception'] = 'Producto incorrecto';
            }
            break;  
            case 'update':
                $_POST=$producto->validateForm($_POST);
                if($producto->setId($_POST['idProducto'])){
                    if($producto->getProducto()){
                        if($producto->setNombre($_POST['update_producto'])){
                            if($producto->setPrecio($_POST['update_precio'])){
                                if($producto->setDescripcion($_POST['update_descripcion'])){
                                    if($producto->setProveedor($_POST['update_proveedor'])){
                                        if($producto->setCategoria($_POST['update_categoria'])){
                                            if($producto->setEstado(isset($_POST['update_estado']) ? 1 : 0)){
                                                if (is_uploaded_file($_FILES['update_archivo']['tmp_name'])) {
                                                    if ($producto->setFoto($_FILES['update_archivo'], $_POST['imagen_producto'])) {
                                                        $archivo = true;
                                                    } else {
                                                        $result['exception'] = $producto->getImageError();
                                                        $archivo = false;
                                                    }
                                                } else {
                                                    if ($producto->setFoto(null, $_POST['imagen_producto'])) {
                                                        $result['exception'] = 'No se subió ningún archivo';
                                                    } else {
                                                        $result['exception'] = $producto->getImageError();
                                                    }
                                                    $archivo = false;
                                                }
                                                if ($producto->updateProducto()) {
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
                                            $result['exception']='Categoria incorrecta';
                                        }
                                    }else{
                                        $result['exception']='Proveedor incorrecto';
                                    }
                                }else{
                                    $result['exception']='Descripcion incorrecta';
                                }
                            }else{
                                $result['exception']='Precio incorrecto';
                            }
                        }else{
                            $result['exception']='Nombre incorrecto';
                        }
                    }else{
                        $result['exception']='Producto inexistente';
                    }
                }else{
                    $result['exception']='Producto incorrecto';
                }
            break;  
            case 'delete':
                if ($producto->setId($_POST['idProducto'])) {
                    if ($producto->getProducto()) {
                        if ($producto->deleteProducto()) {
                            $result['status']=1;
                        } else {
                            $result['exception'] = 'Operación fallida';
                        }
                    } else {
                        $result['exception'] = 'Producto inexistente';
                    }
                } else {
                    $result['exception'] = 'Producto incorrecto';
                }
            break;
            case 'getCantidad':
                if ($producto->setId($_POST['idProducto'])) {
                    if ($result['dataset'] = $producto->getStock()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Producto inexistente';
                    }
                } else {
                    $result['exception'] = 'Producto incorrecto';
                }
            break;
            case 'updateCantidad':
                $_POST=$producto->validateForm($_POST);
                if($producto->setId($_POST['idProductoC'])){
                   if($producto->setCantidad($_POST['cantidadP'])){
                        if($producto->updateStock()){
                            $result['status']=1;
                        }else{
                            $result['exception']='Operacion fallida';
                        }
                   }else{
                    $result['exception']='Cantidad incorrecta';
                   }
                }else{
                    $result['exception']='Producto incorrecto';
                }
            break;    
        }
    }else{
        exit('Recurso denegado');
    }
    print(json_encode($result));
}else{
    exit('Recurso denegado');
}
?>