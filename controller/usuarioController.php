<?php
    //Clase controlador para el modulo registro
    class UsuarioController{

        //Metodo para evaluar el login
        public function getEvalClave($usuario, $contrasena)
        {
            try {
                $objDtoUsuario = new Usuario();
                $objDtoUsuario -> setUsuario($usuario);
                $objDtoUsuario -> setContrasena($contrasena);

                $objDaoUsuario = new UsuarioModel($objDtoUsuario);
                if (gettype($objDaoUsuario -> getQueryLogin() -> fetch()) == 'boolean') {
                    echo "
                    <script>
                        Swal.fire(
                            'ERROR',
                            'Usuario y/o contraseña incorrectos',
                            'error'
                        );
                    </script>
                    ";
                }else{
                    $_SESSION['login'] = false;
                    $varNom = $objDaoUsuario -> getQueryLogin() -> fetch();
                    $_SESSION['name'] = $varNom[1];
                    $_SESSION['rol'] = $varNom[5];
                    header('location:index.php');
                }

            } catch (Exception $e) {
                echo "Error al crear el controlador " .$e -> getMessage();
            }
        }

        //Metodo para insertar todos los usuarios
        public function setInsertUsuario($nombre, $apellido, $usuario, $contrasena, $idTipoUsuario)
        {
            try {
                $objDtoUsuario = new usuario();
                $objDtoUsuario -> setNombre($nombre);
                $objDtoUsuario -> setapellido($apellido);
                $objDtoUsuario -> setUsuario($usuario);
                $objDtoUsuario -> setcontrasena($contrasena);
                $objDtoUsuario -> setIdTipoUsua($idTipoUsuario);

                $objDaoUser = new UsuarioModel($objDtoUsuario);

                if ($objDaoUser -> mIdInsertUsuario()){
                    echo "<script>
                        Swal.fire({
                            icon: 'success',
                            title: 'El usuario se ha guardado',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    </script>";
                }

            } catch (Exception $e) {
                echo "Error en el controlador de insercion" .$e -> getMessage();
            }

        }

        //Metodo para actualizar informacion de usuario
        public function setUpdateUsuario($idUsuario ,$nombre, $apellido, $usuario, $contrasena, $idTipoUsuario)
        {
            try {
                $objDtoUsuario = new Usuario();
                $objDtoUsuario -> setIdUser($idUsuario);
                $objDtoUsuario -> setNombre($nombre);
                $objDtoUsuario -> setApellido($apellido);
                $objDtoUsuario -> setUsuario($usuario);
                $objDtoUsuario -> setContrasena($contrasena);
                $objDtoUsuario -> setIdTipoUsua($idTipoUsuario);

                $objDaoUsuario = new UsuarioModel($objDtoUsuario);

                if ($objDaoUsuario -> mIdUpdateUsuario()) {
                    echo 
                    "<script>
                        location.replace('usuario');
                    </script>";
                }

            } catch(PDOException $e) {
                echo "Error al modificar " .$e -> getMessage();
            }
        }

        //Metodo para traer todos los usuarios
        public function getSearchAllUsuario()
        {
            $respon = false;
            try {
                $objDtoUsuario = new Usuario();
                $objDaoUsuario = new UsuarioModel($objDtoUsuario);
                $respon = $objDaoUsuario -> mIdSearchAllUsuario() -> fetchAll(); //La funcion fetchAll es para convertir todos los datos en un arreglo asociativo

            } catch (PDOException $e) {
                echo "Error en la creacion del controlador para mostrar todo ". $e -> getMessage();
            }

            return $respon;
        }

        
    }

?>