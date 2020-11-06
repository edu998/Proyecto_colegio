<div class="container mt-5">
    <h2 class="py-4 d-inline-block mt-5">Resultados de: '<?=$nombre?>'<a href="<?=base_url?>usuario/gestion_profesor" style="font-size: 17px;" class="btn btn-primary btn-sm ml-3">Ver Todos los Profesores</a></h2>

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