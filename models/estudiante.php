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
    private $status;
    private $db;


    public function __construct()
    {
        $this->db = DB::connectionE();
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

    public function getStatus()
    {
        return $this->status;
    }


    public function setStatus($status)
    {
        $this->status = $status;

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

    public function getListado($buscador = null){
        $sql = "SELECT e.id AS 'estudiante_id', i.status AS 'status',e.cedula AS 'cedula', e.primer_nombre AS 'primer_nombre', e.segundo_nombre AS 'segundo_nombre', e.primer_apellido AS 'primer_apellido', e.segundo_apellido AS 'segundo_apellido', n.nombre AS 'nivel', n.tipo AS 'tipo', n.numero_tipo AS 'numero'  FROM inscripcion i INNER JOIN estudiante e ON i.estudiante_id = e.id INNER JOIN nivel n ON e.nivel_id = n.id ORDER BY i.id DESC";
        

        if($buscador != null){
            $sql = "SELECT e.id AS 'estudiante_id', i.status AS 'status',e.cedula AS 'cedula', e.primer_nombre AS 'primer_nombre', e.segundo_nombre AS 'segundo_nombre', e.primer_apellido AS 'primer_apellido', e.segundo_apellido AS 'segundo_apellido', n.nombre AS 'nivel', n.tipo AS 'tipo', n.numero_tipo AS 'numero'  FROM inscripcion i INNER JOIN estudiante e ON i.estudiante_id = e.id INNER JOIN nivel n ON e.nivel_id = n.id WHERE i.status LIKE '%$buscador%' OR e.cedula LIKE '%$buscador%' OR e.primer_nombre LIKE '%$buscador%' OR e.segundo_nombre LIKE '%$buscador%' OR e.primer_apellido LIKE '%$buscador%' OR e.segundo_apellido LIKE '%$buscador%'";
        }
        $estudiantes = $this->db->query($sql);
        $result = false;
        if($estudiantes && $estudiantes->num_rows >= 1){
            $result = $estudiantes;
        }

        return $result;
    }

    public function getOne(){
    $sql = "SELECT e.id AS 'estudiante_id', i.status AS 'status',e.cedula AS 'cedula', e.primer_nombre AS 'primer_nombre', e.segundo_nombre AS 'segundo_nombre', e.primer_apellido AS 'primer_apellido', e.segundo_apellido AS 'segundo_apellido', n.nombre AS 'nivel', n.tipo AS 'tipo', n.numero_tipo AS 'numero'  FROM inscripcion i INNER JOIN estudiante e ON i.estudiante_id = e.id INNER JOIN nivel n ON e.nivel_id = n.id WHERE e.id={$this->getId()}";
        $estudiante = $this->db->query($sql);

        $result = false;
        if($estudiante && $estudiante->num_rows == 1){
            $result = $estudiante->fetch_object();
        }

        return $result;
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
