<?php
    //Clase Dao del modulo salida 
    class SalidaModel{
        //Propiedades necesarias 
        private $idDetSalida;
        private $fechaSalida;
        private $cantidadSalida;
        private $valorTotal;
        private $idCliente;
        private $idProducto;

        //Metodo construct donde se define los getter de salida
        public function __construct($objDtoSalida)
        {
            $this -> idDetSalida = $objDtoSalida -> getIdDetSal();
            $this -> fechaSalida = $objDtoSalida -> getFechaSal();
            $this -> cantidadSalida = $objDtoSalida -> getCantSal();
            $this -> valorTotal = $objDtoSalida -> getValorTot();
            $this -> idCliente = $objDtoSalida -> getIdCliente();
            $this -> idProducto = $objDtoSalida -> getIdPro();
        }

        //Metodo para llamar el procedemiento de insertar en la db 
        public function mIdInsertSalida()
        {
            $sql = "CALL spInsertarDetSal(?, ?, ?, ?, ?);";
            $estado = false;
            try {
                $objCon = new Conexion();
                $stmt = $objCon -> getConec() -> prepare($sql);
                $stmt -> bindParam(1, $this -> fechaSalida,     PDO::PARAM_STR);
                $stmt -> bindParam(2, $this -> cantidadSalida,  PDO::PARAM_INT);
                $stmt -> bindParam(3, $this -> valorTotal,      PDO::PARAM_INT);
                $stmt -> bindParam(4, $this -> idCliente,       PDO::PARAM_INT);
                $stmt -> bindParam(5, $this -> idProducto,      PDO::PARAM_INT);
                $estado = $stmt -> execute();
            } catch (PDOexception $e) {
                echo "Error al insertar salida " . $e -> getMessage();
            }
            return $estado;
        }

        //Metodo para llamar el procedemiento de eliminar en la db 
        public function mIdEraseSalida()
        {
            $respon = false;
            $sql = "CALL spBorrarDetSal(?)";
            
            try {
                $objCon = new Conexion;
                $stmt = $objCon -> getConec() -> prepare($sql);
                $stmt -> bindParam(1, $this-> idDetSalida, PDO::PARAM_INT);
                $stmt -> execute();
                $respon = true;
            } catch (PDOException $e) {
                echo "Ha ocurrido un error al eliminar los registros en el dao " .$e -> getMessage();
            }
            return $respon;
        }

        //Metodo para llamar el procedemiento de traer todos en la db 
        public function mIdSearchAllSalida()
        {
            $sql = "call spSearchAllDetSal()";
    
            try {
                $objCon = new Conexion;
                $stmt = $objCon -> getConec() -> prepare($sql);
                $stmt -> execute();
                $respon = $stmt;
            } catch (PDOException $e) {
                echo "Ha ocurrido un error al mostrar los datos en el dao " .$e -> getMessage();
            }

            return $respon;
        }

        //Metodo para llamar el procedimiento de actualizar datos en la db
        public function mIdUpdateSalida()
        {
            $sql = "CALL spUpdateDetSal(?, ?, ?, ?, ?, ?);";
            $estado = false;

            try {
                $objCon = new Conexion();
                $stmt = $objCon->getConec()->prepare($sql);
                $stmt->bindParam(1, $this-> idDetSalida,        PDO::PARAM_INT);
                $stmt->bindParam(2, $this-> fechaSalida,        PDO::PARAM_STR);
                $stmt->bindParam(3, $this-> cantidadSalida,     PDO::PARAM_INT);
                $stmt->bindParam(4, $this-> valorTotal,         PDO::PARAM_INT);
                $stmt->bindParam(5, $this-> idCliente,          PDO::PARAM_INT);
                $stmt->bindParam(6, $this-> idProducto,         PDO::PARAM_INT);
                $estado = $stmt->execute();
            } catch (PDOexception $e) {
                echo "Error al modificar salida " . $e->getMessage();
            }
            return $estado;
        }

        //Metodo para llamar el procedimiento de actualizar cantidad de salida
        public function mIdUpdateMercanciaS()
        {
            $sql = "CALL spSalidaMercancia(?, ?)";
            $estado = false;

            try {
                $objCon = new Conexion();
                $stmt = $objCon -> getConec()->prepare($sql);
                $stmt -> bindParam(1, $this -> idProducto, PDO::PARAM_INT);
                $stmt -> bindParam(2, $this -> cantidadSalida, PDO::PARAM_INT);
                $estado = $stmt -> execute();
            } catch (PDOException $e) {
                echo "Error al actualizar stock " .$e -> getMessage();
            }
            return $estado;
        } 

    }

?>