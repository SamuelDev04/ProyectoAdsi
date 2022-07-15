<?php
    class ProductoController{

        public function setInsertarProducto($descripProducto, $cantProducto, $costoProducto, $idTipoProducto)
        {
            try {
                $objDtoProducto = new Producto();
                $objDtoProducto -> setDescripPro($descripProducto);
                $objDtoProducto -> setCantPro($cantProducto);
                $objDtoProducto -> setcostoPro($costoProducto);
                $objDtoProducto -> setTipoPro($idTipoProducto);

                $objDaoProducto = new ProductoModel($objDtoProducto);

                if ($objDaoProducto -> mIdInsertProducto()) {
                    echo "<script>
                        Swal.fire({
                            icon: 'success',
                            title: 'El producto se ha guardado',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    </script>";
                }

            } catch (Exception $e) {
                echo "Error en el controlador de inserción " .$e -> getMessage();
            }
        }

        public function getSearchAllProducto(){
            $respon = false;
            try {
                $objDtoProducto = new Producto();
                $objDaoProducto = new ProductoModel($objDtoProducto);
                $respon = $objDaoProducto -> mIdSearchAllProducto() -> fetchAll(); //La funcion fetchAll es para convertir todos los datos en un arreglo asociativo

            } catch (PDOException $e) {
                echo "Error en la creacion del controlador para mostrar todo ". $e -> getMessage();
            }

            return $respon;
        }

        public function setUpdateProducto($idProducto, $descripProducto, $cantProducto, $costoProducto, $idTipoProducto)
        {
            try {
                $objDtoProducto = new Producto();
                $objDtoProducto-> setIdPro($idProducto);
                $objDtoProducto-> setDescripPro($descripProducto);
                $objDtoProducto-> setCantPro($cantProducto);
                $objDtoProducto-> setcostoPro($costoProducto);
                $objDtoProducto-> setTipoPro($idTipoProducto);

                $objDaoProducto = new ProductoModel($objDtoProducto);

                if ($objDaoProducto -> mIdUpdateProducto()) {
                    //include_once("view/module/Producto.php");
                    echo 
                        "<script>
                            location.replace('productos');
                        </script>";
                }
            } catch (PDOException $e) {
                echo "Error al modificar el producto " . $e->getMessage();
            }
        }

    }

?>