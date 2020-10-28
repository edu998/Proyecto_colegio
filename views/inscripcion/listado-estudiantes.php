<div class="container mt-5">
    <h2 class="py-4 d-inline-block mt-5"># Gestion de Estudiantes Inscritos</h2>

    <table class="table table-striped text-center">
        <tr class="thead-dark">
            <th scope="col">Status</th>
            <th scope="col">Cedula</th>
            <th scope="col">Primer Nombre</th>
            <th scope="col">Segundo Nombre</th>
            <th scope="col">Primer Apellido</th>
            <th scope="col">Segundo Apellido</th>
            <th scope="col">Nivel</th>
            <th scope="col">Numero</th>
        </tr>
        <?php 
        
        if (isset($estudiantes) && !empty($estudiantes)) : ?>
            <?php while ($estudiante = $estudiantes->fetch_object()):?>
                    <tr>
                        <td><?=$estudiante->status?></td>
                        <td><?= $estudiante->cedula ?></td>
                        <td><?= $estudiante->primer_nombre ?></td>
                        <td><?= $estudiante->segundo_nombre ?></td>
                        <td><?= $estudiante->primer_apellido ?></td>
                        <td><?= $estudiante->segundo_apellido ?></td>
                        <td><?= $estudiante->nivel ?></td>
                        <td><?= $estudiante->numero . ' ' . $estudiante->tipo ?></td>
                    </tr>
            <?php endwhile; ?>
        <?php endif; ?>

    </table>
</div>