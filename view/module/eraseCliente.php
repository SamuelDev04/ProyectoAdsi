<?php
    //Llamamos el metodo para que corra
    eraseCliente();
 
    function eraseCliente(){
        try {
            $objDtoCliente = new Cliente();
            $objDtoCliente -> setIdCliente($_GET['codigo']);
            $objDaoCliente = new ClienteModel($objDtoCliente);
            if ($objDaoCliente -> mIdEraseCliente() == true) {
                echo "
                    <script>
                        Swal.fire(
                            'Borrado!',
                            'El registro ha sido borrado',
                            'success'
                        )
                    </script>
                ";
                include_once("view/module/cliente.php");
            }
        } catch (PDOException $e) {
            echo "Error en el borrado del registro " . $e -> getMessage();
        }

    }
?>
