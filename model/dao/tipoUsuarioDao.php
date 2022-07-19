<?php
    //Clase Dao de tipo usuario
    class TipoUsuarioModel{
        private $idTipoUsuario;
        private $descripcion;

        //Metodo construct donde se define los getter de tipo usuario
        public function __construct($objDtoTipoUsua)
        {
            $this -> idTipoUsuario = $objDtoTipoUsua -> getIdTipoUsua();
            $this -> descripcion = $objDtoTipoUsua -> getDescrip();
        }

        //Metodo para llamar el procedemiento de traer todos en la db
        public function mIdSearchAllTipoUsua()
        {
            $sql = "CALL spSearchAllTipoUsua()";

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
    }

?>