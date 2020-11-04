<?php

require_once 'models/usuario.php';
require_once 'models/estudiante.php';
class UsuarioController
{

    public function gestion_profesor()
    {
        Utils::isAdmin();
        $usuario = new Usuario();
        $profesores = $usuario->getAll();
        require_once 'views/usuario/gestion_profesor.php';
    }

    public function register()
    {
        Utils::isAdmin();
        require_once 'views/usuario/register.php';
    }

    public function save()
    {
        Utils::isAdmin();
        if (isset($_POST)) {
            $cedula = isset($_POST['cedula']) ? $_POST['cedula'] : false;
            $primer_nombre = isset($_POST['primer_nombre']) ? $_POST['primer_nombre'] : false;
            $segundo_nombre = isset($_POST['segundo_nombre']) ? $_POST['segundo_nombre'] : false;
            $primer_apellido = isset($_POST['primer_apellido']) ? $_POST['primer_apellido'] : false;
            $segundo_apellido = isset($_POST['segundo_apellido']) ? $_POST['segundo_apellido'] : false;
            $telefono_celular = isset($_POST['telefono_celular']) ? $_POST['telefono_celular'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;

            $errors = array();

            if (is_numeric($cedula)) {
                $cedula_valido = true;
            } else {
                $cedula_invalido = false;
                $errors['cedula'] = 'Error, La Cedula debe Contener Solo Numeros';
            }

            if (strlen($cedula) == 8) {
                $cedula_valido = true;
            } else {
                $cedula_invalido = false;
                $errors['cedula'] = 'Error, La Cedula debe Contener 8 digitos';
            }

            if (empty($cedula)) {
                $cedula_invalido = false;
                $errors['cedula'] = 'Error, La Cedula esta Vacia y es Requerida';
            } else {
                $cedula_valido = true;
            }

            if (is_string($primer_nombre) && !is_numeric($primer_nombre) && !preg_match("/[0-9]/", $primer_nombre)) {
                $PrimerNombre_valido = true;
            } else {
                $PrimerNombre_invalido = false;
                $errors['primer_nombre'] = 'El Primer Nombre debe Contener Letras';
            }

            if (empty($primer_nombre)) {
                $PrimerNombre_invalido = false;
                $errors['primer_nombre'] = 'Error, El Primer Nombre esta Vacio';
            } else {
                $PrimerNombre_valido = true;
            }

            if (is_string($segundo_nombre) && !is_numeric($segundo_nombre) && !preg_match("/[0-9]/", $segundo_nombre)) {
                $segundoNombre_valido = true;
            } else {
                $segundoNombre_invalido = false;
                $errors['segundo_nombre'] = 'El Segundo Nombre debe Contener Letras';
            }

            if (empty($segundo_nombre)) {
                $segundoNombre_invalido = false;
                $errors['segundo_nombre'] = 'Error, El Segundo Nombre esta Vacio';
            } else {
                $segundoNombre_valido = true;
            }

            if (is_string($primer_apellido) && !is_numeric($primer_apellido) && !preg_match("/[0-9]/", $primer_apellido)) {
                $PrimerApellido_valido = true;
            } else {
                $PrimerApellido_invalido = false;
                $errors['primer_apellido'] = 'El Primer Apellido debe Contener Letras';
            }

            if (empty($primer_apellido)) {
                $PrimerApellido_invalido = false;
                $errors['primer_apellido'] = 'Error, El Primer apellido esta Vacio';
            } else {
                $PrimerApellido_valido = true;
            }

            if (is_string($segundo_apellido) && !is_numeric($segundo_apellido) && !preg_match("/[0-9]/", $segundo_apellido)) {
                $segundoApellido_valido = true;
            } else {
                $segundoApellido_invalido = false;
                $errors['segundo_apellido'] = 'El Segundo Apellido debe Contener Letras';
            }

            if (empty($segundo_apellido)) {
                $segundoApellido_invalido = false;
                $errors['segundo_apellido'] = 'Error, El Segundo Apellido esta Vacio';
            } else {
                $segundoApellido_valido = true;
            }

            if (is_numeric($telefono_celular)) {
                $telefonoCelular_valido = true;
            } else {
                $telefonoCelular_invalidoo = false;
                $errors['telefono_celular'] = 'Error, El Numero Celular debe Contener Solo Numeros';
            }

            if (strlen($telefono_celular) == 11) {
                $telefonoCelular_valido = true;
            } else {
                $telefonoCelular_invalido = false;
                $errors['telefono_celular'] = 'Error, El Telefono Celular debe Contener 11 digitos';
            }

            if (empty($telefono_celular)) {
                $telefonoCelular_invalido = false;
                $errors['telefono_celular'] = 'Error, El Telefono Celular esta Vacio';
            } else {
                $telefonoCelular_valido = true;
            }

            if (empty($email)) {
                $email_invalido = false;
                $errors['email'] = 'Error, El Email esta Vacio y es Requerido';
            } else {
                $email_valido = true;
            }

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $email_valido = true;
            } else {
                $email_invalido = false;
                $errors['email'] = 'Error, El Email que insertaste es Invalido';
            }

            if (empty($direccion)) {
                $direccion_invalido = false;
                $errors['direccion'] = 'Error, La Direccion esta Vacio y es Requerido';
            } else {
                $direccion_valido = true;
            }

            if (count($errors) == 0) {
                $usuario = new Usuario();
                $usuario->setCedula($cedula);
                $usuario->setPrimer_nombre($primer_nombre);
                $usuario->setSegundo_nombre($segundo_nombre);
                $usuario->setPrimer_apellido($primer_apellido);
                $usuario->setSegundo_apellido($segundo_apellido);
                $usuario->setTelefono_celular($telefono_celular);
                $usuario->setEmail($email);
                $usuario->setSexo($sexo);
                $usuario->setDireccion($direccion);

                if (isset($_GET['id'])) {
                    $usuario_id = $_GET['id'];
                    $usuario->setId($usuario_id);
                    $update = $usuario->update();

                    if ($update) {
                        $_SESSION['usuario'] = 'success';
                        header('location: ' . base_url . 'usuario/edit&id=' . $usuario_id);
                    } else {
                        $_SESSION['usuario'] = 'failed';
                        header('location: ' . base_url . 'usuario/edit&id=' . $usuario_id);
                    }
                } else {
                    $save = $usuario->save();
                    if ($save) {
                        $_SESSION['usuario'] = 'success';
                        header('location: ' . base_url . 'usuario/register');
                    } else {
                        $_SESSION['usuario'] = 'failed';
                        header('location: ' . base_url . 'usuario/register');
                    }
                }

            } else {
                $_SESSION['errors'] = $errors;
                header('location: ' . base_url . 'usuario/register');
                if (isset($_GET['id'])) {
                    header('location: ' . base_url . 'usuario/edit&id=' . $_GET['id']);
                }
            }
        }
    }

