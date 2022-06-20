<?php
    //Controlador para el arranque
    include_once("controller/arranqueController.php");

    //Controladores
    include_once("controller/usuarioController.php");
    include_once("controller/producController.php");
    include_once("controller/tipoProController.php");

    //Modelos dto
    include_once("model/dto/userDto.php");
    include_once("model/dto/producDto.php");
    include_once("model/dto/tipoProDto.php");

    //Modelos dao
    include_once("model/dao/userDao.php");
    include_once("model/dao/producDao.php");
    include_once("model/dao/tipoProDao.php");

    //Conexion a la db
    include_once("model/conexion.php");

    //Arranque del aplicativo
    $objArranque = new Arranque();
    $objArranque -> getIntro();

?>