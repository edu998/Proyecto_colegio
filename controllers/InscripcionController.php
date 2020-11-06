<?php 
require_once 'models/estudiante.php';
class InscripcionController{

    

    public function index(){
        require_once 'views/inscripcion/index.php';
    }

    public function elige_pago(){
        Utils::isStudent();
        require_once 'views/inscripcion/elige-pago.php';
    }

    public function listado_estudiantes(){
        Utils::isAdmin();
        $estudiante = new Estudiante();
        $estudiantes = $estudiante->getListado();
        require_once 'views/inscripcion/listado-estudiantes.php';
    }

    public function edit()
    {
        Utils::isAdmin();
        if (isset($_GET['id'])) {
            $estudiante_id = $_GET['id'];

            $estudiantes = new Estudiante();
            $estudiantes->setId($estudiante_id);
            $estudiante = $estudiantes->getOne();

            require_once 'views/inscripcion/detail.php';
        } else {
            header('location:' . base_url . 'inscripcion/listado_estudiantes');
        }
    }

    public function buscador_e()
    {
        Utils::isAdmin();
        if (isset($_POST['nombre'])) {

            $nombre = $_POST['nombre'];

            $estudianter = new Estudiante();
            $estudiantess = $estudianter->getListado($nombre);
            
            if ($estudiantess) {
                require_once 'views/inscripcion/search.php';
            }else{
                $_SESSION['search_m'] = 'failed';
                header('location: ' . base_url . 'inscripcion/listado_estudiantes');
            }
        } else {
            header('location: ' . base_url . 'inscripcion/listado_estudiantes');
        }
    }

    public function change(){
        if(isset($_POST)){
            $estudiante_id = isset($_POST['estudiante_id']) ? $_POST['estudiante_id'] : false;
            $status = isset($_POST['status']) ? $_POST['status'] : false;

            $estudiante = new Estudiante();
            $estudiante->setStatus($status);
            $estudiante->setId($estudiante_id);
            $update = $estudiante->edit_status();

            if($update){
                $_SESSION['status_e'] = 'success';
            }else {
                $_SESSION['status_e'] = 'failed';
            }
            header('location: ' . base_url . 'inscripcion/edit&id=' . $estudiante_id);
        }else {
            header('location:' . base_url . 'inscripcion/listado_estudiantes');
        }
    }
}