<?php

class Base{
    
    // Datos de conexion
    private $motor = DBMOTOR;
    private $server = DBSERVER;
    private $basedatos = DBNAME;
    private $usuario = DBUSUARIO;
    private $password = DBPASSWORD; 

    // Variables de operacion para conexión y manejo de consultas
    private $dbh;
    private $stmt;
    private $error;


    public function __construct(){
        $dsn=$this->motor . ':host='.$this->server . ';dbname=' . $this->basedatos;
        $opciones = [PDO::ATTR_PERSISTENT => true,
                     PDO::ATTR_ERRMODE    => PDO::ERRMODE_EXCEPTION]; //array();
        try{
            $this->dbh = new PDO($dsn, $this->usuario, $this->password, $opciones);
        }catch(PDOException $e){
            $this->error = 'Error: ' . $e->getMessage();
        }
    }// Método construct

     # Habilitar la consulta
     public function query($sql){
        $this->stmt = $this->dbh->prepare($sql);
     }

     # Preparación para la vinculación
     public function bind($parametro, $valor, $tipo=null){
         // Valoración del tipo
         switch(is_null($tipo)){
            case is_int($valor):
                $tipo = PDO::PARAM_INT;
                break;
            case is_bool($valor):
                $tipo = PDO::PARAM_BOOL;
                break;
            case is_null($valor):
                $tipo = PDO::PARAM_NULL;
                break;
            default:
                $tipo = PDO::PARAM_STR;
         }// Fin switch

         $this->stmt->bindValue($parametro, $valor, $tipo);
     }

     # Ejecutarconsulta
     public function execute(){
         $this->stmt->execute();
     }

     # Cuando espere un único registro
     public function unico(){
         $this->execute();
         return $this->stmt->fetch(PDO::FETCH_OBJ);
     }

     # Cuando espere multiples registros
     public function multiple(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
     # Validar cuando se ejecuta la consulta sin regresar valores pero sin error
    public function conteoReg(){
        return $this->stmt->rowCount();
    }

}