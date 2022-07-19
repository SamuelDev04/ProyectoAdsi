<?php
    //Clase DAO del modulo cliente
    class ClienteModel{
        //Propiedades necesarias
        private $idCliente;
        private $nombre;
        private $telefono;
        private $celular;
        private $direccion;

        //Metodo construct donde se definen los getter de cliente
        public function __construct($objDtoCliente)
        {
            $this -> idCliente = $objDtoCliente -> getIdCliente();
            $this -> nombre = $objDtoCliente -> getNombreCliente();
            $this -> telefono = $objDtoCliente -> getTelefono();
            $this -> celular = $objDtoCliente -> getCelular();
            $this -> direccion = $objDtoCliente -> getDireccion();
        }
        
        //Metodo para llamar el procedimiento de insertar en la db
        public function mIdInsertCliente()
        {
            $sql = "CALL spInsertarCliente(?, ?, ?, ?);";
            $estado = false;
            try {
                $objCon = new Conexion();
                $stmt = $objCon -> getConec() -> prepare($sql);
                $stmt -> bindParam(1, $this -> nombre,     PDO::PARAM_STR);
                $stmt -> bindParam(2, $this -> telefono, PDO::PARAM_STR);
                $stmt -> bindParam(3, $this -> celular,    PDO::PARAM_STR);
                $stmt -> bindParam(4, $this -> direccion, PDO::PARAM_STR);
                $estado = $stmt -> execute();
            } catch (PDOexception $e) {
                echo "Error al insertar Clientes " . $e -> getMessage();
            }
            return $estado;
        }

        //Metodo para llamar el procedimiento de traer todos en la db
        public function mIdSearchAllCliente()
        {
            $sql = "call spSearchAllCliente()";

            try {
                $objCon = new Conexion;
                $stmt = $objCon -> getConec() -> prepare($sql);
                $stmt -> execute();
                $respon = $stmt;
            } catch (PDOException $e) {
                echo "Ha ocurrido un error al mostrar los datos en el Dao del Cliente " .$e -> getMessage();
            }

            return $respon;
        }

        //Metodo para llamar el procedimiento de eliminar en la db
        public function mIdEraseCliente()
        {
            $respon = false;

            $sql = "CALL spBorrarCliente(?)";

            try {
                $objCon = new Conexion;
                $stmt = $objCon -> getConec() -> prepare($sql);
                $stmt -> bindParam(1, $this-> idCliente, PDO::PARAM_INT);
                $stmt -> execute();
                $respon = true;
            } catch (PDOException $e) {
                echo "Ha ocurrido un error al eliminar los registros en el dao del cliente" .$e -> getMessage();
            }
            return $respon;
        }

        //Metodo para llamar el procedimiento de actualizar datos en la db
        public function mIdUpdateCliente()
        {
            $sql = "CALL spUpdateCliente(?, ?, ?, ?, ?);";
            $estado = false;
            try {
                $objCon = new Conexion();
                $stmt = $objCon -> getConec() -> prepare($sql);
                $stmt -> bindParam(1, $this -> idCliente,     PDO::PARAM_INT);
                $stmt -> bindParam(2, $this -> nombre,     PDO::PARAM_STR);
                $stmt -> bindParam(3, $this -> telefono, PDO::PARAM_STR);
                $stmt -> bindParam(4, $this -> celular,    PDO::PARAM_STR);
                $stmt -> bindParam(5, $this -> direccion, PDO::PARAM_STR);
                $estado = $stmt -> execute();
            } catch (PDOexception $e) {
                echo "Error al modificar cliente " . $e -> getMessage();
            }
            return $estado;
        }

    }

?>