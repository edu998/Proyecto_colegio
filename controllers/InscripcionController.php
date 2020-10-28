<?php 
require_once 'models/estudiante.php';
class InscripcionController{

    public function index(){
        require_once 'views/inscripcion/index.php';
    }

    public function elige_pago(){
        require_once 'views/inscripcion/elige-pago.php';
    }

    public function listado_estudiantes(){
        $estudiante = new Estudiante();
        $estudiantes = $estudiante->getListado();
        require_once 'views/inscripcion/listado-estudiantes.php';
    }
}