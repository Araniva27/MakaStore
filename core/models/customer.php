<?php
class Clientes extends Validator{
    //atributos de la clase
    private $id=null;
    private $nombre= null;
    private $apellido=null;
    private $correo=null;
    private $usuario=null;
    private $contra=null;
    private $telefono= null;
    private $direccion= null;
    private $estado=null;

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
        if($this->validateAlphabetic($value)){
            $this->nombre=$value;
            return true;
        }else{
            return false;
        }
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setApellido($value){
        if($this->validateAlphabetic($value)){
            $this->apellido=$value;
            return true;
        }else{
            return false;
        }
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function setCorreo($value){
        if($this->validateEmail($value)){
            $this->correo=$value;
            return true;
        }else{
            return false;
        }
    }
    
    public function getCorreo(){
        return $this->correo;
    }

    public function setUsuario($value){
        if($this->validateAlphanumeric($value)){
            $this->usuario=$value;
            return true;
        }else{
            return false;
        }
    }

    public function getUsuario(){
        return $this->usuario;
    }

    public function setContra($value){
        if($this->validatePassword($value)){
            $this->contra=$value;
            return true;
        }else{
            return false;
        }
    }

    public function getContra(){
        return $this->contra;
    }

    public function setTelefono($value){
        if($this->validatePhone()){
            $this->telefono=$value;
            return true;
        }else{
            return false;
        }
    }

    public function getTelefono(){
        return $this->telefono;
    }

    public function setDireccion($value){
        if($this->validateAlphabetic($value)){
            $this->direccion=$value;
            return true;
        }else{
            return false;
        }
    }

    public function gerDireccion(){
        return $this->direccion;
    }

    public function setEstado($value){
        if($value==1 || $value==2){
            $this->estado=$value;
            return true;
        }else{
            return true;
        }
    }

    public function getEstado(){
        return $this->estado;
    }

    //Metodos para manejo de SCRUD
    public function readCliente(){
        $sql='SELECT idCliente, nombre, apellido, correo, usuario,estado, direccion FROM cliente';
        $params=array(null);
        return Database::getRows($sql, $params);
    }

    public function getCliente(){
        $sql='SELECT idCliente, nombre, apellido, correo, usuario, estado, direccion FROM cliente WHERE idCliente= ?';
        $params=array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateCliente(){
        $sql='UPDATE cliente set correo = ?, usuario = ?, telefono = ?, direccion = ? WHERE idCliente = ?';
        $params= array($this->correo, $this->usuario, $this->telefono, $this->direccion, $this->id);
        return Database:: executeRow($sql, $params);
    }

    public function updateEstado(){
        $sql='UPDATE cliente set estado = ? WHERE idCliente = ?';
        $params=array($this->estado, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function deleteCliente(){
        $sql= 'DELETE FROM cliente WHERE idCliente = ?';
        $params=array($this->id);
        return Database::executeRow($sql, $params);
    }
}
?>