    public function login()
    {
        require_once 'views/usuario/login.php';
    }

    public function authentication()
    {
        if (isset($_POST)) {
            $username = isset($_POST['username']) ? $_POST['username'] : false;

            $usuario = new Usuario();
            $usuario->setCedula($username);
            $authentication = $usuario->login();

            if ($authentication && is_object($authentication)) {
                if ($authentication->role == 'user') {
                    $_SESSION['user'] = $authentication;
                    header('location: ' . base_url . 'usuario/listado_mis_estudiantes');
                }
                if ($authentication->role == 'admin') {
                    $_SESSION['admin'] = true;
                    header('location: ' . base_url . 'nivel/gestion_nivel');
                }
            } else {
                $estudiante = new Estudiante();
                $estudiante->setCedula($username);
                $authentication_dos = $estudiante->login_dos();

                if ($authentication_dos && is_object($authentication_dos)) {
                    $_SESSION['student'] = $authentication_dos;

                    header('location: ' . base_url . 'inscripcion/elige_pago');
                } else {
                    $_SESSION['error_login'] = 'failed';
                    header('location: ' . base_url . 'usuario/login');
                }
            }
        }
    }

    public function logout()
    {
        if (isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
        }

        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }

        if (isset($_SESSION['student'])) {
            unset($_SESSION['student']);
        }
        return header('location: ' . base_url . 'usuario/login');
    }

    public function detail()
    {
        Utils::isAdmin();
        if (isset($_GET['id'])) {
            $usuario_id = $_GET['id'];

            $usuarios = new Usuario();
            $usuarios->setId($usuario_id);
            $usuario = $usuarios->getUserById();

            require_once 'views/usuario/detail.php';
        } else {
            $_SESSION['not_found'] = 'failed';
            header('location:' . base_url . 'usuario/gestion_profesor');
        }
    }

    public static function LoadMateriaEstudiantes()
    {
        Utils::isUser();
        if (isset($_GET['materia']) && isset($_GET['estudiante']) && isset($_GET['nivel'])) {
            $materia_id = $_GET['materia'];
            $estudiante_id = $_GET['estudiante'];
            $nivel = $_GET['nivel'];
            require_once 'views/usuario/cargar-notas.php';
        } else {
            header('location:' . base_url . 'usuario/listado_mis_estudiantes');
        }
    }

    public function listado_mis_estudiantes()
    {
        Utils::isUser();
        require_once 'views/usuario/listado-estudiantes.php';
    }

    public function edit()
    {
        if (isset($_GET['id'])) {
            $usuario_id = $_GET['id'];
            $usuario = new Usuario();
            $usuario->setId($usuario_id);
            $usuario_o = $usuario->getOne();

            require_once 'views/usuario/register.php';
        } else {
            header('location: ' . base_url . 'usuario/gestion_profesor');
        }
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $usuario_id = $_GET['id'];
            $usuario = new Usuario();
            $usuario->setId($usuario_id);
            $delete = $usuario->delete();

            if ($delete) {
                $_SESSION['usuario'] = 'success';
            } else {
                $_SESSION['usuario'] = 'failed';
            }

            header('location: ' . base_url . 'usuario/gestion_profesor');
        }
    }
}
