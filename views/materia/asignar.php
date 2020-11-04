<?php if(isset($controlm_o) && is_object($controlm_o)):?>
  <?php $url_action = base_url . 'controlm/save&id=' . $controlm_o->id?>
<?php else:?>
  <?php $url_action = base_url . 'controlm/save';?>
<?php endif;?>


<form action="<?= $url_action ?>" method="POST" class="form-signin">

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
            <label for="exampleFormControlSelect1">Seleccione el Profesor</label>
            <select class="form-control p-0" name="usuario_id" id="exampleFormControlSelect1">
                <?php $profesores = Utils::showProfesores();
                if (!empty($profesores)) :
                    while ($profesor = $profesores->fetch_object()) :
                        if ($profesor->role != 'admin') :
                ?>
                            <option value="<?= $profesor->id ?>" <?=isset($controlm_o) && is_object($controlm_o) && $controlm_o->usuario_id == $profesor->id ? 'selected' : ''?> ><?= $profesor->primer_nombre ?> <?= $profesor->primer_apellido ?></option>
                        <?php endif; ?>
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
                        <option value="<?= $materia->id ?>" <?=isset($controlm_o) && is_object($controlm_o) && $controlm_o->materia_id == $materia->id ? 'selected' : ''?>  ><?= $materia->nombre ?></option>
                    <?php endwhile; ?>
                <?php endif; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect2">Selecciona el Nivel</label>
            <select class="form-control p-0" name="nivel_id" id="exampleFormControlSelect2">
                <?php $niveles = Utils::showNiveles();
                if (!empty($niveles)) :
                    while ($nivel = $niveles->fetch_object()) :
                ?>
                        <option value="<?= $nivel->id ?>" <?=isset($controlm_o) && is_object($controlm_o) && $controlm_o->nivel_id == $nivel->id ? 'selected' : ''?> ><?= $nivel->numero_tipo ?> <?= $nivel->tipo ?></option>
                    <?php endwhile; ?>
                <?php endif; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect5">Selecciona el Horario</label>
            <select class="form-control p-0" name="horario_id" id="exampleFormControlSelect5">
                <?php $horarios = Utils::showHorarios();
                if (!empty($horarios)) :
                    while ($horario = $horarios->fetch_object()) :
                ?>
                        <option value="<?= $horario->id ?>" <?=isset($controlm_o) && is_object($controlm_o) && $controlm_o->horario_id == $horario->id ? 'selected' : ''?>  ><?= isset($horario->horario_desde) && $horario->horario_desde < 12 ? $horario->horario_desde . ' ' . 'am' : $horario->horario_desde . ' ' . 'pm' ?> - <?= isset($horario->horario_hasta) && $horario->horario_hasta < 12 ? $horario->horario_hasta . ' ' . 'am' : $horario->horario_hasta . ' ' . 'pm'  ?> </option>
                    <?php endwhile; ?>
                <?php endif; ?>
            </select>
        </div>

        
        <div class="form-group">
            <label for="exampleFormControlSelect4">Selecciona la Seccion:</label>
            <select class="form-control p-0" name="seccion" id="exampleFormControlSelect4">
                <option value="A" <?=isset($controlm_o) && is_object($controlm_o) && $controlm_o->seccion == 'A'? 'selected' : ''?>>A</option>
                <option value="B" <?=isset($controlm_o) && is_object($controlm_o) && $controlm_o->seccion == 'B' ? 'selected' : ''?> >B</option>
            </select>
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect3">Selecciona el Dia</label>
            <select class="form-control p-0" name="dia" id="exampleFormControlSelect3">
                <option value="Lunes" <?=isset($controlm_o) && is_object($controlm_o) && $controlm_o->dia == 'Lunes' ? 'selected' : ''?>  >Lunes</option>
                <option value="Martes" <?=isset($controlm_o) && is_object($controlm_o) && $controlm_o->dia == 'Martes' ? 'selected' : ''?>  >Martes</option>
                <option value="Miercoles" <?=isset($controlm_o) && is_object($controlm_o) && $controlm_o->dia == 'Miercoles' ? 'selected' : ''?>  >Miercoles</option>
                <option value="Jueves" <?=isset($controlm_o) && is_object($controlm_o) && $controlm_o->dia == 'Jueves' ? 'selected' : ''?>  >Jueves</option>
                <option value="Viernes" <?=isset($controlm_o) && is_object($controlm_o) && $controlm_o->dia == 'Viernes' ? 'selected' : ''?>  >Viernes</option>
            </select>
        </div>

        <button class="btn btn-lg btn-primary btn-block" style="font-size: 20px;" type="submit">Registrar</button>
        <p class="mt-5 mb-3 text-muted text-center">&copy; 2020 Institute Academy | INAC</p>
        <?php Utils::delete_session('errors') ?>
</form>