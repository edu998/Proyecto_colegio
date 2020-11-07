<?php

class Nota
{

    private $id;
    private $usuario_id;
    private $estudiante_id;
    private $materia_id;
    private $primera_nota;
    private $segunda_nota;
    private $tercera_nota;
    private $cuarta_nota;
    private $db;

    public function __construct()
    {
        $this->db = DB::connectionP();
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

    public function getEstudiante_id()
    {
        return $this->estudiante_id;
    }


    public function setEstudiante_id($estudiante_id)
    {
        $this->estudiante_id = $estudiante_id;

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

    public function getPrimeraNota()
    {
        return $this->primera_nota;
    }


    public function setPrimeraNota($primera_nota)
    {
        $this->primera_nota = $primera_nota;

        return $this;
    }

    public function getSegundaNota()
    {
        return $this->segunda_nota;
    }


    public function setSegundaNota($segunda_nota)
    {
        $this->segunda_nota = $segunda_nota;

        return $this;
    }

    public function getTerceraNota()
    {
        return $this->tercera_nota;
    }


    public function setTerceraNota($tercera_nota)
    {
        $this->tercera_nota = $tercera_nota;

        return $this;
    }

    public function getCuartaNota()
    {
        return $this->cuarta_nota;
    }


    public function setCuartaNota($cuarta_nota)
    {
        $this->cuarta_nota = $cuarta_nota;

        return $this;
    }

    public function save()
    {
        $result = false;
        $estudiante_id = $this->estudiante_id;
        $materia_id = $this->materia_id;
        $query = "SELECT estudiante_id, materia_id FROM nota WHERE estudiante_id = $estudiante_id AND materia_id = $materia_id";
        $e_query = $this->db->query($query);

        if ($e_query && $e_query->num_rows != 0) {
            $result = false;
        } else {
            $sql = "INSERT INTO nota VALUES(null, {$this->getUsuario_id()},{$this->getEstudiante_id()}, '{$this->getMateria_id()}', '{$this->getPrimeraNota()}', '{$this->getSegundaNota()}', '{$this->getTerceraNota()}', '{$this->getCuartaNota()}')";
            $result = $this->db->query($sql);
        }

        if ($result) {
            $result = true;
        }

        return $result;
    }

    public function getAll($buscador = null)
    {
        $sql = "SELECT n.id AS 'id', e.cedula AS 'cedula', CONCAT(e.primer_nombre, ' ', e.primer_apellido) AS 'estudiante', m.nombre AS 'materia', n.primera_nota AS 'primera', n.segunda_nota AS 'segunda', n.tercera_nota AS 'tercera', n.cuarta_nota AS 'cuarta', (n.primera_nota + n.segunda_nota + n.tercera_nota + n.cuarta_nota)/4 AS 'nota_final' FROM nota n INNER JOIN estudiante e ON n.estudiante_id = e.id INNER JOIN materia m ON n.materia_id = m.id WHERE n.usuario_id = {$this->getUsuario_id()} ORDER BY n.id DESC";

        if($buscador != null){
        $sql = "SELECT n.id AS 'id', e.cedula AS 'cedula', CONCAT(e.primer_nombre, ' ', e.primer_apellido) AS 'estudiante', m.nombre AS 'materia', n.primera_nota AS 'primera', n.segunda_nota AS 'segunda', n.tercera_nota AS 'tercera', n.cuarta_nota AS 'cuarta', (n.primera_nota + n.segunda_nota + n.tercera_nota + n.cuarta_nota)/4 AS 'nota_final' FROM nota n INNER JOIN usuario u ON n.usuario_id = u.id INNER JOIN estudiante e ON n.estudiante_id = e.id INNER JOIN materia m ON n.materia_id = m.id WHERE n.usuario_id={$this->getUsuario_id()} OR m.nombre LIKE '$buscador'";
        }

        $estudiantes_nota = $this->db->query($sql);

        $result = false;
        if ($estudiantes_nota && $estudiantes_nota->num_rows >= 1) {
            $result = $estudiantes_nota;
        }

        return $result;
    }

    public function delete()
    {
        $sql = "DELETE FROM nota WHERE id={$this->getId()}";
        $delete = $this->db->query($sql);
        $result = false;
        if ($delete) {
            $result = true;
        }

        return $result;
    }
}
