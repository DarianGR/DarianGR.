<?php

 class Usuario{
    
    private $db;
    public function __construct(){
        $this->db=new Base;
    }

    public function login($usuario_uid, $usuario_password){
        $this->db->query('SELECT usuario_id, usuario_uid, usuario_password, usuario_nombre, usuario_email FROM usuarios WHERE usuario_uid = :usuario_uid');
        $this->db->bind(':usuario_uid',$usuario_uid);
        $registro=$this->db->unico();
        
        if($this->db->conteoReg() >0){
            # Validar password
            $hashedPassword=$registro->usuario_password;
            if(password_verify($usuario_password, $hashedPassword)){
                return $registro;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    /*
        Método encontrarUsuarioPorEmailOUsuario   
    */
    public function encontrarUsuarioPorEmailOUsuario($usuario_email, $usuario_uid){
        // Consulta
        $this->db->query('SELECT usuario_uid, usuario_email FROM usuarios WHERE usuario_uid = :usuario_uid OR usuario_email = :usuario_email');
        // Vinculación
        $this->db->bind(':usuario_email',$usuario_email);
        $this->db->bind(':usuario_uid',$usuario_uid);
        // Ejecución
        $this->db->unico();

        return ($this->db->conteoReg() >0) ? true : false;
    }

    public function register($data){
        // Insert
        $this->db->query('INSERT INTO usuarios (usuario_uid, usuario_nombre, usuario_password, usuario_email) VALUES (:usuario_uid, :usuario_nombre, :usuario_password, :usuario_email)');
        // Vinculación
        $this->db->bind(':usuario_uid', $data['usuario_uid']);
        $this->db->bind(':usuario_nombre', $data['usuario_nombre']);
        $this->db->bind(':usuario_password', $data['usuario_password']);
        $this->db->bind(':usuario_email', $data['usuario_email']);
        // Ejecución
        // Return $this->bd->execute() ? true : false;
        try{
            $this->db->execute();
            return true;
        }catch(Exception $e){
            return false;
        }
    }

 }