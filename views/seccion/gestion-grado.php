<div class="container pt-5">
    <h2 class="py-4 mt-5 text-center">Primaria</h2>
    <?php if (isset($_SESSION['seccion_g']) && $_SESSION['seccion_g'] == 'success') : ?>
        <div class="alert alert-success w-50 mx-auto" role="alert">
            <strong>Se le ha Asignado la Seccion Al estudiante Correctamente!</strong>
        </div>
    <?php elseif (isset($_SESSION['seccion_g']) && $_SESSION['seccion_g'] != 'success') : ?>
        <div class="alert alert-danger w-50 mx-auto" role="alert">
            <strong>Error!, Al Asignar esta seccion</strong>
        <?php endif; ?>
        </div>
        <?php Utils::delete_session('seccion_g') ?>
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
                            <td><?= $grado->numero ?></td>
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