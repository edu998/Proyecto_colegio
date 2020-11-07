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

    public function edit_seccion()
    {
        $sql = "UPDATE seccion SET nombre_seccion='{$this->getNombre_seccion()}' WHERE estudiante_id={$this->getEstudiante_id()}";
        $seccion = $this->db->query($sql);

        $result = false;

        if ($seccion) {
            $result = true;
        }

        return $result;
    }

    public function getOne()
    {
    $sql = "SELECT e.id AS 'id', e.cedula AS 'cedula', CONCAT(e.primer_nombre, ' ', e.primer_apellido) AS 'estudiante', n.nombre AS 'nivel', n.tipo AS 'tipo', n.numero_tipo AS 'numero' FROM control_pago cp INNER JOIN pago p ON cp.pago_id = p.id INNER JOIN estudiante e ON p.estudiante_id = e.id INNER JOIN nivel n ON e.nivel_id = n.id WHERE p.nombre_pago = 'inscripcion' AND cp.status = 'Ya Pago' AND e.id={$this->getEstudiante_id()}";
        $seccion = $this->db->query($sql);
        $result = false;
        if ($seccion && $seccion->num_rows == 1) {
            $result = $seccion->fetch_object();
            return $result;
        }
    }

    public function getAllBySearch($nivel, $seccion)
    {
        $sql = "SELECT n.numero_tipo AS 'numero_tipo', n.tipo AS 'tipo', s.nombre_seccion AS 'seccion', e.cedula AS 'cedula', CONCAT(e.primer_nombre, ' ',e.segundo_nombre) AS 'nombres', CONCAT(e.primer_apellido, ' ',e.segundo_apellido) AS 'apellidos' FROM seccion s INNER JOIN estudiante e ON s.estudiante_id=e.id INNER JOIN nivel n ON e.nivel_id = n.id INNER JOIN inscripcion i ON i.estudiante_id = e.id WHERE e.nivel_id=$nivel AND s.nombre_seccion='$seccion'";
        $search = $this->db->query($sql);
        $result = false;
        if ($search && $search->num_rows >= 1) {
            $result = $search;
            return $result;
        }
    }

    public function getAllBySearchB($buscador)
    {
        $sql = "SELECT e.id AS 'id', e.cedula AS 'cedula', e.primer_nombre AS 'primer_nombre', e.segundo_nombre AS 'segundo_nombre', e.primer_apellido AS 'primer_apellido', e.segundo_apellido AS 'segundo_apellido', n.nombre AS 'nivel', n.tipo AS 'tipo', n.numero_tipo AS 'numero' FROM control_pago cp INNER JOIN pago p ON cp.pago_id = p.id INNER JOIN estudiante e ON p.estudiante_id = e.id  INNER JOIN nivel n ON e.nivel_id = n.id INNER JOIN inscripcion i ON i.estudiante_id = e.id WHERE p.nombre_pago = 'inscripcion' AND cp.status = 'Ya Pago' AND i.status = 'ingresado' AND n.nombre = 'Bachillerato' AND e.cedula LIKE '%$buscador%' OR e.primer_nombre LIKE '%$buscador%' OR e.segundo_nombre LIKE '%$buscador%' OR e.primer_apellido LIKE '%$buscador%' OR e.segundo_apellido LIKE '%$buscador%'";

        $search = $this->db->query($sql);
        $result = false;
        if ($search && $search->num_rows >= 1) {
            $result = $search;
            return $result;
        }
    }

    public function getAllBySearchP($buscador)
    {
        $sql = "SELECT e.id AS 'id', e.cedula AS 'cedula', e.primer_nombre AS 'primer_nombre', e.segundo_nombre AS 'segundo_nombre', e.primer_apellido AS 'primer_apellido', e.segundo_apellido AS 'segundo_apellido', n.nombre AS 'nivel', n.tipo AS 'tipo', n.numero_tipo AS 'numero' FROM control_pago cp INNER JOIN pago p ON cp.pago_id = p.id INNER JOIN estudiante e ON p.estudiante_id = e.id  INNER JOIN nivel n ON e.nivel_id = n.id INNER JOIN inscripcion i ON i.estudiante_id = e.id WHERE p.nombre_pago = 'inscripcion' AND cp.status = 'Ya Pago' AND i.status = 'ingresado' AND n.nombre = 'Primaria' AND e.cedula LIKE '%$buscador%' OR e.primer_nombre LIKE '%$buscador%' OR e.segundo_nombre LIKE '%$buscador%' OR e.primer_apellido LIKE '%$buscador%' OR e.segundo_apellido LIKE '%$buscador%'";

        $search = $this->db->query($sql);
        $result = false;
        if ($search && $search->num_rows >= 1) {
            $result = $search;
            return $result;
        }
    }

    public function getAllByNivel($nivel=null, $seccion=null)
    {
        $sql = "SELECT e.id AS 'id', e.cedula AS 'cedula', e.primer_nombre AS 'primer_nombre', e.segundo_nombre AS 'segundo_nombre', e.primer_apellido AS 'primer_apellido', e.segundo_apellido AS 'segundo_apellido', n.nombre AS 'nivel', n.tipo AS 'tipo', n.numero_tipo AS 'numero' FROM control_pago cp INNER JOIN pago p ON cp.pago_id = p.id INNER JOIN estudiante e ON p.estudiante_id = e.id INNER JOIN nivel n ON e.nivel_id = n.id INNER JOIN inscripcion i ON i.estudiante_id = e.id WHERE p.nombre_pago = 'inscripcion' AND cp.status = 'Ya Pago' AND i.status = 'ingresado' ORDER BY e.id DESC";

        if($nivel != null && $seccion != null){
            $sql = "SELECT e.id AS 'id', e.cedula AS 'cedula', e.primer_nombre AS 'primer_nombre', e.segundo_nombre AS 'segundo_nombre', e.primer_apellido AS 'primer_apellido', e.segundo_apellido AS 'segundo_apellido', n.nombre AS 'nivel', n.tipo AS 'tipo', n.numero_tipo AS 'numero' FROM control_pago cp INNER JOIN pago p ON cp.pago_id = p.id INNER JOIN estudiante e ON p.estudiante_id = e.id INNER JOIN seccion s ON s.estudiante_id = e.id INNER JOIN nivel n ON e.nivel_id = n.id INNER JOIN inscripcion i ON i.estudiante_id = e.id WHERE p.nombre_pago = 'inscripcion' AND cp.status = 'Ya Pago' AND i.status = 'ingresado' AND e.nivel_id=$nivel AND s.nombre_seccion = '$seccion'";
        }

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

    public function getSeccionByNivel2(){
        $sql = "SELECT n.numero_tipo AS 'numero_tipo', n.tipo AS 'tipo', s.nombre_seccion AS 'seccion', e.cedula AS 'cedula', CONCAT(e.primer_nombre, ' ',e.segundo_nombre) AS 'nombres', CONCAT(e.primer_apellido, ' ',e.segundo_apellido) AS 'apellidos' FROM seccion s INNER JOIN estudiante e ON s.estudiante_id=e.id INNER JOIN nivel n ON e.nivel_id = n.id INNER JOIN inscripcion i ON i.estudiante_id = e.id WHERE n.numero_tipo = 1 AND n.tipo = 'Año' AND s.nombre_seccion = 'A' AND i.status = 'ingresado' ORDER BY e.cedula ASC";

        $estudiantes_seccion = $this->db->query($sql);
        $result = false;
        if($estudiantes_seccion && $estudiantes_seccion->num_rows >= 1){
            $result = $estudiantes_seccion;
        }

        return $result;
    }

    public function getSeccionByNivel3(){
        $sql = "SELECT n.numero_tipo AS 'numero_tipo', n.tipo AS 'tipo', s.nombre_seccion AS 'seccion', e.cedula AS 'cedula', CONCAT(e.primer_nombre, ' ',e.segundo_nombre) AS 'nombres', CONCAT(e.primer_apellido, ' ',e.segundo_apellido) AS 'apellidos' FROM seccion s INNER JOIN estudiante e ON s.estudiante_id=e.id INNER JOIN nivel n ON e.nivel_id = n.id INNER JOIN inscripcion i ON i.estudiante_id = e.id WHERE n.numero_tipo = 1 AND n.tipo = 'Año' AND s.nombre_seccion = 'B' AND i.status = 'ingresado' ORDER BY e.cedula ASC";

        $estudiantes_seccion = $this->db->query($sql);
        $result = false;
        if($estudiantes_seccion && $estudiantes_seccion->num_rows >= 1){
            $result = $estudiantes_seccion;
        }

        return $result;
    }

    public function getSeccionByNivel4(){
        $sql = "SELECT n.numero_tipo AS 'numero_tipo', n.tipo AS 'tipo', s.nombre_seccion AS 'seccion', e.cedula AS 'cedula', CONCAT(e.primer_nombre, ' ',e.segundo_nombre) AS 'nombres', CONCAT(e.primer_apellido, ' ',e.segundo_apellido) AS 'apellidos' FROM seccion s INNER JOIN estudiante e ON s.estudiante_id=e.id INNER JOIN nivel n ON e.nivel_id = n.id INNER JOIN inscripcion i ON i.estudiante_id = e.id WHERE n.numero_tipo = 2 AND n.tipo = 'Año' AND s.nombre_seccion = 'A' AND i.status = 'ingresado' ORDER BY e.cedula ASC";

        $estudiantes_seccion = $this->db->query($sql);
        $result = false;
        if($estudiantes_seccion && $estudiantes_seccion->num_rows >= 1){
            $result = $estudiantes_seccion;
        }

        return $result;
    }

    public function getSeccionByNivel5(){
        $sql = "SELECT n.numero_tipo AS 'numero_tipo', n.tipo AS 'tipo', s.nombre_seccion AS 'seccion', e.cedula AS 'cedula', CONCAT(e.primer_nombre, ' ',e.segundo_nombre) AS 'nombres', CONCAT(e.primer_apellido, ' ',e.segundo_apellido) AS 'apellidos' FROM seccion s INNER JOIN estudiante e ON s.estudiante_id=e.id INNER JOIN nivel n ON e.nivel_id = n.id INNER JOIN inscripcion i ON i.estudiante_id = e.id WHERE n.numero_tipo = 2 AND n.tipo = 'Año' AND s.nombre_seccion = 'B' AND i.status = 'ingresado' ORDER BY e.cedula ASC";

        $estudiantes_seccion = $this->db->query($sql);
        $result = false;
        if($estudiantes_seccion && $estudiantes_seccion->num_rows >= 1){
            $result = $estudiantes_seccion;
        }

        return $result;
    }

    public function getSeccionByNivel6(){
        $sql = "SELECT n.numero_tipo AS 'numero_tipo', n.tipo AS 'tipo', s.nombre_seccion AS 'seccion', e.cedula AS 'cedula', CONCAT(e.primer_nombre, ' ',e.segundo_nombre) AS 'nombres', CONCAT(e.primer_apellido, ' ',e.segundo_apellido) AS 'apellidos' FROM seccion s INNER JOIN estudiante e ON s.estudiante_id=e.id INNER JOIN nivel n ON e.nivel_id = n.id INNER JOIN inscripcion i ON i.estudiante_id = e.id WHERE n.numero_tipo = 3 AND n.tipo = 'Año' AND s.nombre_seccion = 'A' AND i.status = 'ingresado' ORDER BY e.cedula ASC";

        $estudiantes_seccion = $this->db->query($sql);
        $result = false;
        if($estudiantes_seccion && $estudiantes_seccion->num_rows >= 1){
            $result = $estudiantes_seccion;
        }

        return $result;
    }

    public function getSeccionByNivel7(){
        $sql = "SELECT n.numero_tipo AS 'numero_tipo', n.tipo AS 'tipo', s.nombre_seccion AS 'seccion', e.cedula AS 'cedula', CONCAT(e.primer_nombre, ' ',e.segundo_nombre) AS 'nombres', CONCAT(e.primer_apellido, ' ',e.segundo_apellido) AS 'apellidos' FROM seccion s INNER JOIN estudiante e ON s.estudiante_id=e.id INNER JOIN nivel n ON e.nivel_id = n.id INNER JOIN inscripcion i ON i.estudiante_id = e.id WHERE n.numero_tipo = 3 AND n.tipo = 'Año' AND s.nombre_seccion = 'B' AND i.status = 'ingresado' ORDER BY e.cedula ASC";

        $estudiantes_seccion = $this->db->query($sql);
        $result = false;
        if($estudiantes_seccion && $estudiantes_seccion->num_rows >= 1){
            $result = $estudiantes_seccion;
        }

        return $result;
    }

    public function getSeccionByNivel8(){
        $sql = "SELECT n.numero_tipo AS 'numero_tipo', n.tipo AS 'tipo', s.nombre_seccion AS 'seccion', e.cedula AS 'cedula', CONCAT(e.primer_nombre, ' ',e.segundo_nombre) AS 'nombres', CONCAT(e.primer_apellido, ' ',e.segundo_apellido) AS 'apellidos' FROM seccion s INNER JOIN estudiante e ON s.estudiante_id=e.id INNER JOIN nivel n ON e.nivel_id = n.id INNER JOIN inscripcion i ON i.estudiante_id = e.id WHERE n.numero_tipo = 4 AND n.tipo = 'Año' AND s.nombre_seccion = 'A' AND i.status = 'ingresado' ORDER BY e.cedula ASC";

        $estudiantes_seccion = $this->db->query($sql);
        $result = false;
        if($estudiantes_seccion && $estudiantes_seccion->num_rows >= 1){
            $result = $estudiantes_seccion;
        }

        return $result;
    }

    public function getSeccionByNivel9(){
        $sql = "SELECT n.numero_tipo AS 'numero_tipo', n.tipo AS 'tipo', s.nombre_seccion AS 'seccion', e.cedula AS 'cedula', CONCAT(e.primer_nombre, ' ',e.segundo_nombre) AS 'nombres', CONCAT(e.primer_apellido, ' ',e.segundo_apellido) AS 'apellidos' FROM seccion s INNER JOIN estudiante e ON s.estudiante_id=e.id INNER JOIN nivel n ON e.nivel_id = n.id INNER JOIN inscripcion i ON i.estudiante_id = e.id WHERE n.numero_tipo = 4 AND n.tipo = 'Año' AND s.nombre_seccion = 'B' AND i.status = 'ingresado' ORDER BY e.cedula ASC";

        $estudiantes_seccion = $this->db->query($sql);
        $result = false;
        if($estudiantes_seccion && $estudiantes_seccion->num_rows >= 1){
            $result = $estudiantes_seccion;
        }

        return $result;
    }

    public function getSeccionByNivel10(){
        $sql = "SELECT n.numero_tipo AS 'numero_tipo', n.tipo AS 'tipo', s.nombre_seccion AS 'seccion', e.cedula AS 'cedula', CONCAT(e.primer_nombre, ' ',e.segundo_nombre) AS 'nombres', CONCAT(e.primer_apellido, ' ',e.segundo_apellido) AS 'apellidos' FROM seccion s INNER JOIN estudiante e ON s.estudiante_id=e.id INNER JOIN nivel n ON e.nivel_id = n.id INNER JOIN inscripcion i ON i.estudiante_id = e.id WHERE n.numero_tipo = 5 AND n.tipo = 'Año' AND s.nombre_seccion = 'A' AND i.status = 'ingresado' ORDER BY e.cedula ASC";

        $estudiantes_seccion = $this->db->query($sql);
        $result = false;
        if($estudiantes_seccion && $estudiantes_seccion->num_rows >= 1){
            $result = $estudiantes_seccion;
        }

        return $result;
    }

    public function getSeccionByNivel11(){
        $sql = "SELECT n.numero_tipo AS 'numero_tipo', n.tipo AS 'tipo', s.nombre_seccion AS 'seccion', e.cedula AS 'cedula', CONCAT(e.primer_nombre, ' ',e.segundo_nombre) AS 'nombres', CONCAT(e.primer_apellido, ' ',e.segundo_apellido) AS 'apellidos' FROM seccion s INNER JOIN estudiante e ON s.estudiante_id=e.id INNER JOIN nivel n ON e.nivel_id = n.id INNER JOIN inscripcion i ON i.estudiante_id = e.id WHERE n.numero_tipo = 5 AND n.tipo = 'Grado' AND s.nombre_seccion = 'B' AND i.status = 'ingresado' ORDER BY e.cedula ASC";

        $estudiantes_seccion = $this->db->query($sql);
        $result = false;
        if($estudiantes_seccion && $estudiantes_seccion->num_rows >= 1){
            $result = $estudiantes_seccion;
        }

        return $result;
    }

    public function getSeccionByNivel12(){
        $sql = "SELECT n.numero_tipo AS 'numero_tipo', n.tipo AS 'tipo', s.nombre_seccion AS 'seccion', e.cedula AS 'cedula', CONCAT(e.primer_nombre, ' ',e.segundo_nombre) AS 'nombres', CONCAT(e.primer_apellido, ' ',e.segundo_apellido) AS 'apellidos' FROM seccion s INNER JOIN estudiante e ON s.estudiante_id=e.id INNER JOIN nivel n ON e.nivel_id = n.id INNER JOIN inscripcion i ON i.estudiante_id = e.id WHERE n.numero_tipo = 1 AND n.tipo = 'Grado' AND s.nombre_seccion = 'A' AND i.status = 'ingresado' ORDER BY e.cedula ASC";

        $estudiantes_seccion = $this->db->query($sql);
        $result = false;
        if($estudiantes_seccion && $estudiantes_seccion->num_rows >= 1){
            $result = $estudiantes_seccion;
        }

        return $result;
    }

    public function getSeccionByNivel13(){
        $sql = "SELECT n.numero_tipo AS 'numero_tipo', n.tipo AS 'tipo', s.nombre_seccion AS 'seccion', e.cedula AS 'cedula', CONCAT(e.primer_nombre, ' ',e.segundo_nombre) AS 'nombres', CONCAT(e.primer_apellido, ' ',e.segundo_apellido) AS 'apellidos' FROM seccion s INNER JOIN estudiante e ON s.estudiante_id=e.id INNER JOIN nivel n ON e.nivel_id = n.id INNER JOIN inscripcion i ON i.estudiante_id = e.id WHERE n.numero_tipo = 1 AND n.tipo = 'Grado' AND s.nombre_seccion = 'B' AND i.status = 'ingresado' ORDER BY e.cedula ASC";

        $estudiantes_seccion = $this->db->query($sql);
        $result = false;
        if($estudiantes_seccion && $estudiantes_seccion->num_rows >= 1){
            $result = $estudiantes_seccion;
        }

        return $result;
    }

    public function getSeccionByNivel14(){
        $sql = "SELECT n.numero_tipo AS 'numero_tipo', n.tipo AS 'tipo', s.nombre_seccion AS 'seccion', e.cedula AS 'cedula', CONCAT(e.primer_nombre, ' ',e.segundo_nombre) AS 'nombres', CONCAT(e.primer_apellido, ' ',e.segundo_apellido) AS 'apellidos' FROM seccion s INNER JOIN estudiante e ON s.estudiante_id=e.id INNER JOIN nivel n ON e.nivel_id = n.id INNER JOIN inscripcion i ON i.estudiante_id = e.id WHERE n.numero_tipo = 2 AND n.tipo = 'Grado' AND s.nombre_seccion = 'A' AND i.status = 'ingresado' ORDER BY e.cedula ASC";

        $estudiantes_seccion = $this->db->query($sql);
        $result = false;
        if($estudiantes_seccion && $estudiantes_seccion->num_rows >= 1){
            $result = $estudiantes_seccion;
        }

        return $result;
    }

    public function getSeccionByNivel15(){
        $sql = "SELECT n.numero_tipo AS 'numero_tipo', n.tipo AS 'tipo', s.nombre_seccion AS 'seccion', e.cedula AS 'cedula', CONCAT(e.primer_nombre, ' ',e.segundo_nombre) AS 'nombres', CONCAT(e.primer_apellido, ' ',e.segundo_apellido) AS 'apellidos' FROM seccion s INNER JOIN estudiante e ON s.estudiante_id=e.id INNER JOIN nivel n ON e.nivel_id = n.id INNER JOIN inscripcion i ON i.estudiante_id = e.id WHERE n.numero_tipo = 2 AND n.tipo = 'Grado' AND s.nombre_seccion = 'B' AND i.status = 'ingresado' ORDER BY e.cedula ASC";

        $estudiantes_seccion = $this->db->query($sql);
        $result = false;
        if($estudiantes_seccion && $estudiantes_seccion->num_rows >= 1){
            $result = $estudiantes_seccion;
        }

        return $result;
    }

    public function getSeccionByNivel16(){
        $sql = "SELECT n.numero_tipo AS 'numero_tipo', n.tipo AS 'tipo', s.nombre_seccion AS 'seccion', e.cedula AS 'cedula', CONCAT(e.primer_nombre, ' ',e.segundo_nombre) AS 'nombres', CONCAT(e.primer_apellido, ' ',e.segundo_apellido) AS 'apellidos' FROM seccion s INNER JOIN estudiante e ON s.estudiante_id=e.id INNER JOIN nivel n ON e.nivel_id = n.id INNER JOIN inscripcion i ON i.estudiante_id = e.id WHERE n.numero_tipo = 3 AND n.tipo = 'Grado' AND s.nombre_seccion = 'A' AND i.status = 'ingresado' ORDER BY e.cedula ASC";

        $estudiantes_seccion = $this->db->query($sql);
        $result = false;
        if($estudiantes_seccion && $estudiantes_seccion->num_rows >= 1){
            $result = $estudiantes_seccion;
        }

        return $result;
    }

    public function getSeccionByNivel17(){
        $sql = "SELECT n.numero_tipo AS 'numero_tipo', n.tipo AS 'tipo', s.nombre_seccion AS 'seccion', e.cedula AS 'cedula', CONCAT(e.primer_nombre, ' ',e.segundo_nombre) AS 'nombres', CONCAT(e.primer_apellido, ' ',e.segundo_apellido) AS 'apellidos' FROM seccion s INNER JOIN estudiante e ON s.estudiante_id=e.id INNER JOIN nivel n ON e.nivel_id = n.id INNER JOIN inscripcion i ON i.estudiante_id = e.id WHERE n.numero_tipo = 3 AND n.tipo = 'Grado' AND s.nombre_seccion = 'B' AND i.status = 'ingresado' ORDER BY e.cedula ASC";

        $estudiantes_seccion = $this->db->query($sql);
        $result = false;
        if($estudiantes_seccion && $estudiantes_seccion->num_rows >= 1){
            $result = $estudiantes_seccion;
        }

        return $result;
    }

    public function getSeccionByNivel18(){
        $sql = "SELECT n.numero_tipo AS 'numero_tipo', n.tipo AS 'tipo', s.nombre_seccion AS 'seccion', e.cedula AS 'cedula', CONCAT(e.primer_nombre, ' ',e.segundo_nombre) AS 'nombres', CONCAT(e.primer_apellido, ' ',e.segundo_apellido) AS 'apellidos' FROM seccion s INNER JOIN estudiante e ON s.estudiante_id=e.id INNER JOIN nivel n ON e.nivel_id = n.id INNER JOIN inscripcion i ON i.estudiante_id = e.id WHERE n.numero_tipo = 4 AND n.tipo = 'Grado' AND s.nombre_seccion = 'A' AND i.status = 'ingresado' ORDER BY e.cedula ASC";

        $estudiantes_seccion = $this->db->query($sql);
        $result = false;
        if($estudiantes_seccion && $estudiantes_seccion->num_rows >= 1){
            $result = $estudiantes_seccion;
        }

        return $result;
    }

    public function getSeccionByNivel19(){
        $sql = "SELECT n.numero_tipo AS 'numero_tipo', n.tipo AS 'tipo', s.nombre_seccion AS 'seccion', e.cedula AS 'cedula', CONCAT(e.primer_nombre, ' ',e.segundo_nombre) AS 'nombres', CONCAT(e.primer_apellido, ' ',e.segundo_apellido) AS 'apellidos' FROM seccion s INNER JOIN estudiante e ON s.estudiante_id=e.id INNER JOIN nivel n ON e.nivel_id = n.id INNER JOIN inscripcion i ON i.estudiante_id = e.id WHERE n.numero_tipo = 4 AND n.tipo = 'Grado' AND s.nombre_seccion = 'B' AND i.status = 'ingresado' ORDER BY e.cedula ASC";

        $estudiantes_seccion = $this->db->query($sql);
        $result = false;
        if($estudiantes_seccion && $estudiantes_seccion->num_rows >= 1){
            $result = $estudiantes_seccion;
        }

        return $result;
    }

    public function getSeccionByNivel20(){
        $sql = "SELECT n.numero_tipo AS 'numero_tipo', n.tipo AS 'tipo', s.nombre_seccion AS 'seccion', e.cedula AS 'cedula', CONCAT(e.primer_nombre, ' ',e.segundo_nombre) AS 'nombres', CONCAT(e.primer_apellido, ' ',e.segundo_apellido) AS 'apellidos' FROM seccion s INNER JOIN estudiante e ON s.estudiante_id=e.id INNER JOIN nivel n ON e.nivel_id = n.id INNER JOIN inscripcion i ON i.estudiante_id = e.id WHERE n.numero_tipo = 5 AND n.tipo = 'Grado' AND s.nombre_seccion = 'A' AND i.status = 'ingresado' ORDER BY e.cedula ASC";

        $estudiantes_seccion = $this->db->query($sql);
        $result = false;
        if($estudiantes_seccion && $estudiantes_seccion->num_rows >= 1){
            $result = $estudiantes_seccion;
        }

        return $result;
    }

    public function getSeccionByNivel21(){
        $sql = "SELECT n.numero_tipo AS 'numero_tipo', n.tipo AS 'tipo', s.nombre_seccion AS 'seccion', e.cedula AS 'cedula', CONCAT(e.primer_nombre, ' ',e.segundo_nombre) AS 'nombres', CONCAT(e.primer_apellido, ' ',e.segundo_apellido) AS 'apellidos' FROM seccion s INNER JOIN estudiante e ON s.estudiante_id=e.id INNER JOIN nivel n ON e.nivel_id = n.id INNER JOIN inscripcion i ON i.estudiante_id = e.id WHERE n.numero_tipo = 5 AND n.tipo = 'Grado' AND s.nombre_seccion = 'B' AND i.status = 'ingresado' ORDER BY e.cedula ASC";

        $estudiantes_seccion = $this->db->query($sql);
        $result = false;
        if($estudiantes_seccion && $estudiantes_seccion->num_rows >= 1){
            $result = $estudiantes_seccion;
        }

        return $result;
    }


    public function getSeccionByNivel22(){
        $sql = "SELECT n.numero_tipo AS 'numero_tipo', n.tipo AS 'tipo', s.nombre_seccion AS 'seccion', e.cedula AS 'cedula', CONCAT(e.primer_nombre, ' ',e.segundo_nombre) AS 'nombres', CONCAT(e.primer_apellido, ' ',e.segundo_apellido) AS 'apellidos' FROM seccion s INNER JOIN estudiante e ON s.estudiante_id=e.id INNER JOIN nivel n ON e.nivel_id = n.id INNER JOIN inscripcion i ON i.estudiante_id = e.id WHERE n.numero_tipo = 6 AND n.tipo = 'Grado' AND s.nombre_seccion = 'A' AND i.status = 'ingresado' ORDER BY e.cedula ASC";

        $estudiantes_seccion = $this->db->query($sql);
        $result = false;
        if($estudiantes_seccion && $estudiantes_seccion->num_rows >= 1){
            $result = $estudiantes_seccion;
        }

        return $result;
    }

    public function getSeccionByNivel23(){
        $sql = "SELECT n.numero_tipo AS 'numero_tipo', n.tipo AS 'tipo', s.nombre_seccion AS 'seccion', e.cedula AS 'cedula', CONCAT(e.primer_nombre, ' ',e.segundo_nombre) AS 'nombres', CONCAT(e.primer_apellido, ' ',e.segundo_apellido) AS 'apellidos' FROM seccion s INNER JOIN estudiante e ON s.estudiante_id=e.id INNER JOIN nivel n ON e.nivel_id = n.id INNER JOIN inscripcion i ON i.estudiante_id = e.id WHERE n.numero_tipo = 6 AND n.tipo = 'Grado' AND s.nombre_seccion = 'B' AND i.status = 'ingresado' ORDER BY e.cedula ASC";

        $estudiantes_seccion = $this->db->query($sql);
        $result = false;
        if($estudiantes_seccion && $estudiantes_seccion->num_rows >= 1){
            $result = $estudiantes_seccion;
        }

        return $result;
    }

}
