<?php
    //Llamamos el metodo para que corra
    eraseUsuario();
 
    //Creamos el metodo para eliminar el usuario
    function eraseUsuario(){
        try {
            $objDtoUsuario = new Usuario();
            $objDtoUsuario -> setIdUser($_GET['codigo']);
            $objDaoUsuario = new UsuarioModel($objDtoUsuario);
            if ($objDaoUsuario -> mIdEraseUsuario() == true) {
                echo "
                    <script>
                        Swal.fire(
                            'Borrado!',
                            'El registro ha sido borrado',
                            'success'
                        )
                    </script>
                ";
                include_once("view/module/usuario.php");
            }
        } catch (PDOException $e) {
            echo "Error en el borrado del registro " . $e -> getMessage();
        }
    }
?>
