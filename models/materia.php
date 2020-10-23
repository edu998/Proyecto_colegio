<?php 


class Materia{

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

    public function save(){
        $sql = "INSERT INTO materia VALUES(null, '{$this->getNombre()}')";
        $save = $this->db->query($sql);
        $result = false;
        if($save){
            $result = true;
        }

        return $result;
    }

    public function getAll(){
        $sql = "SELECT * FROM materia ORDER BY id DESC";
        $materias = $this->db->query($sql);
        $result = false;
        if($materias && $materias->num_rows >= 1){
            $result = $materias;
            return $result;
        }
    }

}