<?php
    //Clase para crear la conexion a la base de datos
    class Conexion{
        //Propiedades necesarias
        private $host;
        private $drive;
        private $base;
        private $user;
        private $pass;
        private $url;
        private $charset;

        //Metodo construct donde se definen todos los datos de la db
        public function __construct()
        {
            $this -> host = "localhost";
            $this -> drive = "mysql";
            $this -> base = "db_rikopollo";
            $this -> user = "root";
            $this -> pass = "";
            $this -> url = $this -> drive . ":host=". 
                            $this -> host. ";dbname=" . 
                            $this -> base;
            $this -> charset = "UTF8";
        }

        //Metodo para generar la conexion
        public function getConec()
        {
            try {
                $con = new PDO($this -> url, $this -> user, $this -> pass);

            } catch (Exception $e) {
                echo "Error de conexion a la base de datos <br>" . $e ->getMessage();
            }
            return $con;
        }
        
    }

?>