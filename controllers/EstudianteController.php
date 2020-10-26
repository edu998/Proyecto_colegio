<?php 
require_once 'models/estudiante.php';
class EstudianteController{

    
    public function elige_nivel(){
        require_once 'views/nivel/elige-nivel.php';
    }

    public function inscripcion_primaria(){
        require_once 'views/estudiante/register-primaria.php';
    }

    public function inscripcion_bachillerato(){
        require_once 'views/estudiante/register-bachillerato.php';
    }

    public function save_p(){
        if(isset($_POST)){
            $cedula = isset($_POST['cedula']) ? $_POST['cedula'] : false;
            $nivel_id = isset($_POST['nivel_id']) ? $_POST['nivel_id'] : false;
            $primer_nombre = isset($_POST['primer_nombre']) ? $_POST['primer_nombre'] : false;
            $segundo_nombre = isset($_POST['segundo_nombre']) ? $_POST['segundo_nombre'] : false;
            $primer_apellido = isset($_POST['primer_apellido']) ? $_POST['primer_apellido'] : false;
            $segundo_apellido = isset($_POST['segundo_apellido']) ? $_POST['segundo_apellido'] : false;
            $telefono_celular = isset($_POST['telefono_celular']) ? $_POST['telefono_celular'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;

            $errors = array();

            if (is_numeric($cedula)) {
                $cedula_valido = true;
            } else {
                $cedula_invalido = false;
                $errors['cedula'] = 'Error, La Cedula debe Contener Solo Numeros';
            }

            if(strlen($cedula) == 8){
                $cedula_valido=true;
            }else {
                $cedula_invalido=false;
                $errors['cedula'] = 'Error, La Cedula debe Contener 8 digitos';
            }

            if(empty($cedula)){
                $cedula_invalido=false;
                $errors['cedula'] = 'Error, La Cedula esta Vacia y es Requerida';
            }else {
                $cedula_valido=true;
            }
            
            if(is_string($primer_nombre) && !is_numeric($primer_nombre) && !preg_match("/[0-9]/", $primer_nombre)){
                $PrimerNombre_valido=true;
            }else{
                $PrimerNombre_invalido=false;
                $errors['primer_nombre'] = 'El Primer Nombre debe Contener Letras';
            }
            
            if(empty($primer_nombre)){
                $PrimerNombre_invalido=false;
                $errors['primer_nombre'] = 'Error, El Primer Nombre esta Vacio';
            }else {
                $PrimerNombre_valido=true;
            }

            if(is_string($segundo_nombre) && !is_numeric($segundo_nombre) && !preg_match("/[0-9]/", $segundo_nombre)){
                $segundoNombre_valido=true;
            }else{
                $segundoNombre_invalido=false;
                $errors['segundo_nombre'] = 'El Segundo Nombre debe Contener Letras';
            }
            
            if(empty($segundo_nombre)){
                $segundoNombre_invalido=false;
                $errors['segundo_nombre'] = 'Error, El Segundo Nombre esta Vacio';
            }else {
                $segundoNombre_valido=true;
            }

            if(is_string($primer_apellido) && !is_numeric($primer_apellido) && !preg_match("/[0-9]/", $primer_apellido)){
                $PrimerApellido_valido=true;
            }else{
                $PrimerApellido_invalido=false;
                $errors['primer_apellido'] = 'El Primer Apellido debe Contener Letras';
            }
            
            if(empty($primer_apellido)){
                $PrimerApellido_invalido=false;
                $errors['primer_apellido'] = 'Error, El Primer apellido esta Vacio';
            }else {
                $PrimerApellido_valido=true;
            }

            if(is_string($segundo_apellido) && !is_numeric($segundo_apellido) && !preg_match("/[0-9]/", $segundo_apellido)){
                $segundoApellido_valido=true;
            }else{
                $segundoApellido_invalido=false;
                $errors['segundo_apellido'] = 'El Segundo Apellido debe Contener Letras';
            }
            
            if(empty($segundo_apellido)){
                $segundoApellido_invalido=false;
                $errors['segundo_apellido'] = 'Error, El Segundo Apellido esta Vacio';
            }else {
                $segundoApellido_valido=true;
            }

            if (is_numeric($telefono_celular)) {
                $telefonoCelular_valido = true;
            } else {
                $telefonoCelular_invalidoo = false;
                $errors['telefono_celular'] = 'Error, El Numero Celular debe Contener Solo Numeros';
            }

            if(strlen($telefono_celular) == 11){
                $telefonoCelular_valido=true;
            }else {
                $telefonoCelular_invalido=false;
                $errors['telefono_celular'] = 'Error, El Telefono Celular debe Contener 11 digitos';
            }

            if(empty($telefono_celular)){
                $telefonoCelular_invalido=false;
                $errors['telefono_celular'] = 'Error, El Telefono Celular esta Vacio';
            }else {
                $telefonoCelular_valido=true;
            }

            if(empty($email)){
                $email_invalido=false;
                $errors['email'] = 'Error, El Email esta Vacio y es Requerido';
            }else {
                $email_valido=true;
            }

            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                $email_valido=true;
            }else {
                $email_invalido=false;
                $errors['email'] = 'Error, El Email que insertaste es Invalido';
            }

            if(empty($direccion)){
                $direccion_invalido=false;
                $errors['direccion'] = 'Error, La Direccion esta Vacio y es Requerido';
            }else {
                $direccion_valido=true;
            }

            if(count($errors) == 0){
                $usuario = new Estudiante();
                $usuario->setCedula($cedula);
                $usuario->setNivel_id($nivel_id);
                $usuario->setPrimer_nombre($primer_nombre);
                $usuario->setSegundo_nombre($segundo_nombre);
                $usuario->setPrimer_apellido($primer_apellido);
                $usuario->setSegundo_apellido($segundo_apellido);
                $usuario->setTelefono_celular($telefono_celular);
                $usuario->setEmail($email);
                $usuario->setSexo($sexo);
                $usuario->setDireccion($direccion);
                $save = $usuario->save();

                $save_inscripcion = $usuario->save_inscripcion();

                if($save && $save_inscripcion){
                    $_SESSION['estudiante_p'] = 'success'; 
                }else {
                    $_SESSION['estudiante_p'] = 'failed'; 
                }
            }else{
                $_SESSION['errors'] = $errors; 
            }
        }
        header('location: ' . base_url . 'estudiante/inscripcion_primaria');
    }

