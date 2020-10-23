<form action="<?=base_url?>materia/save" method="POST" class="form-signin">

<?php if (isset($_SESSION['materia']) && $_SESSION['materia'] == 'success') : ?>
    <div class="alert alert-success" role="alert">
      <strong>La Materia se ha Registrado Correctamente, Puedes <a href="<?= base_url ?>materia/gestion_materias">Verlas Aqui!</a></strong>
    </div>
  <?php elseif (isset($_SESSION['materia']) && $_SESSION['materia'] != 'success') : ?>
    <div class="alert alert-danger" role="alert">
      <strong>Error!, al Registrar esta materia Verifica bien Los datos que Ingresaste..</strong>
    <?php endif; ?>
    </div>
    <?php Utils::delete_session('materia') ?>

  <div class="text-center mb-4">
    <h1 class="h3 mb-3 font-weight-normal">Registrar Materias</h1>
    <p class="text-secondary">Registra los nombres Correctamente de las materias Que va contener el Institute Academy!, luego pordras asignarlas con cada profesor junto con el horario que va elaborar Dicho Profesor..</p>
  </div>

  <div class="form-label-group">
    <input type="text" id="inputNombre" name="nombre" class="form-control" placeholder="Nombre de la Materia" autofocus>
    <label for="inputNombre">Nombre de la Materia</label>
    <?php echo isset($_SESSION['errors']) ? Utils::showError($_SESSION['errors'], 'nombre') : ''?>
  </div>

  <button class="btn btn-lg btn-primary btn-block" style="font-size: 20px;" type="submit">Registrar Materia</button>
  <p class="mt-5 mb-3 text-muted text-center">&copy; 2020 Institute Academy | INAC</p>
  <?php Utils::delete_session('errors') ?>
</form>