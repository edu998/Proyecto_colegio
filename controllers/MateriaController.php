<?php

require_once 'models/materia.php';

class MateriaController
{

    public function gestion_materias()
    {
        Utils::isAdmin();
        $materia = new Materia();
        $materias = $materia->getAll();
        require_once 'views/materia/gestion-materias.php';
    }

    public function create()
    {
        Utils::isAdmin();
        require_once 'views/materia/create.php';
    }

    public function save()
    {
        Utils::isAdmin();
        if (isset($_POST)) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;

            $errors = array();

            if (is_string($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
                $nombre_valido = true;
            } else {
                $nombre_invalido = false;
                $errors['nombre'] = 'El Nombre debe Contener Letras';
            }

            if (empty($nombre)) {
                $nombre_invalido = false;
                $errors['nombre'] = 'Error, El Nombre esta Vacio';
            } else {
                $nombre_valido = true;
            }

            if (count($errors) == 0) {
                $materia = new Materia();
                $materia->setNombre($nombre);

                if (isset($_GET['id'])) {
                    $materia_id = $_GET['id'];
                    $materia->setId($materia_id);
                    $update = $materia->update();

                    if ($update) {
                        $_SESSION['materia'] = 'success';
                        header('location: ' . base_url . 'materia/edit&id=' . $materia_id);
                    } else {
                        $_SESSION['materia'] = 'failed';
                        header('location: ' . base_url . 'materia/edit&id=' . $materia_id);
                    }
                } else {
                    $save = $materia->save();
                    if ($save) {
                        $_SESSION['materia'] = 'success';
                        header('location: ' . base_url . 'materia/create');
                    } else {
                        $_SESSION['materia'] = 'failed';
                        header('location: ' . base_url . 'materia/create');
                    }
                }
            } else {
                $_SESSION['errors'] = $errors;
                header('location: ' . base_url . 'materia/create');
                if (isset($_GET['id'])) {
                    header('location: ' . base_url . 'materia/edit&id=' . $_GET['id']);
                }
            }
        }
        
    }

    public function edit()
    {
        if (isset($_GET['id'])) {
            $materia_id = $_GET['id'];
            $materia = new Materia();
            $materia->setId($materia_id);
            $materia_o = $materia->getOne();

            require_once 'views/materia/create.php';
        } else {
            header('location: ' . base_url . 'materia/gestion_materias');
        }
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $materia_id = $_GET['id'];
            $materia = new Materia();
            $materia->setId($materia_id);
            $delete_det = $materia->delete_det();
            $delete = $materia->delete();
            if ($delete_det && $delete) {
                $_SESSION['materia_d'] = 'success';
            } else {
                $_SESSION['materia_d'] = 'failed';
            }

            header('location: ' . base_url . 'materia/gestion_materias');
        }
    }
}
