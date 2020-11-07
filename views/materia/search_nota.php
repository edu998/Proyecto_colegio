<?php if (isset($notas) && !empty($notas)) : ?>
    <div class="container mt-5">
        <h2 class="py-3 d-inline-block mt-5">Resultados de: '<?=$nombre?>' <a href="<?=base_url?>nota/gestion_notas" class="btn btn-primary">Ver Todas las Notas</a></h2>

        <form class="form-inline pb-3 my-lg-0" action="<?= base_url ?>nota/buscador" method="POST">
            <input class="form-control mr-sm-2" style="font-size: 16px;" type="search" name="nombre" placeholder="Materia" aria-label="Search">
            <button class="btn btn-primary my-2 my-sm-0 p-2" style="min-width: 50px; border-radius: 5px; font-size: 16px;" type="submit"><i style="border-radius: 500px;" class="fa fa-search"></i></button>
        </form>

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
                    <td> <a style="font-size: 20px;" href="<?= base_url ?>nota/delete&id=<?= $nota->id ?>"><i class="fa fa-trash-o text-danger mr-2" aria-hidden="true"></i></a> <?= $nota->materia ?></td>
                    <td><?= $nota->cedula ?></td>
                    <td><?= $nota->estudiante ?></td>
                    <td><?= $nota->primera ?></td>
                    <td><?= $nota->segunda ?></td>
                    <td><?= $nota->tercera ?></td>
                    <td><?= $nota->cuarta ?></td>
                    <td><?= $nota->nota_final ?></td>
                    <?php if ($nota->nota_final >= 10) : ?>
                        <td>Aprobado</td>
                    <?php else : ?>
                        <td>Reprobado</td>
                    <?php endif; ?>
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