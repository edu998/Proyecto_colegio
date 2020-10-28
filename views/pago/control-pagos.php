<div class="container mt-5">
    <h2 class="py-4 d-inline-block mt-5"># Control de Pagos del Institute Academy</h2>


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
                <td> <a href="#"><i class="fa fa-info-circle mr-2" style="font-size: 21px;" aria-hidden="true"></i></a> <?=$pago->status?></td>
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