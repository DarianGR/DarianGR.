<?php include_once APPROOT . "/views/includes/header.inc.php"; ?>
<?php
/**
 * trabajar con fopen(), fwrite(), fclose()
 */
# crear el manejador
$xml=fopen(APPROOT . "/files/clientes_" . time() . ".xml","w+");
fwrite($xml,'<?xml version=' . 1.0 . ' encoding="UTF-8" ?>' . "\n<clientes>\n");
foreach ($data["clientes"] as $registro) {
    
    fwrite($xml, "<cliente>\n<id>" . $registro->id . "</id>\n<rfc>" .
        $registro->cliente_rfc . "</rfc>\n<nombre>" .
        $registro->cliente_nombre . "</nombre>\n<direccion>" .
        $registro->cliente_direccion . "</direccion>\n<telefono>" .
        $registro->cliente_telefono . "</telefono>\n<email>" .
        $registro->cliente_email . "</email>\n<fotografia>" .
        base64_encode($registro->cliente_fotografia) . "</fotografia>" . "\n</cliente>\n");
}
fwrite($xml,"</clientes>");
fclose($xml);

?>
<div class="alert alert-info">Archivo generado </div>
<?php include_once APPROOT . "/views/includes/footer.inc.php"; ?>