<?php

class Pago{

    private $id;
    private $esudiante_id;
    private $tipo_pago;
    private $descripcion;
    private $nombre_pago;
    private $transferencia;
    private $created_at;
    private $updated_at;
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


    public function getEsudiante_id()
    {
        return $this->esudiante_id;
    }


    public function setEsudiante_id($esudiante_id)
    {
        $this->esudiante_id = $esudiante_id;

        return $this;
    }


    public function getTipo_pago()
    {
        return $this->tipo_pago;
    }


    public function setTipo_pago($tipo_pago)
    {
        $this->tipo_pago = $tipo_pago;

        return $this;
    }


    public function getDescripcion()
    {
        return $this->descripcion;
    }

 
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

 
    public function getNombre_pago()
    {
        return $this->nombre_pago;
    }


    public function setNombre_pago($nombre_pago)
    {
        $this->nombre_pago = $nombre_pago;

        return $this;
    }

 
    public function getTransferencia()
    {
        return $this->transferencia;
    }


    public function setTransferencia($transferencia)
    {
        $this->transferencia = $transferencia;

        return $this;
    }


    public function getCreated_at()
    {
        return $this->created_at;
    }


    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }


    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getControlPagos(){
        $sql = "SELECT cp.id AS 'cp_id', e.cedula AS 'cedula', cp.status AS 'status', p.nombre_pago AS 'nombre_pago', cp.created_at AS 'fecha', p.tipo_pago AS 'tipo_pago', CONCAT(e.primer_nombre, ' ', e.primer_apellido) AS 'estudiante' FROM control_pago cp INNER JOIN pago p ON cp.pago_id = p.id INNER JOIN estudiante e ON p.estudiante_id = e.id  ORDER BY cp.id DESC";

        $estudiantes = $this->db->query($sql);

        $result = false;
        if($estudiantes && $estudiantes->num_rows >= 1){
            $result = $estudiantes;
        }

        return $result;
    }

    public function save(){
        $sql = "INSERT INTO pago VALUES(null, {$this->getEsudiante_id()}, '{$this->getTipo_pago()}', '{$this->getDescripcion()}', '{$this->getNombre_pago()}', '{$this->getTransferencia()}', CURDATE(), CURDATE())";
        $save = $this->db->query($sql);
        
        $result = false;
        if($save){
            $result = true;
        }

        return $result;
    }

    public function save_control(){
        $result = false;
        $tipo_pago = $this->tipo_pago;
        $last_insert = "SELECT LAST_INSERT_ID() AS 'pago'";
        $pago = $this->db->query($last_insert);
        $pago_id = $pago->fetch_object()->pago;

        if($tipo_pago == 'transferencia'){
            $insert_t="INSERT INTO control_pago VALUES(null, {$pago_id}, 'Ya Pago', CURDATE(), CURDATE())";
            $save_control = $this->db->query($insert_t);
        }elseif($tipo_pago == 'efectivo'){
            $insert_e="INSERT INTO control_pago VALUES(null, {$pago_id}, 'No ha Pagado', CURDATE(), CURDATE())";
            $save_control = $this->db->query($insert_e);
        }
        
        if($save_control){
            $result = true;
        }
        return $result;
    }

    public function issetInscrip(){
        $sql = "SELECT * FROM pago WHERE estudiante_id = {$this->id} AND nombre_pago='inscripcion'";
        $estudiante = $this->db->query($sql);

        $result = false;
        if($estudiante && $estudiante->num_rows == 1){
            $result = true;
        }
        return $result;
    }
}