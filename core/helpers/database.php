<?php
//clase con la conexion a la BD y funciones para ejecutar querys                
class Database{
    //atributos de la clase
    private static $connection= null;
    private static $statement= null;
    private static $id= null;

    private function connect(){//funcion para conectar con la BD
        $server='localhost';
        $database='makastore2';
        $username='root';
        $password='';
        try {
            @self::$connection = new PDO('mysql:host='.$server.'; dbname='.$database.'; charset=utf8', $username, $password);
        } catch(PDOException $error) {
            exit(self::getException($error->getCode(), $error->getMessage()));
        }
    }
    //Funcion para desconectar de la BD
    private function desconect(){
        self:: $connection= null;
        $error = self::$statement->errorInfo();
        if($error[0]!='00000'){
            exit(self::getException($error[1], $error[2]));
        }
    }
    //Funcion para ejecutar querys recibe como parametros el query y los parametros necesarios
    public static function executeRow($query, $values){
        self::connect();
        self::$statement= self::$connection->prepare($query);
        $state=self::$statement->execute($values);
        self::$id=self::$connection->lastInsertId();
        self::desconect();
        return $state;
    }
    //Funcion para obtener una fila
    public static function getRow($query,$values){
        self::connect();
        self::$statement=self::$connection->prepare($query);
        self::$statement->execute($values);
        self::desconect();
        return self::$statement->fetch(PDO::FETCH_ASSOC);
    }
    //funcion para obtener multiples registros de la BD
    public static function getRows($query,$values){
        self::connect();
        self::$statement=self::$connection->prepare($query);
        self::$statement->execute($values);
        self::desconect();
        return self::$statement->fetchAll(PDO::FETCH_ASSOC);
    }
    //funcion para obetener el ultimo id registrado
    public static function getLastIdRow(){
        return self::$id;
    }
    private static function getException($code, $message)
    {
        switch ($code) {
            case 1045:
                $message = 'Autenticación desconocida';
                break;
            case 1049:
                $message = 'Base de datos desconocida';
                break;
            case 1054:
                $message = 'Nombre de campo desconocido';
                break;
            case 1062:
                $message = 'Dato duplicado, no se puede guardar';
                break;
            case 1146:
                $message = 'Nombre de tabla desconocido';
                break;
            case 1451:
                $message = 'Registro ocupado, no se puede eliminar';
                break;
            case 2002:
                $message = 'Servidor desconocido';
                break;
            
        }
        return $message;
    }
}
?>
