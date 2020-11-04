<?php


class Materia
{

    private $id;
    private $nombre;
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


    public function getNombre()
    {
        return $this->nombre;
    }


    public function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);

        return $this;
    }

    public function save()
    {
        $sql = "INSERT INTO materia VALUES(null, '{$this->getNombre()}')";
        $save = $this->db->query($sql);
        $result = false;
        if ($save) {
            $result = true;
        }

        return $result;
    }

    public function getOne()
    {
        $sql = "SELECT * FROM materia WHERE id={$this->getId()}";
        $materia = $this->db->query($sql);
        $result = false;
        if ($materia && $materia->num_rows == 1) {
            $result = $materia->fetch_object();
            return $result;
        }
    }

    public function getAll()
    {
        $sql = "SELECT * FROM materia ORDER BY id DESC";
        $materias = $this->db->query($sql);
        $result = false;
        if ($materias && $materias->num_rows >= 1) {
            $result = $materias;
            return $result;
        }
    }

    public function delete()
    {
        $sql = "DELETE FROM materia WHERE id={$this->getId()}";
        $delete = $this->db->query($sql);
        $result = false;
        if ($delete) {
            $result = true;
        }

        return $result;
    }

    public function delete_det()
    {
        $sql = "DELETE det.* FROM det_mat_prof det JOIN materia m ON det.materia_id = m.id WHERE m.id={$this->getId()}";
        $delete = $this->db->query($sql);
        $result = false;
        if ($delete) {
            $result = true;
        }

        return $result;
    }

    public function update()
    {
        $sql = "UPDATE materia SET nombre='{$this->getNombre()}' WHERE id={$this->getId()}";
        $update = $this->db->query($sql);
        $result = false;
        if ($update) {
            $result = true;
        }
        return $result;
    }
}
