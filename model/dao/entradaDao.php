<?php
    //Clase DAO del modulo entrada
    class EntradaModel{
        //Propiedades necesarias
        private $idDetEntrada;
        private $fechaEntrada;
        private $cantProEntrada;
        private $precioEntrada;
        private $idProveedor;
        private $idProducto;

        //Metodo construct donde se definen los getter de entrada
        public function __construct($objDtoEntrada)
        {
            $this -> idDetEntrada = $objDtoEntrada -> getIdDetEnt();
            $this -> fechaEntrada = $objDtoEntrada -> getFechaEnt();
            $this -> cantProEntrada = $objDtoEntrada -> getCantEnt();
            $this -> precioEntrada = $objDtoEntrada -> getPrecioEnt();
            $this -> idProveedor = $objDtoEntrada -> getIdProvee();
            $this -> idProducto = $objDtoEntrada -> getIdProduc();
        }

        //Metodo para llamar el procedimiento de insertar en la db
        public function mIdInsertEntrada()
        {
            $sql = "CALL spInsertarDetEnt(?, ?, ?, ?, ?);";
            $estado = false;
            try {
                $objCon = new Conexion();
                $stmt = $objCon -> getConec() -> prepare($sql);
                $stmt -> bindParam(1, $this -> fechaEntrada,   PDO::PARAM_STR);
                $stmt -> bindParam(2, $this -> cantProEntrada,      PDO::PARAM_INT);
                $stmt -> bindParam(3, $this -> precioEntrada,     PDO::PARAM_INT);
                $stmt -> bindParam(4, $this -> idProveedor,    PDO::PARAM_INT);
                $stmt -> bindParam(5, $this -> idProducto,    PDO::PARAM_INT);
                $estado = $stmt -> execute();
            } catch (PDOexception $e) {
                echo "Error al insertar entradas " . $e -> getMessage();
            }
            return $estado;
        }

        //Metodo para llamar el procedimiento de eliminar en la db
        public function mIdEraseEntrada()
        {
            $respon = false;
            $sql = "CALL spBorrarDetEnt(?)";
            
            try {
                $objCon = new Conexion;
                $stmt = $objCon -> getConec() -> prepare($sql);
                $stmt -> bindParam(1, $this-> idDetEntrada, PDO::PARAM_INT);
                $stmt -> execute();
                $respon = true;
            } catch (PDOException $e) {
                echo "Ha ocurrido un error al eliminar los registros en el dao " .$e -> getMessage();
            }
            return $respon;
        }

        //Metodo para llamar el procedimiento de traer todos en la db
        public function mIdSearchAllEntrada()
        {
            $sql = "call spSearchAllDetEnt()";
    
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
        public function mIdUpdateEntrada()
        {
            $sql = "CALL spUpdateDetEnt(?, ?, ?, ?, ?, ?);";
            $estado = false;

            try {
                $objCon = new Conexion();
                $stmt = $objCon->getConec()->prepare($sql);
                $stmt->bindParam(1, $this-> idDetEntrada,         PDO::PARAM_INT);
                $stmt->bindParam(2, $this-> fechaEntrada,    PDO::PARAM_STR);
                $stmt->bindParam(3, $this-> cantProEntrada,       PDO::PARAM_INT);
                $stmt->bindParam(4, $this-> precioEntrada,      PDO::PARAM_INT);
                $stmt->bindParam(5, $this-> idProveedor,     PDO::PARAM_INT);
                $stmt->bindParam(6, $this-> idProducto,     PDO::PARAM_INT);
                $estado = $stmt->execute();
            } catch (PDOexception $e) {
                echo "Error al modificar entrada " . $e->getMessage();
            }
            return $estado;
        }

        //Metodo para llamar el procedimiento de actualizar cantidad de producto
        public function mIdUpdateMercancia()
        {
            $sql = "CALL spEntradaMercancia(?, ?)";
            $estado = false;

            try {
                $objCon = new Conexion();
                $stmt = $objCon -> getConec()->prepare($sql);
                $stmt -> bindParam(1, $this -> idProducto,  PDO::PARAM_INT);
                $stmt -> bindParam(2, $this -> cantProEntrada, PDO::PARAM_INT);
                $estado = $stmt -> execute();
            } catch (PDOException $e) {
                echo "Error al actualizar stock " .$e -> getMessage();
            }
            return $estado;
        }
    }

?>