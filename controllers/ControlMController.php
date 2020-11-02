<?php

require_once 'models/controlMateria.php';

class ControlMController
{

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
            $save = $controlM->save();

            if ($save) {
                $_SESSION['control_m'] = 'success';
            } else {
                $_SESSION['control_m'] = 'failed';
            }
        }

        header('location: ' . base_url . 'controlm/asignar_materia');
    }
}
