<?php include_once APPROOT . '/views/includes/header.inc.php'; ?>
<?php

$contenido = 'ID,R.F.C., NOMBRE, DIRECCION, TELEFONO, CORREO, FOTOGRAFIA' . "\n";
foreach ($data['clientes'] as $registro) {
    $contenido .= $registro->id . ' , ' .
        $registro->cliente_rfc . ' , ' .
        $registro->cliente_nombre . ' , "' .
        $registro->cliente_direccion . '" , ' .
        $registro->cliente_telefono . ' , ' .
        $registro->cliente_email . ' , ' .
        base64_encode($registro->cliente_fotografia) . "\n";
}

file_put_contents(APPROOT . '/files/clientes_' . time() . '.csv', $contenido);
?>
<div class="alert alert-info">Archivo generado </div>
<?php include_once APPROOT . '/views/includes/footer.inc.php'; ?>