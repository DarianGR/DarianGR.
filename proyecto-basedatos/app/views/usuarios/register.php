<?php include_once APPROOT . '/views/includes/header.inc.php'; ?>
<hr>
<div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-4">
    <div class="row">
      <div class="col-sm-11">
        <h4>Registro</h4>
      </div>
      <div class="col-sm-1"><i class="fa fa-user text-success"></i></div>
    </div>
    <hr>
    <!-- d-block -->
    <div class="alert alert-warning <?= (isset($data['msg_error']) && !empty($data['msg_error'])) ? 'd-block' : 'd-none'; ?>"><?= (isset($data['msg_error']) && !empty($data['msg_error'])) ? $data['msg_error'] : ''; ?></div>
    <form action="<?= URLROOT ?>/usuarios/register" method="POST">
      <div class="col-sm-4">
        <div class="mb-3">
          <label for="usuario_uid" class="form-label">ID de Usuario</label>
          <input type="text" class="form-control" name="usuario_uid" id="usuario_uid" aria-describedby="helpId" placeholder="User ID">
        </div>
      </div>
      <div class="col-sm-8">
        <div class="mb-3">
          <label for="usuario_nombre" class="form-label">Nombre de usuario</label>
          <input type="text" class="form-control" name="usuario_nombre" id="usuario_nombre" aria-describedby="helpId" placeholder="Name User">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="mb-3">
            <label for="usuario_password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" name="usuario_password" id="usuario_password" aria-describedby="helpId" placeholder="Password">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="mb-3">
            <label for="confirmacion_password" class="form-label">Confirmar Contraseña</label>
            <input type="password" class="form-control" name="confirmacion_password" id="confirmacion_password" aria-describedby="helpId" placeholder="Confirm your Password">
          </div>
        </div>
      </div>
      <div class="mb-3">
        <label for="usuario_email" class="form-label">Correo Electronico</label>
        <input type="text" class="form-control" name="usuario_email" id="usuario_email" aria-describedby="helpId" placeholder="Email">
      </div>
      <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
          <button class="btn btn-info" type="submit">Enviar</button>
        </div>
      </div>

    </form>
  </div>
  <div class="col-sm-4"></div>
</div>
<?php include_once APPROOT . '/views/includes/footer.inc.php'; ?>