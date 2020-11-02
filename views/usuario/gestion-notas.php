<?php if (isset($notas) && !empty($notas)) : ?>
    <div class="container mt-5">
        <h2 class="py-3 d-inline-block mt-5"># Gestion de Notas de los Estudiantes</h2>
            <h5 class="d-block w-50 pb-4"><strong>Nota:</strong> Cada Estudiante ya sea de Primaria o Bachillerato Debera Tener una Nota Final igual a 10 o mayor que 10 para que el sistema lo reconozca como aprobado</h5>
        <table class="table table-striped text-center">
            <tr class="thead-dark">
                <th scope="col">Materia</th>
                <th scope="col">Cedula</th>
                <th scope="col">Estudiante</th>
                <th scope="col">Nota 1</th>
                <th scope="col">Nota 2</th>
                <th scope="col">Nota 3 </th>
                <th scope="col">Nota 4</th>
                <th scope="col">Nota Final</th>
                <th scope="col">Estado</th>
            </tr>

            <?php while ($nota = $notas->fetch_object()) : ?>
                <tr>
                    <td><?= $nota->materia ?></td>
                    <td><?= $nota->cedula ?></td>
                    <td><?= $nota->estudiante ?></td>
                    <td><?= $nota->primera ?></td>
                    <td><?= $nota->segunda ?></td>
                    <td><?= $nota->tercera ?></td>
                    <td><?= $nota->cuarta ?></td>
                    <td><?= $nota->nota_final ?></td>
                    <?php if($nota->nota_final >= 10):?>
                        <td>Aprobado</td>
                    <?php else:?>
                        <td>Reprobado</td>
                    <?php endif;?>
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
            <h5 class="card-title">No existe notas de los Estudiantes </h5>
            <p class="card-text py-3">Carga las notas en tu listado de estudiantes y selecciona cada estudiante ya que se debe registrar cada nota por medio del estudiante y la Materia que Das.</p>
            <a href="<?= base_url ?>usuario/listado_mis_estudiantes" class="btn btn-primary">Ver Listado de Estudiantes</a>
        </div>
        <div class="card-footer text-muted">
            &copy; 2020 Institute Academy | INAC
        </div>
    </div>
<?php endif; ?>