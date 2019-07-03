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
            case 'readProductos'://Caso para leer productos
            
                if($result['dataset']=$producto->readProductos()){
                    $result['status']=1;
                }else{
                    $result['exception']='No hay productos registrados';
                }
            break;
            case 'readProveedores'://Caso para leer proveedores
                if($result['dataset']=$producto->readProveedores()){
                    $result['status']=1;
                }else{
                    $result['exception']= 'No hay proveedores';
                }
            break;
            case 'readCategoria'://Caso para leer categorias de los productos disponibles
                if($result['dataset']=$producto->readCategoria()){
                    $result['status']=1;
                }else{
                    $result['exception']= 'No hay categorias';
                }
            break;    
            case 'create'://Caso para crear productos nuevos
                $_POST=$producto->validateForm($_POST);
                if($producto->setNombre($_POST['create_nombreP'])){
                    if($producto->setPrecio($_POST['create_precioP'])){
                        if($producto->setDescripcion($_POST['descripcion'])){
                            if($producto->setCategoria($_POST['create_categoria'])){
                                if($producto->setProveedor($_POST['create_proveedor'])){
                                    if($producto->setCantidad($_POST['create_cantidadP'])){
                                        if($producto->setEstado(isset($_POST['create_estado']) ? 1 : 0)){
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
            case 'get'://Caso para obtener datos de un registro en especifico
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
            case 'update'://Caso para actualizar datos de un producto
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
                                                    if ($producto->setFoto($_FILES['update_archivo'], null)) {
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
            case 'delete'://Caso para eliminar un producto
                if ($producto->setId($_POST['idProducto'])) {
                    if ($producto->getProducto()) {
                        if($producto->setEliminacion(0)){
                            if ($producto->updateEliminacion()) {
                                $result['status']=1;
                            } else {
                                $result['exception'] = 'Operación fallida';
                            }
                        }                           
                    } else {
                        $result['exception'] = 'Producto inexistente';
                    }
                } else {
                    $result['exception'] = 'Producto incorrecto';
                }
            break;
            case 'getCantidad'://Caso para obtener la cantidad de producto
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
            case 'updateCantidad'://Caso para actualizar la cantidad de producto
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
            case 'getComentarios'://Caso para obtener los comentarios de un prducto
                if($producto->setId($_POST['idProducto'])){
                    if($result['dataset']=$producto->readComment()){
                        $result['status']=1; 
                    }else{
                        $result['exception']='error';
                    }    
                }else{
                    $result['exception']='Producto incorrecto';
                }
            break; 
            case 'getComentarios2':
                if($producto->setId($_POST['idComentario'])){
                    if($result['dataset']=$producto->readComment2()){
                        $result['status']=1; 
                    }else{
                        $result['exception'] = 'Comentario inexistente';
                    }
                }else{
                    $result['exception']='Comentario incorrecto'; 
                }
            break;    
            case 'updateState'://Caso para actualizar estado de comentarios
            $_POST=$producto->validateForm($_POST);
                if($producto->setId($_POST['idComentario'])){
                    if($producto->setEstado((isset($_POST['update_estadoC']) ? 1 : 0))){
                            if($producto->updateState()){
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
            case 'readEliminados': //Caso para leer los productos que han sido eliminados
                if($result['dataset']=$producto->readProductosEliminados()){
                    $result['status']=1;
                }else{
                    $result['exception']='No hay productos eliminados';
                }
            break;
            case 'enable'://Caso para habilitar registros
                if($producto->setId($_POST['idProducto'])){
                    if ($producto->getProducto()) {
                        if($producto->setEliminacion(1)){
                            if ($producto->updateEliminacion()) {
                                $result['status']=1;
                            } else {
                                $result['exception'] = 'Operación fallida';
                            }
                        }                           
                    } else {
                        $result['exception'] = 'Producto inexistente';
                    }
                }else{
                    $result['exception'] = 'Producto incorrecto';
                }
            break;
            case 'readProductsCategory':
                if($result['dataset'] = $producto->getCantidadCategoria()){
                    $result['status'] = 1;
                }else{
                    $result['exception'] = 'No se han encontrado datos';
                }
            break;         
        }
    }else if($_GET['site'] == 'public'){//Acciones a realizar si es el sitio publico
        switch ($_GET['action']){
            case 'readCategorias'://Leer categorias
                if ($result['dataset'] = $producto->readCategoria()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'Contenido no disponible';
                }
            break;
            case 'readProductos'://Leert productos
                if ($producto->setCategoria($_POST['idCategoria'])) {
                    if ($result['dataset'] = $producto->readProductosCategoria()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Contenido no disponible';
                    }
                } else {
                    $result['exception'] = 'Categoría incorrecta';
                }
                break;
            case 'detailProducto': //PObtener el detalle del producto
                if ($producto->setId($_POST['idProducto'])) {
                    if ($result['dataset'] = $producto->getProducto()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Contenido no disponible';
                    }
                } else {
                    $result['exception'] = 'Producto incorrecto';
                }
            break;   
            case 'getComentarios';//Obtener los comentarios de un producto en especifico
            if($producto->setId($_POST['idProducto'])){
                if($result['dataset']=$producto->readCommentCustomer()){
                    $result['status']=1; 
                }else{
                    $result['exception']='error';
                }    
            }else{
                $result['exception']='Producto incorrecto';
            }
            break;
            case 'getValoraciones': //Caso para obtener las valoraciones de los productos
                if($producto->setId($_POST['idProducto'])){
                    if($result['dataset']=$producto->readValoraciones()){
                        $result['status']=1; 
                    }else{
                        $result['exception']='error';
                    }    
                }else{
                    $result['exception']='Producto incorrecto';
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
            case 'comment'://Caso oara registrar comentario del producto
                $_POST=$producto->validateForm($_POST);
                if(isset($_SESSION['idCliente'])){
                    if($producto->setComentario($_POST['create_comentario'])){
                        if($producto->setId($_POST['idProducto'])){
                            if($producto->setCliente($_SESSION['idCliente'])){
                                if($producto->createCommentary()){
                                    $result['status'] = 1;
                                }else{
                                    $result['status'] = 2;
                                    $result['exception'] = 'No se guardó el archivo';
                                }
                            }else{
                                $result['exception'] = 'Usuario incorrecto';
                            }
                        }else{
                            $result['exception'] = 'Producto incorrecto';
                        }
                    }else{
                        $result['exception'] = 'Comentario incorrecto';
                    }
                }else{
                    $result['exception'] = 'Debe de iniciar sesion para poder comentar';
                }
            break;  
            case 'punctuation'://Caso para realizar una puntuacion de algun producto
            $_POST=$producto->validateForm($_POST);
            if(isset($_SESSION['idCliente'])){
                if($producto->setValoracion($_POST['puntuacion'])){
                    if($producto->setId($_POST['idProducto2'])){
                        if($producto->setCliente($_SESSION['idCliente'])){
                            if($producto->validatePunctuation()){//Validacion para que solo exista un comentario de un cliente en cada producto
                                $result['exception'] = 'Ya has realizado un valoracion';
                            }else{
                                if($producto->createPunctuation()){
                                    $result['status'] = 1;
                                }else{
                                    $result['status'] = 2;
                                    $result['exception'] = 'No se guardó la valoracion';
                                }
                            }                           
                        }else{
                            $result['exception'] = 'Usuario incorrecto';
                        }
                    }else{
                        $result['exception'] = 'Producto incorrecto';
                    }
                }else{
                    $result['exception'] = 'Puntuacion incorrecta';
                }
            }else{
                $result['exception'] = 'Debe de iniciar sesion para poder comentar';
            }
            break;  
            case 'searchProductos': //Caso para buscar productos
                $_POST = $producto->validateForm($_POST);
                if ($_POST['nombreProducto'] != '') {
                    if($producto->setCategoria($_POST['idCategoria'])){
                        if ($result['dataset'] = $producto->searchProductosCategoria($_POST['nombreProducto'])) {
                            $result['status'] = 1;
                        } else {
                            $result['exception'] = 'No hay coincidencias';
                        }
                    }                   
                } else {
                    $result['exception'] = 'Ingrese un valor para buscar';
                }
            break;
            case 'preDetalle':                
                $_POST=$producto->validateForm($_POST);
                if(isset($_SESSION['idCliente'])){
                    if($producto->setCantidad($_POST['cantidad'])){
                        if($producto->setId($_POST['idProducto3'])){
                            if($producto->setCliente($_SESSION['idCliente'])){
                                if($_POST['cantidadBD']>= $_POST['cantidad']){
                                    if($producto->insertPreDetalle()){                                        
                                        $result['status'] = 1;
                                    }else{
                                        $result['status'] = 2;
                                        $result['exception'] = 'Proceso fallido';
                                    }   
                                }else{
                                    $result['exception'] = 'Cantidad de producto insuficiente';
                                }                                                                                                                  
                            }else{
                                $result['exception'] = 'Usuario incorrecto';
                            }
                        }else{
                            $result['exception'] = 'Producto incorrecto';
                        }
                    }else{
                        $result['exception'] = 'Cantidad incorrecta';
                    }
                }else{
                    $result['exception'] = 'Debe de iniciar sesion para poder agregar al carrito';
                }
            break;
            case 'readPreDetalle':
                if(isset($_SESSION['idCliente'])){    
                    if($producto->setCliente($_SESSION['idCliente'])){
                        if ($result['dataset'] = $producto->readPreDetalle()) {
                            $result['status'] = 1;
                        } else {
                            $result['exception'] = 'Contenido no disponible';
                        }
                    }
                }else{
                    $result['exception'] = 'Contenido no disponible';   
                }                        
            break;
            case 'getPre':
                if ($producto->setCliente($_SESSION['idCliente'])) {
                    if ($result['dataset'] = $producto->readPreDetalle()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Pre detalle inexistente';
                    }
                } else {
                    $result['exception'] = 'Pre detalle incorrecto';
                }
            break;    
            case 'updateCantidadPre':
                $_POST=$producto->validateForm($_POST);
                if($producto->setIdPre($_POST['idPre'])){
                if($producto->setCantidad($_POST['cantidadPre'])){
                   
                        if($producto->updateCantidadPreDetalle()){
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
            case 'deletePre'://Caso para eliminar un producto
                if ($producto->setIdPre($_POST['idPreDetalle'])) {
                    if ($producto->getPreDetalle2()) {
                        if ($producto->deletePreDetalle2()) {                           
                            $result['status'] = 1;                                                                           
                        } else {
                            $result['status'] = 2;
                            $result['exception'] = 'Operación fallida';
                        }
                    } else {
                        $result['exception'] = 'Producto inexistente';
                    }
                } else {
                    $result['exception'] = 'Producto incorrecto';
                }
            break;
            case 'createSale':
            $_POST = $producto->validateForm($_POST);
            if(isset($_SESSION['idCliente'])){
                if($producto->setCliente($_SESSION['idCliente'])){                
                    if($producto->createSale()){
                        $data = $producto->getPre();
                            if($data){                                
                                if($producto->getLastSale()){
                                    for($x=0;$x<count($data);$x++){
                                        if($producto->setId($data[$x]['idProducto'])){
                                            if($producto->setCantidad($data[$x]['cantidad'])){   
                                                if($producto->createDetailsSale()){                                                    
                                                }
                                            }else {
                                                $result['exception'] = 'Comuniquese con la tienda 2';        
                                            }
                                        }else {
                                            $result['exception'] = 'Comuniquese con la tienda';        
                                        }                                            
                                    }
                                    if($producto->setCliente($_SESSION['idCliente'])){
                                        if($producto->deletePreDetalle()){
                                            $result['status'] = 1;
                                        }
                                    }
                                }
                            } else {
                                $result['exception'] = 'Comuniquese con la tienda';
                            }
                    } else {
                        $result['exception'] = 'Venta no creada';     
                    }                   
                } else {
                    $result['exception'] = 'Cliente incorrecto'; 
                }
            } else {
                $result['exception'] = 'Debe de iniciar sesion';
            }
            break;
            default:
                exit('Acción no disponible');
        }
    /*} else if($_GET['site'] == 'public' && isset($_SESSION['idCliente'])){
        switch ($_GET['action']){
           
            case 'readCategorias':
                if ($result['dataset'] = $producto->readCategoria()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'Contenido no disponible';
                }
            break;
            case 'readProductos':
                if ($producto->setCategoria($_POST['idCategoria'])) {
                    if ($result['dataset'] = $producto->readProductosCategoria()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Contenido no disponible';
                    }
                } else {
                    $result['exception'] = 'Categoría incorrecta';
                }
                break;
            case 'detailProducto': 
                if ($producto->setId($_POST['idProducto'])) {
                    if ($result['dataset'] = $producto->getProducto()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Contenido no disponible';
                    }
                } else {
                    $result['exception'] = 'Producto incorrecto';
                }
            break;   
            case 'getComentarios';
            if($producto->setId($_POST['idProducto'])){
                if($result['dataset']=$producto->readCommentCustomer()){
                    $result['status']=1; 
                }else{
                    $result['exception']='error';
                }    
            }else{
                $result['exception']='Producto incorrecto';
            }
            break;
            case 'getValoraciones':
                if($producto->setId($_POST['idProducto'])){
                    if($result['dataset']=$producto->readValoraciones()){
                        $result['status']=1; 
                    }else{
                        $result['exception']='error';
                    }    
                }else{
                    $result['exception']='Producto incorrecto';
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
        } */
    }else{
        exit('Recurso denegado');
    }
    print(json_encode($result));
}else{
    exit('Recurso denegado');
}
?>