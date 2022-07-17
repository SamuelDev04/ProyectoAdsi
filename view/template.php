<?php
    //Head de la pagina
    require_once("view/module/head.php");
    //Header de la pagina
    require_once("view/module/header.php");
    //Menu de la pagina
    require_once("view/module/menu.php");

    //Aqui se valida la ruta para saber en que modulo se está
    if (isset($_GET['ruta'])) {
        
        switch ($_GET['ruta']) {
            //Case para el modulo usuario
            case 'usuario':
                if ($_SESSION['rol'] == 1) {
                    include_once("view/module/usuario.php");
                } else {
                    include_once("view/module/presentation.php");
                    echo "
                    <script>
                        Swal.fire(
                            'Usted no puede realizar esta acción',
                            'Esto solo lo puede hacer el administrador',
                            'error'
                        );
                    </script>
                    ";
                }
                break;
            //Case para el modulo clientes
            case 'clientes':
                include_once("view/module/cliente.php");
                break;
            //Case para el modulo productos
            case 'productos':
                include_once("view/module/producto.php");
                break;
            //Case para el modulo tipos de producto
            case 'tipoProductos':
                include_once("view/module/tipoProducto.php");
                break;
            //Case para el modulo proveedores
            case 'proveedores':
                include_once("view/module/proveedor.php");
                break;
            //Case para el modulo salidas
            case 'salidas':
                include_once("view/module/salida.php");
                break;
            //Case para el modulo entradas
            case 'entradas':
                include_once("view/module/entrada.php");
                break;
            //Case para eliminar usuario
            case 'erase':
                if ($_SESSION['rol'] == 1) {
                    include_once("view/module/erase.php");
                } else {
                    include_once("view/module/usuario.php");
                    echo "
                    <script>
                        Swal.fire(
                            'No puede eliminar registros!',
                            'Esto solo lo puede hacer el administrador',
                            'error'
                        );
                    </script>
                    ";
                }
                break;
            //Case para eliminar cliente
            case 'eraseClientes':
                if ($_SESSION['rol'] == 1) {
                    include_once("view/module/eraseCliente.php");
                } else {
                    include_once("view/module/cliente.php");
                    echo "
                    <script>
                        Swal.fire(
                            'No puede eliminar registros!',
                            'Esto solo lo puede hacer el administrador',
                            'error'
                        );
                    </script>
                    ";
                }
                break;
            //Case para eliminar producto
            case 'eraseProducto':
                if ($_SESSION['rol'] == 1) {
                    include_once("view/module/eraseProducto.php");
                } else {
                    include_once("view/module/producto.php");
                    echo "
                    <script>
                        Swal.fire(
                            'No puede eliminar registros!',
                            'Esto solo lo puede hacer el administrador',
                            'error'
                        );
                    </script>
                    ";
                }
                break;
            //Case para eliminar tipo de producto
            case 'eraseTipoProducto':
                if ($_SESSION['rol'] == 1) {
                    include_once("view/module/eraseTipoProducto.php");
                } else {
                    include_once("view/module/TipoProducto.php");
                    echo "
                    <script>
                        Swal.fire(
                            'No puede eliminar registros!',
                            'Esto solo lo puede hacer el administrador',
                            'error'
                        );
                    </script>
                    ";
                }
                break;
            //Case para eliminar proveedor
            case  'eraseProveedor':
                if ($_SESSION['rol'] == 1) {
                    include_once("view/module/eraseProveedor.php");
                } else {
                    include_once("view/module/proveedor.php");
                    echo "
                    <script>
                        Swal.fire(
                            'No puede eliminar registros!',
                            'Esto solo lo puede hacer el administrador',
                            'error'
                        );
                    </script>
                    ";
                }
                break;
            //Case para eliminar salida
            case 'eraseSalida':
                if ($_SESSION['rol'] == 1) {
                    include_once("view/module/eraseSalida.php");
                } else {
                    include_once("view/module/salida.php");
                    echo "
                    <script>
                        Swal.fire(
                            'No puede eliminar registros!',
                            'Esto solo lo puede hacer el administrador',
                            'error'
                        );
                    </script>
                    ";
                }
                break;
            //Case para eliminar entrada
            case 'eraseEntrada':
                if ($_SESSION['rol'] == 1) {
                    include_once("view/module/eraseEntrada.php");
                } else {
                    include_once("view/module/entrada.php");
                    echo "
                    <script>
                        Swal.fire(
                            'No puede eliminar registros!',
                            'Esto solo lo puede hacer el administrador',
                            'error'
                        );
                    </script>
                    ";
                }
                break;
            default:
                include_once("view/module/presentation.php");
                break;
        }
    }else {
        include_once("view/module/presentation.php");
    }

    //Footer de la pagina
    require_once("view/module/footer.php");

?>