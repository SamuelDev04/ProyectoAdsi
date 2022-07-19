<?php
    //Llamamos el metodo para que corra
    eraseProveedor();

    //Creamos el metodo para eliminar el proveedor
    function eraseProveedor(){
        try {
            $objDtoProveedor = new Proveedor();
            $objDtoProveedor -> setIdProve($_GET['codigo']);
            $objDaoProveedor = new ProveedorModel($objDtoProveedor);
            if ($objDaoProveedor -> mIdEraseProveedor() == true) {
                echo "
                    <script>
                        Swal.fire(
                            'Borrado!',
                            'El registro ha sido borrado',
                            'success'
                        )
                    </script>
                ";
                include_once("view/module/proveedor.php");
            }
        } catch (PDOException $e) {
            echo "Error en el borrado del registro " . $e -> getMessage();
        }
    }
?>