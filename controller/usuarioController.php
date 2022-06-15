<?php
    class UsuarioController{

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
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Your password is incorrect',
                      })
                    </script>
                    ";
                }else{
                    $_SESSION['login'] = false;
                    header('location:index.php');
                }

            } catch (Exception $e) {
                echo "Error al crear el controlador " .$e -> getMessage();
            }
        }

        public function setInsertUsuario($nombre, $apellido, $usuario, $contrasena){
            try {
                $objDtoUsuario = new usuario();
                $objDtoUsuario -> setNombre($nombre);
                $objDtoUsuario -> setapellido($apellido);
                $objDtoUsuario -> setUsuario($usuario);
                $objDtoUsuario -> setcontrasena($contrasena);

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

        public function setUpdateUsuario($idUsuario ,$nombre, $apellido, $usuario, $contrasena){
            try {
                $objDtoUsuario = new Usuario();
                $objDtoUsuario -> setIdUser($idUsuario);
                $objDtoUsuario -> setNombre($nombre);
                $objDtoUsuario -> setApellido($apellido);
                $objDtoUsuario -> setUsuario($usuario);
                $objDtoUsuario -> setContrasena($contrasena);

                $objDaoUsuario = new UsuarioModel($objDtoUsuario);

                if ($objDaoUsuario -> mIdUpdateUsuario()) {
                    echo "
                        <script>
                        Swal.fire({
                            'Actualizado!',
                            'Los campos ingresados se han actualizado',
                            'success'
                        })
                        </script>
                    ";
                    include_once("view/module/user.php");
                }

            } catch(PDOException $e) {
                echo "Error al modificar " .$e -> getMessage();
            }
        }

        public function getSearchAllUsuario(){
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

    //$objContro = new UserController();
    //$objContro -> getEvalClave("Juan32","22776172");
    

?>