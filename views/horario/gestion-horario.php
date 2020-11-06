<?php if (isset($horarios) && !empty($horarios)) : ?>
    <div class="container mt-5">
        <h2 class="py-4 d-inline-block mt-5"># Gestion de Horarios <a href="<?= base_url ?>horario/create" style="font-size: 17px;" class="btn btn-primary btn-sm ml-2">Registrar Horarios</a></h2>

        <h5 class="d-block w-50 pb-4"><strong>NOTA:</strong> Los Horarios solo se Podran Borrar si y solo si no tienen ningun profesor o materia o seccion asignada de lo contrario se eliminira ambos registros y no aparecera tanto en el control de materias como en gestion de horario, Si editas en ambas registros apareceran con el nombre Actualizado.</h5>

        <form class="form-inline pb-3 my-lg-0" action="<?= base_url ?>horario/buscador_horario" method="POST">
            <input class="form-control mr-sm-2" style="font-size: 16px;" type="time" name="nombre" placeholder="Buscar Por Horario" aria-label="Search">
            <button class="btn btn-primary my-2 my-sm-0 p-2" style="min-width: 50px; border-radius: 5px; font-size: 16px;" type="submit"><i style="border-radius: 500px;" class="fa fa-search"></i></button>
        </form>

        <?php if (isset($_SESSION['horario']) && $_SESSION['horario'] == 'success') : ?>
            <div class="alert alert-success w-50 mx-auto" role="alert">
                <strong>Se ha Borrado Correctamente</strong>
            </div>
        <?php elseif (isset($_SESSION['horario']) && $_SESSION['horario'] != 'success') : ?>
            <div class="alert alert-danger w-50 mx-auto" role="alert">
                <strong>Error!, Al Borrar este Horario..</strong>
            </div>
        <?php endif; ?>
        <?php Utils::delete_session('horario') ?>

        <?php if (isset($_SESSION['search_m']) && $_SESSION['search_m'] == 'failed') : ?>
            <div class="alert alert-danger w-50 mx-auto" role="alert">
                <strong>Error!, No se encuentran resultados con lo que deseas Buscar..</strong>
            </div>
        <?php endif; ?>
        <?php Utils::delete_session('search_m') ?>

        <table class="table table-striped text-center">
            <tr class="thead-dark">
                <th scope="col">#</th>
                <th scope="col">Horarios</th>
            </tr>

            <?php while ($horario = $horarios->fetch_object()) : ?>
                <tr>
                    <td> <a style="font-size: 20px;" href="<?= base_url ?>horario/edit&id=<?= $horario->id ?>"><i class="fa fa-pencil-square-o text-warning mr-2" aria-hidden="true"></i></a> <a style="font-size: 20px;" href="<?= base_url ?>horario/delete&id=<?= $horario->id ?>"><i class="fa fa-trash-o text-danger mr-2" aria-hidden="true"></i></a> <?= $horario->id ?></td>

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
</div>
    <?php endif; ?>