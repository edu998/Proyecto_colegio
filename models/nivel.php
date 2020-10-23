<?php

class Nivel{

    private $id;
    private $nombre;
    private $tipo;
    private $numero_tipo;
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

    public function getTipo()
    {
        return $this->tipo;
    }


    public function setTipo($tipo)
    {
        $this->tipo = $this->db->real_escape_string($tipo);

        return $this;
    }

    public function getNumero_tipo()
    {
        return $this->numero_tipo;
    }

    public function setNumero_tipo($numero_tipo)
    {
        $this->numero_tipo = $numero_tipo;

        return $this;
    }

    public function save(){
        $sql = "INSERT INTO nivel VALUES(null, '{$this->getNombre()}', '{$this->getTipo()}', '{$this->getNumero_tipo()}')";
        $save = $this->db->query($sql);
        $result = false;
        if($save){
            $result = true;
        }

        return $result;
    }

    public function getAll(){
        $sql = "SELECT * FROM nivel ORDER BY id ASC";
        $niveles = $this->db->query($sql);
        $result = false;
        if($niveles && $niveles->num_rows >= 1){
            $result = $niveles;
            return $result;
        }
    }
}