<div class="container mt-5">
    <h2 class="py-4 d-inline-block mt-5"># Gestion de Materias <a href="<?=base_url?>materia/create" style="font-size: 17px;" class="btn btn-primary btn-sm ml-2">Registrar Materias</a></h2>
    <table class="table table-striped text-center">
        <tr class="thead-dark">
            <th scope="col">#</th>
            <th scope="col">Materia</th>
        </tr>
            <?php if(isset($materias) && !empty($materias)):?>
            <?php while($materia = $materias->fetch_object()):?>
                <tr>
            <td><?=$materia->id?></td>
            <td><?=$materia->nombre?></td>
            </tr>
                <?php endwhile;?>
            <?php endif;?>
        
    </table>
</div>