    public function save_b(){
        if(isset($_POST)){
            $cedula = isset($_POST['cedula']) ? $_POST['cedula'] : false;
            $nivel_id = isset($_POST['nivel_id']) ? $_POST['nivel_id'] : false;
            $primer_nombre = isset($_POST['primer_nombre']) ? $_POST['primer_nombre'] : false;
            $segundo_nombre = isset($_POST['segundo_nombre']) ? $_POST['segundo_nombre'] : false;
            $primer_apellido = isset($_POST['primer_apellido']) ? $_POST['primer_apellido'] : false;
            $segundo_apellido = isset($_POST['segundo_apellido']) ? $_POST['segundo_apellido'] : false;
            $telefono_celular = isset($_POST['telefono_celular']) ? $_POST['telefono_celular'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;

            $errors = array();

            if (is_numeric($cedula)) {
                $cedula_valido = true;
            } else {
                $cedula_invalido = false;
                $errors['cedula'] = 'Error, La Cedula debe Contener Solo Numeros';
            }

            if(strlen($cedula) == 8){
                $cedula_valido=true;
            }else {
                $cedula_invalido=false;
                $errors['cedula'] = 'Error, La Cedula debe Contener 8 digitos';
            }

            if(empty($cedula)){
                $cedula_invalido=false;
                $errors['cedula'] = 'Error, La Cedula esta Vacia y es Requerida';
            }else {
                $cedula_valido=true;
            }
            
            if(is_string($primer_nombre) && !is_numeric($primer_nombre) && !preg_match("/[0-9]/", $primer_nombre)){
                $PrimerNombre_valido=true;
            }else{
                $PrimerNombre_invalido=false;
                $errors['primer_nombre'] = 'El Primer Nombre debe Contener Letras';
            }
            
            if(empty($primer_nombre)){
                $PrimerNombre_invalido=false;
                $errors['primer_nombre'] = 'Error, El Primer Nombre esta Vacio';
            }else {
                $PrimerNombre_valido=true;
            }

            if(is_string($segundo_nombre) && !is_numeric($segundo_nombre) && !preg_match("/[0-9]/", $segundo_nombre)){
                $segundoNombre_valido=true;
            }else{
                $segundoNombre_invalido=false;
                $errors['segundo_nombre'] = 'El Segundo Nombre debe Contener Letras';
            }
            
            if(empty($segundo_nombre)){
                $segundoNombre_invalido=false;
                $errors['segundo_nombre'] = 'Error, El Segundo Nombre esta Vacio';
            }else {
                $segundoNombre_valido=true;
            }

            if(is_string($primer_apellido) && !is_numeric($primer_apellido) && !preg_match("/[0-9]/", $primer_apellido)){
                $PrimerApellido_valido=true;
            }else{
                $PrimerApellido_invalido=false;
                $errors['primer_apellido'] = 'El Primer Apellido debe Contener Letras';
            }
            
            if(empty($primer_apellido)){
                $PrimerApellido_invalido=false;
                $errors['primer_apellido'] = 'Error, El Primer apellido esta Vacio';
            }else {
                $PrimerApellido_valido=true;
            }

            if(is_string($segundo_apellido) && !is_numeric($segundo_apellido) && !preg_match("/[0-9]/", $segundo_apellido)){
                $segundoApellido_valido=true;
            }else{
                $segundoApellido_invalido=false;
                $errors['segundo_apellido'] = 'El Segundo Apellido debe Contener Letras';
            }
            
            if(empty($segundo_apellido)){
                $segundoApellido_invalido=false;
                $errors['segundo_apellido'] = 'Error, El Segundo Apellido esta Vacio';
            }else {
                $segundoApellido_valido=true;
            }

            if (is_numeric($telefono_celular)) {
                $telefonoCelular_valido = true;
            } else {
                $telefonoCelular_invalidoo = false;
                $errors['telefono_celular'] = 'Error, El Numero Celular debe Contener Solo Numeros';
            }

            if(strlen($telefono_celular) == 11){
                $telefonoCelular_valido=true;
            }else {
                $telefonoCelular_invalido=false;
                $errors['telefono_celular'] = 'Error, El Telefono Celular debe Contener 11 digitos';
            }

            if(empty($telefono_celular)){
                $telefonoCelular_invalido=false;
                $errors['telefono_celular'] = 'Error, El Telefono Celular esta Vacio';
            }else {
                $telefonoCelular_valido=true;
            }

            if(empty($email)){
                $email_invalido=false;
                $errors['email'] = 'Error, El Email esta Vacio y es Requerido';
            }else {
                $email_valido=true;
            }

            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                $email_valido=true;
            }else {
                $email_invalido=false;
                $errors['email'] = 'Error, El Email que insertaste es Invalido';
            }

            if(empty($direccion)){
                $direccion_invalido=false;
                $errors['direccion'] = 'Error, La Direccion esta Vacio y es Requerido';
            }else {
                $direccion_valido=true;
            }

            if(count($errors) == 0){
                $usuario = new Estudiante();
                $usuario->setCedula($cedula);
                $usuario->setNivel_id($nivel_id);
                $usuario->setPrimer_nombre($primer_nombre);
                $usuario->setSegundo_nombre($segundo_nombre);
                $usuario->setPrimer_apellido($primer_apellido);
                $usuario->setSegundo_apellido($segundo_apellido);
                $usuario->setTelefono_celular($telefono_celular);
                $usuario->setEmail($email);
                $usuario->setSexo($sexo);
                $usuario->setDireccion($direccion);
                $save = $usuario->save();

                $save_inscripcion = $usuario->save_inscripcion();

                if($save && $save_inscripcion){
                    $_SESSION['estudiante_b'] = 'success'; 
                }else {
                    $_SESSION['estudiante_b'] = 'failed'; 
                }
            }else{
                $_SESSION['errors'] = $errors; 
            }
        }
        header('location: ' . base_url . 'estudiante/inscripcion_bachillerato');
    }
}