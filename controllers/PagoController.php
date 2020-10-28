<?php

require_once 'models/pago.php';

class PagoController
{

    public function control_pagos(){
        $pago = new Pago();
        $pagos = $pago->getControlPagos();
        require_once 'views/pago/control-pagos.php';
    }

    public function elige_tipo_pago()
    {
        if (isset($_GET['nombre_pago'])) {
            $nombre_pago = $_GET['nombre_pago'];
            require_once 'views/pago/elige-tipo-pago.php';
        } else {
            header('location: ' . base_url . 'inscripcion/elige_pago');
        }
    }

    public function pago_efectivo()
    {
        if (isset($_GET['nombre_pago']) && isset($_GET['tipo_pago'])) {
            $tipo_pago = $_GET['tipo_pago'];
            $nombre_pago = $_GET['nombre_pago'];
            require_once 'views/pago/pago-efectivo.php';
        } else {
            header('location: ' . base_url . 'inscripcion/elige_pago');
        }
    }

    public function pago_transferencia()
    {
        if (isset($_GET['nombre_pago']) && isset($_GET['tipo_pago'])) {
            $tipo_pago = $_GET['tipo_pago'];
            $nombre_pago = $_GET['nombre_pago'];
            require_once 'views/pago/pago-transferencia.php';
        } else {
            header('location: ' . base_url . 'inscripcion/elige_pago');
        }
    }

    public function save_e()
    {
        if (isset($_POST)) {
            $estudiante_id = isset($_SESSION['student']) ? $_SESSION['student']->id : false;
            $tipo_pago = isset($_POST['tipo_pago']) ? $_POST['tipo_pago'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $nombre_pago = isset($_POST['nombre_pago']) ? $_POST['nombre_pago'] : false;

            $errors = array();

            if (!empty($descripcion)) {
                $descripcion_valido = true;
            } else {
                $descripcion_invalido = false;
                $errors['descripcion'] = 'Error, El campo esta Vacio y es Requerido!';
            }

            if (count($errors) == 0) {
                $pago = new Pago();
                $pago->setEsudiante_id($estudiante_id);
                $pago->setTipo_pago($tipo_pago);
                $pago->setDescripcion($descripcion);
                $pago->setNombre_pago($nombre_pago);
                $pago->setTransferencia('NULL');
                $save = $pago->save();

                $save_control = $pago->save_control();

                if ($save && $save_control) {
                    $_SESSION['efectivo'] = 'success';
                } else {
                    $_SESSION['efectivo'] = 'failed';
                }
            } else {
                $_SESSION['errors'] = $errors;
            }
        }
        header('location: ' . base_url . 'pago/pago_efectivo&tipo_pago=' . $tipo_pago . '&nombre_pago=' . $nombre_pago);
    }

    public function save_t()
    {
        if (isset($_POST)) {
            $estudiante_id = isset($_SESSION['student']) ? $_SESSION['student']->id : false;
            $tipo_pago = isset($_POST['tipo_pago']) ? $_POST['tipo_pago'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $nombre_pago = isset($_POST['nombre_pago']) ? $_POST['nombre_pago'] : false;

            $errors = array();

            if (!empty($descripcion)) {
                $descripcion_valido = true;
            } else {
                $descripcion_invalido = false;
                $errors['descripcion'] = 'Error, El campo esta Vacio y es Requerido!';
            }

            if($_FILES['transferencia']['type'] == 'image/png' || $_FILES['transferencia']['type'] == 'image/jpeg' || $_FILES['transferencia']['type'] == 'image/jpg'){
                $transferencia_valido = true;
                
            }else{
                $transferencia_invalido = false;
                $errors['transferencia'] = 'La Imagen del Comprobante debe ser en formato Imagen';
            }
            
            if(!empty($_FILES['transferencia']['name'])){
                $transferencia_valido = true;
                
            }else{
                $transferencia_invalido = false;
                $errors['transferencia'] = 'El comprobante esta Vacio';
            }

            

            if (count($errors) == 0) {
                $pago = new Pago();
                $pago->setEsudiante_id($estudiante_id);
                $pago->setTipo_pago($tipo_pago);
                $pago->setDescripcion($descripcion);
                $pago->setNombre_pago($nombre_pago);

                if (isset($_FILES['transferencia'])) {
                    $image_path = $_FILES['transferencia'];
                    $fileName = $image_path['name'];
                    $type = $image_path['type'];

                    if ($type == 'image/png' || $type == 'image/jpeg' || $type == 'image/jpg') {
                        if (!is_dir('comprobantes')) {
                            mkdir('comprobantes', 0777);
                        }
                        $pago->setTransferencia($fileName);
                        move_uploaded_file($image_path['tmp_name'], 'comprobantes/' . $fileName);
                    }
                }
                $save = $pago->save();

                $save_control = $pago->save_control();

                if ($save && $save_control) {
                    $_SESSION['transferencia'] = 'success';
                } else {
                    $_SESSION['transferencia'] = 'failed';
                }
            } else {
                $_SESSION['errors'] = $errors;
            }
        }
        header('location: ' . base_url . 'pago/pago_transferencia&tipo_pago=' . $tipo_pago . '&nombre_pago=' . $nombre_pago);
    }
}
