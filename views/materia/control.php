<div class="container mt-5">
    <h2 class="py-4 d-inline-block mt-5"># Control de Materias <a href="<?= base_url ?>controlm/asignar_materia" style="font-size: 17px;" class="btn btn-primary btn-sm ml-2">Asignar Materias a Profesores</a></h2>
    <table class="table table-striped text-center">
        <tr class="thead-dark">
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
                    <td><?= $materia_p->profesor ?></td>
                    <td><?= $materia_p->materia ?></td>
                    <?php if ($materia_p->horario_desde < 12) : ?>
                        <td><?= $materia_p->horario_desde ?> am</td>
                    <?php else : ?>
                        <td><?= $materia_p->horario_desde ?> pm</td>
                    <?php endif; ?>
                    <?php if ($materia_p->horario_hasta < 12) : ?>
                        <td><?= $materia_p->horario_hasta ?> am</td>
                    <?php else : ?>
                        <td><?= $materia_p->horario_hasta ?> pm</td>
                    <?php endif; ?>
                </tr>
            <?php endwhile; ?>
        <?php endif; ?>

    </table>
</div>