<?php


class Seccion
{

    private $id;
    private $estudiante_id;
    private $nombre_seccion;
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


    public function getEstudiante_id()
    {
        return $this->estudiante_id;
    }


    public function setEstudiante_id($estudiante_id)
    {
        $this->estudiante_id = $estudiante_id;

        return $this;
    }


    public function getNombre_seccion()
    {
        return $this->nombre_seccion;
    }


    public function setNombre_seccion($nombre_seccion)
    {
        $this->nombre_seccion = $nombre_seccion;

        return $this;
    }

    public function save()
    {
        $sql = "INSERT INTO seccion VALUES(null, {$this->getEstudiante_id()}, '{$this->getNombre_seccion()}')";
        $save = $this->db->query($sql);
        $result = false;
        if ($save) {
            $result = true;
            return $result;
        }

        
    }

    public function getAllByNivel()
    {
        $sql = "SELECT e.id AS 'id', e.cedula AS 'cedula', e.primer_nombre AS 'primer_nombre', e.segundo_nombre AS 'segundo_nombre', e.primer_apellido AS 'primer_apellido', e.segundo_apellido AS 'segundo_apellido', n.nombre AS 'nivel', n.tipo AS 'tipo', n.numero_tipo AS 'numero' FROM control_pago cp INNER JOIN pago p ON cp.pago_id = p.id INNER JOIN estudiante e ON p.estudiante_id = e.id INNER JOIN nivel n ON e.nivel_id = n.id WHERE p.nombre_pago = 'inscripcion' AND cp.status = 'Ya Pago' ORDER BY e.id DESC";
        $bachillerato = $this->db->query($sql);
        $result = false;
        if ($bachillerato && $bachillerato->num_rows >= 1) {
            $result = $bachillerato;
            return $result;
        }
    }

    public function getIdBySeccion($id) {
        $sql = "SELECT * FROM seccion WHERE estudiante_id = {$id}";
        $estudiante = $this->db->query($sql);

        $result = false;
        if ($estudiante &&  $estudiante->num_rows == 1) {
            $result = $estudiante->fetch_object();
        }

        return $result;
    }

}
