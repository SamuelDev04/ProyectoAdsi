<?php
    class SalidaController{

        public function setInsertarSalida($fechaSalida, $cantidadSalida, $valorTotal, $idCliente, $idProducto)
        {
            try {
                $objDtoSalida = new Salida();
                $objDtoSalida -> setFechaSal($fechaSalida);
                $objDtoSalida -> setCantSal($cantidadSalida);
                $objDtoSalida -> setValorTot($valorTotal);
                $objDtoSalida -> setIdCliente($idCliente);
                $objDtoSalida -> setIdPro($idProducto);

                $objDaoSalida = new SalidaModel($objDtoSalida);

                if ($objDaoSalida -> mIdInsertSalida()) {
                    echo "<script>
                        Swal.fire({
                            icon: 'success',
                            title: 'El Salida se ha guardado',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    </script>";
                }

            } catch (Exception $e) {
                echo "Error en el controlador de inserción " .$e -> getMessage();
            }
        }

        public function getSearchAllSalida()
        {
            $respon = false;
            try {
                $objDtoSalida = new Salida();
                $objDaoSalida = new SalidaModel($objDtoSalida);
                $respon = $objDaoSalida -> mIdSearchAllSalida() -> fetchAll(); //La funcion fetchAll es para convertir todos los datos en un arreglo asociativo

            } catch (PDOException $e) {
                echo "Error en la creacion del controlador para mostrar todo ". $e -> getMessage();
            }

            return $respon;
        }

        public function setUpdateSalida($idDetSalida, $fechaSalida, $cantidadSalida, $valorTotal, $idCliente, $idProducto)
        {
            try {
                $objDtoSalida = new Salida();
                $objDtoSalida-> setIdDetSal($idDetSalida);
                $objDtoSalida-> setFechaSal($fechaSalida);
                $objDtoSalida-> setCantSal($cantidadSalida);
                $objDtoSalida-> setValorTot($valorTotal);
                $objDtoSalida-> setIdCliente($idCliente);
                $objDtoSalida-> setIdPro($idProducto);

                $objDaoSalida = new SalidaModel($objDtoSalida);

                if ($objDaoSalida -> mIdUpdateSalida()) {
                    //include_once("view/module/Salida.php");
                    echo 
                        "<script>
                            location.replace('salidas');
                        </script>";
                }
            } catch (PDOException $e) {
                echo "Error al modificar la salida " . $e->getMessage();
            }
        }
    }

?>