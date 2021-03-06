<?php
    //Controlador para el arranque
    include_once("controller/arranqueController.php");

    //Controladores
    include_once("controller/usuarioController.php");
    include_once("controller/tipoUsuarioController.php");
    include_once("controller/producController.php");
    include_once("controller/tipoProController.php");
    include_once("controller/proveedorController.php");
    include_once("controller/salidaController.php");
    include_once("controller/entradaController.php");
    include_once("controller/clienteController.php");

    //Modelos dto
    include_once("model/dto/userDto.php");
    include_once("model/dto/tipoUsuarioDto.php");
    include_once("model/dto/producDto.php");
    include_once("model/dto/tipoProDto.php");
    include_once("model/dto/proveedorDto.php");
    include_once("model/dto/salidaDto.php");
    include_once("model/dto/entradaDto.php");
    include_once("model/dto/clienteDto.php");

    //Modelos dao
    include_once("model/dao/userDao.php");
    include_once("model/dao/tipoUsuarioDao.php");
    include_once("model/dao/producDao.php");
    include_once("model/dao/tipoProDao.php");
    include_once("model/dao/proveedorDao.php");
    include_once("model/dao/salidaDao.php");
    include_once("model/dao/entradaDao.php");
    include_once("model/dao/clienteDao.php");

    //Conexion a la db
    include_once("model/conexion.php");

    //Arranque del aplicativo
    $objArranque = new Arranque();
    $objArranque -> getIntro();

?>