<div class="container mt-5">
    <h2 class="py-4 d-inline-block mt-5"># Control de Materias <a href="<?= base_url ?>controlm/control_materias" style="font-size: 17px;" class="btn btn-primary btn-sm ml-2">Ver todo el Registro</a></h2>
    <div class="d-flex justify-content-around mb-3">
    <form class="form-inline pb-3 my-lg-0" action="<?=base_url?>controlm/buscador_nivel" method="POST">
    <h4>Ordenar por:</h4>
    <div class="form-group ml-3">
            <label for="exampleFormControlSelect2">Niveles:</label>
            <select class="form-control p-0 ml-1" name="nivel_id" id="exampleFormControlSelect2">
                <?php $niveles = Utils::showNiveles();
                if (!empty($niveles)) :
                    while ($nivel = $niveles->fetch_object()) :
                ?>
                        <option value="<?= $nivel->id ?>"><?= $nivel->numero_tipo ?> <?= $nivel->tipo ?></option>
                    <?php endwhile; ?>
                <?php endif; ?>
            </select>
        </div>

        <div class="form-group ml-3">
            <label for="exampleFormControlSelect4">Secciones:</label>
            <select class="form-control p-0  ml-1" name="seccion" id="exampleFormControlSelect4">
                <option value="A">A</option>
                <option value="B">B</option>
            </select>
        </div>

      <button class="btn btn-primary my-2 my-sm-0 p-2 ml-2" style="min-width: 50px; border-radius: 5px; font-size: 16px;" type="submit"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i></button>
    </form>

    <form class="form-inline pb-3 my-lg-0" action="<?=base_url?>controlm/buscador_profesor" method="POST">
      <input class="form-control mr-sm-2" style="font-size: 16px;" type="search" name="nombre" placeholder="Profesor o Materia" aria-label="Search">
      <button class="btn btn-primary my-2 my-sm-0 p-2" style="min-width: 50px; border-radius: 5px; font-size: 16px;" type="submit"><i style="border-radius: 500px;" class="fa fa-search"></i></button>
    </form>

    <form class="form-inline pb-3 my-lg-0" action="<?=base_url?>controlm/buscador_horario" method="POST">
      <input class="form-control mr-sm-2" style="font-size: 16px;" type="time" name="nombre" placeholder="Buscar Por Horario" aria-label="Search">
      <button class="btn btn-primary my-2 my-sm-0 p-2" style="min-width: 50px; border-radius: 5px; font-size: 16px;" type="submit"><i style="border-radius: 500px;" class="fa fa-search"></i></button>
    </form>
    </div>
    <?php if (isset($_SESSION['control_m']) && $_SESSION['control_m'] == 'success') : ?>
        <div class="alert alert-success w-50 mx-auto" role="alert">
            <strong>Se ha Borrado Correctamente</strong>
        </div>
    <?php elseif(isset($_SESSION['control_m']) && $_SESSION['control_m'] != 'success'): ?>
        <div class="alert alert-danger w-50 mx-auto" role="alert">
            <strong>Error!, Al Borrar este registro..</strong>
        </div>
        <?php endif;?>
    <?php Utils::delete_session('control_m') ?>

    <table class="table table-striped text-center">
        <tr class="thead-dark">
            <th scope="col">Cedula</th>
            <th scope="col">Profesor</th>
            <th scope="col">Materia</th>
            <th scope="col">Nivel</th>
            <th scope="col">Seccion</th>
            <th scope="col">Dia</th>
            <th scope="col">Horario</th>
            
        </tr>
        <?php if (isset($materias_p) && !empty($materias_p)) : ?>
            <?php while ($materia_p = $materias_p->fetch_object()) : ?>
                <tr>
                    <td> <a style="font-size: 20px;" href="<?=base_url?>controlm/edit&id=<?=$materia_p->id?>"><i class="fa fa-pencil-square-o text-warning mr-2" aria-hidden="true"></i></a> <a style="font-size: 20px;" href="<?=base_url?>controlm/delete&id=<?=$materia_p->id?>"><i class="fa fa-trash-o text-danger mr-2" aria-hidden="true"></i></a> <?= $materia_p->cedula ?></td>
                    <td><?= $materia_p->profesor ?></td>
                    <td><?= $materia_p->materia ?></td>
                    <td><?= $materia_p->nivel ?></td>
                    <td><?= $materia_p->seccion ?></td>
                    <td><?=$materia_p->dia?></td>
                     <td><?= isset($materia_p->horario_desde) && $materia_p->horario_desde < 12 ? $materia_p->horario_desde . ' ' . 'am' : $materia_p->horario_desde . ' ' . 'pm' ?> - <?= isset($materia_p->horario_hasta) && $materia_p->horario_hasta < 12 ? $materia_p->horario_hasta . ' ' . 'am' : $materia_p->horario_hasta . ' ' . 'pm'  ?> </td>
                </tr>
            <?php endwhile; ?>
        <?php endif; ?>

    </table>
</div>