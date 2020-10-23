<?php
require_once 'models/materia.php';
require_once 'models/usuario.php';
class Utils{

    public static function showError($error,$campo){
        $alert = '';
        if(isset($error[$campo]) && !empty($campo)){
            $alert = "<span class='text-danger text-capitalize d-block py-2'> $error[$campo]</span>";
        }

        return $alert;
    }

    public static function delete_session($session){
        if(isset($_SESSION[$session])){
            $_SESSION[$session] = null;
            unset($_SESSION[$session]);
        }
        return $session;
    }

    public static function showMaterias(){
        $materia = new Materia();
        $materias = $materia->getAll();

        return $materias;
    }

    public static function showProfesores(){
        $usuario = new Usuario();
        $profesores = $usuario->getAll();

       return $profesores;
    }
    
}