<?php

class ControlMateria
{

    private $id;
    private $usuario_id;
    private $materia_id;
    private $nivel_id;
    private $seccion;
    private $horario_id;
    private $dia;
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


    public function getUsuario_id()
    {
        return $this->usuario_id;
    }


    public function setUsuario_id($usuario_id)
    {
        $this->usuario_id = $usuario_id;

        return $this;
    }


    public function getMateria_id()
    {
        return $this->materia_id;
    }


    public function setMateria_id($materia_id)
    {
        $this->materia_id = $materia_id;

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


    public function getSeccion()
    {
        return $this->seccion;
    }


    public function setSeccion($seccion)
    {
        $this->seccion = $seccion;

        return $this;
    }


    public function getHorario_id()
    {
        return $this->horario_id;
    }


    public function setHorario_id($horario_id)
    {
        $this->horario_id = $horario_id;

        return $this;
    }


    public function getDia()
    {
        return $this->dia;
    }


    public function setDia($dia)
    {
        $this->dia = $dia;

        return $this;
    }


    public function save()
    {
        $materia = $this->materia_id;
        $nivel = $this->nivel_id;
        $seccion = $this->seccion;
        $horario = $this->horario_id;
        $sql = "SELECT * FROM det_mat_prof WHERE materia_id={$materia} AND nivel_id={$nivel} AND seccion={$seccion} AND horario_id={$horario}";
        $query = $this->db->query($sql);
        
        if($query && $query->num_rows == 1){
            $result = false;
        }elseif(!$query && $query->num_rows != 1) {
            $insert = "INSERT INTO det_mat_prof VALUES(null, {$this->getUsuario_id()}, {$this->getMateria_id()}, {$this->getNivel_id()}, '{$this->getSeccion()}', {$this->getHorario_id()}, '{$this->getDia()}')";
            $result = $this->db->query($insert);
        }
        return $result;
    }
}
