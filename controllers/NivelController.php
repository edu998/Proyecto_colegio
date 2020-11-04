<?php

require_once 'models/nivel.php';

class NivelController{

    public function gestion_nivel(){
        Utils::isAdmin();
        $nivel = new Nivel();
        $niveles = $nivel->getAll();
        require_once 'views/nivel/gestion-nivel.php';
    }


    public function create(){
        Utils::isAdmin();
        require_once 'views/nivel/create.php';
    }

    public function save(){
        Utils::isAdmin();
        if(isset($_POST)){
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : false;
            $numero_tipo = isset($_POST['numero_tipo']) ? $_POST['numero_tipo'] : false;


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

    public function delete(){
        if(isset($_GET['id'])){
            $nivel_id = $_GET['id'];
            $nivel = new Nivel();
            $nivel->setId($nivel_id);
            $delete = $nivel->delete();

            if($delete){
                $_SESSION['nivel_d'] = 'success';
            }else {
                $_SESSION['nivel_d'] = 'failed';
            }

            header('location: ' . base_url . 'nivel/gestion_nivel');
        }
    }

}