<?php 

class InscripcionController{

    public function index(){
        require_once 'views/inscripcion/index.php';
    }

    public function elige_pago(){
        require_once 'views/inscripcion/elige-pago.php';
    }
}