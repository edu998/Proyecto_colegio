<?php

class Estudiante
{

    private $id;
    private $cedula;
    private $nivel_id;
    private $primer_nombre;
    private $segundo_nombre;
    private $primer_apellido;
    private $segundo_apellido;
    private $telefono_celular;
    private $email;
    private $sexo;
    private $direccion;
    private $db;


    public function __construct()
    {
        $this->db = DB::connection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getCedula()
    {
        return $this->cedula;
    }

    public function setCedula($cedula)
    {
        $this->cedula = $cedula;

        return $this;
    }

    public function getNivel_id()
    {
        return $this->nivel_id;
    }

    public function setNivel_id($nivel_id)
    {
        $this->nivel_id = $nivel_id;

        return $this;
    }

    public function getPrimer_nombre()
    {
        return $this->primer_nombre;
    }

    public function setPrimer_nombre($primer_nombre)
    {
        $this->primer_nombre = $this->db->real_escape_string($primer_nombre);

        return $this;
    }

    public function getSegundo_nombre()
    {
        return $this->segundo_nombre;
    }

    public function setSegundo_nombre($segundo_nombre)
    {
        $this->segundo_nombre = $this->db->real_escape_string($segundo_nombre);

        return $this;
    }

    public function getPrimer_apellido()
    {
        return $this->primer_apellido;
    }

    public function setPrimer_apellido($primer_apellido)
    {
        $this->primer_apellido = $this->db->real_escape_string($primer_apellido);

        return $this;
    }

    public function getSegundo_apellido()
    {
        return $this->segundo_apellido;
    }

    public function setSegundo_apellido($segundo_apellido)
    {
        $this->segundo_apellido = $this->db->real_escape_string($segundo_apellido);

        return $this;
    }

    public function getTelefono_celular()
    {
        return $this->telefono_celular;
    }

    public function setTelefono_celular($telefono_celular)
    {
        $this->telefono_celular = $telefono_celular;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $this->db->real_escape_string($email);

        return $this;
    }

    public function getSexo()
    {
        return $this->sexo;
    }

    public function setSexo($sexo)
    {
        $this->sexo = $this->db->real_escape_string($sexo);

        return $this;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $this->db->real_escape_string($direccion);

        return $this;
    }

    public function save()
    {
        $sql = "INSERT INTO estudiante VALUES(NULL, {$this->getCedula()}, {$this->getNivel_id()}, '{$this->getPrimer_nombre()}', '{$this->getSegundo_nombre()}', '{$this->getPrimer_apellido()}', '{$this->getSegundo_apellido()}', {$this->getTelefono_celular()}, '{$this->getEmail()}', '{$this->getSexo()}', '{$this->getDireccion()}')";

        $save = $this->db->query($sql);
        $result = false;
        if ($save) {
            $result = true;
        }

        return $result;
    }

    public function save_inscripcion(){
        $sql = "SELECT LAST_INSERT_ID() AS 'estudiante'";
        $estudiante = $this->db->query($sql);
        $estudiante_id = $estudiante->fetch_object()->estudiante;

        $insert = "INSERT INTO inscripcion VALUES(null, {$estudiante_id}, 'ingresado')";
        $save_inscripcion = $this->db->query($insert);

        $result = false;
        if($save_inscripcion){
            $result = true;
        }

        return $result;
    }

    public function login_dos()
    {
        $result = false;
        $cedula = $this->cedula;
        $sql = "SELECT * FROM estudiante WHERE cedula = $cedula";
        $authentication = $this->db->query($sql);

        if ($authentication && $authentication->num_rows == 1) {
            $result = $authentication->fetch_object();
        }

        return $result;
    }
}
