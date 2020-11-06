<?php if(isset($materias) && !empty($materias)):?>
<div class="container mt-5">
    <h2 class="py-4 d-inline-block mt-5"># Gestion de Materias <a href="<?=base_url?>materia/create" style="font-size: 17px;" class="btn btn-primary btn-sm ml-2">Registrar Materias</a></h2>

    

    <h5 class="d-block w-50 pb-4"><strong>NOTA:</strong> Las Materias solo se Podran Borrar si y solo si no tienen ningun profesor asignado de lo contrario se eliminira ambos registros y no aparecera tanto en el control de materias como en gestion de materias, Si editas en ambas registros apareceran con el nombre Actualizado.</h5>
    <div class="container">

    <form class="form-inline pb-3 my-lg-0" action="<?=base_url?>materia/buscador_materia" method="POST">
      <input class="form-control mr-sm-2" style="font-size: 16px;" type="search" name="nombre" placeholder="Buscar Por Materia" aria-label="Search">
      <button class="btn btn-primary my-2 my-sm-0 p-2" style="min-width: 50px; border-radius: 5px; font-size: 16px;" type="submit"><i style="border-radius: 500px;" class="fa fa-search"></i></button>
    </form>

    </div>
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

    <?php if(isset($_SESSION['search_m']) && $_SESSION['search_m'] == 'failed'): ?>
        <div class="alert alert-danger w-50 mx-auto" role="alert">
            <strong>Error!, No se encuentran resultados con lo que deseas Buscar..</strong>
        </div>
        <?php endif;?>
    <?php Utils::delete_session('search_m') ?>

    <table class="table table-striped text-center">
        <tr class="thead-dark">
            <th scope="col">#</th>
            <th scope="col">Materia</th>
        </tr>
            
            <?php while($materia = $materias->fetch_object()):?>
                <tr>
            <td> <a style="font-size: 20px;" href="<?=base_url?>materia/edit&id=<?=$materia->id?>"><i class="fa fa-pencil-square-o text-warning mr-2" aria-hidden="true"></i></a> <a style="font-size: 20px;" href="<?=base_url?>materia/delete&id=<?=$materia->id?>"><i class="fa fa-trash-o text-danger mr-2" aria-hidden="true"></i></a> <?=$materia->id?></td>
            <td><?=$materia->nombre?></td>
            </tr>
                <?php endwhile;?>
        
    </table>
</div>

<?php else : ?>
    <div class="card text-center" style="margin-top: 150px;">
        <div class="card-header" style="font-size: 25px;">
            Registros Vacios..
        </div>
        <div class="card-body">
            <h5 class="card-title">Registro de Materias </h5>
            <p class="card-text py-3">Registra las Materias para el Institute Academy, Para registrar los datos debes presionar en el boton de Abajo!</p>
            <a href="<?= base_url ?>materia/create" class="btn btn-primary">Registrar Materias</a>
        </div>
        <div class="card-footer text-muted">
            &copy; 2020 Institute Academy | INAC
        </div>
    </div>
<?php endif; ?>