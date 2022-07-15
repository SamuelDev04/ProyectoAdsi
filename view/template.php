<?php
    require_once("view/module/head.php");
    require_once("view/module/header.php");
    require_once("view/module/menu.php");

    if (isset($_GET['ruta'])) {
        
        switch ($_GET['ruta']) {
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
            case 'clientes':
                include_once("view/module/cliente.php");
                break;
            case 'productos':
                include_once("view/module/producto.php");
                break;
            case 'tipoProductos':
                include_once("view/module/tipoProducto.php");
                break;
            case 'proveedores':
                include_once("view/module/proveedor.php");
                break;
            case 'salidas':
                include_once("view/module/salida.php");
                break;
            case 'entradas':
                include_once("view/module/entrada.php");
                break;
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
            case 'eraseClientes':
                include_once("view/module/eraseCliente.php");
                break;
            case 'eraseProducto':
                include_once("view/module/eraseProducto.php");
                break;
            case 'eraseTipoProducto':
                include_once("view/module/eraseTipoProducto.php");
                break;
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

    require_once("view/module/footer.php");

?>