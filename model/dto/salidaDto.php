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
        public function getValorTot()
        {
            return $this -> valorTotal;
        }
        public function getIdCliente()
        {
            return $this -> idCliente;
        }
        public function getIdPro()
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
        public function setValorTot($valorTotal)
        {
            $this -> valorTotal = $valorTotal;
        }
        public function setIdCliente($idCliente)
        {
            $this -> idCliente = $idCliente;
        }
        public function setIdPro($idProducto)
        {
            $this -> idProducto = $idProducto;
        }
    }

?>