<?php
    //Clase Dao del modulo producto
    class TipoProModel{
        private $idTipoProducto;
        private $descripcion;

        //Metodo construct donde se define los getter de tipo prodducto
        public function __construct($objDtoTipoPro)
        {
            $this -> idTipoProducto = $objDtoTipoPro -> getIdTipoPro();
            $this -> descripcion = $objDtoTipoPro -> getDescripPro();
        }

        //Metodo para llamar el procedemiento de insertar en la db
        public function mIdInsertTipoPro()
        {
            $sql = "CALL spInsertarTipoPro(?);";
            $estado = false;
            try {
                $objCon = new Conexion();
                $stmt = $objCon -> getConec() -> prepare($sql);
                $stmt -> bindParam(1, $this -> descripcion,   PDO::PARAM_STR);
                $estado = $stmt -> execute();
            } catch (PDOexception $e) {
                echo "Error al insertar tipo de producto " . $e -> getMessage();
            }
            return $estado;
        }

        //Metodo para llamar el procedemiento de eliminar en la db
        public function mIdEraseTipoPro()
        {
            $respon = false;
            $sql = "CALL spBorrarTipoPro(?)";
            
            try {
                $objCon = new Conexion;
                $stmt = $objCon -> getConec() -> prepare($sql);
                $stmt -> bindParam(1, $this-> idTipoProducto, PDO::PARAM_INT);
                $stmt -> execute();
                $respon = true;
            } catch (PDOException $e) {
                echo "Ha ocurrido un error al eliminar los registros en el dao " .$e -> getMessage();
            }
            return $respon;
        }

        //Metodo para llamar el procedemiento de traer todsos en la db
        public function mIdSearchAllTipoProducto()
        {
            $sql = "call spSearchAllTipoPro()";
    
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
        public function mIdUpdateTipoProducto()
        {
            $sql = "CALL spUpdateTipoPro(?, ?);";
            $estado = false;

            try {
                $objCon = new Conexion();
                $stmt = $objCon->getConec()->prepare($sql);
                $stmt->bindParam(1, $this-> idTipoProducto,     PDO::PARAM_INT);
                $stmt->bindParam(2, $this-> descripcion,        PDO::PARAM_STR);
                $estado = $stmt->execute();
            } catch (PDOexception $e) {
                echo "Error al modificar tipo producto " . $e->getMessage();
            }
            return $estado;
        }
    }

?>