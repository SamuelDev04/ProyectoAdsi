<?php
    class TipoProController{

        public function setInsertarTipoProducto($descripcion)
        {
            try {
                $objDtoTipoPro = new TipoPro();
                $objDtoTipoPro -> setDescripTipoPro($descripcion);

                $objDaoTipoPro = new TipoProModel($objDtoTipoPro);

                if ($objDaoTipoPro -> mIdInsertTipoPro()) {
                    echo "<script>
                        Swal.fire({
                            icon: 'success',
                            title: 'El tipo de producto se ha guardado',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    </script>";
                }

            } catch (Exception $e) {
                echo "Error en el controlador de inserción " .$e -> getMessage();
            }
        }

        public function getSearchAllTipoProducto(){
            $respon = false;
            try {
                $objDtoTipoPro = new TipoPro();
                $objDaoTipoPro = new TipoProModel($objDtoTipoPro);
                $respon = $objDaoTipoPro -> mIdSearchAllTipoProducto() -> fetchAll(); //La funcion fetchAll es para convertir todos los datos en un arreglo asociativo

            } catch (PDOException $e) {
                echo "Error en la creacion del controlador para mostrar todo ". $e -> getMessage();
            }

            return $respon;
        }

        public function setUpdateTipoProducto($idTipoProducto, $descripcion)
        {
            try {
                $objDtoTipoPro = new TipoPro();
                $objDtoTipoPro-> setIdTipoPro($idTipoProducto);
                $objDtoTipoPro-> setDescripTipoPro($descripcion);

                $objDaoTipoPro = new TipoProModel($objDtoTipoPro);

                if ($objDaoTipoPro -> mIdUpdateTipoProducto()) {
                    //include_once("view/module/Producto.php");
                    echo 
                        "<script>
                            location.replace('tipoProductos');
                        </script>";
                }
            } catch (PDOException $e) {
                echo "Error al modificar la Producto parcero" . $e->getMessage();
            }
        }
    }

?>