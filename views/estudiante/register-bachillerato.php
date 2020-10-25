<form action="<?= base_url ?>estudiante/save_b" method="POST" class="form-signin">
<?php if (isset($_SESSION['estudiante_b']) && $_SESSION['estudiante_b'] == 'success') : ?>
    <div class="alert alert-success" role="alert">
      <strong>Tus Datos Han Sido Registrados, Para Completar la Inscripcion a nuestro Institute Academy Debes Realizar el Pago, Para eso Inicia Sesion <a href="<?= base_url ?>usuario/login">Aqui!</a></strong>
    </div>
  <?php elseif (isset($_SESSION['estudiante_b']) && $_SESSION['nivel'] != 'estudiante_b') : ?>
    <div class="alert alert-danger" role="alert">
      <strong>Error!, al Inscribirte con Estos Datos o Los Datos Cedula o Email ya existen..</strong>
    <?php endif; ?>
    </div>
    <?php Utils::delete_session('estudiante_b') ?>   
        
<div class="text-center mb-4">
      <h1 class="h3 mb-3 font-weight-normal">Inscribete en Institute Academy</h1>
      <p class="text-secondary">Inscribite en nuestro instituto y disfruta de la mejor experiencia y mejor nivel academico en cada area.</p>
      <div class="alert alert-warning" role="alert">
      <strong class="text-center py-2" style="font-size: 17px;"> Debes Ingresar Lo siguiente:
      </strong>    
      <ul style="text-align: left;">
                <li>La cedula debe ser de 8 digitos</li>
                <li>Debes seleccion el Nivel en el cual vas a estar inscrito en el sistema</li>
                <li>los nombres y apellidos deben ser letras ya sean minusculas o mayusculas</li>
                <li>el telefono celular debe ser numero y de 11 digitos</li>
                <li>el email debe contener el '@' y el '.com'</li>
                <li>todos los campos son requeridos</li>
         </ul>
    
    </div>
    </div>

    <div class="form-label-group">
      <input type="text" id="inputCedula" name="cedula" class="form-control" placeholder="ejemplo: 12345678" autofocus>
      <label for="inputCedula">ejemplo: 12345678</label>
      <?php echo isset($_SESSION['errors']) ? Utils::showError($_SESSION['errors'], 'cedula') : '' ?>
    </div>

    <div class="form-group">
        <label for="exampleFormControlSelect2">Selecciona el Nivel (A continuacion selecciona el Año o Grado en el cual vas a Inscribirte):</label>
        <select class="form-control p-0" name="nivel_id" id="exampleFormControlSelect2">
        <?php $niveles = Utils::showNiveles();
            if (!empty($niveles)) :
                while ($nivel = $niveles->fetch_object()) :
                if($nivel->tipo == 'Año'):
            ?>
                    <option value="<?=$nivel->id?>"><?=$nivel->numero_tipo?> <?=$nivel->tipo?></option>
                <?php endif;?>
                <?php endwhile; ?>
            <?php endif; ?>
        </select>
    </div>

    <div class="form-label-group">
      <input type="text" id="inputPrimerNombre" name="primer_nombre" class="form-control" placeholder="Primer Nombre">
      <label for="inputPrimerNombre">Primer Nombre</label>
      <?php echo isset($_SESSION['errors']) ? Utils::showError($_SESSION['errors'], 'primer_nombre') : '' ?>
    </div>

    <div class="form-label-group">
      <input type="text" id="inputSegundoNombre" name="segundo_nombre" class="form-control" placeholder="Segundo Nombre">
      <label for="inputSegundoNombre">Segundo Nombre</label>
      <?php echo isset($_SESSION['errors']) ? Utils::showError($_SESSION['errors'], 'segundo_nombre') : '' ?>
    </div>

    <div class="form-label-group">
      <input type="text" id="inputPrimerApellido" name="primer_apellido" class="form-control" placeholder="Primer Apellido">
      <label for="inputPrimerApellido">Primer Apellido</label>
      <?php echo isset($_SESSION['errors']) ? Utils::showError($_SESSION['errors'], 'primer_apellido') : '' ?>
    </div>

    <div class="form-label-group">
      <input type="text" id="inputSegundoApellido" name="segundo_apellido" class="form-control" placeholder="Segundo Apellido">
      <label for="inputSegundoApellido">Segundo Apellido</label>
      <?php echo isset($_SESSION['errors']) ? Utils::showError($_SESSION['errors'], 'segundo_apellido') : '' ?>
    </div>

    <div class="form-label-group">
      <input type="text" id="inputTelefonoCelular" name="telefono_celular" class="form-control" placeholder="ejemplo: 04142345678">
      <label for="inputTelefonoCelular">ejemplo: 04142345678</label>
      <?php echo isset($_SESSION['errors']) ? Utils::showError($_SESSION['errors'], 'telefono_celular') : '' ?>
    </div>

    <div class="form-label-group">
      <input type="email" id="inputEmail" name="email" class="form-control" placeholder="email@email.com">
      <label for="inputEmail">email@email.com</label>
      <?php echo isset($_SESSION['errors']) ? Utils::showError($_SESSION['errors'], 'email') : '' ?>
    </div>

    <div class="form-group">
      <label for="exampleFormControlSelect1">Seleccion el Sexo</label>
      <select class="form-control p-0" name="sexo" id="exampleFormControlSelect1">
        <option value="Masculino">Masculino</option>
        <option value="Femenino">Femenino</option>
      </select>
      <?php echo isset($_SESSION['errors']) ? Utils::showError($_SESSION['errors'], 'sexo') : '' ?>
    </div>

    <div class="form-label-group">
      <textarea id="inputDireccion" name="direccion" class="form-control" placeholder="Por Favor Inserta tu Direccion Mejor Resumida Posible.." autofocus></textarea>
      <?php echo isset($_SESSION['errors']) ? Utils::showError($_SESSION['errors'], 'direccion') : '' ?>
    </div>


    <button class="btn btn-lg btn-primary btn-block" style="font-size: 20px;" type="submit">Inscribirse</button>
    <p class="mt-5 mb-3 text-muted text-center">&copy; 2020 Institute Academy | INAC</p>
    <?php Utils::delete_session('errors') ?>
</form>