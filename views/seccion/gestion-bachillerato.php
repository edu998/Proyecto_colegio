<div class="container pt-5">
    <h2 class="py-4 mt-5 text-center">Bachillerato</h2>

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
        <?php if (isset($secciones) && !empty($secciones)) : ?>
            <?php while ($seccion = $secciones->fetch_object()) :
                if ($seccion->nivel == 'Bachillerato') :
            ?>
                    <tr>
                        <td><?=$seccion->numero?></td>
                        <td><?=$seccion->tipo?></td>
                    <?php 
                        $seccion_e = Utils::showSeccion($seccion->id);
                        if(!empty($seccion_e) && is_object($seccion_e)):?>
                        <td><?=$seccion_e->nombre_seccion?></td>
                        <?php else:?>
                        <td>
                            <form action="<?= base_url ?>seccion/save_b" method="POST">
                                <input type="hidden" name="estudiante_id" value="<?= $seccion->id ?>">
                                A <input type="radio" name="nombre_seccion" value="A">
                                B <input type="radio" name="nombre_seccion" value="B">
                                <?php echo isset($_SESSION['errors']) ? Utils::showError($_SESSION['errors'], 'nombre_seccion') : ''?>
                                <button type="submit"><i style="font-size: 20px;" class="fa fa-check-square-o" aria-hidden="true"></i></button>
                            </form>
                            <?php Utils::delete_session('errors')?>
                        </td>
                        <?php endif;?>
                        <td><?= $seccion->cedula ?></td>
                        <td><?= $seccion->primer_nombre ?></td>
                        <td><?= $seccion->segundo_nombre ?></td>
                        <td><?= $seccion->primer_apellido ?></td>
                        <td><?= $seccion->segundo_apellido ?></td>
                    </tr>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>

    </table>

</div>