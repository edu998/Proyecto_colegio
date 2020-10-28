<form action="<?= base_url ?>pago/save_t" method="POST" class="form-signin" enctype="multipart/form-data">
    <?php if (isset($_SESSION['transferencia']) && $_SESSION['transferencia'] == 'success') : ?>
        <div class="alert alert-success" role="alert">
            <strong>Felicidades, ya estas Inscrito, Dirigete al Institute Academy Para Mas Informacion..</strong>
        </div>
    <?php elseif (isset($_SESSION['transferencia']) && $_SESSION['transferencia'] != 'success') : ?>
        <div class="alert alert-danger" role="alert">
            <strong>Error!, al Registrar estos Datos...</strong>
        <?php endif; ?>
        </div>
        <?php Utils::delete_session('transferencia') ?>

        <?php if (!empty($nombre_pago) && !empty($tipo_pago)) : ?>
            <div class="text-center mb-4">
                <h1 class="h3 mb-3 font-weight-normal">Realizar Pago de <?= $nombre_pago ?></h1>
                <div class="alert alert-warning">
                <p class="text-dark text-center">Debes Transferir a esta Cuenta:</p>
                    <ul class="text-left">
                        <li>Banco: Provincial</li>
                        <li>Cuenta a Debitar: 010812-51251-2134124-124</li>
                        <li>Nombre: Institute Academy</li>
                        <li>C.I: V-10674894</li>
                        <li>email: institute_academy@gmail.com</li>
                        <li>Monto a Pagar: 75 mil pesos</li>
                    </ul>
                
                </div>
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Tipo de Pago: </label>
                <select class="form-control p-0" name="tipo_pago" id="exampleFormControlSelect1">
                    <option value="<?=$tipo_pago?>"><?=$tipo_pago?></option>
                </select>
            </div>

            <div class="form-group">
                <textarea id="inputDescripcion" name="descripcion" class="form-control" placeholder="Por favor, Debes Describir Lo que vas a Realizar"></textarea>
                <?php echo isset($_SESSION['errors']) ? Utils::showError($_SESSION['errors'], 'descripcion') : '' ?>
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect2">Pago a Realizar: </label>
                <select class="form-control p-0" name="nombre_pago" id="exampleFormControlSelect2">
                    <option value="<?=$nombre_pago?>">Pago de <?=$nombre_pago?></option>
                </select>
            </div>

            <div class="form-group">
                <label for="inputTransferencia">Por favor, Inserta Aqui El comprobante:</label>
                <input type="file" id="inputTransferencia" name="transferencia" class="form-control">
                <?php echo isset($_SESSION['errors']) ? Utils::showError($_SESSION['errors'], 'transferencia') : '' ?>
            </div>

        <?php endif; ?>
        <button class="btn btn-lg btn-primary btn-block" style="font-size: 20px;" type="submit">Realizar</button>
        <p class="mt-5 mb-3 text-muted text-center">&copy; 2020 Institute Academy | INAC</p>
        <?php Utils::delete_session('errors') ?>
</form>