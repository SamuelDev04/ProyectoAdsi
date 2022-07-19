<?php
    //Clase controlador para el modulo tipo usuario
    class TipoUsuarioController{

        //Metodo para traer todos los tipos usuarios
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