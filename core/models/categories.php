<?php
class Categorias extends Validator{

    //atributos de la clase 
    private $id= null;
    private $nombre= null;
    private $foto= null;
    private $estado = null;
    private $descripcion= null;
    private $eliminacion= null;
    private $ruta='../../resource/img/categorias/';

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

    public function getRuta(){
        return $this->ruta;
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

     //Metodos para el manejo del CRUD
     public function readCategoria(){
        $sql='SELECT idCategoria, nomCategoria, foto, estado, descripcion from categoria where estadoEliminacion= 1';
        $params=array(null);
        return Database::getRows($sql, $params);
    }

    public function createCategoria(){
        $sql='INSERT INTO categoria(nomCategoria, foto, estado, descripcion, estadoEliminacion) VALUES (?,?,?,?,1)';
        $params=array($this->nombre, $this->foto, $this->estado, $this->descripcion);
        return Database::executeRow($sql, $params);
    }

    //funcion para buscar categoria
    public function searchCategoria($value){
        $sql='SELECT * from categoria where nomCategoria LIKE ? ORDER BY nomCategoria';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    //Metodo para actulizar categoria
    public function updateCategoria(){
        $sql='UPDATE categoria set nomCategoria = ?, foto= ?, estado= ?, descripcion= ? where idCategoria = ?';
        $params= array($this->nombre, $this->foto, $this->estado, $this->descripcion, $this->id);
        return Database::executeRow($sql,$params);
    }
    //Metodo para obtener categoria
    public function getCategoria(){
        $sql='SELECT idCategoria, nomCategoria, foto, estado, descripcion from categoria WHERE idCategoria = ?';
        $params=array($this->id);
        return Database::getRow($sql,$params);
    }
    //metodo para verificar existencia de una categoria
    public function checkCategoria(){
        $sql='SELECT *  FROM categoria where nomCategoria = ?';
        $params=array($this->nombre);
        return Database::getRow($sql, $params);
    }
    
    //Método para eliminar una categoria 
    public function deleteCategoria(){
        $sql='DELETE FROM categoria where idCategoria = ?';
        $params=array($this->id);
        return Database::executeRow($sql, $params);
    }
    
    //Metodo para eliminar categorias logicamente
    public function updateEliminacion(){
        $sql='UPDATE categoria set estadoEliminacion = ?  where idCategoria = ?';
        $params=array($this->eliminacion, $this->id);
        return Database::executeRow($sql,$params);
    }
    //Metodo para leer los productos eliminados
    public function readCategoriasEliminadas(){
        $sql='SELECT idCategoria, nomCategoria, foto, estado, descripcion from categoria where estadoEliminacion=0';
        $params=array(null);
        return Database::getRows($sql, $params);        
    }

}
?>