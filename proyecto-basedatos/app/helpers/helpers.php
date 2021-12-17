<?php

 // Iniciar la sesion
 session_start(); // crea la superglobal $_SESSION

 function estaLogueado(){
     // Control de accesos a otras partes del sistema
     return (isset($_SESSION['usuario_id'])? true:false);
 }

 // Redireccionar a controlador/metodo, analogií con llamada de menú
 function redirigir($locacion){
    header('Location:' . $locacion);
}