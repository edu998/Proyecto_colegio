<?php
require_once 'models/seccion.php';
class SeccionController{

    public function control_secciones(){
        Utils::isAdmin();
        $seccion = new Seccion();
        $primern_a= $seccion->getSeccionByNivel2();
        $primern_b = $seccion->getSeccionByNivel3();
        $segundon_a = $seccion->getSeccionByNivel4();
        $segundon_b = $seccion->getSeccionByNivel5();
        $tercern_a = $seccion->getSeccionByNivel6();
        $tercern_b = $seccion->getSeccionByNivel7();
        $cuarton_a = $seccion->getSeccionByNivel8();
        $cuarton_b = $seccion->getSeccionByNivel9();
        $quinton_a = $seccion->getSeccionByNivel10();
        $quinton_b = $seccion->getSeccionByNivel11();
        $primerg_a = $seccion->getSeccionByNivel12();
        $primerg_b = $seccion->getSeccionByNivel13();
        $segundog_a = $seccion->getSeccionByNivel14();
        $segundog_b = $seccion->getSeccionByNivel15();
        $tercerg_a = $seccion->getSeccionByNivel16();
        $tercerg_b = $seccion->getSeccionByNivel17();
        $cuartog_a = $seccion->getSeccionByNivel18();
        $cuartog_b = $seccion->getSeccionByNivel19();
        $quintog_a = $seccion->getSeccionByNivel20();
        $quintog_b = $seccion->getSeccionByNivel21();
        $sestog_a = $seccion->getSeccionByNivel22();
        $sestog_b = $seccion->getSeccionByNivel23();
        require_once 'views/seccion/control-secciones.php';
    }

    public function gestion_bachillerato(){
        Utils::isAdmin();
        $seccion = new Seccion();
        $secciones = $seccion->getAllByNivel();

        require_once 'views/seccion/gestion-bachillerato.php';
    }

    public function gestion_grado(){
        Utils::isAdmin();
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