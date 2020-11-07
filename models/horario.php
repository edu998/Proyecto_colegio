<?php 


class Horario{

    private $id;
    private $horario_desde;
    private $horario_hasta;
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

    public function getHorario_desde()
    {
        return $this->horario_desde;
    }


    public function setHorario_desde($horario_desde)
    {
        $this->horario_desde = $horario_desde;

        return $this;
    }


    public function getHorario_hasta()
    {
        return $this->horario_hasta;
    }

    public function setHorario_hasta($horario_hasta)
    {
        $this->horario_hasta = $horario_hasta;

        return $this;
    }

    public function save(){
        $sql = "CALL Add_horario ('{$this->getHorario_desde()}', '{$this->getHorario_hasta()}')";
        $save = $this->db->query($sql);
        $result = false;
        if($save){
            $result = true;
        }

        return $result;
    }

    public function getOne()
    {
        $sql = "SELECT * FROM horario WHERE id={$this->getId()}";
        $horario = $this->db->query($sql);
        $result = false;
        if ($horario && $horario->num_rows == 1) {
            $result = $horario->fetch_object();
            return $result;
        }
    }

    public function getAll(){
        $sql = "SELECT * FROM horario ORDER BY id ASC";
        $horarios = $this->db->query($sql);
        $result = false;
        if($horarios && $horarios->num_rows >= 1){
            $result = $horarios;
            return $result;
        }
    }

    public function getAllBySearch($buscador)
    {
        $sql = "SELECT * FROM horario WHERE horario_desde LIKE '%$buscador%' OR horario_hasta LIKE '%$buscador%'";
        $horarios = $this->db->query($sql);
        $result = false;
        if ($horarios && $horarios->num_rows >= 1) {
            $result = $horarios;
            return $result;
        }
    }

    public function delete()
    {
        $sql = "DELETE FROM horario WHERE id={$this->getId()}";
        $delete = $this->db->query($sql);
        $result = false;
        if ($delete) {
            $result = true;
        }

        return $result;
    }

    public function delete_det()
    {
        $sql = "DELETE det.* FROM det_mat_prof det JOIN horario h ON det.horario_id = h.id WHERE h.id={$this->getId()}";
        $delete = $this->db->query($sql);
        $result = false;
        if ($delete) {
            $result = true;
        }

        return $result;
    }

    public function update()
    {
        $sql = "UPDATE horario SET horario_desde='{$this->getHorario_desde()}', horario_hasta='{$this->getHorario_hasta()}' WHERE id={$this->getId()}";
        $update = $this->db->query($sql);
        $result = false;
        if ($update) {
            $result = true;
        }
        return $result;
    }

}