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
    private $cantidad2=null;
    private $idPre =null;
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
    
    public function setCantidad2($value){
        if($this->validateAlphanumeric($value, 1,10)){
            $this->cantidad2=$value;
            return true;
        }else{
            return false;
        }
    }

    public function getCantidad2(){
        return $this->cantidad2;
    }
    

    public function setIdPre($value){
        if($this->validateId($value)){
            $this->idPre=$value;
            return true;
        }else{
            return false;
        }
    }

    
    public function getidPre(){
        return $this->idPre;
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
        $sql='SELECT idCategoria, nomCategoria, descripcion, foto from categoria WHERE estado = 1 AND estadoEliminacion = 1';
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
    //Metodo para asignar puntuacion a un producto
    public function createPunctuation(){
        $sql='INSERT INTO valoraciones (valoracion, idProducto, idCliente) VALUES (?, ?, ?)';
        $params=array($this->valoracion, $this->id, $this->cliente);
        return Database::executeRow($sql, $params);
    }   
    //Metodo para validar que un usuario coloque solamente un comentario en un producto
    public function validatePunctuation(){
        $sql='SELECT * from valoraciones WHERE idCliente = ? and idProducto = ?';
        $params=array($this->cliente, $this->id);
        return Database::getRow($sql, $params);
    }
    //Metodo para buscar productos de acuerdo a la categoria asignada
    public function searchProductosCategoria($value){
        $sql='SELECT nomCategoria, idProducto, producto.foto, nombre, producto.descripcion,precio FROM producto INNER JOIN categoria USING (idCategoria) WHERE idCategoria = ? AND producto.estado=1 AND producto.estadoEliminacion=1 and producto.nombre LIKE ?';
        $params=array($this->categoria,"%$value%");
        return Database::getRows($sql, $params);
    }

    //Metodo para insertar datos en tabla preDetalle
    public function insertPreDetalle(){
        $sql='INSERT INTO predetalle (idCliente, idProducto, cantidad) VALUES (?, ?, ?)';
        $params=array($this->cliente, $this->id, $this->cantidad);
        return Database::executeRow($sql, $params);
    }

    //Metodo para verificar existencia de productos
    public function validateStock(){
        $sql='SELECT cantidad FROM producto WHERE idProducto = ?';
        $params=array($this->id);
        return Database::getRow($sql, $params);
    }

    //Metodo para eliminar preDetalle
    public function eliminarPreDetalle(){
        $sql='DELETE FROM predetalle WHERE idCliente = ?';
        $params=array($this->idCliente);
        return Database::executeRow($sql, $params);
    }

    //Metodo para obtener preDetalle del cliente
    public function readPreDetalle(){
        $sql='SELECT idPreDetalle, producto.nombre as producto, predetalle.cantidad as cantidad, producto.precio as precio, producto.foto as foto,(producto.precio * predetalle.cantidad) as total , producto.cantidad as cantidadP FROM producto, predetalle WHERE producto.idProducto = predetalle.idProducto AND idCliente = ?';
        $params=array($this->cliente);
        return Database::getRows($sql, $params);
    }

    public function getPreDetalle(){
        $sql='SELECT idPreDetalle, producto.nombre as producto, predetalle.cantidad as cantidad, producto.precio as precio, producto.foto as foto,(producto.precio * predetalle.cantidad) as total , producto.cantidad as cantidadP FROM producto, predetalle WHERE producto.idProducto = predetalle.idProducto AND idCliente = ?';
        $params=array($this->cliente);
        return Database::getRow($sql, $params);
    }

    //Metodo para actualizar cantidad en preDetalle
    public function updateCantidadPreDetalle(){
        $sql='UPDATE predetalle set cantidad = (predetalle.cantidad + ?) WHERE idPreDetalle = ?';
        $params=array($this->cantidad, $this->idPre);
        return Database::executeRow($sql, $params);
    }

    //Metodo para eliminar un preDetalle
    function deletePreDetalle(){
        $sql='DELETE FROM predetalle WHERE idCliente = ?';
        $params=array($this->cliente);
        return Database::executeRow($sql, $params);
    }

    public function createSale(){
        $sql = 'INSERT INTO venta(idCliente, fecha_hora, idEstado) VALUES (?, (SELECT NOW()), 2)';
        $params = array($this->cliente);
        return Database::executeRow($sql,$params);
    }

    public function getLastSale(){
        $sql = 'SELECT idVenta FROM `venta` WHERE idCliente = ? ORDER BY idVenta DESC LIMIT 1';
        $params = array($this->cliente);
        $data = Database::getRow($sql, $params);
		if ($data) {
            $this->cliente = $data['idVenta'];
            return true;
        } else{
            return false;
        }
    }

    public function createDetailsSale(){
        $sql = 'INSERT INTO detalle_venta(idProducto, cantidad, idVenta) VALUES(?, ? ,?)';
        $params = array($this->id,$this->cantidad,$this->cliente);
        Database::executeRow($sql,$params);
    }

    public function getPre(){
        $sql='SELECT idProducto, nombre, descripcion, precio,foto, predetalle.cantidad as cantidad FROM predetalle INNER JOIN producto USING(idProducto) WHERE idCliente = ?';
        $params = array($this->cliente);
        return Database::getRows($sql,$params);
    }

    public function getPreDetalle2(){
        $sql='SELECT idPreDetalle, producto.nombre as producto, predetalle.cantidad as cantidad, producto.precio as precio, producto.foto as foto,(producto.precio * predetalle.cantidad) as total , producto.cantidad as cantidadP FROM producto, predetalle WHERE producto.idProducto = predetalle.idProducto AND idPreDetalle = ?';
        $params=array($this->idPre);
        return Database::getRow($sql, $params);
    }

    //Metodo para eliminar un preDetalle
    function deletePreDetalle2(){
        $sql='DELETE FROM predetalle WHERE idPreDetalle = ?';
        $params=array($this->idPre);
        return Database::executeRow($sql, $params);
    }

    function getProductosCategoria(){
        $sql = 'SELECT nombre, precio, cantidad, nombreProveedor, nomCategoria as categoria FROM producto INNER JOIN proveedor USING(idProveedor) INNER JOIN categoria USING (idCategoria) WHERE producto.estadoEliminacion = 1 ORDER BY categoria asc';
        $params = array(null);
        return Database::getRows($sql, $params);
    }

    function getProductoCompañia(){
        $sql = 'SELECT nombre, precio, cantidad, nombreProveedor, nomCategoria as categoria FROM producto INNER JOIN proveedor USING(idProveedor) INNER JOIN categoria USING (idCategoria) WHERE producto.estadoEliminacion = 1 ORDER BY nombreProveedor asc';
        $params = array(null);
        return Database::getRows($sql, $params);
    }

    public function getVentasProducto(){
        $sql = 'SELECT producto.nombre as producto,  SUM(detalle_venta.cantidad) as Suma, SUM(producto.precio * detalle_venta.cantidad) as total, venta.idEstado  FROM detalle_venta INNER JOIN producto USING(idProducto) INNER JOIN venta USING(idVenta) WHERE venta.idEstado = 1 GROUP by detalle_venta.idProducto';
        $params = array(null);
        return Database::getRows($sql, $params);
    }
}
?>