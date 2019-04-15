<?php
require_once('../../core/helpers/database.php');
require_once('../../core/helpers/validator.php');
require_once('../../core/models/sales.php');

if(isset($_GET['site']) && isset($_GET['action'])){
    session_start();
    $sales= new Sales();
    $result=array('status'=>0, 'exception'=>'');
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
    if($_GET['site']=='dashboard'){
        switch ($_GET['action']){
            case 'read':
                if($result['dataset']=$sales->readVentas()){
                    $result['status']=1;
                }else{
                    $result['exception']='No hay ventas realizadas';
                }
            break;
            case 'detalle':
                if($sales->setId($_POST['idVenta'])){
                    if($result['dataset']=$sales->obtenerDetalle()){
                        $result['status']=1; 
                    }else{
                        $result['exception']='error';
                    }    
                }else{
                    $result['exception']='Venta incorrecta';
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