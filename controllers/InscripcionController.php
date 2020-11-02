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
}