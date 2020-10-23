<form action="<?= base_url ?>nivel/save" method="POST" class="form-signin">
  <?php if (isset($_SESSION['nivel']) && $_SESSION['nivel'] == 'success') : ?>
    <div class="alert alert-success" role="alert">
      <strong>El Nivel se ha Registrado Correctamente, Puedes <a href="<?= base_url ?>nivel/gestion_nivel">Verlo Aqui!</a></strong>
    </div>
  <?php elseif (isset($_SESSION['nivel']) && $_SESSION['nivel'] != 'success') : ?>
    <div class="alert alert-danger" role="alert">
      <strong>Error!, al Registrar este Nivel Verifica bien Los datos que Ingresaste..</strong>
    <?php endif; ?>
    </div>
    <?php Utils::delete_session('nivel') ?>

    <div class="text-center mb-4">
      <h1 class="h3 mb-3 font-weight-normal">Registra los Niveles</h1>
      <p class="text-secondary">Inserta los Niveles Primaria o Bachillerato y asignale Los numeros y el tipo si es Año o Grado a cada Nivel..</p>
    </div>

    <div class="form-label-group">
      <input type="text" id="inputNombre" name="nombre" class="form-control" placeholder="Nombre del nivel" autofocus>
      <label for="inputNombre">Nombre del nivel</label>
      <?php echo isset($_SESSION['errors']) ? Utils::showError($_SESSION['errors'], 'nombre') : '' ?>
    </div>

    <div class="form-group">
      <label for="exampleFormControlSelect1">Seleccion el Tipo</label>
      <select class="form-control p-0" name="tipo" id="exampleFormControlSelect1">
        <option value="Año">Año</option>
        <option value="Grado">Grado</option>
      </select>
      <?php echo isset($_SESSION['errors']) ? Utils::showError($_SESSION['errors'], 'tipo') : '' ?>
    </div>

    <div class="form-group">
      <label for="exampleFormControlSelect2">Seleccion el Numero Correspondiente</label>
      <select class="form-control p-0" name="numero_tipo" id="exampleFormControlSelect2">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
      </select>
      <?php echo isset($_SESSION['errors']) ? Utils::showError($_SESSION['errors'], 'numero_tipo') : '' ?>
    </div>

    <button class="btn btn-lg btn-primary btn-block" style="font-size: 20px;" type="submit">Registrar</button>
    <p class="mt-5 mb-3 text-muted text-center">&copy; 2020 Institute Academy | INAC</p>
    <?php Utils::delete_session('errors') ?>
</form>