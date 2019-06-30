<?php
class Sales extends Validator{
    //Atributos de la clase
    private $id=null;
    private $idCliente=null;
    private $fecha=null;
    private $idEstado=null;

    public function setId($value){
        if($this->validateId($value)){
            $this->id=$value;
            return true;
        }else{
            return false;
        }
    }

    public function getId(){
        return $this->id;
    }

    public function setIdCliente($value){
        if($this->validateId($value)){
            $this->idCliente=$value;
            return true;
        }else{
            return false;
        }
    }

    public function getIdCliente(){
        return $this->idCliente;
    }

    public function setFecha($value){
        if($this->validateDate($value)){
            $this->fecha=$value;
            return true;
        }else{
            return false;
        }
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function setIdEstado(){
        if($this->validateId($value)){
            $this->idEstado=$value;
            return true;
        }else{
            return false;
        }
    }

    public function getIdEstado(){
        return $this->idEstado;
    }

    //Metodos para el manejo de SCRUD
    public function readVentas(){
        $sql='SELECT idVenta, nombre, fecha_hora, estadoventa.estado FROM cliente, estadoventa, venta WHERE cliente.idCliente=venta.idCliente AND estadoventa.idEstado=venta.idEstado ORDER by idVenta ASC';
        $params=array(null);
        return Database::getRows($sql, $params);
    }

    public function obtenerDetalle(){
        $sql='SELECT idDetalle,nombre, detalle_venta.cantidad, producto.precio,  (producto.precio * detalle_venta.cantidad) AS Total FROM detalle_venta, producto WHERE producto.idProducto= detalle_venta.idProducto AND idVenta = ?';
        $params=array($this->id);
        return Database::getRows($sql,$params);
    }

    public function searchVenta(){
        $sql='SELECT idVenta, nombre, fecha_hora, estadoventa.estado FROM cliente, estadoventa, venta WHERE cliente.idCliente=venta.idCliente AND estadoventa.idEstado=venta.idEstado AND fecha_hora = ?  ORDER by idVenta ASC';
        $params=array($this->fecha);
        return Database::getRows($sql, $params);
    }

    public function ventaCliente(){
        $sql='SELECT idVenta, nombre, fecha_hora, estadoventa.estado FROM venta, estadoventa, cliente WHERE cliente.idCliente= venta.idCliente AND estadoventa.idEstado= venta.idEstado AND venta.idCliente = ?';
        $params=array($this->idCliente);
        return Database::getRows($sql, $params);

    }

    public function getSalesReport(){
        $sql = 'SELECT producto.nombre as producto, detalle_venta.cantidad as cantidad, cliente.nombre as clienteN, cliente.apellido as clienteA, venta.fecha_hora as fecha, (producto.precio * detalle_venta.cantidad)as total, producto.precio as precioU FROM detalle_venta INNER JOIN venta ON detalle_venta.idVenta = venta.idVenta INNER JOIN cliente ON cliente.idCliente=venta.idCliente INNER JOIN producto ON producto.idProducto = detalle_venta.idProducto WHERE idEstado = 1 ORDER BY venta.fecha_hora';
        $params= array(null);
        return Database::getRows($sql, $params);
    }

    public function updateStateSale(){
        $sql = 'UPDATE venta set idEstado = 1 WHERE idVenta = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }

    public function reportePedidos(){
        $sql = 'SELECT producto.nombre as producto, detalle_venta.cantidad as cantidad, cliente.nombre as clienteN, cliente.apellido as clienteA, venta.fecha_hora as fecha, (producto.precio * detalle_venta.cantidad)as total, producto.precio as precioU, venta.idCliente as idC, cliente.telefono as telefono, cliente.direccion as direccion FROM detalle_venta INNER JOIN venta ON detalle_venta.idVenta = venta.idVenta INNER JOIN cliente ON cliente.idCliente=venta.idCliente INNER JOIN producto ON producto.idProducto = detalle_venta.idProducto WHERE idEstado = 2 ORDER BY venta.idCliente';
        $params = array(null);
        return Database::getRows($sql, $params);
    }

    public function getLastSale(){
        $sql = 'SELECT MAX(idVenta) as idV, fecha_hora as fecha, cliente.nombre as CN, cliente.apellido as CA, cliente.telefono as telefono, cliente.direccion, cliente.correo as correo FROM venta, cliente WHERE venta.idCliente = cliente.idCliente and venta.idCliente = ? and venta.idEstado = 2';
        $params = array($this->idCliente);
        return Database::getRow($sql,$params);
    }

    public function getSaleDetailReport(){
        $sql = 'SELECT idDetalle,nombre as producto, detalle_venta.cantidad as cantidad, producto.precio as precio, (producto.precio * detalle_venta.cantidad) AS Total FROM detalle_venta, producto WHERE producto.idProducto= detalle_venta.idProducto AND idVenta = ?';
        $params = array($this->id);
        return Database::getRows($sql, $params);
    }

    public function getCustomerSales(){
        $sql = 'SELECT count(venta.idCliente) as compras, cliente.nombre as CN, cliente.apellido as CA FROM venta, cliente WHERE venta.idCliente = cliente.idCliente GROUP by cliente.idCliente ORDER by compras DESC';
        $params = array(null);
        return Database::getRows($sql, $params);
    }


}
?>