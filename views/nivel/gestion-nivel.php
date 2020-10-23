<div class="container mt-5">
    <h2 class="py-4 d-inline-block mt-5"># Gestion de Niveles <a href="<?=base_url?>nivel/create" style="font-size: 17px;" class="btn btn-primary btn-sm ml-2">Registrar Nivel</a></h2>
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
            <td><?=$nivel->id?></td>
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