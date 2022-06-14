<?php
    require_once("view/module/head.php");
    require_once("view/module/header.php");
    require_once("view/module/menu.php");

    if (isset($_GET['ruta'])) {
        
        switch ($_GET['ruta']) {
            case 'productos':
                include_once("view/module/producto.php");
                break;
            case 'eraseProducto':
                include_once("view/module/eraseProducto.php");
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