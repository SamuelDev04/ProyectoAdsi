<?php
    //Llamamos el metodo para que corra
    eraseSalida();

    //Creamos el metodo para eliminar la salida
    function eraseSalida(){
        try {
            $objDtoSalida = new Salida();
            $objDtoSalida -> setIdDetSal($_GET['codigo']);
            $objDaoSalida = new SalidaModel($objDtoSalida);
            if ($objDaoSalida -> mIdEraseSalida() == true) {
                echo "
                    <script>
                        Swal.fire(
                            'Borrado!',
                            'El registro ha sido borrado',
                            'success'
                        )
                    </script>
                ";
                include_once("view/module/salida.php");
            }
        } catch (PDOException $e) {
            echo "Error en el borrado del registro " . $e -> getMessage();
        }
    }
?>