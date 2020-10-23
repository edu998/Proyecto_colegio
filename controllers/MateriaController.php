<?php 

require_once 'models/materia.php';

class MateriaController{

    public function gestion_materias(){
        $materia = new Materia();
        $materias = $materia->getAll();
        require_once 'views/materia/gestion-materias.php';
    }

    public function create(){
        require_once 'views/materia/create.php';
    }

    public function save(){
        if(isset($_POST)){
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;

            $errors = array();
            
            if(is_string($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
                $nombre_valido=true;
            }else{
                $nombre_invalido=false;
                $errors['nombre'] = 'El Nombre debe Contener Letras';
            }
            
            if(empty($nombre)){
                $nombre_invalido=false;
                $errors['nombre'] = 'Error, El Nombre esta Vacio';
            }else {
                $nombre_valido=true;
            }

            if(count($errors) == 0){
                $materia = new Materia();
                $materia->setNombre($nombre);
                $save = $materia->save();

                if($save){
                    $_SESSION['materia'] = 'success';
                }else {
                    $_SESSION['materia'] = 'failed';
                }
            }else {
                $_SESSION['errors'] = $errors;
            }
        }
        header('location: ' . base_url . 'materia/create');
    }
}