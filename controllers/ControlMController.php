<?php

require_once 'models/controlMateria.php';

class ControlMController
{
    public function buscador_nivel()
    {
        Utils::isAdmin();
        if (isset($_POST)) {

            $nivel_id = isset($_POST['nivel_id']) ? $_POST['nivel_id'] : false;
            $seccion = isset($_POST['seccion']) ? $_POST['seccion'] : false;

            $controlM = new ControlMateria();
            
            $materias_p = $controlM->getAllBySearch($nivel_id, $seccion);
            if ($materias_p) {
                require_once 'views/control/search.php';
            }else{
                $_SESSION['search_m'] = 'failed';
                header('location: ' . base_url . 'controlm/control_materias');
            }
        } else {
            header('location: ' . base_url . 'controlm/control_materias');
        }
    }

    public function buscador_horario()
    {
        Utils::isAdmin();
        if (isset($_POST['nombre'])) {

            $nombre = $_POST['nombre'];

            $controlM = new ControlMateria();
            $materias_p = $controlM->getSeccionByProfesor($nombre);
            if ($materias_p) {
                require_once 'views/control/search.php';
            }else{
                $_SESSION['search_m'] = 'failed';
                header('location: ' . base_url . 'controlm/control_materias');
            }
        } else {
            header('location: ' . base_url . 'controlm/control_materias');
        }
    }

    public function buscador()
    {
        Utils::isAdmin();
        if (isset($_POST['nombre'])) {

            $nombre = $_POST['nombre'];

            $controlM = new ControlMateria();
            $materias_p = $controlM->getSeccionByProfesor($nombre);
            if ($materias_p) {
                require_once 'views/control/search.php';
            }else{
                $_SESSION['search_m'] = 'failed';
                header('location: ' . base_url . 'controlm/control_materias');
            }
        } else {
            header('location: ' . base_url . 'controlm/control_materias');
        }
    }

    public function control_materias()
    {
        Utils::isAdmin();
        $controlM = new ControlMateria();
        $materias_p = $controlM->getSeccionByProfesor();
        require_once 'views/materia/control.php';
    }

    public function asignar_materia()
    {
        Utils::isAdmin();
        require_once 'views/materia/asignar.php';
    }

    public function save()
    {
        Utils::isAdmin();
        if (isset($_POST)) {
            $usuario_id = isset($_POST['usuario_id']) ? $_POST['usuario_id'] : false;
            $materia_id = isset($_POST['materia_id']) ? $_POST['materia_id'] : false;
            $nivel_id = isset($_POST['nivel_id']) ? $_POST['nivel_id'] : false;
            $horario_id = isset($_POST['horario_id']) ? $_POST['horario_id'] : false;
            $seccion = isset($_POST['seccion']) ? $_POST['seccion'] : false;
            $dia = isset($_POST['dia']) ? $_POST['dia'] : false;

            $controlM = new ControlMateria();
            $controlM->setUsuario_id($usuario_id);
            $controlM->setMateria_id($materia_id);
            $controlM->setNivel_id($nivel_id);
            $controlM->setHorario_id($horario_id);
            $controlM->setSeccion($seccion);
            $controlM->setDia($dia);

            if (isset($_GET['id'])) {
                $controlM_id = $_GET['id'];
                $controlM->setId($controlM_id);
                $update = $controlM->update();

                if ($update) {
                    $_SESSION['control_m'] = 'success';
                    header('location: ' . base_url . 'controlm/edit&id=' . $controlM_id);
                } else {
                    $_SESSION['control_m'] = 'failed';
                    header('location: ' . base_url . 'controlm/edit&id=' . $controlM_id);
                }
            } else {
                $save = $controlM->save();
                if ($save) {
                    $_SESSION['control_m'] = 'success';
                    header('location: ' . base_url . 'controlm/asignar_materia');
                } else {
                    $_SESSION['control_m'] = 'failed';
                    header('control_m: ' . base_url . 'controlm/asignar_materia');
                }
            }
        }
    }

    public function edit()
    {
        if (isset($_GET['id'])) {
            $controlM_id = $_GET['id'];
            $controlM = new ControlMateria();
            $controlM->setId($controlM_id);
            $controlm_o = $controlM->getOne();

            require_once 'views/materia/asignar.php';
        } else {
            header('location: ' . base_url . 'controlm/control_materias');
        }
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $controlM_id = $_GET['id'];
            $controlM = new ControlMateria();
            $controlM->setId($controlM_id);
            $delete = $controlM->delete();
            if ($delete) {
                $_SESSION['control_m'] = 'success';
            } else {
                $_SESSION['control_m'] = 'failed';
            }

            header('location: ' . base_url . 'controlm/control_materias');
        }
    }
}
