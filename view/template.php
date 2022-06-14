<?php
    require_once("view/module/head.php");
    require_once("view/module/header.php");
    require_once("view/module/menu.php");

    if (isset($_GET['ruta'])) {
        
        switch ($_GET['ruta']) {
            case 'ruta=usuario':
                include_once("view/module/usuario.php");
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