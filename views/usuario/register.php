<?php if(isset($usuario_o) && is_object($usuario_o)):?>
  <?php $url_action = base_url . 'usuario/save&id=' . $usuario_o->id?>
<?php else:?>
  <?php $url_action = base_url . 'usuario/save';?>
<?php endif;?>

<form action="<?= $url_action?>" method="POST" class="form-signin">
<?php if (isset($_SESSION['usuario']) && $_SESSION['usuario'] == 'success') : ?>
    <div class="alert alert-success" role="alert">
      <strong>El Profesor se ha Registrado Correctamente, Puedes <a href="<?= base_url ?>usuario/gestion_profesor">Verlo Aqui!</a></strong>
    </div>
  <?php elseif (isset($_SESSION['usuario']) && $_SESSION['usuario'] != 'success') : ?>
    <div class="alert alert-danger" role="alert">
      <strong>Error!, al Registrar este Profesor o Los Datos Cedula o Email ya existen</strong>
    <?php endif; ?>
    </div>
    <?php Utils::delete_session('usuario') ?>
    <div class="text-center mb-4">
      <h1 class="h3 mb-3 font-weight-normal">Registrar Profesores</h1>
      <div class="alert alert-warning" role="alert">
      <strong class="text-center py-2" style="font-size: 17px;"> Debes Ingresar Lo siguiente:
      </strong>    
      <ul style="text-align: left;">
                <li>La cedula debe ser de 8 digitos</li>
                <li>los nombres y apellidos deben ser letras ya sean minusculas o mayusculas</li>
                <li>el telefono celular debe ser numero y de 11 digitos</li>
                <li>el email debe contener el '@' y el '.com'</li>
                <li>todos los campos son requeridos</li>
         </ul>
    
    </div>
    </div>

    <div class="form-label-group">
      <input type="text" id="inputCedula" name="cedula" value="<?= isset($usuario_o) && is_object($usuario_o) ? $usuario_o->cedula : ''?>" class="form-control" placeholder="ejemplo: 12345678" autofocus>
      <label for="inputCedula">ejemplo: 12345678</label>
      <?php echo isset($_SESSION['errors']) ? Utils::showError($_SESSION['errors'], 'cedula') : '' ?>
    </div>

    <div class="form-label-group">
      <input type="text" id="inputPrimerNombre" name="primer_nombre" value="<?= isset($usuario_o) && is_object($usuario_o) ? $usuario_o->primer_nombre : ''?>" class="form-control" placeholder="Primer Nombre">
      <label for="inputPrimerNombre">Primer Nombre</label>
      <?php echo isset($_SESSION['errors']) ? Utils::showError($_SESSION['errors'], 'primer_nombre') : '' ?>
    </div>

    <div class="form-label-group">
      <input type="text" id="inputSegundoNombre" name="segundo_nombre" value="<?= isset($usuario_o) && is_object($usuario_o) ? $usuario_o->segundo_nombre : ''?>" class="form-control" placeholder="Segundo Nombre">
      <label for="inputSegundoNombre">Segundo Nombre</label>
      <?php echo isset($_SESSION['errors']) ? Utils::showError($_SESSION['errors'], 'segundo_nombre') : '' ?>
    </div>

    <div class="form-label-group">
      <input type="text" id="inputPrimerApellido" value="<?= isset($usuario_o) && is_object($usuario_o) ? $usuario_o->primer_apellido : ''?>" name="primer_apellido" class="form-control" placeholder="Primer Apellido">
      <label for="inputPrimerApellido">Primer Apellido</label>
      <?php echo isset($_SESSION['errors']) ? Utils::showError($_SESSION['errors'], 'primer_apellido') : '' ?>
    </div>

    <div class="form-label-group">
      <input type="text" id="inputSegundoApellido" value="<?= isset($usuario_o) && is_object($usuario_o) ? $usuario_o->segundo_apellido : ''?>" name="segundo_apellido" class="form-control" placeholder="Segundo Apellido">
      <label for="inputSegundoApellido">Segundo Apellido</label>
      <?php echo isset($_SESSION['errors']) ? Utils::showError($_SESSION['errors'], 'segundo_apellido') : '' ?>
    </div>

    <div class="form-label-group">
      <input type="text" id="inputTelefonoCelular" value="<?= isset($usuario_o) && is_object($usuario_o) ? $usuario_o->telefono_celular : ''?>" name="telefono_celular" class="form-control" placeholder="ejemplo: 04142345678">
      <label for="inputTelefonoCelular">ejemplo: 04142345678</label>
      <?php echo isset($_SESSION['errors']) ? Utils::showError($_SESSION['errors'], 'telefono_celular') : '' ?>
    </div>

    <div class="form-label-group">
      <input type="email" id="inputEmail" name="email" value="<?= isset($usuario_o) && is_object($usuario_o) ? $usuario_o->email : ''?>" class="form-control" placeholder="email@email.com">
      <label for="inputEmail">email@email.com</label>
      <?php echo isset($_SESSION['errors']) ? Utils::showError($_SESSION['errors'], 'email') : '' ?>
    </div>

    <div class="form-group">
      <label for="exampleFormControlSelect1">Seleccion el Sexo</label>
      <select class="form-control p-0" name="sexo"  id="exampleFormControlSelect1">
        <option value="Masculino" <?= isset($usuario_o) && $usuario_o->sexo == 'Masculino' ? 'selected' : ''?>>Masculino</option>
        <option value="Femenino" <?= isset($usuario_o) && $usuario_o->sexo == 'Femenino' ? 'selected' : ''?>>Femenino</option>
      </select>
      <?php echo isset($_SESSION['errors']) ? Utils::showError($_SESSION['errors'], 'sexo') : '' ?>
    </div>

    <div class="form-label-group">
      <textarea id="inputDireccion" name="direccion"  class="form-control" placeholder="Por Favor Inserta tu Direccion Mejor Resumida Posible.."><?=isset($usuario_o) && is_object($usuario_o) ? $usuario_o->direccion : ''?></textarea>
      <?php echo isset($_SESSION['errors']) ? Utils::showError($_SESSION['errors'], 'direccion') : '' ?>
    </div>


    <button class="btn btn-lg btn-primary btn-block" style="font-size: 20px;" type="submit">Registrar Profesor</button>
    <p class="mt-5 mb-3 text-muted text-center">&copy; 2020 Institute Academy | INAC</p>
    <?php Utils::delete_session('errors') ?>
</form>