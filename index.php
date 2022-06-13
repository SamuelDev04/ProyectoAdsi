<?php
    //Controlador para el arranque
    include_once("controller/arranqueController.php");

    //Controlador del Usuario
    include_once("controller/usuarioController.php");

    //Modelos dto
    include_once("model/dto/userDto.php");

    //Modelos dao
    include_once("model/dao/userDao.php");

    //Conexion a la db
    include_once("model/conexion.php");

    //Arranque del aplicativo
    $objArranque = new Arranque();
    $objArranque -> getIntro();

?>