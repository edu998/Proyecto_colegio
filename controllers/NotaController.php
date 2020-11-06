<?php 
require_once 'models/nota.php';

class NotaController{

    public function buscador()
    {
        Utils::isUser();
        if (isset($_POST['nombre'])) {

            $nombre = $_POST['nombre'];

            $nota = new Nota();
            $notas = $nota->getAll($nombre);
            
            if ($notas) {
                require_once 'views/materia/search_nota.php';
            }else{
                $_SESSION['search_m'] = 'failed';
                header('location: ' . base_url . 'nota/gestion_notas');
            }
        } else {
            header('location: ' . base_url . 'nota/gestion_notas');
        }
    }

    public function save(){
        Utils::isUser();
        if(isset($_POST)){
            $usuario_id = isset($_SESSION['user']) ? $_SESSION['user']->id : false;
            $estudiante_id = isset($_POST['estudiante_id']) ? $_POST['estudiante_id'] : false;
            $materia_id = isset($_POST['materia_id']) ? $_POST['materia_id'] : false;
            $primera_nota = isset($_POST['primera_nota']) ? $_POST['primera_nota'] : false;
            $segunda_nota = isset($_POST['segunda_nota']) ? $_POST['segunda_nota'] : false;
            $tercera_nota = isset($_POST['tercera_nota']) ? $_POST['tercera_nota'] : false;
            $cuarta_nota = isset($_POST['cuarta_nota']) ? $_POST['cuarta_nota'] : false;
            $nivel = isset($_GET['nivel']) ? $_GET['nivel'] : false;

            $nota = new Nota();
            $nota->setUsuario_id($usuario_id);
            $nota->setEstudiante_id($estudiante_id);
            $nota->setMateria_id($materia_id);
            $nota->setPrimeraNota($primera_nota);
            $nota->setSegundaNota($segunda_nota);
            $nota->setTerceraNota($tercera_nota);
            $nota->setCuartaNota($cuarta_nota);
            $save = $nota->save();

            if($save){
                $_SESSION['nota'] = 'success';
                header('location: ' . base_url . 'usuario/listado_mis_estudiantes');
            }else {
                $_SESSION['nota'] = 'failed';
                header('location: ' . base_url . 'usuario/LoadMateriaEstudiantes&materia=' . $materia_id . '&estudiante=' . $estudiante_id . '&nivel=' . $nivel);
            }
         }
    }

    public function gestion_notas(){
        Utils::isUser();
        $nota = new Nota();
        $usuario_id = isset($_SESSION['user']) ? $_SESSION['user']->id : false;
        $nota->setUsuario_id($usuario_id);
        $notas = $nota->getAll();
        require_once 'views/usuario/gestion-notas.php';
    }

    public function delete()
    {
        Utils::isUser();
        if (isset($_GET['id'])) {
            $nota_id = $_GET['id'];
            $nota = new Nota();
            $nota->setId($nota_id);
            $delete = $nota->delete();

            if ($delete) {
                $_SESSION['delete_n'] = 'success';
            } else {
                $_SESSION['delete_n'] = 'failed';
            }

            header('location: ' . base_url . 'nota/gestion_notas');
        }
    }
}