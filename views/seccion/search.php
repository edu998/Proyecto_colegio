<div class="container mt-5">
    <h2 class="py-4 d-inline-block mt-5"># Control de Secciones del Institute Academy <a href="<?= base_url ?>seccion/control_secciones" class="btn btn-primary">Ver Todas las secciones</a> </h2>

    <form class="form-inline pb-3 my-lg-0" action="<?= base_url ?>seccion/buscador_nivel" method="POST">
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

    <table class="table table-striped text-center container">

        <tr class="thead-dark">
            <th scope="col">Cedula</th>
            <th scope="col">Nombres</th>
            <th scope="col">Apellidos</th>
        </tr>

        <?php while ($estudiante = $estudiantes->fetch_object()) :
        ?>
            <tr>
                <td><?= $estudiante->cedula ?></td>
                <td><?= $estudiante->nombres ?></td>
                <td><?= $estudiante->apellidos ?></td>
            </tr>
        <?php endwhile; ?>

    </table>

</div>