<div class="container mt-5">
    <h2 class="py-4 d-inline-block mt-5">Resultados de: '<?=$nombre?>'' <a href="<?=base_url?>inscripcion/listado_estudiantes" class="btn btn-primary">Regresar el Listado</a></h2>

    <form class="form-inline pb-3 my-lg-0" action="<?=base_url?>inscripcion/buscador" method="POST">
      <input class="form-control mr-sm-2 " style="font-size: 16px;" type="search" name="nombre" placeholder="Estudiante o Estado" aria-label="Search">
      <button class="btn btn-primary my-2 my-sm-0 p-2" style="min-width: 50px; border-radius: 5px; font-size: 16px;" type="submit"><i style="border-radius: 500px;" class="fa fa-search"></i></button>
    </form>

    <table class="table table-striped text-center">
        <tr class="thead-dark">
            <th scope="col">Status</th>
            <th scope="col">Cedula</th>
            <th scope="col">Primer Nombre</th>
            <th scope="col">Segundo Nombre</th>
            <th scope="col">Primer Apellido</th>
            <th scope="col">Segundo Apellido</th>
            <th scope="col">Nivel</th>
            <th scope="col">Año o Grado</th>
        </tr>
        <?php 
        
        if (isset($estudiantess) && !empty($estudiantess)) : ?>
            <?php while ($estudiante = $estudiantess->fetch_object()):?>
                    <tr>
                        <td> <a style="font-size: 20px;" href="<?=base_url?>inscripcion/edit&id=<?=$estudiante->estudiante_id?>"><i class="fa fa-info-circle mr-2" style="font-size: 21px;" aria-hidden="true"></i></a> <?=$estudiante->status?></td>
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