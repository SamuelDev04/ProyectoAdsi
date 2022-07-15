<?php
    class TipoUsuarioModel{
        private $idTipoUsuario;
        private $descripcion;

        public function __construct($objDtoTipoUsua)
        {
            $this -> idTipoUsuario = $objDtoTipoUsua -> getIdTipoUsua();
            $this -> descripcion = $objDtoTipoUsua -> getDescrip();
        }

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