<?php
    //Controlador para el arranque
    include_once("controller/arranqueController.php");

    //Controladores
    include_once("controller/usuarioController.php");
    include_once("controller/producController.php");

    //Modelos dto
    include_once("model/dto/userDto.php");
    include_once("model/dto/producDto.php");

    //Modelos dao
    include_once("model/dao/userDao.php");
    include_once("model/dao/producDao.php");

    //Conexion a la db
    include_once("model/conexion.php");

    //Arranque del aplicativo
    $objArranque = new Arranque();
    $objArranque -> getIntro();

?>