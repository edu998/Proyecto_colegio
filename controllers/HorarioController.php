<?php 

require_once 'models/horario.php';

class HorarioController{

    public function gestion_horario(){
        $horario = new Horario();
        $horarios = $horario->getAll();
        require_once 'views/horario/gestion-horario.php';
    }

    public function create(){
        require_once 'views/horario/create.php';
    }

    public function save(){
        if(isset($_POST)){
            $horario_desde = isset($_POST['horario_desde']) ? $_POST['horario_desde'] : false;

            $horario_hasta = isset($_POST['horario_hasta']) ? $_POST['horario_hasta'] : false;

            $errors = array();
            
            
            if(empty($horario_desde)){
                $horario_desde_invalido=false;
                $errors['horario_desde'] = 'Error, El Campo esta Vacio y es Requerido!';
            }else {
                $horario_desde_valido=true;
            }

            if(empty($horario_hasta)){
                $horario_hasta_invalido=false;
                $errors['horario_hasta'] = 'Error, El Campo esta Vacio y es Requerido!';
            }else {
                $horario_hasta_valido=true;
            }

            if(count($errors) == 0){
                $horario = new Horario();
                $horario->setHorario_desde($horario_desde);
                $horario->setHorario_hasta($horario_hasta);

                $save = $horario->save();
                if($save){
                    $_SESSION['horario'] = 'success';
                }else {
                    $_SESSION['horario'] = 'failed';
                }
            }else {
                $_SESSION['errors'] = $errors;
            }
        }
        header('location: ' . base_url . 'horario/create');
    }
}