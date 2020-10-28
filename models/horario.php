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
        $sql = "INSERT INTO horario VALUES(null, '{$this->getHorario_desde()}', '{$this->getHorario_hasta()}')";
        $save = $this->db->query($sql);
        $result = false;
        if($save){
            $result = true;
        }

        return $result;
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

}