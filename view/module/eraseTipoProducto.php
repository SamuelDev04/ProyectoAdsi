<?php
    //echo "Llego";
    eraseTipoProducto();

    function eraseTipoProducto(){
        try {
            $objDtoTipoPro = new TipoPro();
            $objDtoTipoPro -> setIdTipoPro($_GET['codigo']);
            $objDaoTipoPro = new TipoProModel($objDtoTipoPro);
            if ($objDaoTipoPro -> mIdEraseTipoPro() == true) {
                echo "
                    <script>
                        Swal.fire(
                            'Borrado!',
                            'El registro ha sido borrado',
                            'success'
                        )
                    </script>
                ";
                include_once("view/module/tipoProducto.php");
            }
        } catch (PDOException $e) {
            echo "Error en el borrado del registro " . $e -> getMessage();
        }
    }
?>