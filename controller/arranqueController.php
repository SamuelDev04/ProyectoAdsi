<?php
    session_start();

    //Clase controlador para el arranque del aplicativo "Validar el login"
    class Arranque{
        public function getIntro()
        {
            if(isset($_SESSION['login']) == true){
                require_once("view/template.php");
            }else {
                require_once("view/module/login.php");
            }
        }
    }

?>