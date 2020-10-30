<?php if (isset($horarios) && !empty($horarios)) : ?>
    <div class="container mt-5">
        <h2 class="py-4 d-inline-block mt-5"># Gestion de Horarios <a href="<?= base_url ?>horario/create" style="font-size: 17px;" class="btn btn-primary btn-sm ml-2">Registrar Horarios</a></h2>

        <table class="table table-striped text-center">
            <tr class="thead-dark">
                <th scope="col">#</th>
                <th scope="col">Horarios</th>
            </tr>

            <?php while ($horario = $horarios->fetch_object()) : ?>
                <tr>
                    <td><?= $horario->id ?></td>

                    <td><?= isset($horario->horario_desde) && $horario->horario_desde < 12 ? $horario->horario_desde . ' ' . 'am' : $horario->horario_desde . ' ' . 'pm' ?> - <?= isset($horario->horario_hasta) && $horario->horario_hasta < 12 ? $horario->horario_hasta . ' ' . 'am' : $horario->horario_hasta . ' ' . 'pm'  ?> </td>

                </tr>
            <?php endwhile; ?>

        </table>
    </div>
<?php else : ?>
    <div class="card text-center" style="margin-top: 150px;">
        <div class="card-header" style="font-size: 25px;">
                Registros Vacios..
        </div>
        <div class="card-body">
            <h5 class="card-title">Registro de Horarios </h5>
            <p class="card-text py-3">Registra los horarios para el Institute Academy, Para registrar los datos debes presionar en el boton de Abajo!</p>
            <a href="<?= base_url ?>horario/create" class="btn btn-primary">Registrar Horarios</a>
        </div>
        <div class="card-footer text-muted">
        &copy; 2020 Institute Academy | INAC
        </div>
    <?php endif; ?>