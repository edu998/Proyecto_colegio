<?php

require_once 'models/controlMateria.php';

class ControlMController{

    public function control_materias(){
        $controlM = new ControlMateria();
        $materias_p = $controlM->getMateriasByUsuario();
        require_once 'views/materia/control.php';
    }

    public function asignar_materia(){
        
        require_once 'views/materia/asignar.php';
    }

    public function save(){
        if(isset($_POST)){
            $usuario_id = isset($_POST['usuario_id']) ? $_POST['usuario_id'] : false;
            $materia_id = isset($_POST['materia_id']) ? $_POST['materia_id'] : false;
            $horario_desde = isset($_POST['horario_desde']) ? $_POST['horario_desde'] : false;
            $horario_hasta = isset($_POST['horario_hasta']) ? $_POST['horario_hasta'] : false;

            $errors = array();
            
            
            if(empty($horario_desde)){
                $horarioDesde_invalido=false;
                $errors['horario_desde'] = 'Error, El Campo esta Vacio y es Requerido';
            }else {
                $horarioDesde_valido=true;
            }

            if(empty($horario_hasta)){
                $horariohasta_invalido=false;
                $errors['horario_hasta'] = 'Error, El Campo esta Vacio y es Requerido';
            }else {
                $horariohasta_valido=true;
            }



            if(count($errors) == 0){
                $controlM = new ControlMateria();
                $controlM->setUsuario_id($usuario_id);
                $controlM->setMateria_id($materia_id);
                $controlM->setHorario_desde($horario_desde);
                $controlM->setHorario_hasta($horario_hasta);
                $save = $controlM->save();

                if($save){
                    $_SESSION['control_m'] = 'success';
                }else{
                    $_SESSION['control_m'] = 'failed';
                }
            }else{
                $_SESSION['errors'] = $errors;
            }
        }

        header('location: ' . base_url . 'controlm/asignar_materia');
    }
}