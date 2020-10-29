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
        $dia = $this->dia;
        $sql = "SELECT materia_id, nivel_id, seccion, horario_id, dia FROM det_mat_prof WHERE horario_id=$horario AND materia_id=$materia AND nivel_id=$nivel AND seccion='$seccion'";
        $query = $this->db->query($sql);
        
        if($query && $query->num_rows != 0){
            $result = false;
        }else{
            $insert = "INSERT INTO det_mat_prof VALUES(null, {$this->getUsuario_id()}, {$this->getMateria_id()}, {$this->getNivel_id()}, '{$this->getSeccion()}', {$this->getHorario_id()}, '{$this->getDia()}')";
            $result = $this->db->query($insert);
        }
        return $result;
    }

    public function getSeccionByProfesor(){
        $sql = "SELECT u.cedula AS 'cedula', CONCAT(u.primer_nombre, ' ', u.primer_apellido) AS 'profesor', m.nombre AS 'materia', CONCAT(n.numero_tipo, ' ', n.tipo ) AS 'nivel', det.seccion AS 'seccion', h.horario_desde AS 'horario_desde', h.horario_hasta AS 'horario_hasta', det.dia FROM det_mat_prof det INNER JOIN usuario u ON det.usuario_id = u.id INNER JOIN materia m ON det.materia_id = m.id INNER JOIN nivel n ON det.nivel_id = n.id INNER JOIN horario h ON det.horario_id = h.id ORDER BY det.id DESC";

        $profesores = $this->db->query($sql);

        $result = false;
        if($profesores && $profesores->num_rows >= 1){
            $result = $profesores;
        }

        return $result;
    }
}
