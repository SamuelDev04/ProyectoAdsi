<?php
    //Clase Dao del modulo registro
    class UsuarioModel{
        private $idUsuario;
        private $nombre;
        private $apellido;
        private $usuario;
        private $contrasena;
        private $idTipoUsuario;

        //Metodo construct donde se define los getter de usuario
        public function __construct($objDtoUsuario)
        {
            $this -> idUsuario = $objDtoUsuario -> getIdUser();
            $this -> nombre = $objDtoUsuario -> getNombre();
            $this -> apellido = $objDtoUsuario -> getApellido();
            $this -> usuario = $objDtoUsuario -> getUsuario();
            $this -> contrasena = $objDtoUsuario -> getContrasena();
            $this -> idTipoUsuario = $objDtoUsuario -> getIdTipoUsua();
        }

        //Metodo para validar login
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
        
        //Metodo para llamar el procedemiento de insertar en la db 
        public function mIdInsertUsuario()
        {
            $sql = "CALL spInsertarUsuario(?, ?, ?, ?, ?);";
            $estado = false;
            try {
                $objCon = new Conexion();
                $stmt = $objCon -> getConec() -> prepare($sql);
                $stmt -> bindParam(1, $this -> nombre,     PDO::PARAM_STR);
                $stmt -> bindParam(2, $this -> apellido, PDO::PARAM_STR);
                $stmt -> bindParam(3, $this -> usuario,    PDO::PARAM_STR);
                $stmt -> bindParam(4, $this -> contrasena, PDO::PARAM_STR);
                $stmt -> bindParam(5, $this -> idTipoUsuario, PDO::PARAM_INT);
                $estado = $stmt -> execute();
            } catch (PDOexception $e) {
                echo "Error al insertar usuarios " . $e -> getMessage();
            }
            return $estado;
        }

         //Metodo para llamar el procedemiento de traer todos en la db 
        public function mIdSearchAllUsuario()
        {
            $sql = "call spSearchAllUsuario()";

            try {
                $objCon = new Conexion;
                $stmt = $objCon -> getConec() -> prepare($sql);
                $stmt -> execute();
                $respon = $stmt;
            } catch (PDOException $e) {
                echo "Ha ocurrido un error al mostrar los datos en el dao " .$e -> getMessage();
            }

            return $respon;
        }

        //Metodo para llamar el procedemiento de eliminar en la db 
        public function mIdEraseUsuario()
        {
            $respon = false;

            $sql = "CALL spBorrarUsuario(?)";

            try {
                $objCon = new Conexion;
                $stmt = $objCon -> getConec() -> prepare($sql);
                $stmt -> bindParam(1, $this-> idUsuario, PDO::PARAM_INT);
                $stmt -> execute();
                $respon = true;
            } catch (PDOException $e) {
                echo "Ha ocurrido un error al eliminar los registros en el dao " .$e -> getMessage();
            }
            return $respon;
        }

        //Metodo para llamar el procedimiento de actualizar datos en la db
        public function mIdUpdateUsuario()
        {
            $sql = "CALL spUpdateUsuario(?, ?, ?, ?, ?, ?);";
            $estado = false;
            try {
                $objCon = new Conexion();
                $stmt = $objCon -> getConec() -> prepare($sql);
                $stmt -> bindParam(1, $this -> idUsuario,     PDO::PARAM_INT);
                $stmt -> bindParam(2, $this -> nombre,     PDO::PARAM_STR);
                $stmt -> bindParam(3, $this -> apellido, PDO::PARAM_STR);
                $stmt -> bindParam(4, $this -> usuario,    PDO::PARAM_STR);
                $stmt -> bindParam(5, $this -> contrasena, PDO::PARAM_STR);
                $stmt -> bindParam(6, $this -> idTipoUsuario, PDO::PARAM_INT);
                $estado = $stmt -> execute();
            } catch (PDOexception $e) {
                echo "Error al modificar usuarios " . $e -> getMessage();
            }
            return $estado;
        }

    }

?>