<?php
    class TipoUsuario{
        private $idTipoUsuario;
        private $descripcion;

        /***********************/
        /**      Getters      **/
        /***********************/
        public function getIdTipoUsua()
        {
            return $this -> idTipoUsuario;
        }
        public function getDescrip()
        {
            return $this -> descripcion;
        }

        /***********************/
        /**      Setters      **/
        /***********************/
        public function setIdTipoUsua($idTipoUsuario)
        {
            $this -> idTipoUsuario = $idTipoUsuario;
        }
        public function setDescrip($descripcion)
        {
            $this -> descripcion = $descripcion;
        }
        
    }

?>