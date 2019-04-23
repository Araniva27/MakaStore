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
        if($this->validateAlphabetic($value, 1 , 100)){
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
        if($this->validateAlphabetic($value, 1 ,200)){
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
        if($this->validateAlphanumeric($value, 1 , 200)){
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
        if($this->validatePhone($value)){
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
        if($this->validateAlphabetic($value, 1, 100)){
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
        if($value==1 || $value==0){
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

    public function createCliente(){
        $hash=password_hash($this->contra, PASSWORD_DEFAULT);
        $sql='INSERT INTO cliente (nombre, apellido, correo, usuario, contraseña, telefono, direccion, estado) VALUES (?,?,?,?,?,?,?,?)';
        $params=array($this->nombre, $this->apellido, $this->correo, $this->usuario, $hash,  $this->telefono, $this->direccion, $this->estado);
        return Database::executeRow($sql, $params);
    }

    public function verificarUsuario(){
        $sql='SELECT * FROM cliente WHERE usuario = ?';
        $params=array($this->usuario);
        return Database::getRow($sql,$params);
    }

    public function checkUser(){
        $sql='SELECT idCliente, nombre, apellido, usuario, correo FROM cliente WHERE usuario = ?';
        $params=array($this->usuario);
        $data= Database::getRow($sql, $params);
        if($data){
            $this->id=$data['idCliente'];
            $this->nombre=$data['nombre'];
            $this->apellido=$data['apellido'];
            $this->usuario=$data['usuario'];
            $this->correo=$data['correo'];
            return true;
        }else{
            return false;
        }
    }

    public function checkContra(){
        $sql='SELECT contraseña FROM cliente WHERE idCliente = ?';
        $params=array($this->id);
        $data=Database::getRow($sql, $params);
        if(password_verify($this->contra, $data['contraseña'])){
            return true;
        }else{
            return false;
        }
    }

    public function login(){
        
    }
}
?>