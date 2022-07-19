<?php
    class Usuario{
        private $idUsuario;
        private $nombre;
        private $apellido;
        private $usuario;
        private $contrasena;
        private $idTipoUsuario;
        
        /***********************/
        /**      Getters      **/
        /***********************/
        
        public function getIdUser()
        {
            return $this -> idUsuario;
        }
        public function getNombre()
        {
            return $this -> nombre;
        }
        public function getApellido()
        {
            return $this -> apellido;
        }
        public function getUsuario()
        {
            return $this -> usuario;
        }
        public function getContrasena()
        {
            return $this -> contrasena;
        }
        public function getIdTipoUsua()
        {
            return $this -> idTipoUsuario;
        }

        /***********************/
        /**      Setters      **/
        /***********************/

        public function setIdUser($idUsuario)
        {
            $this -> idUsuario = $idUsuario;
        }
        public function setNombre($nombre)
        {
            $this -> nombre = $nombre;
        }
        public function setApellido($apellido)
        {
            $this -> apellido = $apellido;
        }
        public function setUsuario($usuario)
        {
            $this -> usuario = $usuario;
        }
        public function setContrasena($contrasena)
        {
            $this -> contrasena = $contrasena;
        }
        public function setIdTipoUsua($idTipoUsuario)
        {
            $this -> idTipoUsuario = $idTipoUsuario;
        }

    }

?>