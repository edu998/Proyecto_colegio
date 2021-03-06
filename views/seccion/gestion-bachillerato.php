<?php if (isset($secciones) && !empty($secciones)) : ?>
<div class="container pt-5">
    <h2 class="py-4 mt-5 text-center">Bachillerato</h2>
    <div class="d-flex justify-content-center mb-3">
    <form class="form-inline pb-3 my-lg-0" action="<?= base_url ?>seccion/buscador_seccion" method="POST">
        <h4>Ordenar por:</h4>
        <div class="form-group ml-3">
            <label for="exampleFormControlSelect2">Niveles:</label>
            <select class="form-control p-0 ml-1" name="nivel_id" id="exampleFormControlSelect2">
                <?php $niveles = Utils::showNiveles();
                if (!empty($niveles)) :
                    while ($nivel = $niveles->fetch_object()) :
                        if ($nivel->tipo == 'Año') :
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
    
    <form class="form-inline pb-3 my-lg-0 ml-5" action="<?=base_url?>seccion/buscador_estudiante" method="POST">
      <input class="form-control mr-sm-2" style="font-size: 16px;" type="search" name="nombre" placeholder="Buscar Estudiante" aria-label="Search">
      <button class="btn btn-primary my-2 my-sm-0 p-2" style="min-width: 50px; border-radius: 5px; font-size: 16px;" type="submit"><i style="border-radius: 500px;" class="fa fa-search"></i></button>
    </form>
    </div>
    <?php if (isset($_SESSION['seccion']) && $_SESSION['seccion'] == 'success') : ?>
        <div class="alert alert-success w-50 mx-auto" role="alert">
            <strong>Se le ha Asignado la Seccion Al estudiante Correctamente!</strong>
        </div>
    <?php elseif (isset($_SESSION['seccion']) && $_SESSION['seccion'] != 'success') : ?>
        <div class="alert alert-danger w-50 mx-auto" role="alert">
            <strong>Error!, Al Asignar esta seccion</strong>
        <?php endif; ?>
        </div>
        <?php Utils::delete_session('seccion') ?>

        <?php if (isset($_SESSION['estado']) && $_SESSION['estado'] == 'success') : ?>
            <div class="alert alert-success w-50 mx-auto" role="alert">
                <strong>Se ha Cambiado la Seccion Correctamente</strong>
            </div>
        <?php elseif (isset($_SESSION['estado']) && $_SESSION['estado'] != 'success') : ?>
            <div class="alert alert-danger w-50 mx-auto" role="alert">
                <strong>Error!, al Cambiar la Seccion..</strong>
            <?php endif; ?>
            </div>
            <?php Utils::delete_session('estado') ?>

            <?php if (isset($_SESSION['search_m']) && $_SESSION['search_m'] == 'failed') : ?>
                <div class="alert alert-danger w-50 mx-auto" role="alert">
                    <strong>Error!, No se encuentran resultados con lo que deseas Buscar..</strong>
                </div>
            <?php endif; ?>
            <?php Utils::delete_session('search_m') ?>

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
                
                    <?php while ($seccion = $secciones->fetch_object()) :
                        if ($seccion->nivel == 'Bachillerato') :
                    ?>
                            <tr>
                                <td> <a href="<?= base_url ?>seccion/detail&id=<?= $seccion->id ?>"><i class="fa fa-info-circle mr-2" style="font-size: 21px;" aria-hidden="true"></i></a> <?= $seccion->numero ?></td>
                                <td><?= $seccion->tipo ?></td>
                                <?php
                                $seccion_e = Utils::showSeccion($seccion->id);
                                if (!empty($seccion_e) && is_object($seccion_e)) : ?>
                                    <td><?= $seccion_e->nombre_seccion ?></td>
                                <?php else : ?>
                                    <td>
                                        <form action="<?= base_url ?>seccion/save_b" method="POST">
                                            <input type="hidden" name="estudiante_id" value="<?= $seccion->id ?>">
                                            A <input type="radio" name="nombre_seccion" value="A">
                                            B <input type="radio" name="nombre_seccion" value="B">
                                            <?php echo isset($_SESSION['errors']) ? Utils::showError($_SESSION['errors'], 'nombre_seccion') : '' ?>
                                            <button type="submit"><i style="font-size: 20px;" class="fa fa-check-square-o" aria-hidden="true"></i></button>
                                        </form>
                                        <?php Utils::delete_session('errors') ?>
                                    </td>
                                <?php endif; ?>
                                <td><?= $seccion->cedula ?></td>
                                <td><?= $seccion->primer_nombre ?></td>
                                <td><?= $seccion->segundo_nombre ?></td>
                                <td><?= $seccion->primer_apellido ?></td>
                                <td><?= $seccion->segundo_apellido ?></td>
                            </tr>
                        <?php endif; ?>
                    <?php endwhile; ?>

            </table>

</div>
<?php else : ?>
    <div class="card text-center" style="margin-top: 150px;">
        <div class="card-header" style="font-size: 25px;">
            Registros Vacios..
        </div>
        <div class="card-body">
            <h5 class="card-title">Asigancion de Secciones a los Estudiantes</h5>
            <p class="card-text py-3">Por los Momentos Ningun Estudiante ha sido Ingresado</p>
        </div>
        <div class="card-footer text-muted">
            &copy; 2020 Institute Academy | INAC
        </div>
    </div>
<?php endif; ?>