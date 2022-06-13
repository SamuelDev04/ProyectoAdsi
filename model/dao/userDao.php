<?php
    class UsuarioModel{
        private $idUsuario;
        private $nombre;
        private $apellido;
        private $usuario;
        private $contrasena;

        public function __construct($objDtoUsuario)
        {
            $this -> idUsuario = $objDtoUsuario -> getIdUser();
            $this -> nombre = $objDtoUsuario -> getNombre();
            $this -> apellido = $objDtoUsuario -> getApellido();
            $this -> usuario = $objDtoUsuario -> getUsuario();
            $this -> contrasena = $objDtoUsuario -> getContrasena();
        }

        public function getQueryLogin()
        {
            $sql = "SELECT * FROM usuarios WHERE usuario = ? AND contrasena = ?";

            try {
                $objConec = new Conexion();
                $stmt = $objConec -> getConec() -> prepare($sql);
                $stmt -> bindParam(1, $this -> usuario, PDO::PARAM_STR);
                $stmt -> bindParam(2, $this -> contrasena, PDO::PARAM_STR);
                $stmt -> execute();
                $result = $stmt;

            } catch (Exception $e) {
                echo "Error al consultar el usuario " . $e -> getMessage();
            }
            return $result;
        }
    }

?>