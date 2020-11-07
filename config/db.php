<?php 

class DB{

    public static function connection(){
        $host = '';
        $username = 'admin';
        $passw = 'CasaStark10';
        $db = 'proyecto_colegio';
        $db = new mysqli($host, $username, $passw, $db);

        $db->query("SET NAMES 'utf8'");

        return $db;
    }

    public static function connectionP(){
        $host = '';
        $username = 'profesor';
        $passw = 'CasaStark10';
        $db = 'proyecto_colegio';
        $db = new mysqli($host, $username, $passw, $db);

        $db->query("SET NAMES 'utf8'");

        return $db;
    }

    public static function connectionE(){
        $host = '';
        $username = 'estudiante';
        $passw = 'CasaStark10';
        $db = 'proyecto_colegio';
        $db = new mysqli($host, $username, $passw, $db);

        $db->query("SET NAMES 'utf8'");

        return $db;
    }
}