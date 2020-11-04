<div class="container mt-5">
    <h2 class="py-4 d-inline-block mt-5"># Control de Materias <a href="<?= base_url ?>controlm/asignar_materia" style="font-size: 17px;" class="btn btn-primary btn-sm ml-2">Asignar Materias a Profesores</a></h2>

    <?php if (isset($_SESSION['control_m']) && $_SESSION['control_m'] == 'success') : ?>
        <div class="alert alert-success w-50 mx-auto" role="alert">
            <strong>Se ha Borrado Correctamente</strong>
        </div>
    <?php elseif(isset($_SESSION['control_m']) && $_SESSION['control_m'] != 'success'): ?>
        <div class="alert alert-danger w-50 mx-auto" role="alert">
            <strong>Error!, Al Borrar este registro..</strong>
        </div>
        <?php endif;?>
    <?php Utils::delete_session('control_m') ?>

    <table class="table table-striped text-center">
        <tr class="thead-dark">
            <th scope="col">Cedula</th>
            <th scope="col">Profesor</th>
            <th scope="col">Materia</th>
            <th scope="col">Nivel</th>
            <th scope="col">Seccion</th>
            <th scope="col">Dia</th>
            <th scope="col">Horario</th>
            
        </tr>
        <?php if (isset($materias_p) && !empty($materias_p)) : ?>
            <?php while ($materia_p = $materias_p->fetch_object()) : ?>
                <tr>
                    <td> <a style="font-size: 20px;" href="<?=base_url?>controlm/edit&id=<?=$materia_p->id?>"><i class="fa fa-pencil-square-o text-warning mr-2" aria-hidden="true"></i></a> <a style="font-size: 20px;" href="<?=base_url?>controlm/delete&id=<?=$materia_p->id?>"><i class="fa fa-trash-o text-danger mr-2" aria-hidden="true"></i></a> <?= $materia_p->cedula ?></td>
                    <td><?= $materia_p->profesor ?></td>
                    <td><?= $materia_p->materia ?></td>
                    <td><?= $materia_p->nivel ?></td>
                    <td><?= $materia_p->seccion ?></td>
                    <td><?=$materia_p->dia?></td>
                     <td><?= isset($materia_p->horario_desde) && $materia_p->horario_desde < 12 ? $materia_p->horario_desde . ' ' . 'am' : $materia_p->horario_desde . ' ' . 'pm' ?> - <?= isset($materia_p->horario_hasta) && $materia_p->horario_hasta < 12 ? $materia_p->horario_hasta . ' ' . 'am' : $materia_p->horario_hasta . ' ' . 'pm'  ?> </td>
                </tr>
            <?php endwhile; ?>
        <?php endif; ?>

    </table>
</div>