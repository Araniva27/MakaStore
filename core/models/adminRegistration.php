<?php
//clase con los las funciones para registrar administrador
class Admin extends Validator{

    //atributos de la clase
    private $id=null;
    private $nombre=null;
    private $apellido=null;
    private $correo=null;
    private $usuario=null;
    private $contra=null;
    private $telefono=null;
    private $direccion= null;
    
    // Getter y setter de cada uno de los atributos de la clase
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
        if($this->validateAlphanumeric($value, 1, 50)){
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
        if($this->validateAlphabetic($value,1,50)){
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
        if($this->validateAlphanumeric($value, 1, 50)){
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
        if($this->validateAlphabetic($value,1, 200)){
            $this->direccion=$value;
            return true;
        }else{
            return false;
        }
    }
    //funciones para el manejo de la sesion de usuario
    public function checkUser(){
        $sql='SELECT idAdmin from admin WHERE usuario = ?';
        $params= array($this->usuario);
        $data= Database::getRow($sql, $params);
        if($data){
            $this->id= $data['idAdmin'];
            return true;
        }else{
            return false;
        }
    }

    public function chechContra(){
        $sql='SELECT contraseña FROM admin where idAdmin = ?';
        $params= array($this->id);
        $data=Database::getRow($sql, $params);
        if(password_verify($this->contra, $data['contraseña'])){
            return true;
        }else{
            return false;
        }
    }

    public function changeContra(){
        $hash= password_hash($this->contra, PASSWORD_DEFAULT);
        $sql='UPDATE admin set contraseña = ? WHERE idAdmin = ?';
        $params= array($hash, $this->id);
        return Database:: executeRow($sql, $params);
    }

    //Metodos para manejar el CRUD

    public function readAdmin(){
        $sql='SELECT idAdmin, nombre, apellido, usuario, telefono, direccion FROM admin';
        $params= array(null);
        return Database::getRows($sql, $params);
    }

    public function searchAdmin($value){
        $sql='SELECT idAdmin, nombre, apellido, usuario, telefono, direccion FROM admin WHERE apellido LIKE ? OR nombre like ?';
        $params= array("%$value%", "%$value%" );
        return Database:: getRows($sql, $params);

    }
}
?>