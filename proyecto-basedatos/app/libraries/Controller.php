<?php

 # Administración de cntroladores. Todos usarán enlace a views - models
 class Controller {
    public function __construct(){
        // TODO. Cuestiones de seguridad, etc.
    }

    # Enlace de views, $data == informacion, errores, datos de tablas de BD

    public function view($view, $data=[]){
        if(file_exists(APPROOT . '../views/' . $view . '.php')){
           require_once APPROOT . '../views/' . $view . '.php'; 
        }else{
            die('La vista no existe');
        }
    }

    # Enlace de model

    public function model($model){
        // if (file_exists('../models/' . $model . '.php')) {
           require_once APPROOT . '../models/' . $model . '.php'; 
           return new $model();
        //}
    }
 }
