<?php
    class Producto{
        private $idProducto;
        private $descripProducto;
        private $cantProducto;
        private $costoProducto;
        private $idTipoProducto;
        private $descripcion;

        /***********************/
        /**      Getters      **/
        /***********************/
        public function getIdPro()
        {
            return $this -> idProducto;
        }
        public function getDescripPro()
        {
            return $this -> descripProducto;
        }
        public function getCantPro()
        {
            return $this -> cantProducto;
        }
        public function getcostoPro()
        {
            return $this -> costoProducto;
        }
        public function getTipoPro()
        {
            return $this -> idTipoProducto;
        }

        /***********************/
        /**      Setters      **/
        /***********************/

        public function setIdPro($idProducto)
        {
            $this -> idProducto = $idProducto;
        }
        public function setDescripPro($descripProducto)
        {
            $this -> descripProducto = $descripProducto;
        }
        public function setCantPro($cantProducto)
        {
            $this -> cantProducto = $cantProducto;
        }
        public function setcostoPro($costoProducto)
        {
            $this -> costoProducto = $costoProducto;
        }
        public function setTipoPro($idTipoProducto)
        {
            $this -> idTipoProducto = $idTipoProducto;
        }

    }


?>