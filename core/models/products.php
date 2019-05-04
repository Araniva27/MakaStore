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
    private $eliminacion=null;
    private $cliente= null;
    private $estadoComentario=null;
    private $comentario=null;
    private $valoracion=null;
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

    public function setEliminacion($value){
        if($value == '1' || $value == '0'){
            $this->eliminacion=$value;
            return true;
        }else{
            return false;
        }
    }

    public function getEliminacion(){
        return $this->eliminacion;
    }

    public function setCliente($value){
        if($this->validateId($value)){
            $this->cliente=$value;
            return true;
        }else{
            return false;
        }
    }

    public function getCliente(){
        return $this->cliente;
    }

    public function setEstadoComentario(){
        if($value == '1' || $value == '0'){
            $this->estadoComentario=$value;
            return true;
        }else{
            return false;
        }
    }

    public function getEstadoComentario(){
        return $this->estadoComentario;
    }

    public function setComentario($value){
        if($this->validateAlphabetic($value, 1, 200)){
            $this->comentario=$value;
            return true;
        }else{
            return false;
        }
    }

    public function getComentario(){
        return $this->comentario;
    }

    public function setValoracion($value){
        if($value == '1' || $value == '2' || $value == '3' || $value == '4' || $value == '5' ){
            $this->valoracion=$value;
            return true;
        }else{
            return false;
        }
    }

    public function getValoracion(){
        return $this->valoracion;
    }
    
    
    //Metodos para el manejo del CRUD
    public function readProductos(){
        $sql='SELECT idProducto, foto, nombre, precio, cantidad, nombreProveedor, producto.estado from producto, proveedor where proveedor.idProveedor=producto.idProveedor and producto.estadoEliminacion= 1';
        $params=array(null);
        return Database::getRows($sql, $params);
    }
    //Metodo para leer los productos
    public function readProveedores(){
        $sql='SELECT idProveedor, nombreProveedor, direccion, telefono,correo FROM proveedor where estado=1 AND proveedor.estadoEliminacion=1';
        $params=array(null);
        return Database::getRows($sql, $params);
    }
    //Metodo para seleccionar categorias de productos
    public function readCategoria(){
        $sql='SELECT idCategoria, nomCategoria, descripcion, foto from categoria WHERE estado = 1';
        $params=array(null);
        return Database::getRows($sql, $params);
    }

    //Metodo para seleccionar los productos segun su categoria
    public function readProductosCategoria(){
        $sql='SELECT nomCategoria, idProducto, producto.foto, nombre, producto.descripcion,precio FROM producto INNER JOIN categoria USING (idCategoria) WHERE idCategoria = ? AND producto.estado=1 AND producto.estadoEliminacion=1';
        $params=array($this->categoria);
        return Database::getRows($sql, $params);
    }
    //Metodo para crear productos
    public function createProducto(){
        $sql='INSERT INTO producto(nombre, precio, descripcion,foto,estado, idCategoria, cantidad, idProveedor,estadoEliminacion) VALUES (?,?,?,?,?,?,?,?,1)';
        $params=array($this->nombre, $this->precio, $this->descripcion, $this->foto, $this->estado, $this->categoria, $this->cantidad, $this->proveedor);
        return Database::executeRow($sql, $params);
    }
    //Metodo para actulizar producto
    public function updateProducto(){
        $sql='UPDATE producto set nombre = ?, precio = ?, descripcion = ?, foto = ?, estado = ?, idCategoria = ?, idProveedor = ? where idProducto = ?';
        $params= array($this->nombre, $this->precio, $this->descripcion, $this->foto, $this->estado, $this->categoria, $this->proveedor, $this->id);
        return Database::executeRow($sql,$params);
    }
    //Metodo para obtener productos
    public function getProducto(){
        $sql='SELECT idProducto, nombre, precio, descripcion, foto, estado, idCategoria, cantidad, idProveedor from producto WHERE idProducto = ?';
        $params=array($this->id);
        return Database::getRow($sql,$params);
    }
    //metodo para verificar existencia de un producto
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
    //Metodo para actualizar cantidad de producto
    public function updateStock(){
        $sql='UPDATE producto SET cantidad = (? +producto.cantidad)  WHERE idProducto = ?';
        $params=array($this->cantidad, $this->id);
        return Database::executeRow($sql,$params);
    }
    //Metodo para leer comentarios
    public function readComment(){
        $sql='SELECT idComentario, comentario, producto.nombre as producto,cliente.nombre as cliente, comentarios.estado as estado, cliente.usuario as usuario FROM cliente, producto, comentarios where producto.idProducto=comentarios.idProducto and cliente.idCliente=comentarios.idCliente and comentarios.idProducto=?';
        $params=array($this->id);
        return Database::getRows($sql, $params);
    }

    //Metodo para que el cliente pueda leer los comentarios de los productos
    public function readCommentCustomer(){
        $sql='SELECT idComentario, comentario, producto.nombre as producto,cliente.nombre as cliente, comentarios.estado as estado, cliente.usuario as usuario FROM cliente, producto, comentarios where producto.idProducto=comentarios.idProducto and cliente.idCliente=comentarios.idCliente and comentarios.idProducto=? and comentarios.estado = 1';
        $params=array($this->id);
        return Database::getRows($sql, $params);

    }
    //Metodo para actualizar estado de los comentarios
    public function updateState(){
        $sql='UPDATE comentarios set estado= ? where idComentario=?';
        $params=array($this->estado, $this->id);
        return Database::executeRow($sql, $params);
    }
    
    public function readComment2(){
        $sql='SELECT idComentario, estado, idProducto FROM comentarios where idComentario = ?';
        $params=array($this->id);
        return Database::getRow($sql, $params);
    }
    //Metodo para eliminar productos logicamente
    public function updateEliminacion(){
        $sql='UPDATE producto set estadoEliminacion = ?  where idProducto = ?';
        $params=array($this->eliminacion, $this->id);
        return Database::executeRow($sql,$params);
    }
    //Metodo para leer los productos eliminados
    public function readProductosEliminados(){
        $sql='SELECT idProducto, foto, nombre, precio, cantidad, nombreProveedor, producto.estado, producto.estadoEliminacion from producto, proveedor where proveedor.idProveedor=producto.idProveedor AND producto.estadoEliminacion=0';
        $params=array(null);
        return Database::getRows($sql, $params);        
    }

    //Metodo para observar las valoraciones de los productos
    public function readValoraciones(){
        $sql='SELECT valoracion, producto.nombre as producto, cliente.nombre as cliente FROM cliente, producto, valoraciones WHERE producto.idProducto=valoraciones.idProducto AND cliente.idCliente=valoraciones.idCliente and producto.idProducto = ?';
        $params=array($this->id);
        return Database::getRows($sql, $params);
    }

    //Metodo para comentar productos
    public function createCommentary(){
        $sql='INSERT INTO comentarios (comentario, idProducto, idCliente, estado) VALUES (? , ? , ?, 1)';
        $params=array($this->comentario, $this->id, $this->cliente);
        return Database::executeRow($sql, $params);
    }

    public function createPunctuation(){
        $sql='INSERT INTO valoraciones (valoracion, idProducto, idCliente) VALUES (?, ?, ?)';
        $params=array($this->valoracion, $this->id, $this->cliente);
        return Database::executeRow($sql, $params);
    }

    public function validatePunctuation(){
        $sql='SELECT * from valoraciones WHERE idCliente = ? and idProducto = ?';
        $params=array($this->cliente, $this->id);
        return Database::getRow($sql, $params);
    }

    public function searchProductosCategoria($value){
        $sql='SELECT nomCategoria, idProducto, producto.foto, nombre, producto.descripcion,precio FROM producto INNER JOIN categoria USING (idCategoria) WHERE idCategoria = ? AND producto.estado=1 AND producto.estadoEliminacion=1 and producto.nombre LIKE ?';
        $params=array($this->categoria,"%$value%");
        return Database::getRows($sql, $params);
    }
}
?>