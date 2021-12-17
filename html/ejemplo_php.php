<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP::Ejemplo 1</title>
</head>
<body>
    <?php
        // linea simple
        /* multiple linea*/
        # Titulo, linea simple
        $nombre='Ervey'; #Todas las variables se declaran con el signo $ y las sentencias terminan con ;
        $edad_empleado=21;
        define('NOMBRE', 'Ervey');#Definir constantes, se escribe el nombre de la const en mayuscula y el valor 

        /* la mayoria de los leng de progra se utiliza:
            .(punto) para la relacion entre objetos, en php es para concatenar, ejemplo:
            $cadena1.' '.$cadena2

            ->(guion mayor que) para la relacion de objetos en php

            => para arreglos asociativos
        */

        // ============ arreglos ============
        $arreglo = array(1,2,3,4,5);
        $arreglo2 = array('uno' => 1,'dos'=>2);#arreglo asociativo
        $arreglo3=[1,2,3,4,5];

        //============= funciones ===============
        //public/private/static/protected
        function nombreFuncion(){
            //TODO
        }

        //==== clases ====
        class NombreClase{            
            
        }

        //print,echo 
        echo 'Su nombre es: ' . $nombre . ' y su edad es: '. $edad_empleado;
        echo '<br>';      
        echo "Su nombre es: $nombre y su edad es: $edad_empleado";
        echo '<br>';

        //==== estructuras===
        for($i=0; $i< count($arreglo3); $i++){
            echo $arreglo3[$i].'<br>';
        }

        for($i=0; $i< count($arreglo3); $i++):
            echo $arreglo3[$i].'<br>';
        endfor;

        if($arreglo2['uno'] == 1){
            echo 'Si es <br>';
        }

        if($arreglo2['uno'] == 1):
            echo 'Si es <br>';
        endif;

        //FUNCIONES PARA DEBUG
        /*
        var_dump();
        print_r();

        */
        # SUPERGLOBALES
        /*
        $GLOBALS
        $_SERVER
        $_GET
        $_POST
        $_FILES
        $_COOKIE
        $_SESSION
        $_REQUEST
        $_ENV
        */
        #CONSTANTES MAGICAS

    ?>
</body>
</html>