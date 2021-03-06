<?php if(isset($pagos) && !empty($pagos)):?>
<div class="container mt-5">
    <h2 class="py-4 d-inline-block mt-5"># Control de Pagos del Institute Academy</h2>

    <div class="d-flex justify-content-center mb-3">
    <form class="form-inline pb-3 my-lg-0" action="<?=base_url?>pago/buscador_pago" method="POST">
      <input class="form-control mr-sm-2" style="font-size: 16px;" type="search" name="nombre" placeholder="Busca lo que sea" aria-label="Search">
      <button class="btn btn-primary my-2 my-sm-0 p-2" style="min-width: 50px; border-radius: 5px; font-size: 16px;" type="submit"><i style="border-radius: 500px;" class="fa fa-search"></i></button>
    </form>

    <form class="form-inline pb-3 my-lg-0 ml-5" action="<?=base_url?>pago/buscador_fecha" method="POST">
      <input class="form-control mr-sm-2" style="font-size: 16px;" type="date" name="nombre" placeholder="Busca lo que sea" aria-label="Search">
      <button class="btn btn-primary my-2 my-sm-0 p-2" style="min-width: 50px; border-radius: 5px; font-size: 16px;" type="submit"><i style="border-radius: 500px;" class="fa fa-search"></i></button>
    </form>
    </div>

    <table class="table table-striped text-center">
    <?php if (isset($_SESSION['delete_p']) && $_SESSION['delete_p'] == 'success') : ?>
    <div class="alert alert-success w-50 mx-auto" role="alert">
      <strong>Se ha Borrado Correctamente!</strong>
    </div>
  <?php elseif (isset($_SESSION['delete_p']) && $_SESSION['delete_p'] != 'success') : ?>
    <div class="alert alert-danger w-50 mx-auto" role="alert">
      <strong>Error!, al Borrar el pago.</strong>
    <?php endif; ?>
    </div>
    <?php Utils::delete_session('delete_p') ?>

    <?php if(isset($_SESSION['search_m']) && $_SESSION['search_m'] == 'failed'): ?>
        <div class="alert alert-danger w-50 mx-auto" role="alert">
            <strong>Error!, No se encuentran resultados con lo que deseas Buscar..</strong>
        </div>
        <?php endif;?>
    <?php Utils::delete_session('search_m') ?>


        <tr class="thead-dark">
            <th scope="col">Status</th>
            <th scope="col">Cedula</th>
            <th scope="col">Estudiante</th>
            <th scope="col">Tipo de Pago</th>
            <th scope="col">Pago</th>
            <th scope="col">Fecha</th>
        </tr>
            <?php while($pago = $pagos->fetch_object()):?>
            
            <tr>
                <td> <a style="font-size: 20px;" href="<?=base_url?>pago/delete&id=<?=$pago->cp_id?>"><i class="fa fa-trash-o text-danger mr-2" aria-hidden="true"></i></a> <a href="<?=base_url?>pago/detail&id=<?=$pago->cp_id?>"><i class="fa fa-info-circle mr-2" style="font-size: 21px;" aria-hidden="true"></i></a> <?=$pago->status?></td>
                <td><?=$pago->cedula?></td>
                <td><?=$pago->estudiante?></td>
                <td><?=$pago->tipo_pago?></td>
                <td><?=$pago->nombre_pago?></td>
                <td><?=$pago->fecha?></td>
            </tr>
            <?php endwhile;
            ?>
    </table>
</div>
<?php else : ?>
    <div class="card text-center" style="margin-top: 150px;">
        <div class="card-header" style="font-size: 25px;">
            Registros Vacios..
        </div>
        <div class="card-body">
            <h5 class="card-title">Control de Pagos </h5>
            <p class="card-text py-3">En estos Momentos No se ha Realizado Ningun tipo de Pago</p>
        </div>
        <div class="card-footer text-muted">
            &copy; 2020 Institute Academy | INAC
        </div>
    </div>
<?php endif; ?>