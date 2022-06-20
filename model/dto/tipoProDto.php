<?php
    class TipoPro{
        private $idTipoProducto;
        private $descripcion;

        /***********************/
        /**      Getters      **/
        /***********************/
        public function getIdTipoPro()
        {
            return $this -> idTipoProducto;
        }
        public function getDescripPro()
        {
            return $this -> descripcion;
        }

        /***********************/
        /**      Setters      **/
        /***********************/
        public function setIdTipoPro($idTipoProducto)
        {
            $this -> idTipoProducto = $idTipoProducto;
        }
        public function setDescripTipoPro($descripcion)
        {
            $this -> descripcion = $descripcion;
        }
    }

?>