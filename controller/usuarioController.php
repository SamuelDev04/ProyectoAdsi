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
    }

?>