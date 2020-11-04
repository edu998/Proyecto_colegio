<div class="container mt-5">
    <h2 class="py-4 d-inline-block mt-5"># Gestion de Materias <a href="<?=base_url?>materia/create" style="font-size: 17px;" class="btn btn-primary btn-sm ml-2">Registrar Materias</a></h2>

    <h5 class="d-block w-50 pb-4"><strong>NOTA:</strong> Las Materias solo se Podran Borrar si y solo si no tienen ningun profesor asignado de lo contrario se eliminira ambos registros y no aparecera tanto en el control de materias como en gestion de materias, Si editas en ambas registros apareceran con el nombre Actualizado.</h5>

    <?php if (isset($_SESSION['materia_d']) && $_SESSION['materia_d'] == 'success') : ?>
        <div class="alert alert-success w-50 mx-auto" role="alert">
            <strong>Se ha Borrado Correctamente</strong>
        </div>
    <?php elseif(isset($_SESSION['materia_d']) && $_SESSION['materia_d'] != 'success'): ?>
        <div class="alert alert-danger w-50 mx-auto" role="alert">
            <strong>Error!, Al Borrar esta materia..</strong>
        </div>
        <?php endif;?>
    <?php Utils::delete_session('materia_d') ?>

    <table class="table table-striped text-center">
        <tr class="thead-dark">
            <th scope="col">#</th>
            <th scope="col">Materia</th>
        </tr>
            <?php if(isset($materias) && !empty($materias)):?>
            <?php while($materia = $materias->fetch_object()):?>
                <tr>
            <td> <a style="font-size: 20px;" href="<?=base_url?>materia/edit&id=<?=$materia->id?>"><i class="fa fa-pencil-square-o text-warning mr-2" aria-hidden="true"></i></a> <a style="font-size: 20px;" href="<?=base_url?>materia/delete&id=<?=$materia->id?>"><i class="fa fa-trash-o text-danger mr-2" aria-hidden="true"></i></a> <?=$materia->id?></td>
            <td><?=$materia->nombre?></td>
            </tr>
                <?php endwhile;?>
            <?php endif;?>
        
    </table>
</div>