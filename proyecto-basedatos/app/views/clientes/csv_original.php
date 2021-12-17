<?php

/**
 * Vista para migrar a formato CSV
 */

header('Content-Type:application/csv');
header('Content-Disposition: attachment; filename= clientes.csv');
// secuencia de escape \n, \t, \", etc
echo $contenido = 'ID,R.F.C., NOMBRE, DIRECCION, TELEFONO, CORREO, FOTOGRAFIA' . "\n";
foreach ($data['clientes'] as $registro) {
    echo    $contenido .= $registro->id . ' , ' . 
            $registro->cliente_rfc . ' , ' . 
            $registro->cliente_nombre . ' , "' . 
            $registro->cliente_direccion . '" , ' . 
            $registro->cliente_telefono . ' , ' . 
            $registro->cliente_email . ' , ' . 
    base64_encode($registro->cliente_fotografia) . "\n";
}
// esto es la forma resumida de usar fopen(), fwrite() y fclose()
// time() regresa fecha y hora actual tipo unix
file_put_contents(APPROOT . '/files/clientes_' . time() . '.csv',$contenido);