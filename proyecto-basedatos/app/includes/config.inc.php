<?php

define('DBMOTOR', 'mysql');
define('DBSERVER', 'localhost');
define('DBNAME', 'pw20213m');
define('DBUSUARIO', 'root');
define('DBPASSWORD', '');

# Apoyos para accesos publicos y privados
// Pública == configurar un virtual host
define('URLROOT','http://pw20213m.mx');

// Privada
define('APPROOT', dirname(dirname(__FILE__)));

// Otros
define('TITLE', 'Programación Web');