<?php
    class Entrada{
        private $idDetEntrada;
        private $fechaEntrada;
        private $cantProEntrada;
        private $precioEntrada;
        private $idProveedor;
        private $idProducto;

        /***********************/
        /**      Getters      **/
        /***********************/
        public function getIdDetEnt()
        {
            return $this -> idDetEntrada;
        }
        public function getFechaEnt()
        {
            return $this -> fechaEntrada;
        }
        public function getCantEnt()
        {
            return $this -> cantProEntrada;
        }
        public function getPrecioEnt()
        {
            return $this -> precioEntrada;
        }
        public function getIdProvee()
        {
            return $this -> idProveedor;
        }
        public function getIdProduc()
        {
            return $this -> idProducto;
        }

        /***********************/
        /***      Setters      ***/
        /***********************/
        public function setIdDetEnt($idDetEntrada)
        {
            $this -> idDetEntrada = $idDetEntrada;
        }
        public function setFechaEnt($fechaEntrada)
        {
            $this -> fechaEntrada = $fechaEntrada;
        }
        public function setCantEnt($cantProEntrada)
        {
            $this -> cantProEntrada = $cantProEntrada;
        }
        public function setPrecioEnt($precioEntrada)
        {
            $this -> precioEntrada = $precioEntrada;
        }
        public function setIdProvee($idProveedor)
        {
            $this -> idProveedor = $idProveedor;
        }
        public function setIdProduc($idProducto)
        {
            $this -> idProducto = $idProducto;
        }
    }

?>