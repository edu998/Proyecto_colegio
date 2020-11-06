<div class="container pt-5">
    <h2 class="py-4 mt-5 text-center">Primaria <a href="<?=base_url?>seccion/gestion_grado" class="btn btn-primary">Ver Todos</a></h2>

    <div class="d-flex justify-content-center mb-3">
    <form class="form-inline pb-3 my-lg-0" action="<?= base_url ?>seccion/buscador_seccion_p" method="POST">
        <h4>Ordenar por:</h4>
        <div class="form-group ml-3">
            <label for="exampleFormControlSelect2">Niveles:</label>
            <select class="form-control p-0 ml-1" name="nivel_id" id="exampleFormControlSelect2">
                <?php $niveles = Utils::showNiveles();
                if (!empty($niveles)) :
                    while ($nivel = $niveles->fetch_object()) :
                        if ($nivel->tipo == 'Grado') :
                ?>
                            <option value="<?= $nivel->id ?>"><?= $nivel->numero_tipo ?> <?= $nivel->tipo ?></option>
                        <?php endif; ?>
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
    
    <form class="form-inline pb-3 my-lg-0 ml-5" action="<?=base_url?>seccion/buscador_estudiante_p" method="POST">
      <input class="form-control mr-sm-2" style="font-size: 16px;" type="search" name="nombre" placeholder="Buscar Estudiante" aria-label="Search">
      <button class="btn btn-primary my-2 my-sm-0 p-2" style="min-width: 50px; border-radius: 5px; font-size: 16px;" type="submit"><i style="border-radius: 500px;" class="fa fa-search"></i></button>
    </form>
    </div>
            
        <table class="table table-striped text-center container">
            <tr class="thead-dark">
                <th scope="col">Numero</th>
                <th scope="col">Tipo</th>
                <th scope="col">Seccion</th>
                <th scope="col">Cedula</th>
                <th scope="col">Primer Nombre</th>
                <th scope="col">Segundo Nombre</th>
                <th scope="col">Primer Apellido</th>
                <th scope="col">Segundo Apellido</th>
            </tr>
            <?php if (isset($grados) && !empty($grados)) : ?>
                <?php while ($grado = $grados->fetch_object()) :
                    if ($grado->nivel == 'Primaria') :
                ?>
                        <tr>
                            <td> <a href="<?= base_url ?>seccion/detail&id=<?= $grado->id ?>"><i class="fa fa-info-circle mr-2" style="font-size: 21px;" aria-hidden="true"></i></a> <?= $grado->numero ?></td>
                            <td><?= $grado->tipo ?></td>
                            <?php
                            $seccion = Utils::showSeccion($grado->id);
                            if (!empty($seccion) && is_object($seccion)) : ?>
                                <td><?= $seccion->nombre_seccion ?></td>
                            <?php else : ?>
                                <td>
                                    <form action="<?= base_url ?>seccion/save_p" method="POST">
                                        <input type="hidden" name="estudiante_id" value="<?= $grado->id ?>">
                                        A <input type="radio" name="nombre_seccion" value="A">
                                        B <input type="radio" name="nombre_seccion" value="B">
                                        <?php echo isset($_SESSION['errors']) ? Utils::showError($_SESSION['errors'], 'nombre_seccion') : '' ?>
                                        <button type="submit"><i style="font-size: 20px;" class="fa fa-check-square-o" aria-hidden="true"></i></button>
                                    </form>
                                    <?php Utils::delete_session('errors') ?>
                                </td>
                            <?php endif; ?>
                            <td><?= $grado->cedula ?></td>
                            <td><?= $grado->primer_nombre ?></td>
                            <td><?= $grado->segundo_nombre ?></td>
                            <td><?= $grado->primer_apellido ?></td>
                            <td><?= $grado->segundo_apellido ?></td>
                        </tr>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>

        </table>

</div>