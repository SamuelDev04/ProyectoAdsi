<?php
    class TipoUsuarioController{

        public function getSearchAllTipoUsuario()
        {
            $respon = false;
            try {
                $objDtoTipoUsuario = new TipoUsuario();
                $objDaoTipoUsuario = new TipoUsuarioModel($objDtoTipoUsuario);
                $respon = $objDaoTipoUsuario -> mIdSearchAllTipoUsua() -> fetchAll();
                
            } catch (PDOException $e) {
                echo "Error en la creacion del controlador para mostrar todo ". $e -> getMessage();
            }

            return $respon;
        }
    }

?>