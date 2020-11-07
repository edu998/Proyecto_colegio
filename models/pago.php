<?php

class Pago
{

    private $id;
    private $esudiante_id;
    private $tipo_pago;
    private $descripcion;
    private $nombre_pago;
    private $transferencia;
    private $created_at;
    private $updated_at;
    private $status;
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

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;

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

    public function getOne()
    {
        $sql = "SELECT cp.id AS 'cp_id', e.cedula AS 'cedula', cp.status AS 'status', p.nombre_pago AS 'nombre_pago', cp.created_at AS 'fecha', p.transferencia AS 'transferencia', p.tipo_pago AS 'tipo_pago', p.descripcion AS 'descripcion', CONCAT(e.primer_nombre, ' ', e.primer_apellido) AS 'estudiante' FROM control_pago cp INNER JOIN pago p ON cp.pago_id = p.id INNER JOIN estudiante e ON p.estudiante_id = e.id  WHERE cp.id = {$this->getId()}";

        $estudiantes = $this->db->query($sql);

        $result = false;
        if ($estudiantes && $estudiantes->num_rows == 1) {
            $result = $estudiantes->fetch_object();
        }

        return $result;
    }

    public function getControlPagos($buscador = null)
    {
        $sql = "SELECT cp.id AS 'cp_id', e.cedula AS 'cedula', cp.status AS 'status', p.nombre_pago AS 'nombre_pago', cp.created_at AS 'fecha', p.tipo_pago AS 'tipo_pago', CONCAT(e.primer_nombre, ' ', e.primer_apellido) AS 'estudiante' FROM control_pago cp INNER JOIN pago p ON cp.pago_id = p.id INNER JOIN estudiante e ON p.estudiante_id = e.id  ORDER BY cp.id DESC";

        if($buscador != null){
            $sql = "SELECT cp.id AS 'cp_id', e.cedula AS 'cedula', cp.status AS 'status', p.nombre_pago AS 'nombre_pago', cp.created_at AS 'fecha', p.tipo_pago AS 'tipo_pago', CONCAT(e.primer_nombre, ' ', e.primer_apellido) AS 'estudiante' FROM control_pago cp INNER JOIN pago p ON cp.pago_id = p.id INNER JOIN estudiante e ON p.estudiante_id = e.id  WHERE cp.status LIKE '%$buscador%' OR e.cedula LIKE '%$buscador%' OR e.primer_nombre LIKE '%$buscador%' OR e.primer_apellido LIKE '%$buscador%' OR p.tipo_pago LIKE '%$buscador%' OR p.nombre_pago LIKE '%$buscador%' OR cp.created_at LIKE '%$buscador%'";
        }
        $estudiantes = $this->db->query($sql);

        $result = false;
        if ($estudiantes && $estudiantes->num_rows >= 1) {
            $result = $estudiantes;
        }

        return $result;
    }

    public function issetInscrip()
    {
        $sql = "SELECT * FROM pago WHERE estudiante_id = {$this->id} AND nombre_pago='inscripcion'";
        $estudiante = $this->db->query($sql);

        $result = false;
        if ($estudiante && $estudiante->num_rows == 1) {
            $result = true;
        }
        return $result;
    }

    public function delete()
    {
        $sql = "DELETE FROM control_pago WHERE id={$this->getId()}";
        $delete = $this->db->query($sql);
        $result = false;
        if ($delete) {
            $result = true;
        }

        return $result;
    }

    public function edit_status()
    {
        $sql = "UPDATE control_pago SET status='{$this->getStatus()}' WHERE id={$this->getId()}";
        $status = $this->db->query($sql);

        $result = false;

        if ($status) {
            $result = true;
        }

        return $result;
    }
}
