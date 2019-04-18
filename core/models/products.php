<?php
class Productos extends Validator{

    //atributos de la clase
    private $id= null;
    private $nombre=null;
    private $precio=null;
    private $descripcion=null;
    private $foto=null;
    private $categoria=null;
    private $estado=null;
    private $proveedor=null;
    private $cantidad=null;
    
    private $ruta='../../resource/img/productos/';

    //Metodos para sobrecargar propiedades
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

    public function setNombre($value){
        if($this->validateAlphanumeric($value, 1, 100)){
            $this->nombre=$value;
            return true;
        }else{
            return false;
        }
    }

    public function getNombre()
	{
		return $this->nombre;
    }
    
    public function setPrecio($value){
        if($this->validateMoney($value)){
            $this->precio=$value;
            return true;
        }else{
            return false;
        }
    }

    public function getPrecio(){
        return $this->precio;
    }

    public function setDescripcion($value){
        if($this->validateAlphabetic($value, 1, 200)){
            $this->descripcion=$value;
            return true;
        }else{
            return false;
        }
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function setFoto($file, $name){
        if($this->validateImageFile($file, $this->ruta, $name, 200, 200)){
            $this->foto = $this->getImageName();
            return true;
        }else{
            return false;
        }
    }

    public function getImagen(){
        return $this->foto;
    }

    public function setCategoria($value){
        if($this->validateId($value)){
            $this->categoria=$value;
            return true;
        }else{
            return false;
        }
    }

    public function getCategoria(){
        return $this->categoria;
    }

    public function setEstado($value){
        if($value == '1'|| $value == '0'){
            $this->estado=$value;
            return true;
        }else{
            return false;
        }
    }

    public function getEstado(){
        return $this->estado;
    }

    public function setProveedor($value){
        if($this->validateId($value)){
            $this->proveedor=$value;
            return true;
        }else{
            return false;
        }
    }

    public function getProveedor(){
        return $this->proveedor;
    }

    public function getRuta(){
        return $this->ruta;
    }

    public function setCantidad($value){
        if($this->validateAlphanumeric($value, 1,10)){
            $this->cantidad=$value;
            return true;
        }else{
            return false;
        }
    }

    public function getCantidad(){
        return $this->cantidad;
    }

    //Metodos para el manejo del CRUD
    public function readProductos(){
        $sql='SELECT idProducto, foto, nombre, precio, cantidad, nombreProveedor, estado from producto, proveedor where proveedor.idProveedor=producto.idProveedor';
        $params=array(null);
        return Database::getRows($sql, $params);
    }

    public function readProveedores(){
        $sql='SELECT idProveedor, nombreProveedor, direccion, telefono,correo FROM proveedor';
        $params=array(null);
        return Database::getRows($sql, $params);
    }

    public function readCategoria(){
        $sql='SELECT idCategoria, nomCategoria from categoria';
        $params=array(null);
        return Database::getRows($sql, $params);
    }

    public function createProducto(){
        $sql='INSERT INTO producto(nombre, precio, descripcion,foto,estado, idCategoria, cantidad, idProveedor) VALUES (?,?,?,?,?,?,?,?)';
        $params=array($this->nombre, $this->precio, $this->descripcion, $this->foto, $this->estado, $this->categoria, $this->cantidad, $this->proveedor);
        return Database::executeRow($sql, $params);
    }

    public function updateProducto(){
        $sql='UPDATE producto set nombre = ?, precio = ?, descripcion = ?, foto = ?, estado = ?, idCategoria = ?, idProveedor = ? where idProducto = ?';
        $params= array($this->nombre, $this->precio, $this->descripcion, $this->foto, $this->estado, $this->categoria, $this->proveedor, $this->id);
        return Database::executeRow($sql,$params);
    }

    public function getProducto(){
        $sql='SELECT idProducto, nombre, precio, descripcion, foto, estado, idCategoria, cantidad, idProveedor from producto WHERE idProducto = ?';
        $params=array($this->id);
        return Database::getRow($sql,$params);
    }
    
    public function checkProducto(){
        $sql='SELECT *  FROM producto where nombre = ?';
        $params=array($this->nombre);
        return Database::getRow($sql, $params);
    }

    public function deleteProducto(){
        $sql='DELETE FROM producto where idProducto = ?';
        $params=array($this->id);
        return Database::executeRow($sql, $params);
    }

    public function getStock(){
        $sql='SELECT idProducto, cantidad from producto where idProducto = ?';
        $params=array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateStock(){
        $sql='UPDATE producto SET cantidad = (? +producto.cantidad)  WHERE idProducto = ?';
        $params=array($this->cantidad, $this->id);
        return Database::executeRow($sql,$params);
    }

    public function readComment(){
        $sql='SELECT idComentario, comentario, producto.nombre as producto,cliente.nombre as cliente, comentarios.estado as estado, cliente.usuario as usuario FROM cliente, producto, comentarios where producto.idProducto=comentarios.idProducto and cliente.idCliente=comentarios.idCliente and comentarios.idProducto=?';
        $params=array($this->id);
        return Database::getRows($sql, $params);
    }

    public function updateState(){
        $sql='UPDATE comentarios set estado= ? where idComentario=?';
        $params=array($this->estado, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function readComment2(){
        $sql='SELECT idComentario, estado FROM comentarios where idComentario = ?';
        $params=array($this->id);
        return Database::getRow($sql, $params);
    }
}
?>