<?php
class Conectar
{
    public function conecta()
    {
        $server = "localhost";
        $user = "root";
        $password = "";
        $db = "examen";

        $connection = new mysqli($server, $user, $password, $db);

        //checamos conexion
        if ($connection->connect_error) {
            die("Conexión fallida: " . $connection->connect_error);
        }

        return $connection;
    }
}
