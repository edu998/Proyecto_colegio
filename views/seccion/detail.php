<?php if (isset($estudiante) && is_object($estudiante)) : ?>
    <div class="container p-5" style="margin-top: 80px;">
        <?php if($estudiante->tipo == 'Año'):?>
        <a style="font-size: 18px;" href="<?= base_url ?>seccion/gestion_bachillerato"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</a>
        <?php elseif($estudiante->tipo == 'Grado'):?>
            <a style="font-size: 18px;" href="<?= base_url ?>seccion/gestion_grado"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</a>
        <?php endif;?>
        <div class="card text-center my-3">
            <div class="card-header">

            </div>
            <div class="card-body">
            <?php if($estudiante->tipo == 'Año'):?>
                    <form action="<?= base_url ?>seccion/change" method="POST">
                        <div class="form-group">
                            <label for="nombre_seccion" class="text-center my-2" style="font-size: 17px;">Cambiar de Seccion:</label>
                            <input type="hidden" name="estudiante_id" value="<?= $estudiante->id ?>">
                            <select class="form-control w-25 p-0 mx-auto" name="nombre_seccion">
                                <option value="A">A</option>
                                <option value="B">B</option>
                            </select>
                            <input type="submit" value="Guardar Cambios" class="my-3 btn btn-primary">
                        </div>
                    </form>
                    <?php elseif($estudiante->tipo == 'Grado'):?>
                        <form action="<?= base_url ?>seccion/change_p" method="POST">
                        <div class="form-group">
                            <label for="nombre_seccion" class="text-center my-2" style="font-size: 17px;">Cambiar de Seccion:</label>
                            <input type="hidden" name="estudiante_id" value="<?= $estudiante->id ?>">
                            <select class="form-control w-25 p-0 mx-auto" name="nombre_seccion">
                                <option value="A">A</option>
                                <option value="B">B</option>
                            </select>
                            <input type="submit" value="Guardar Cambios" class="my-3 btn btn-primary">
                        </div>
                    </form>
                        <?php endif;?>
                    <hr class="py-2">
                    <h3 class="card-title py-2">Datos del Estudiante:</h3>
                    <h5 class="card-text my-2"><strong>Cedula de Identidad: </strong><?= $estudiante->cedula ?></h5>
                    <h5 class="card-text my-2"><strong>Estudiante: </strong><?= $estudiante->estudiante ?></h5>
                    <h5 class="card-text my-2"><strong>Nivel: </strong><?= $estudiante->numero . ' ' . $estudiante->tipo ?></h5>
<?php endif;?>
                <div class="card-footer text-muted">
                    <p class="mt-5 mb-3 text-muted text-center">&copy; 2020 Institute Academy | INAC</p>
                </div>
            </div>
        </div>
    </div>