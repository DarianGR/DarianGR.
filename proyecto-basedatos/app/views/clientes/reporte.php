<?php

/**
 * vista reporte
 * uso de Dompdf, de forma muy simple, con solo los metodos basicos
 */


$html = '<head><link rel="stylesheet" href="' . URLROOT . '/css/bootstrap.min.css"></head>
 <table class="table table-striped mt-3">
 <tr><th colspan="7">Listado de Clientes</th></tr>
            <tr>
                <th>ID</th>
                <th>R.F.C</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Fotografía</th>
            </tr>
            </thead>
            <tbody id="clientes">';

foreach ($data['clientes'] as $registro) {
    $html .= '<tr>
                    <td scope="row">' . $registro->id . '</td>
                    <td>' . $registro->cliente_rfc . '</td>
                    <td>' . $registro->cliente_nombre . '</td>
                    <td>' . $registro->cliente_direccion . '</td>
                    <td>' . $registro->cliente_telefono . '</td>
                    <td>' . $registro->cliente_email . '</td>
                    <!-- imagen viene de memoria, cadena. data:  -->
                    <td><img src="data:image/png;base64,' . base64_encode($registro->cliente_fotografia) . ' " alt="Fotografia" width="30"></td>
                </tr>';
}

$html .= '</tbody></table>';

use Dompdf\Dompdf;

$pdf = new Dompdf();
// cargar
$pdf->loadHtml($html);
// modificar tamaño
$pdf->setPaper('legal', 'landscape');
// conversion
$pdf->render();
// desplegar
//echo $pdf->output();

$pdf->stream('clientes.pdf');
