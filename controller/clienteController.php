<?php
    //Clase controlador para el modulo de cliente
    class ClienteController{

        //Metodo para traer todos los clientes
        public function getSearchAllCliente()
        {
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

        //Metodo para insertar clientes
        public function setInsertCliente($nombre, $telefono, $celular, $direccion)
        {
            try {
                $objDtoCliente = new Cliente();
                $objDtoCliente -> setNombreCliente($nombre);
                $objDtoCliente -> setTelefono($telefono);
                $objDtoCliente -> setCelular($celular);
                $objDtoCliente -> setDireccion($direccion);

                $objDaoCliente = new ClienteModel($objDtoCliente);

                if ($objDaoCliente -> mIdInsertCliente()){
                    echo "<script>
                        Swal.fire({
                            icon: 'success',
                            title: 'El cliente se ha guardado',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    </script>";
                }
                
            } catch (Exception $e) {
                echo "Error en el controlador de insercion" .$e -> getMessage();
            }

        }

        //Metodo para actualizar informacion de clientes
        public function setUpdateCliente($idCliente ,$nombre, $telefono, $celular, $direccion)
        {
            try {
                $objDtoCliente = new Cliente();
                $objDtoCliente -> setIdCliente($idCliente);
                $objDtoCliente -> setNombreCliente($nombre);
                $objDtoCliente -> setTelefono($telefono);
                $objDtoCliente -> setCelular($celular);
                $objDtoCliente -> setDireccion($direccion);

                $objDaoCliente = new ClienteModel($objDtoCliente);

                if ($objDaoCliente -> mIdUpdateCliente()) {
                    echo "
                    <script>
                        location.replace('clientes');
                    </script>";
                
                }

            } catch(PDOException $e) {
                echo "Error al modificar " .$e -> getMessage();
            }
        }

    }

?>




