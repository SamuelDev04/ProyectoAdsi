<?php
class ClienteController{
    public function getSearchAllCliente(){
        $respon = false;
        try {
            $objDtoCliente = new Cliente();
            $objDaoCliente = new ClienteModel($objDtoCliente);
            $respon = $objDaoCliente -> mIdSearchAllCliente() -> fetchAll(); //La funcion fetchAll es para convertir todos los datos en un arreglo asociativo

        } catch (PDOException $e) {
            echo "Error en la creacion del controlador para mostrar todo ". $e -> getMessage();
        }

        return $respon;
    }
    public function setInsertCliente($nombreCliente, $telefono, $celular, $direccion){
        try {
            $objDtoCliente = new Cliente();
            $objDtoCliente -> setNombreCliente($nombreCliente);
            $objDtoCliente -> setTelefono($telefono);
            $objDtoCliente -> setCelular($celular);
            $objDtoCliente -> setDireccion($direccion);

            $objDaoCliente = new ClienteModel($objDtoCliente);

            if ($objDaoCliente -> mIdInsertCliente()){
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
}
?>




