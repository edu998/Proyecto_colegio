<div class="container mt-5">
    <h2 class="py-4 d-inline-block mt-5"># Gestion de Profesores <a href="<?= base_url ?>usuario/register" style="font-size: 17px;" class="btn btn-primary btn-sm ml-2">Registrar Profesor</a></h2>

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
                        <td> <a href="<?= base_url ?>usuario/detail&id=<?= $profesor->id ?>"><i class="fa fa-info-circle mr-2" style="font-size: 21px;" aria-hidden="true"></i></a> <?= $profesor->cedula ?></td>
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