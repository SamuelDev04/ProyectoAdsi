<?php
    class EntradaController{
        public function getSearchAllEntrada(){
            $respon = false;
            try {
                $objDtoEntrada = new Entrada();
                $objDaoEntrada = new EntradaModel($objDtoEntrada);
                $respon = $objDaoEntrada -> mIdSearchAllEntrada() -> fetchAll(); //La funcion fetchAll es para convertir todos los datos en un arreglo asociativo

            } catch (PDOException $e) {
                echo "Error en la creacion del controlador para mostrar todo ". $e -> getMessage();
            }

            return $respon;
        }

        public function setInsertEntrada($fechaEntrada, $cantProEntrada, $precioEntrada, $idProveedor, $idProducto ){
            try {
                $objDtoEntrada = new Entrada();
                $objDtoEntrada -> setFechaEnt($fechaEntrada);
                $objDtoEntrada -> setCantEnt($cantProEntrada);
                $objDtoEntrada -> setPrecioEnt($precioEntrada);
                $objDtoEntrada -> setIdProvee($idProveedor);
                $objDtoEntrada -> setIdProduc($idProducto);



                $objDaoEntrada = new EntradaModel($objDtoEntrada);

                if ($objDaoEntrada -> mIdInsertEntrada()){
                    echo "<script>
                        Swal.fire({
                            icon: 'success',
                            title: 'La entrada se ha guardado',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    </script>";
                }
                
            } catch (Exception $e) {
                echo "Error en el controlador de insercion" .$e -> getMessage();
            }

        }
        public function setUpdateEntrada($idDetEntrada ,$fechaEntrada, $cantProEntrada, $precioEntrada, $idProveedor, $idProducto ){
            try {
                $objDtoEntrada = new Entrada();
                $objDtoEntrada -> setIdDetEnt($idDetEntrada);
                $objDtoEntrada -> setFechaEnt($fechaEntrada);
                $objDtoEntrada -> setCantEnt($cantProEntrada);
                $objDtoEntrada -> setPrecioEnt($precioEntrada);
                $objDtoEntrada -> setIdProvee($idProveedor);
                $objDtoEntrada -> setIdProduc($idProducto);
                

                $objDaoEntrada = new EntradaModel($objDtoEntrada);

                if ($objDaoEntrada -> mIdUpdateEntrada()) {
                    echo "
                    <script>
                        location.replace('entradas');
                    </script>";
                
                }

            } catch(PDOException $e) {
                echo "Error al modificar " .$e -> getMessage();
            }
        }

        public function setUpdateMercancia($idProducto, $cantProEntrada)
        {
            try {
                $objDtoEntrada = new Entrada();
                $objDtoEntrada -> setIdProduc($idProducto);
                $objDtoEntrada -> setCantEnt($cantProEntrada);

                $objDaoEntrada = new EntradaModel($objDtoEntrada);

                if ($objDaoEntrada -> mIdUpdateMercancia()) {
                    /*echo "
                    <script>
                        location.replace('entradas');
                    </script>";*/
                }

            } catch (PDOException $e) {
                echo "Error al actualizar en el controlador" . $e -> getMessage();
            }
        }
    }
?>