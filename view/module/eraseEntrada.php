<?php
    eraseEntrada();
 
    function eraseEntrada(){
        try {
            $objDtoEntrada = new Entrada();
            $objDtoEntrada -> setIdDetEnt($_GET['codigo']);
            $objDaoEntrada = new EntradaModel($objDtoEntrada);
            if ($objDaoEntrada -> mIdEraseEntrada() == true) {
                echo "
                    <script>
                        Swal.fire(
                            'Borrado!',
                            'El registro ha sido borrado',
                            'success'
                        )
                    </script>
                ";
                include_once("view/module/entrada.php");
            }
        } catch (PDOException $e) {
            echo "Error en el borrado del registro " . $e -> getMessage();
        }
    }
?>
