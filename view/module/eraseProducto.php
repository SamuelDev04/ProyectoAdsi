<?php
    //Llamamos el metodo para que corra
    eraseProducto();

    //Creamos el metodo para eliminar el producto
    function eraseProducto(){
        try {
            $objDtoProducto = new Producto();
            $objDtoProducto -> setIdPro($_GET['codigo']);
            $objDaoProducto = new ProductoModel($objDtoProducto);
            if ($objDaoProducto -> mIdEraseProducto() == true) {
                echo "
                    <script>
                        Swal.fire(
                            'Borrado!',
                            'El registro ha sido borrado',
                            'success'
                        )
                    </script>
                ";
                include_once("view/module/producto.php");
            }
        } catch (PDOException $e) {
            echo "Error en el borrado del registro " . $e -> getMessage();
        }
    }
?>