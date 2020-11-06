<?php if (isset($profesores) && !empty($profesores)) : ?>
<div class="container mt-5">
    <h2 class="py-4 d-inline-block mt-5"># Gestion de Profesores <a href="<?= base_url ?>usuario/register" style="font-size: 17px;" class="btn btn-primary btn-sm ml-2">Registrar Profesor</a></h2>

    <h5 class="d-block w-50 pb-4"><strong>NOTA:</strong> Los Profesores solo se Podran Borrar si y solo si no tienen ninguna materia asignada de lo contrario se eliminira ambos registros y no aparecera tanto en el control de materias como en gestion de profesores, Si editas en ambas registros apareceran con el nombre Actualizado.</h5>

    <form class="form-inline pb-3 my-lg-0" action="<?=base_url?>usuario/buscador_usuario" method="POST">
      <input class="form-control mr-sm-2" style="font-size: 16px;" type="search" name="nombre" placeholder="Buscar Por Profesor" aria-label="Search">
      <button class="btn btn-primary my-2 my-sm-0 p-2" style="min-width: 50px; border-radius: 5px; font-size: 16px;" type="submit"><i style="border-radius: 500px;" class="fa fa-search"></i></button>
    </form>

    <?php if (isset($_SESSION['usuario']) && $_SESSION['usuario'] == 'success') : ?>
        <div class="alert alert-success w-50 mx-auto" role="alert">
            <strong>Se ha Borrado Correctamente</strong>
        </div>
    <?php elseif(isset($_SESSION['usuario']) && $_SESSION['usuario'] != 'success'): ?>
        <div class="alert alert-danger w-50 mx-auto" role="alert">
            <strong>Error!, Al Borrar este Usuario..</strong>
        </div>
        <?php endif;?>
    <?php Utils::delete_session('usuario') ?>

    <?php if (isset($_SESSION['not_found']) && $_SESSION['not_found'] == 'failed') : ?>
        <div class="alert alert-danger w-50 mx-auto" role="alert">
            <strong>Error!, El usuario No existe..</strong>
        </div>
    <?php endif; ?>
    <?php Utils::delete_session('not_found') ?>

    <?php if (isset($_SESSION['search_m']) && $_SESSION['search_m'] == 'failed') : ?>
        <div class="alert alert-danger w-50 mx-auto" role="alert">
            <strong>Error!, No se encuentran resultados con lo que deseas Buscar..</strong>
        </div>
    <?php endif; ?>
    <?php Utils::delete_session('search_m') ?>

    <table class="table table-striped text-center">
        <tr class="thead-dark">
            <th scope="col">Cedula</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Telefono</th>
            <th scope="col">Email</th>
        </tr>
        
            <?php while ($profesor = $profesores->fetch_object()) :
                if ($profesor->role != 'admin') :
            ?>
                    <tr>
                        <td> <a style="font-size: 20px;" href="<?=base_url?>usuario/edit&id=<?=$profesor->id?>"><i class="fa fa-pencil-square-o text-warning mr-2" aria-hidden="true"></i></a> <a style="font-size: 20px;" href="<?=base_url?>usuario/delete&id=<?=$profesor->id?>"><i class="fa fa-trash-o text-danger mr-2" aria-hidden="true"></i></a> <a href="<?= base_url ?>usuario/detail&id=<?= $profesor->id ?>"><i class="fa fa-info-circle mr-2" style="font-size: 21px;" aria-hidden="true"></i></a> <?= $profesor->cedula ?></td>
                        <td><?= $profesor->primer_nombre ?></td>
                        <td><?= $profesor->primer_apellido ?></td>
                        <td><?= $profesor->telefono_celular ?></td>
                        <td><?= $profesor->email ?></td>
                    </tr>
                <?php endif; ?>
            <?php endwhile; ?>

    </table>
</div>

<?php else : ?>
    <div class="card text-center" style="margin-top: 150px;">
        <div class="card-header" style="font-size: 25px;">
            Registros Vacios..
        </div>
        <div class="card-body">
            <h5 class="card-title">Registro de Profesores </h5>
            <p class="card-text py-3">Registra los Profesores para el Institute Academy, Para registrar los datos debes presionar en el boton de Abajo!</p>
            <a href="<?= base_url ?>usuario/register" class="btn btn-primary">Registrar Profesores</a>
        </div>
        <div class="card-footer text-muted">
            &copy; 2020 Institute Academy | INAC
        </div>
    </div>
<?php endif; ?>