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
        $sql = "SELECT usuario_id, materia_id, nivel_id, seccion, horario_id, dia FROM det_mat_prof WHERE horario_id=$horario AND materia_id=$materia AND nivel_id=$nivel AND seccion='$seccion'";
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
        $sql = "SELECT det.id AS 'id', u.cedula AS 'cedula', CONCAT(u.primer_nombre, ' ', u.primer_apellido) AS 'profesor', m.nombre AS 'materia', CONCAT(n.numero_tipo, ' ', n.tipo ) AS 'nivel', det.seccion AS 'seccion', h.horario_desde AS 'horario_desde', h.horario_hasta AS 'horario_hasta', det.dia FROM det_mat_prof det INNER JOIN usuario u ON det.usuario_id = u.id INNER JOIN materia m ON det.materia_id = m.id INNER JOIN nivel n ON det.nivel_id = n.id INNER JOIN horario h ON det.horario_id = h.id ORDER BY det.id DESC";

        $profesores = $this->db->query($sql);

        $result = false;
        if($profesores && $profesores->num_rows >= 1){
            $result = $profesores;
        }

        return $result;
    }

    public function getOne(){
    $sql = "SELECT det.id AS 'id', u.id AS 'usuario_id', n.id AS 'nivel_id', m.id AS 'materia_id', h.id AS 'horario_id', u.cedula AS 'cedula', CONCAT(u.primer_nombre, ' ', u.primer_apellido) AS 'profesor', m.nombre AS 'materia', CONCAT(n.numero_tipo, ' ', n.tipo ) AS 'nivel', det.seccion AS 'seccion', h.horario_desde AS 'horario_desde', h.horario_hasta AS 'horario_hasta', det.dia FROM det_mat_prof det INNER JOIN usuario u ON det.usuario_id = u.id INNER JOIN materia m ON det.materia_id = m.id INNER JOIN nivel n ON det.nivel_id = n.id INNER JOIN horario h ON det.horario_id = h.id WHERE det.id={$this->getId()}";

        $profesor = $this->db->query($sql);

        $result = false;
        if($profesor && $profesor->num_rows == 1){
            $result = $profesor->fetch_object();
        }

        return $result;
    }

    public function getNivel($id){
        $sql = "SELECT m.id AS 'materia_id', s.nombre_seccion AS 'seccion', m.nombre AS 'materia', n.numero_tipo AS 'numero_tipo', n.tipo AS 'tipo' FROM det_mat_prof det INNER JOIN usuario u ON det.usuario_id = u.id INNER JOIN seccion s ON det.seccion = s.nombre_seccion INNER JOIN estudiante e ON s.estudiante_id = e.id INNER JOIN materia m ON det.materia_id = m.id INNER JOIN nivel n ON det.nivel_id = n.id WHERE u.id = $id GROUP BY det.id ORDER BY det.id DESC";

        $niveles = $this->db->query($sql);

        $result = false;
        if($niveles && $niveles->num_rows >= 1){
            $result = $niveles;
        }

        return $result;
    }

    public function getEstudiantes($id){
        $sql = "SELECT  e.id AS 'estudiante_id', n.numero_tipo AS 'numero_tipo', n.tipo AS 'tipo', s.nombre_seccion AS 'seccion', e.cedula AS 'cedula', CONCAT(e.primer_nombre, ' ', e.segundo_nombre) AS 'nombres', CONCAT(e.primer_apellido, ' ', e.segundo_apellido) AS 'apellidos' FROM det_mat_prof det INNER JOIN usuario u ON det.usuario_id = u.id INNER JOIN seccion s ON det.seccion = s.nombre_seccion INNER JOIN estudiante e ON det.nivel_id = e.nivel_id INNER JOIN nivel n ON e.nivel_id = n.id INNER JOIN materia m ON det.materia_id = m.id WHERE u.id = $id AND e.id = s.estudiante_id GROUP BY e.id ORDER BY e.id ASC";

        $estudiantes = $this->db->query($sql);

        $result = false;
        if($estudiantes && $estudiantes->num_rows >= 1){
            $result = $estudiantes;
        }

        return $result;
    }

    public function update()
    {
        $sql = "UPDATE det_mat_prof SET usuario_id={$this->getUsuario_id()}, materia_id={$this->getMateria_id()}, nivel_id={$this->getNivel_id()}, horario_id={$this->getHorario_id()}, seccion='{$this->getSeccion()}', dia='{$this->getDia()}'  WHERE id={$this->getId()}";
        $update = $this->db->query($sql);
        $result = false;
        if ($update) {
            $result = true;
        }
        return $result;
    }

    public function delete()
    {
        $sql = "DELETE FROM det_mat_prof WHERE id={$this->getId()}";
        $delete = $this->db->query($sql);
        $result = false;
        if ($delete) {
            $result = true;
        }

        return $result;
    }
}
