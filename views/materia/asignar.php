<form action="<?= base_url ?>controlm/save" method="POST" class="form-signin">
<?php if (isset($_SESSION['control_m']) && $_SESSION['control_m'] == 'success') : ?>
    <div class="alert alert-success" role="alert">
      <strong>Se le ha Asignado la Materia a Un Profesor, Puedes <a href="<?= base_url ?>controlm/control_materias">Verlo Aqui!</a></strong>
    </div>
  <?php elseif (isset($_SESSION['control_m']) && $_SESSION['control_m'] != 'success') : ?>
    <div class="alert alert-danger" role="alert">
      <strong>Error! al Registrar Estos Datos..</strong>
    <?php endif; ?>
    </div>
    <?php Utils::delete_session('control_m') ?>
    <div class="text-center mb-4">
        <h1 class="h3 mb-3 font-weight-normal">Control de Materia por Profesor</h1>
        <p class="text-secondary">Aqui Tendras que Asignarle a cada Materia un profesor junto con el horario que va impartir desde que hora hasta que hora.</p>
    </div>

    <div class="form-group">
        <label for="exampleFormControlSelect1">Seleccione el Profesoer</label>
        <select class="form-control p-0" name="usuario_id" id="exampleFormControlSelect1">
            <?php $profesores = Utils::showProfesores();
            if (!empty($profesores)) :
                while ($profesor = $profesores->fetch_object()) :
                    if($profesor->role != 'admin'):
            ?>
                    <option value="<?=$profesor->id?>"><?=$profesor->primer_nombre?> <?=$profesor->primer_apellido?></option>
                    <?php endif;?>
                <?php endwhile; ?>
            <?php endif; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="exampleFormControlSelect2">Selecciona La Materia</label>
        <select class="form-control p-0" name="materia_id" id="exampleFormControlSelect2">
        <?php $materias = Utils::showMaterias();
            if (!empty($materias)) :
                while ($materia = $materias->fetch_object()) :
            ?>
                    <option value="<?=$materia->id?>"><?=$materia->nombre?></option>
                <?php endwhile; ?>
            <?php endif; ?>
        </select>
    </div>

    <div class="form-label-group">
        <input type="time" id="inputHoraUno" name="horario_desde" class="form-control" placeholder="¿Desde que Hora?" autofocus>
        <label for="inputHoraUno">¿Desde que Hora?</label>
        <?php echo isset($_SESSION['errors']) ? Utils::showError($_SESSION['errors'], 'horario_desde') : '' ?>
    </div>

    <div class="form-label-group">
        <input type="time" id="inputHoraDos" name="horario_hasta" class="form-control" placeholder="¿Hasta que Hora?">
        <label for="inputHoraDos">¿Hasta que Hora?</label>
        <?php echo isset($_SESSION['errors']) ? Utils::showError($_SESSION['errors'], 'horario_hasta') : '' ?>
    </div>

    <button class="btn btn-lg btn-primary btn-block" style="font-size: 20px;" type="submit">Registrar</button>
    <p class="mt-5 mb-3 text-muted text-center">&copy; 2020 Institute Academy | INAC</p>
    <?php Utils::delete_session('errors') ?>
</form>