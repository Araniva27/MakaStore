<?php
class Companies extends Validator
{
    private $id=null;
    private $nombre=null;
    private $correo=null;
    private $direccion=null;
    private $telefono=null;
    private $estado=null;
    private $eliminacion=null;

    public function setId($value)
	{
		if ($this->validateId($value)) {
			$this->id = $value;
			return true;
		} else {
			return false;
		}
	}

    public function getId()
	{
		return $this->id;
	}

    public function setNombre($value)
    {
        if($this->validateAlphanumeric($value, 1,50)){
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

    public function setDireccion($value)
    {
        if($this->validateAlphanumeric($value,1,100)){
            $this->direccion=$value;
            return true;
        }else{
            return false;
        }
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setTelefono($value)
    {
        if($this->validatePhone($value)){
            $this->telefono=$value;
            return true;
        }else{
            return false;
        }
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setCorreo($value)
    {
        if($this->validateEmail($value)){
            $this->correo=$value;
            return true;
        }else{
            return false;
        }
    }


    public function getCorreo()
    {
        return $this->correo;
    }

    public function setEstado($value)
    {
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

    public function setEliminacion($value)
    {
        if($value == '1' || $value == '0'){
            $this->eliminacion=$value;
            return true;
        }else{
            return false;
        }
    }

    public function getEliminacion()
    {
        return $this->eliminacion;
    }
    //Funcion para obtener todos los registros de la BD
    public function readCompanies()
    {
        $sql='SELECT idProveedor, nombreProveedor, direccion, correo, telefono, estado FROM proveedor WHERE estadoEliminacion=1';
        $params=array(null);
        return Database::getRows($sql, $params);
    }
    //funcion para buscar proveedor
    public function searchCompanies($value){
        $sql='SELECT * from proveedor where nombreProveedor LIKE ? ORDER BY nombreProveedor';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }
    //funcion para registrar proveedor
    public function createCompanie()
    {
        $sql='INSERT INTO proveedor(nombreProveedor, direccion, telefono, correo) VALUES (?,?,?,?)';
        $params=array($this->nombre, $this->direccion, $this->telefono, $this->correo);
        return Database::executeRow($sql, $params);
    }
   //funcion para obtener compañia
    public function getCompanie()
    {
        $sql='SELECT idProveedor, nombreProveedor, direccion, telefono, correo, estado FROM proveedor WHERE idProveedor = ?';
        $params=array($this->id);
        return Database::getRow($sql, $params);
    }
    //funcion para actualizar compañia
    public function updateCompanie()
    {
        $sql='UPDATE proveedor SET nombreProveedor = ?, direccion = ?, telefono = ?, correo = ?, estado = ? WHERE idProveedor = ?';
        $params=array($this->nombre, $this->direccion, $this->telefono, $this->correo, $this->estado, $this->id);
        return Database::executeRow($sql, $params);
    }
    //funcion para eliminar compañia
    public function deleteCompanie(){
        $sql='DELETE from proveedor WHERE idProveedor = ?';
        $params=array($this->id);
        return Database::executeRow($sql, $params);
    }      
    //Metodo para verificar existencia de proveedores
    public function checkProveedor()
    {
        $sql='SELECT * FROM proveedor WHERE nombreProveedor = ?';
        $params=array($this->nombre);
        return Database::getRow($sql, $params);
    }
    //Metodo para actualizar estado de eliminacion
    public function updateEliminacion(){
        $sql='UPDATE proveedor set estadoEliminacion = ? WHERE idProveedor = ?';
        $params=array($this->eliminacion, $this->id);
        return Database::executeRow($sql, $params);
    }

    //Metodo para visualizar proveedores eliminados
    public function readProveedoresEliminados()
    {
        $sql='SELECT idProveedor, nombreProveedor, direccion, telefono, correo, estado FROM proveedor WHERE estadoEliminacion = 0';
        $params=array(null);
        return Database:: getRows($sql, $params);
    }
}

?>