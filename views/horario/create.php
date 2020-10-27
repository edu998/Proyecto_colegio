<form action="<?=base_url?>horario/save" method="POST" class="form-signin">

<?php if (isset($_SESSION['horario']) && $_SESSION['horario'] == 'success') : ?>
    <div class="alert alert-success" role="alert">
      <strong>El Horario se ha Registrado Correctamente, Puedes <a href="<?= base_url ?>horario/gestion_horario">Verlo Aqui!</a></strong>
    </div>
  <?php elseif (isset($_SESSION['horario']) && $_SESSION['horario'] != 'success') : ?>
    <div class="alert alert-danger" role="alert">
      <strong>Error!, al Registrar este Horario Porque ya existe, Por favor Inserte Otro..</strong>
    <?php endif; ?>
    </div>
    <?php Utils::delete_session('horario') ?>

  <div class="text-center mb-4">
    <h1 class="h3 mb-3 font-weight-normal">Registrar Horarios</h1>
    <p class="text-secondary">Registra Los Horarios que va Contener Cada Materia Con su respectivo Profesor y seccion incluyendo el nivel posteriormente..</p>
  </div>

  <div class="form-label-group">
    <input type="time" id="inputHorario1" name="horario_desde" class="form-control" placeholder="¿Desde que Hora?" autofocus>
    <label for="inputHorario1">¿Desde que Hora?</label>
    <?php echo isset($_SESSION['errors']) ? Utils::showError($_SESSION['errors'], 'horario_desde') : ''?>
  </div>

  <div class="form-label-group">
    <input type="time" id="inputHorario2" name="horario_hasta" class="form-control" placeholder="¿Hasta que Hora?">
    <label for="inputHorario2">¿Hasta que Hora?</label>
    <?php echo isset($_SESSION['errors']) ? Utils::showError($_SESSION['errors'], 'horario_hasta') : ''?>
  </div>

  <button class="btn btn-lg btn-primary btn-block" style="font-size: 20px;" type="submit">Registrar Horario</button>
  <p class="mt-5 mb-3 text-muted text-center">&copy; 2020 Institute Academy | INAC</p>
  <?php Utils::delete_session('errors') ?>
</form>