<div class="container mt-5">
    <h2 class="py-4 d-inline-block mt-5">Resultados de: '<?=$nombre?>'<a href="<?=base_url?>horario/gestion_horario" style="font-size: 17px;" class="btn btn-primary btn-sm ml-3">Ver Todas las Materias</a></h2>

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