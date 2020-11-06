<div class="container mt-5">
    <h2 class="py-4 d-inline-block mt-5">Resultados de: '<?=$nombre?>'<a href="<?=base_url?>materia/gestion_materias" style="font-size: 17px;" class="btn btn-primary btn-sm ml-3">Ver Todas las Materias</a></h2>

    <table class="table table-striped text-center">
        <tr class="thead-dark">
            <th scope="col">#</th>
            <th scope="col">Materia</th>
        </tr>
            <?php if(isset($materias) && !empty($materias)):?>
            <?php while($materia = $materias->fetch_object()):?>
                <tr>
            <td> <a style="font-size: 20px;" href="<?=base_url?>materia/edit&id=<?=$materia->id?>"><i class="fa fa-pencil-square-o text-warning mr-2" aria-hidden="true"></i></a> <a style="font-size: 20px;" href="<?=base_url?>materia/delete&id=<?=$materia->id?>"><i class="fa fa-trash-o text-danger mr-2" aria-hidden="true"></i></a>  <?=$materia->id?></td>
            <td><?=$materia->nombre?></td>
            </tr>
                <?php endwhile;?>
            <?php endif;?>
        
    </table>
</div>