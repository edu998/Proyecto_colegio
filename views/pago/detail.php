<?php if (isset($pago) && is_object($pago)) : ?>
    <div class="container p-5" style="margin-top: 80px;">
        <a style="font-size: 18px;" href="<?= base_url ?>pago/control_pagos"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</a>
        <div class="card text-center my-3">
            <div class="card-header">

            </div>
            <div class="card-body">

                <?php if (isset($_SESSION['status']) && $_SESSION['status'] == 'success') : ?>
                    <div class="alert alert-success w-50 mx-auto" role="alert">
                        <strong>Se ha Cambiado el Estado Correctamente</strong>
                    </div>
                <?php elseif (isset($_SESSION['status']) && $_SESSION['status'] != 'success') : ?>
                    <div class="alert alert-danger w-50 mx-auto" role="alert">
                        <strong>Error!, al Cambiar el Estado..</strong>
                    <?php endif; ?>
                    </div>
                    <?php Utils::delete_session('status') ?>

                    <form action="<?= base_url ?>pago/change" method="POST">
                        <div class="form-group">
                            <label for="status" class="text-center my-2" style="font-size: 17px;">Cambiar Estado de Pago:</label>
                            <input type="hidden" name="c_pago_id" value="<?= $pago->cp_id ?>">
                            <select class="form-control w-50 p-0 mx-auto" name="status">
                                <option value="Ya Pago" <?= isset($pago) && is_object($pago) && $pago->status == 'Ya Pago' ? 'selected' : '' ?>>Ya Pago</option>
                                <option value="No ha Pagado" <?= isset($pago) && is_object($pago) && $pago->status == 'No ha Pagado' ? 'selected' : '' ?>>No ha Pagado</option>
                            </select>
                            <input type="submit" value="Guardar Cambios" class="my-3 btn btn-primary">
                        </div>
                    </form>
                    <hr class="py-2">
                    <h3 class="card-title py-2">Datos del Estudiante:</h3>
                    <h5 class="card-text my-2"><strong>Cedula de Identidad: </strong><?= $pago->cedula ?></h5>
                    <h5 class="card-text my-2"><strong>Estudiante: </strong><?= $pago->estudiante ?></h5>

                    <hr class="py-2">

                    <h3 class="card-title py-2">Datos del Pago:</h3>
                    <h5 class="card-text my-2"><strong>Estado: </strong><?= $pago->status ?></h5>
                    <h5 class="card-text my-2"><strong>Tipo de Pago: </strong><?= $pago->tipo_pago ?></h5>
                    <h5 class="card-text my-2"><strong>Nombre del Pago Realizado: </strong><?= $pago->nombre_pago ?></h5>
                    <h5 class="card-text my-2"><strong>Fecha: </strong><?= $pago->fecha ?></h5>
                    <h5 class="card-text my-2"><strong>Descripcion del Pago: </strong><?= $pago->descripcion ?></h5>

                    <hr class="py-2">

                    <?php if ($pago->transferencia != null && $pago->status == 'Ya Pago') : ?>
                        <h5 class="card-text mx-auto"><strong>Transferencia: </strong></h5>
                        <img class="mx-auto my-4" src="<?= base_url ?>comprobantes/<?= $pago->transferencia ?>" width="300" height="200">
                    <?php else : ?>
                        <h4 class="card-text my-4"><strong>No Se Registro Ningun Comprobante</strong></h4>
                    <?php endif; ?>

                <?php endif; ?>
                <div class="card-footer text-muted">
                    <p class="mt-5 mb-3 text-muted text-center">&copy; 2020 Institute Academy | INAC</p>
                </div>
            </div>
        </div>
    </div>