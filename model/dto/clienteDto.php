<?php
    class Cliente{
        private $idCliente;
        private $nombre;
        private $telefono;
        private $celular;
        private $direccion;
        
        /***********************/
        /**      Getters      **/
        /***********************/
        
        public function getIdCliente()
        {
            return $this -> idCliente;
        }
        public function getNombreCliente()
        {
            return $this -> nombre;
        }
        public function getTelefono()
        {
            return $this -> telefono;
        }
        public function getCelular()
        {
            return $this -> celular;
        }
        public function getDireccion()
        {
            return $this -> direccion;
        }

        /***********************/
        /**      Setters      **/
        /***********************/

        public function setIdCliente($idCliente)
        {
            $this -> idCliente = $idCliente;
        }
        public function setNombreCliente($nombre)
        {
            $this -> nombre = $nombre;
        }
        public function setTelefono($telefono)
        {
            $this -> telefono = $telefono;
        }
        public function setCelular($celular)
        {
            $this -> celular = $celular;
        }
        public function setDireccion($direccion)
        {
            $this -> direccion = $direccion;
        }

    }
?>