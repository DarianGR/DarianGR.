<?php include_once APPROOT . '/views/includes/header.inc.php'; ?>
<hr>
<div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-8">
    <div class="row">
      <div class="col-sm-11">
        <h4>Agregar</h4>
      </div>
      <div class="col-sm-1"><i class="fa fa-user text-success"></i></div>
    </div>
    <hr>
    <!-- d-block -->
    <div class="alert alert-warning <?= (isset($data['msg_error']) && !empty($data['msg_error'])) ? 'd-block' : 'd-none'; ?>"><?= (isset($data['msg_error']) && !empty($data['msg_error'])) ? $data['msg_error'] : ''; ?></div>
    <!-- Se pego archivo form que el profe paso -->
    <form action="<?= URLROOT ?>/clientes/agregar" method="POST" enctype="multipart/form-data">
      <!-- <input type="hidden" name="_METHOD" value="PUT"> -->
      <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
            <label for="cliente_rfc" class="form-label">R.F.C.</label>
            <input type="text" class="form-control" name="cliente_rfc" id="cliente_rfc" aria-describedby="helpId" placeholder="R.F.C.">
          </div>
        </div>
        <div class="col-sm-8">
          <div class="form-group">
            <label for="cliente_nombre" class="form-label">Nombre de Cliente</label>
            <input type="text" class="form-control" name="cliente_nombre" id="cliente_nombre" aria-describedby="helpId" placeholder="Name of Client">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="form-group">
            <label for="cliente_direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" name="cliente_direccion" id="cliente_direccion" placeholder="Address">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
            <label for="cliente_telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" name="cliente_telefono" id="cliente_telefono" placeholder="Number Phone">
          </div>
        </div>
        <div class="col-sm-8">
          <div class="form-group">
            <label for="cliente_email" class="form-label">Email de Usuario</label>
            <input type="text" class="form-control" name="cliente_email" id="cliente_email" aria-describedby="helpId" placeholder="Email User">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-8">
          <label for="cliente_fotografia">Fotografía</label>
          <input type="file" class="form-control" id="cliente_fotografia" name="cliente_fotografia">
        </div>
        <div class="col-sm-4"></div>
      </div>

      <div class="row mt-3">

        <div class="col-sm-4"></div>
        <div class="col-sm-4">
          <button type="submit" class="btn btn-success btn-block">Guardar</button>
        </div>
        <div class="col-sm-4"></div>
      </div>

    </form>
  </div>
  <div class="col-sm-2"></div>
</div>
<?php include_once APPROOT . '/views/includes/footer.inc.php'; ?>