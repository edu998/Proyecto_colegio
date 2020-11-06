<div class="container mt-5">
<h2 class="py-4 d-inline-block mt-5">Resultados de: '<?=$nombre?>'<a href="<?=base_url?>pago/control_pagos" style="font-size: 17px;" class="btn btn-primary btn-sm ml-3">Ver Todos los Pagos</a></h2>
<div class="d-flex justify-content-center mb-3">
    <form class="form-inline pb-3 my-lg-0" action="<?=base_url?>pago/buscador_pago" method="POST">
      <input class="form-control mr-sm-2" style="font-size: 16px;" type="search" name="nombre" placeholder="Busca lo que sea" aria-label="Search">
      <button class="btn btn-primary my-2 my-sm-0 p-2" style="min-width: 50px; border-radius: 5px; font-size: 16px;" type="submit"><i style="border-radius: 500px;" class="fa fa-search"></i></button>
    </form>

    <form class="form-inline pb-3 my-lg-0" action="<?=base_url?>pago/buscador_fecha" method="POST">
      <input class="form-control mr-sm-2" style="font-size: 16px;" type="date" name="nombre" placeholder="Busca lo que sea" aria-label="Search">
      <button class="btn btn-primary my-2 my-sm-0 p-2" style="min-width: 50px; border-radius: 5px; font-size: 16px;" type="submit"><i style="border-radius: 500px;" class="fa fa-search"></i></button>
    </form>
</div>
    <table class="table table-striped text-center">
        <tr class="thead-dark">
            <th scope="col">Status</th>
            <th scope="col">Cedula</th>
            <th scope="col">Estudiante</th>
            <th scope="col">Tipo de Pago</th>
            <th scope="col">Pago</th>
            <th scope="col">Fecha</th>
        </tr>
        <?php if(!empty($pagos)):
            while($pago = $pagos->fetch_object()):
            ?>
            <tr>
                <td> <a style="font-size: 20px;" href="<?=base_url?>pago/delete&id=<?=$pago->cp_id?>"><i class="fa fa-trash-o text-danger mr-2" aria-hidden="true"></i></a> <a href="<?=base_url?>pago/detail&id=<?=$pago->cp_id?>"><i class="fa fa-info-circle mr-2" style="font-size: 21px;" aria-hidden="true"></i></a> <?=$pago->status?></td>
                <td><?=$pago->cedula?></td>
                <td><?=$pago->estudiante?></td>
                <td><?=$pago->tipo_pago?></td>
                <td><?=$pago->nombre_pago?></td>
                <td><?=$pago->fecha?></td>
            </tr>
            <?php endwhile;
                endif;
            ?>
    </table>
</div>