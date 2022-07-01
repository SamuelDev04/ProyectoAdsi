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

    public function setInsertEntrada($nombreEntrada, $idDetEntrada, $fechaEntrada, $cantProEntrada, $precioEntrada, $idProveedor, $idProducto ){
        try {
            $objDtoEntrada = new Entrada();
            $objDtoEntrada -> setNombreEntrada($nombreEntrada);
            $objDtoEntrada -> setIdDetEnt($idDetEntrada);
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
                        title: 'El usuario se ha guardado',
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
                location.replace('Entradas');
                </script>";
            
            }

        } catch(PDOException $e) {
            echo "Error al modificar " .$e -> getMessage();
        }
    }
}
?>