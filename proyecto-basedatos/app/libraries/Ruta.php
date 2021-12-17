<?php

class Ruta{
   protected $controladorActual = 'Home';
   protected $metodoActual = 'index';
   protected $parametros = [];

   # Automática
   public function __construct()   {
       $url = $this->getUrl();

    if ($url != null){
       if (file_exists(APPROOT . '../controllers/' . ucwords($url[0] . '.php'))){
           $this->controladorActual = ucwords($url[0]);
       }
       unset($url[0]);
    }
    
       # Cargar el controlador, crear una instancia del controlador (clase)
       include_once(APPROOT . '../controllers/' . $this->controladorActual . '.php');

       # Crear instancia del controlador
       $this->controladorActual=new $this->controladorActual;

       # Limpiar memoria
       unset($url[0]);

       # Validar el método
       if(isset($url[1])){
            if(method_exists($this->controladorActual,$url[1])){
                $this->metodoActual = $url[1];
            }
            # Limpiar memoria
             unset($url[1]);

       }

       #Parámetros
       $this->parametros = ($url)?array_values($url):[];

       call_user_func_array([$this->controladorActual, $this->metodoActual],$this->parametros);
   }

   public function getUrl(){
       if(isset($_GET['url'])){
           $url = rtrim($_GET['url'],'/');
           $url = filter_var($url,FILTER_SANITIZE_URL);
           $url = explode('/',$url);
           return $url;
       } // Fin ISSET
   } // Fin método
}