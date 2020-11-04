<div class="container mt-5">
    <h2 class="py-4 d-inline-block mt-5"># Gestion de Profesores <a href="<?= base_url ?>usuario/register" style="font-size: 17px;" class="btn btn-primary btn-sm ml-2">Registrar Profesor</a></h2>

    <h5 class="d-block w-50 pb-4"><strong>NOTA:</strong> Los Profesores solo se Podran Borrar si y solo si no tienen ninguna materia asignada de lo contrario se eliminira ambos registros y no aparecera tanto en el control de materias como en gestion de profesores, Si editas en ambas registros apareceran con el nombre Actualizado.</h5>

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

    <table class="table table-striped text-center">
        <tr class="thead-dark">
            <th scope="col">Cedula</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Telefono</th>
            <th scope="col">Email</th>
        </tr>
        <?php if (isset($profesores) && !empty($profesores)) : ?>
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
        <?php endif; ?>

    </table>
</div>