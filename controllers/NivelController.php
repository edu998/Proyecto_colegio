<?php

require_once 'models/nivel.php';

class NivelController{

    public function gestion_nivel(){
        $nivel = new Nivel();
        $niveles = $nivel->getAll();
        require_once 'views/nivel/gestion-nivel.php';
    }


    public function create(){
        require_once 'views/nivel/create.php';
    }

    public function save(){
        if(isset($_POST)){
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : false;
            $numero_tipo = isset($_POST['numero_tipo']) ? $_POST['numero_tipo'] : false;

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

            if(!empty($tipo)){
                $tipo_valido=true;
            }else {
                $tipo_invalido = false;
                $errors['tipo'] = 'Debes Seleccionar el Tipo, el Campo es requerido';
            }

            if(!empty($numero_tipo)){
                $numero_valido=true;
            }else {
                $numero_invalido = false;
                $errors['numero_tipo'] = 'Debes Seleccionar el Tipo de Numero, el Campo es requerido';
            }

            if(count($errors) == 0){
                $nivel = new Nivel();
                $nivel->setNombre($nombre);
                $nivel->setTipo($tipo);
                $nivel->setNumero_tipo($numero_tipo);
                $save = $nivel->save();

                if($save){
                    $_SESSION['nivel'] = 'success';
                }else{
                    $_SESSION['nivel'] = 'failed';
                }
            }else{
                $_SESSION['errors'] = $errors;
            }
        }

        header('location: ' . base_url . 'nivel/create');
    }
}