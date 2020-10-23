<form action="<?=base_url?>usuario/authentication" method="POST" class="form-signin">
<?php if(isset($_SESSION['error_login']) && $_SESSION['error_login'] == 'failed'):?>
<div class="alert alert-danger " role="alert">
 <strong>Error!, Los Credenciales que Insertaste No Coinciden con los Datos que tenemos Registrados, Por favor, Introduce los Datos con los que te Inscribiste.</strong>
</div>
<?php endif;?>
<?php Utils::delete_session('error_login')?>
  <div class="text-center mb-4">
    <h1 class="h3 mb-3 font-weight-normal">Inicia Sesion</h1>
    <p>Inicia con tu Cedula para Realizar los pagos, para que tus hijos puedan ser ingresados en el Institute Academy. <a href="https://caniuse.com/#feat=css-placeholder-shown">¿No te has inscrito?, Inscribite Aqui!</a></p>
  </div>

  <div class="form-label-group">
    <input type="text" id="inputEmail" name="username" class="form-control" placeholder="Cedula" autofocus>
    <label for="inputEmail">Cedula</label>
  </div>

  <button class="btn btn-lg btn-primary btn-block" style="font-size: 20px;" type="submit">Entrar</button>
  <p class="mt-5 mb-3 text-muted text-center">&copy; 2020 Institute Academy | INAC</p>
</form>