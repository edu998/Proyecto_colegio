<?php if (isset($estudiante) && is_object($estudiante)) : ?>
    <div class="container p-5" style="margin-top: 80px;">
        <a style="font-size: 18px;" href="<?= base_url ?>inscripcion/listado_estudiantes"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</a>
        <div class="card text-center my-3">
            <div class="card-header">

            </div>
            <div class="card-body">

                <?php if (isset($_SESSION['status_e']) && $_SESSION['status_e'] == 'success') : ?>
                    <div class="alert alert-success w-50 mx-auto" role="alert">
                        <strong>Se ha Cambiado el Estado Correctamente</strong>
                    </div>
                <?php elseif (isset($_SESSION['status_e']) && $_SESSION['status_e'] != 'success') : ?>
                    <div class="alert alert-danger w-50 mx-auto" role="alert">
                        <strong>Error!, al Cambiar el Estado..</strong>
                    <?php endif; ?>
                    </div>
                    <?php Utils::delete_session('status_e') ?>

                    <form action="<?= base_url ?>inscripcion/change" method="POST">
                        <div class="form-group">
                            <label for="status" class="text-center my-2" style="font-size: 17px;">Cambiar Estado de Estudiantes:</label>
                            <input type="hidden" name="estudiante_id" value="<?= $estudiante->estudiante_id ?>">
                            <select class="form-control w-50 p-0 mx-auto" name="status">
                                <option value="ingresado">ingresado</option>
                                <option value="egresado">egresado</option>
                            </select>
                            <input type="submit" value="Guardar Cambios" class="my-3 btn btn-primary">
                        </div>
                    </form>
                    <hr class="py-2">
                    <h3 class="card-title py-2">Datos del Estudiante:</h3>
                    <h5 class="card-text my-2"><strong>Cedula de Identidad: </strong><?= $estudiante->cedula ?></h5>
                    <h5 class="card-text my-2"><strong>Primer Nombre: </strong><?= $estudiante->primer_nombre?></h5>
                    <h5 class="card-text my-2"><strong>Segundo Nombre: </strong><?= $estudiante->segundo_nombre?></h5>
                    <h5 class="card-text my-2"><strong>Primer Apellido: </strong><?= $estudiante->primer_apellido?></h5>
                    <h5 class="card-text my-2"><strong>Segundo Apellido: </strong><?= $estudiante->segundo_apellido?></h5>
                    <h5 class="card-text my-2"><strong>Nivel: </strong><?= $estudiante->nivel?></h5>
                    <h5 class="card-text my-2"><strong>Año o Grado: </strong><?= $estudiante->numero . ' ' . $estudiante->tipo?></h5>
                <?php endif; ?>
                <div class="card-footer text-muted">
                    <p class="mt-5 mb-3 text-muted text-center">&copy; 2020 Institute Academy | INAC</p>
                </div>
            </div>
        </div>
    </div>