<?php include_once APPROOT . '/views/includes/header.inc.php'; ?>
<hr>
<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <div class="row">
            <div class="col-sm-11"><h4>Login</h4></div>
            <div class="col-sm-1"><i class="fa fa-key text-info"></i></div>
        </div>
        <hr>
        <!-- d-block -->
        <div class="alert alert-warning <?= (isset($data['msg_error']) && !empty($data['msg_error']))?'d-block':'d-none'; ?>"><?= (isset($data['msg_error']) && !empty($data['msg_error']))?$data['msg_error']:''; ?></div>
        <form action="<?= URLROOT ?>/usuarios/login" method="POST">
            <div class="mb-3">
              <label for="usuario_uid" class="form-label">ID de Usuario</label>
              <input type="text" class="form-control" name="usuario_uid" id="usuario_uid" aria-describedby="helpId" placeholder="User ID">
            </div>
            <div class="mb-3">
              <label for="usuario_password" class="form-label">Contraseña</label>
              <input type="password" class="form-control" name="usuario_password" id="usuario_password" aria-describedby="helpId" placeholder="Password">
            </div>
            <br>
            <button class="btn btn-success" type="submit">Enviar</button>
        </form>
    </div>
    <div class="col-sm-4"></div>
</div>
<?php include_once APPROOT . '/views/includes/footer.inc.php'; ?>