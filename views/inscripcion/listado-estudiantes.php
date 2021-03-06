<?php if (isset($estudiantes) && !empty($estudiantes)) : ?>
<div class="container mt-5">
    <h2 class="py-4 d-inline-block mt-5"># Gestion de Estudiantes Inscritos</h2>

    <h5 class="d-block w-50 pb-4"><strong>NOTA:</strong> Podras Cambiar el estado a Egresado en el caso de que el estudiante quiera retirarse del institute Academy.</h5>

    <form class="form-inline pb-3 my-lg-0" action="<?=base_url?>inscripcion/buscador_e" method="POST">
      <input class="form-control mr-sm-2 " style="font-size: 16px;" type="search" name="nombre" placeholder="Estudiante o Estado" aria-label="Search">
      <button class="btn btn-primary my-2 my-sm-0 p-2" style="min-width: 50px; border-radius: 5px; font-size: 16px;" type="submit"><i style="border-radius: 500px;" class="fa fa-search"></i></button>
    </form>

    <?php if(isset($_SESSION['search_m']) && $_SESSION['search_m'] == 'failed'): ?>
        <div class="alert alert-danger w-50 mx-auto" role="alert">
            <strong>Error!, No se encuentran resultados con lo que deseas Buscar..</strong>
        </div>
        <?php endif;?>
    <?php Utils::delete_session('search_m') ?>

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
        
            <?php while ($estudiante = $estudiantes->fetch_object()):?>
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
        

    </table>
</div>
<?php else : ?>
    <div class="card text-center" style="margin-top: 150px;">
        <div class="card-header" style="font-size: 25px;">
            Registros Vacios..
        </div>
        <div class="card-body">
            <h5 class="card-title">Gestion de Inscripcion de Estudiantes Ingresado</h5>
            <p class="card-text py-3">Por los Momentos Ningun Estudiante ha sido Ingresado</p>
        </div>
        <div class="card-footer text-muted">
            &copy; 2020 Institute Academy | INAC
        </div>
    </div>
<?php endif; ?>