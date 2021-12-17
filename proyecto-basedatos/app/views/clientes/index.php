<?php include_once APPROOT . '/views/includes/header.inc.php'; ?>
<?php if(estaLogueado()){ ?>
    <div class="row mt-3">
        <div class="col-sm-11"></div>
        <div class="col-sm-1">
        <a class="btn btn-info" href="<?= URLROOT; ?>/clientes/agregar">
            <i class="fa fa-plus"></i>
        </a>
        </div>
    </div>
    <table class="table table-striped mt-3">
            <tr>
                <th>ID</th>
                <th>R.F.C</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Fotografía</th>
                <th>Opciones</th>
            </tr>
            </thead>
            <tbody id="clientes">
                <!-- Estructura provisional para listar los registros -->
                <?php foreach($data['clientes'] as $registro) { ?>
                <tr>
                    <td scope="row"><?= $registro->id ?></td>
                    <td><?= $registro->cliente_rfc ?></td>
                    <td><?= $registro->cliente_nombre ?></td>
                    <td><?= $registro->cliente_direccion ?></td>
                    <td><?= $registro->cliente_telefono ?></td>
                    <td><?= $registro->cliente_email ?></td>
                    <!-- imagen viene de memoria, cadena. data:  -->
                    <td><img src="data:image/png;base64,<?= base64_encode($registro->cliente_fotografia) ?>" alt="Fotografia" width="30"></td>
                    <td><a class="btn btn-warning btn-sm" href="<?=URLROOT ?>/clientes/editar/<?= $registro->id ?>"><i class="fa fa-edit"></i></a> <a class="btn btn-danger btn-sm" href="<?=URLROOT ?>/clientes/borrar/<?= $registro->id ?>"><i class="fa fa-trash"></i></a></td>
                </tr>
                <?php } // fin del foreach ?>
            </tbody>
    </table>
    <!-- seccion de navegacion de paginación -->
    <nav aria-label="Page navigation">
      <div class="row">
        <div class="col-sm-6"><p>Mostrando <?= $data['limite']?> de <?= $data['registros']?> clientes registrados</p></div>
        <div class="col-sm-6"><p class='float-end'>Página <?= $data['pagina']?> de <?= $data['paginas']?> clientes registrados</p></div>
      </div>

      <ul class="pagination justify-content-center">
        <li class="page-item <?= ($data['pagina']<=1)? 'disabled':''?>">
          <a class="page-link" href="<?= ($data['pagina']<=1)? 'disabled': URLROOT . '/clientes/index/' . $data['limite'] . '/' . $data['pag_previa']?>" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <!-- Seccion de desplieugeu de numero de pagina -->
        <?php for($i=1;$i<=$data['paginas'];$i++){ ?>
        <li class="page-item <?= ($data['pagina']==$i)? 'active':''?>"><a class="page-link" href="<?= URLROOT . '/clientes/index/' . $data['limite'] . '/' . $i?>"><?=$i?></a></li>
        <?php }?>
        <!-- FIN Seccion de desplieugeu de numero de pagina -->
        <li class="page-item <?= ($data['pagina'] >= $data['paginas'])? 'disabled':''?>">
          <a class="page-link" href="<?= ($data['pagina'] >= $data['paginas'])? '#': URLROOT . '/clientes/index/' . $data['limite'] . '/' . $data['pag_siguiente']?>" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav>
    
<?php }else{ ?>
    <br>
    <div class="alert alert-info">Inicie sesión para continuar</div>
<?php } ?>
<?php include_once APPROOT . '/views/includes/footer.inc.php'; ?>