<?php
/**
 * exportar (equivale para mi a migración :) ) a formato JSON
 */

// header('Content-Type:application/json');
// header('Content-Disposition: attachment; filename= clientes.json');

// echo json_encode($data['clientes']);

?>

<?php include_once APPROOT . '/views/includes/header.inc.php'; ?>
<?php file_put_contents(APPROOT . '/files/clientes_' . time() . '.json', json_encode($data['clientes']));?>
<div class="alert alert-info">Archivo generado </div>
<?php include_once APPROOT . '/views/includes/footer.inc.php'; ?>