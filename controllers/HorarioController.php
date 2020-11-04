<?php 

require_once 'models/horario.php';

class HorarioController{

    public function gestion_horario(){
        Utils::isAdmin();
        $horario = new Horario();
        $horarios = $horario->getAll();
        require_once 'views/horario/gestion-horario.php';
    }

    public function create(){
        Utils::isAdmin();
        require_once 'views/horario/create.php';
    }

    public function save(){
        Utils::isAdmin();
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

                if (isset($_GET['id'])) {
                    $horario_id = $_GET['id'];
                    $horario->setId($horario_id);
                    $update = $horario->update();

                    if ($update) {
                        $_SESSION['horario'] = 'success';
                        header('location: ' . base_url . 'horario/edit&id=' . $horario_id);
                    } else {
                        $_SESSION['horario'] = 'failed';
                        header('location: ' . base_url . 'horario/edit&id=' . $horario_id);
                    }
                } else {
                    $save = $horario->save();
                    if ($save) {
                        $_SESSION['horario'] = 'success';
                        header('location: ' . base_url . 'horario/create');
                    } else {
                        $_SESSION['horario'] = 'failed';
                        header('location: ' . base_url . 'horario/create');
                    }
                }
            }else {
                $_SESSION['errors'] = $errors;
                header('location: ' . base_url . 'horario/create');
                if (isset($_GET['id'])) {
                    header('location: ' . base_url . 'horario/edit&id=' . $_GET['id']);
                }
            }
        }
    }

    public function edit()
    {
        if (isset($_GET['id'])) {
            $horario_id = $_GET['id'];
            $horario = new Horario();
            $horario->setId($horario_id);
            $horario_o = $horario->getOne();

            require_once 'views/horario/create.php';
        } else {
            header('location: ' . base_url . 'horario/gestion_horario');
        }
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $horario_id = $_GET['id'];
            $horario = new Horario();
            $horario->setId($horario_id);
            $delete_det = $horario->delete_det();
            $delete = $horario->delete();
            if ($delete && $delete_det) {
                $_SESSION['horario'] = 'success';
            } else {
                $_SESSION['horario'] = 'failed';
            }

            header('location: ' . base_url . 'horario/gestion_horario');
        }
    }
}