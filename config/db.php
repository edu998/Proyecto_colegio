<?php 

class DB{

    public static function connection(){
        $host = 'localhost';
        $username = 'root';
        $passw = '';
        $db = 'proyecto_colegio';
        $db = new mysqli($host, $username, $passw, $db);

        $db->query("SET NAMES 'utf8'");

        return $db;
    }
}