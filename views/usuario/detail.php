<?php if (isset($usuario) && is_object($usuario)): ?>
<div class="container p-5" style="margin-top: 80px;">
    <a style="font-size: 18px;" href="<?= base_url ?>usuario/gestion_profesor"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</a>
    <div class="card text-center my-3">
        <div class="card-header">
            <h2 class="text-capitalize"><i style="font-size: 40px;" class="text-primary fa fa-user" aria-hidden="true"></i> Profesor/a: <?=$usuario->primer_nombre?> <?=$usuario->primer_apellido?></h2>
        </div>
        <div class="card-body">
                <h3 class="card-title py-2">Datos del Profesor:</h3>
                <h5 class="card-text my-2"><strong>Cedula de Identidad: </strong><?= $usuario->cedula ?></h5>
                <h5 class="card-text my-2"><strong>Primer Nombre: </strong><?= $usuario->primer_nombre ?></h5>
                <h5 class="card-text my-2"><strong>Segundo Nombre: </strong><?= $usuario->segundo_nombre ?></h5>
                <h5 class="card-text my-2"><strong>Primer Apellido: </strong><?= $usuario->primer_apellido ?></h5>
                <h5 class="card-text my-2"><strong>Segundo Apellido: </strong><?= $usuario->segundo_apellido ?></h5>
                <h5 class="card-text my-2"><strong>Telefono Celular: </strong><?= $usuario->telefono_celular ?></h5>
                <h5 class="card-text my-2"><strong>Email: </strong><?= $usuario->email ?></h5>
                <h5 class="card-text my-2"><strong>Sexo: </strong><?= $usuario->sexo ?></h5>
                <h5 class="card-text w-50 mx-auto my-2"><strong>Direccion o Localidad: </strong><?= $usuario->direccion ?></h5>
        <?php endif; ?>
            <div class="card-footer text-muted">
                <p class="mt-5 mb-3 text-muted text-center">&copy; 2020 Institute Academy | INAC</p>
            </div>
        </div>
    </div>
</div>