<?php
    class Salida{
        private $idDetSalida;
        private $fechaSalida;
        private $cantidadSalida;
        private $valorTotal;
        private $idCliente;
        private $idProducto;

        /***********************/
        /**      Getters      **/
        /***********************/
        public function getIdDetSal()
        {
            return $this -> idDetSalida;
        }
        public function getFechaSal()
        {
            return $this -> fechaSalida;
        }
        public function getCantSal()
        {
            return $this -> cantidadSalida;
        }
        public function getValTot()
        {
            return $this -> valorTotal;
        }
        public function getIdCliente()
        {
            return $this -> idCliente;
        }
        public function getIdProduc()
        {
            return $this -> idProducto;
        }

        /***********************/
        /**      Setters      **/
        /***********************/
        public function setIdDetSal($idDetSalida)
        {
            $this -> idDetSalida = $idDetSalida;
        }
        public function setFechaSal($fechaSalida)
        {
            $this -> fechaSalida = $fechaSalida;
        }
        public function setCantSal($cantidadSalida)
        {
            $this -> cantidadSalida = $cantidadSalida;
        }
    }

?>