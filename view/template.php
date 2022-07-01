<?php
    require_once("view/module/head.php");
    require_once("view/module/header.php");
    require_once("view/module/menu.php");

    if (isset($_GET['ruta'])) {
        
        switch ($_GET['ruta']) {
            case 'usuario':
                include_once("view/module/usuario.php");
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
            case 'salidas':
                include_once("view/module/salida.php");
                break;
            case 'erase':
                include_once("view/module/erase.php");
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
            case 'eraseSalida':
                include_once("view/module/eraseSalida.php");
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