<?php
require_once 'models/seccion.php';
class SeccionController{

    public function control_secciones(){
        require_once 'views/seccion/control-secciones.php';
    }

    public function gestion_bachillerato(){
        $seccion = new Seccion();
        $secciones = $seccion->getAllByNivel();

        require_once 'views/seccion/gestion-bachillerato.php';
    }

    public function gestion_grado(){
        $grado = new Seccion();
        $grados = $grado->getAllByNivel();

        require_once 'views/seccion/gestion-grado.php';
    }

    public function save_b(){
        if(isset($_POST)){
            $nombre_seccion = isset($_POST['nombre_seccion']) ? $_POST['nombre_seccion'] : false;
            $estudiante_id = isset($_POST['estudiante_id']) ? $_POST['estudiante_id'] : false;

            $errors = array();

            if(!empty($nombre_seccion)){
                $nombre_seccion_invalido = false;
            }else{
                $nombre_seccion_valido = true;
                $errors['nombre_seccion'] = 'Error, Debes seleccionar una Seccion';
            }

            if(count($errors) == 0){
                $seccion = new Seccion();
                $seccion->setEstudiante_id($estudiante_id);
                $seccion->setNombre_seccion($nombre_seccion);
                $save = $seccion->save();
                if($save){
                    $_SESSION['seccion'] = 'success';
                }else {
                    $_SESSION['seccion'] = 'failed';
                }
            }else {
                $_SESSION['errors'] = $errors;
            }
        }
        header('location: ' . base_url . 'seccion/gestion_bachillerato');
    }

    public function save_p(){
        if(isset($_POST)){
            $nombre_seccion = isset($_POST['nombre_seccion']) ? $_POST['nombre_seccion'] : false;
            $estudiante_id = isset($_POST['estudiante_id']) ? $_POST['estudiante_id'] : false;

            $errors = array();

            if(!empty($nombre_seccion)){
                $nombre_seccion_invalido = false;
            }else{
                $nombre_seccion_valido = true;
                $errors['nombre_seccion'] = 'Error, Debes seleccionar una Seccion';
            }

            if(count($errors) == 0){
                $seccion = new Seccion();
                $seccion->setEstudiante_id($estudiante_id);
                $seccion->setNombre_seccion($nombre_seccion);
                $save = $seccion->save();

                if($save){
                    $_SESSION['seccion_g'] = 'success';
                }else {
                    $_SESSION['seccion_g'] = 'failed';
                }
            }else {
                $_SESSION['errors'] = $errors;
            }
        }
        header('location: ' . base_url . 'seccion/gestion_grado');
    }
}