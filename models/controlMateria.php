<?php

class ControlMateria{

    private $id;
    private $usuario_id;
    private $materia_id;
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
        $sql = "INSERT INTO det_mat_prof VALUES(null, {$this->getUsuario_id()}, {$this->getMateria_id()}, '{$this->getHorario_desde()}', '{$this->getHorario_hasta()}')";

        $save = $this->db->query($sql);
        $result = false;
        if($save){
            $result = true;
        }

        return $result;
    }

    public function getMateriasByUsuario(){
        $sql = "SELECT d.horario_desde, d.horario_hasta, m.nombre AS 'materia', CONCAT(u.primer_nombre, ' ', u.primer_apellido) AS 'profesor' FROM det_mat_prof d INNER JOIN usuario u ON d.usuario_id = u.id INNER JOIN materia m ON d.materia_id = m.id ORDER BY d.id DESC;";

       $profesores_m =  $this->db->query($sql);
        $result = false;
       if($profesores_m && $profesores_m->num_rows >= 1){
            $result = $profesores_m;

            return $result;
       }
    }
}