<div class="container mt-5">
    <h2 class="py-4 d-inline-block mt-5"># Gestion de Niveles <a href="<?=base_url?>nivel/create" style="font-size: 17px;" class="btn btn-primary btn-sm ml-2">Registrar Nivel</a></h2>

    <?php if (isset($_SESSION['nivel_d']) && $_SESSION['nivel_d'] == 'success') : ?>
        <div class="alert alert-success w-50 mx-auto" role="alert">
            <strong>Se ha Borrado Correctamente</strong>
        </div>
    <?php elseif(isset($_SESSION['nivel_d']) && $_SESSION['nivel_d'] != 'success'): ?>
        <div class="alert alert-danger w-50 mx-auto" role="alert">
            <strong>Error!, Al Borrar este nivel..</strong>
        </div>
        <?php endif;?>
    <?php Utils::delete_session('nivel_d') ?>

    <table class="table table-striped text-center">
        <tr class="thead-dark">
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Tipo</th>
            <th scope="col">Numero</th>
        </tr>
            <?php if(isset($niveles) && !empty($niveles)):?>
            <?php while($nivel = $niveles->fetch_object()):?>
                <tr>
            <td> <a style="font-size: 20px;" href="<?=base_url?>nivel/delete&id=<?=$nivel->id?>"><i class="fa fa-trash-o text-danger mr-2" aria-hidden="true"></i></a><?=$nivel->id?></td>
            <td><?=$nivel->nombre?></td>
            <td><?=$nivel->tipo?></td>
            <?php if($nivel->tipo == 'Grado'):?>
            <td><?=$nivel->numero_tipo?>°</td>
            <?php else:?>
                <td><?=$nivel->numero_tipo?> Año</td>
            <?php endif;?>
            </tr>
                <?php endwhile;?>
            <?php endif;?>
        
    </table>
</div>