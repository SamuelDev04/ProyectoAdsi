<?php
    class ProveedorController{

        public function setInsertarProveedor($nombre, $numeroTelefono, $direccion)
        {
            try {
                $objDtoProveedor = new Proveedor();
                $objDtoProveedor -> setNom($nombre);
                $objDtoProveedor -> setNumtel($numeroTelefono);
                $objDtoProveedor -> setDireccion($direccion);

                $objDaoProveedor = new ProveedorModel($objDtoProveedor);

                if ($objDaoProveedor -> mIdInsertProveedor()) {
                    echo "<script>
                        Swal.fire({
                            icon: 'success',
                            title: 'El Proveedor se ha guardado',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    </script>";
                }

            } catch (Exception $e) {
                echo "Error en el controlador de inserción " .$e -> getMessage();
            }
        }

        public function getSearchAllProveedor(){
            $respon = false;
            try {
                $objDtoProveedor = new Proveedor();
                $objDaoProveedor = new ProveedorModel($objDtoProveedor);
                $respon = $objDaoProveedor -> mIdSearchAllProveedor() -> fetchAll(); //La funcion fetchAll es para convertir todos los datos en un arreglo asociativo

            } catch (PDOException $e) {
                echo "Error en la creacion del controlador para mostrar todo ". $e -> getMessage();
            }

            return $respon;
        }

        public function setUpdateProveedor($idProveedor, $nombre,$numeroTelefono,$direccion)
        {
            try {
                $objDtoProveedor = new Proveedor();
                $objDtoProveedor-> setIdProve($idProveedor);
                $objDtoProveedor-> setNom($nombre);
                $objDtoProveedor-> setNumTel($numeroTelefono);
                $objDtoProveedor-> setDireccion($direccion);

                $objDaoProveedor = new ProveedorModel($objDtoProveedor);

                if ($objDaoProveedor -> mIdUpdateProveedor()) {
                    //include_once("view/module/Producto.php");
                    echo 
                        "<script>
                            location.replace('proveedor');
                        </script>";
                }
            } catch (PDOException $e) {
                echo "Error al modificar la Proveedor" . $e->getMessage();
            }
        }

    }

?>