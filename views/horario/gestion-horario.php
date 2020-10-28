<div class="container mt-5">
    <h2 class="py-4 d-inline-block mt-5"># Gestion de Horarios <a href="<?= base_url ?>horario/create" style="font-size: 17px;" class="btn btn-primary btn-sm ml-2">Registrar Horarios</a></h2>
    <table class="table table-striped text-center">
        <tr class="thead-dark">
            <th scope="col">#</th>
            <th scope="col">Horarios</th>
        </tr>
        <?php if (isset($horarios) && !empty($horarios)) : ?>
            <?php while ($horario = $horarios->fetch_object()) : ?>
                <tr>
                    <td><?= $horario->id ?></td>

                        <td><?= isset($horario->horario_desde) && $horario->horario_desde < 12 ? $horario->horario_desde . ' ' . 'am' : $horario->horario_desde . ' ' . 'pm' ?> - <?= isset($horario->horario_hasta) && $horario->horario_hasta < 12 ? $horario->horario_hasta . ' ' . 'am' : $horario->horario_hasta . ' ' . 'pm'  ?> </td>
                        
                </tr>
            <?php endwhile; ?>
        <?php endif; ?>

    </table>
</div>