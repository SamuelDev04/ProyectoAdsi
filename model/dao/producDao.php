<?php
    //Clase DAO del modulo producto
    class ProductoModel{
        //Propiedades necesarias
        private $idProducto;
        private $descripProducto;
        private $cantProducto;
        private $costoProducto;
        private $idTipoProducto;

        //Metodo construct donde se definen los getter de producto
        public function __construct($objDtoProducto)
        {
            $this -> idProducto = $objDtoProducto -> getIdPro();
            $this -> descripProducto = $objDtoProducto -> getDescripPro();
            $this -> cantProducto = $objDtoProducto -> getCantPro();
            $this -> costoProducto = $objDtoProducto -> getcostoPro();
            $this -> idTipoProducto = $objDtoProducto -> getTipoPro();
        }

        //Metodo para llamar el procedimiento de insertar en la db
        public function mIdInsertProducto()
        {
            $sql = "CALL spInsertarProducto(?, ?, ?, ?);";
            $estado = false;
            try {
                $objCon = new Conexion();
                $stmt = $objCon -> getConec() -> prepare($sql);
                $stmt -> bindParam(1, $this -> descripProducto,   PDO::PARAM_STR);
                $stmt -> bindParam(2, $this -> cantProducto,      PDO::PARAM_INT);
                $stmt -> bindParam(3, $this -> costoProducto,     PDO::PARAM_INT);
                $stmt -> bindParam(4, $this -> idTipoProducto,    PDO::PARAM_INT);
                $estado = $stmt -> execute();
            } catch (PDOexception $e) {
                echo "Error al insertar aprendices " . $e -> getMessage();
            }
            return $estado;
        }

        //Metodo para llamar el procedimiento de eliminar en la db
        public function mIdEraseProducto()
        {
            $respon = false;
            $sql = "CALL spBorrarProducto(?)";
            
            try {
                $objCon = new Conexion;
                $stmt = $objCon -> getConec() -> prepare($sql);
                $stmt -> bindParam(1, $this-> idProducto, PDO::PARAM_INT);
                $stmt -> execute();
                $respon = true;
            } catch (PDOException $e) {
                echo "Ha ocurrido un error al eliminar los registros en el dao " .$e -> getMessage();
            }
            return $respon;
        }

        //Metodo para llamar el procedimiento de traer todos en la db
        public function mIdSearchAllProducto()
        {
            $sql = "call spSearchAllProducto()";
    
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
        public function mIdUpdateProducto()
        {
            $sql = "CALL spUpdateProducto(?, ?, ?, ?, ?);";
            $estado = false;

            try {
                $objCon = new Conexion();
                $stmt = $objCon->getConec()->prepare($sql);
                $stmt->bindParam(1, $this-> idProducto,         PDO::PARAM_INT);
                $stmt->bindParam(2, $this-> descripProducto,    PDO::PARAM_STR);
                $stmt->bindParam(3, $this-> cantProducto,       PDO::PARAM_INT);
                $stmt->bindParam(4, $this-> costoProducto,      PDO::PARAM_INT);
                $stmt->bindParam(5, $this-> idTipoProducto,     PDO::PARAM_INT);
                $estado = $stmt->execute();
            } catch (PDOexception $e) {
                echo "Error al modificar Producto " . $e->getMessage();
            }
            return $estado;
        }

    }

?>