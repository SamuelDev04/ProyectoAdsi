-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-07-2022 a las 19:46:18
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id19262540_db_rikopollo`
--
CREATE DATABASE IF NOT EXISTS `id19262540_db_rikopollo` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `id19262540_db_rikopollo`;

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `spBorrarCliente`$$
CREATE DEFINER=`id19262540_root`@`localhost` PROCEDURE `spBorrarCliente` (IN `_idCliente` INT(10))  BEGIN

DELETE FROM `cliente` WHERE idCliente = _idCliente;

END$$

DROP PROCEDURE IF EXISTS `spBorrarDetEnt`$$
CREATE DEFINER=`id19262540_root`@`localhost` PROCEDURE `spBorrarDetEnt` (IN `_idDetEntrada` INT(10))  BEGIN

DELETE FROM `detalle_entrada` WHERE idDetEntrada = _idDetEntrada;

END$$

DROP PROCEDURE IF EXISTS `spBorrarDetSal`$$
CREATE DEFINER=`id19262540_root`@`localhost` PROCEDURE `spBorrarDetSal` (IN `_idDetSalida` INT(10))  BEGIN

DELETE FROM `detalle_salida` WHERE idDetSalida = _idDetSalida;

END$$

DROP PROCEDURE IF EXISTS `spBorrarProducto`$$
CREATE DEFINER=`id19262540_root`@`localhost` PROCEDURE `spBorrarProducto` (IN `_idProducto` INT(10))  BEGIN

DELETE FROM `producto` WHERE idProducto = _idProducto;

END$$

DROP PROCEDURE IF EXISTS `spBorrarProveedor`$$
CREATE DEFINER=`id19262540_root`@`localhost` PROCEDURE `spBorrarProveedor` (IN `_idPr/oveedor` INT(10))  BEGIN

DELETE FROM `proveedor` WHERE idProveedor = _idProveedor;

END$$

DROP PROCEDURE IF EXISTS `spBorrarTipoPro`$$
CREATE DEFINER=`id19262540_root`@`localhost` PROCEDURE `spBorrarTipoPro` (IN `_idTipoProducto` INT(10))  BEGIN

DELETE FROM `tipo_producto` WHERE idTipoProducto = _idTipoProducto;

END$$

DROP PROCEDURE IF EXISTS `spBorrarUsuario`$$
CREATE DEFINER=`id19262540_root`@`localhost` PROCEDURE `spBorrarUsuario` (IN `_idUsuario` INT(10))  BEGIN

DELETE FROM `usuarios` WHERE idUsuario = _idUsuario;

END$$

DROP PROCEDURE IF EXISTS `spConsultarCliente`$$
CREATE DEFINER=`id19262540_root`@`localhost` PROCEDURE `spConsultarCliente` (IN `_idCliente` INT(10))  BEGIN

SELECT idCliente, nombre, telefono, celular, direccion FROM `cliente` WHERE idCliente = _idCliente;

END$$

DROP PROCEDURE IF EXISTS `spConsultarDetEnt`$$
CREATE DEFINER=`id19262540_root`@`localhost` PROCEDURE `spConsultarDetEnt` (IN `_idDetEntrada` INT(10))  BEGIN

SELECT idDetEntrada, fechaEntrada, cantProEntrada, precioEntrada, idProveedor, idProducto FROM `detalle_entrada` WHERE idDetEntrada = _idDetEntrada;

END$$

DROP PROCEDURE IF EXISTS `spConsultarDetSal`$$
CREATE DEFINER=`id19262540_root`@`localhost` PROCEDURE `spConsultarDetSal` (IN `_idDetSalida` INT(10))  BEGIN

SELECT idDetSalida, fechaSalida, cantidadSalida, valorTotal, idCliente, idProducto FROM `detalle_salida` WHERE idDetSalida = _idDetSalida;

END$$

DROP PROCEDURE IF EXISTS `spConsultarProducto`$$
CREATE DEFINER=`id19262540_root`@`localhost` PROCEDURE `spConsultarProducto` (IN `_idProducto` INT(10))  BEGIN

SELECT idProducto, descripProducto, cantProducto, costoProducto, idTipoProducto FROM `producto` WHERE idProducto = _idProducto;

END$$

DROP PROCEDURE IF EXISTS `spConsultarProveedor`$$
CREATE DEFINER=`id19262540_root`@`localhost` PROCEDURE `spConsultarProveedor` (IN `_idProveedor` INT(10))  BEGIN

SELECT idProveedor, nombre, numeroTelefono, direccion FROM `proveedor` WHERE idProveedor = _idProveedor;

END$$

DROP PROCEDURE IF EXISTS `spConsultarTipoPro`$$
CREATE DEFINER=`id19262540_root`@`localhost` PROCEDURE `spConsultarTipoPro` (IN `_idTipoProducto` INT(10))  BEGIN

SELECT idTipoProducto, descripcion FROM `tipo_producto` WHERE idTipoProducto = _idTipoProducto;

END$$

DROP PROCEDURE IF EXISTS `spConsultarUsuario`$$
CREATE DEFINER=`id19262540_root`@`localhost` PROCEDURE `spConsultarUsuario` (IN `_idUsuario` INT(10))  BEGIN

SELECT idUsuario, nombre, apellido, usuario, contrasena, idTipoUsuario FROM `usuarios` WHERE idUsuario = _idUsuario;

END$$

DROP PROCEDURE IF EXISTS `spEntradaMercancia`$$
CREATE DEFINER=`id19262540_root`@`localhost` PROCEDURE `spEntradaMercancia` (IN `_idProducto` INT(10), IN `_cantProEntrada` INT(50))  BEGIN

UPDATE `producto` SET cantProducto = cantProducto +_cantProEntrada
WHERE idProducto = _idProducto;

END$$

DROP PROCEDURE IF EXISTS `spInsertarCliente`$$
CREATE DEFINER=`id19262540_root`@`localhost` PROCEDURE `spInsertarCliente` (IN `_nombre` VARCHAR(150), IN `_telefono` VARCHAR(50), IN `_celular` VARCHAR(50), IN `_direccion` VARCHAR(150))  BEGIN

INSERT INTO `cliente`(nombre, telefono, celular, direccion) VALUES (_nombre, _telefono, _celular, _direccion);

END$$

DROP PROCEDURE IF EXISTS `spInsertarDetEnt`$$
CREATE DEFINER=`id19262540_root`@`localhost` PROCEDURE `spInsertarDetEnt` (IN `_fechaEntrada` DATE, IN `_cantProEntrada` INT(50), IN `_precioEntrada` INT(50), IN `_idProveedor` INT(10), IN `_idProducto` INT(10))  BEGIN

INSERT INTO `detalle_entrada`(fechaEntrada, cantProEntrada, precioEntrada, idProveedor, idProducto) VALUES (_fechaEntrada, _cantProEntrada, _precioEntrada, _idProveedor, _idProducto);

END$$

DROP PROCEDURE IF EXISTS `spInsertarDetSal`$$
CREATE DEFINER=`id19262540_root`@`localhost` PROCEDURE `spInsertarDetSal` (IN `_fechaSalida` DATE, IN `_cantidadSalida` INT(50), IN `_valorTotal` INT(50), IN `_idCliente` INT(10), IN `_idProducto` INT(10))  BEGIN

INSERT INTO `detalle_salida`(fechaSalida, cantidadSalida, valorTotal, idCliente, idProducto) VALUES (_fechaSalida, _cantidadSalida, _valorTotal, _idCliente, _idProducto);

END$$

DROP PROCEDURE IF EXISTS `spInsertarProducto`$$
CREATE DEFINER=`id19262540_root`@`localhost` PROCEDURE `spInsertarProducto` (IN `_descripProducto` VARCHAR(150), IN `_cantProducto` INT(50), IN `_costoProducto` INT(50), IN `_idTipoProducto` INT(10))  BEGIN

INSERT INTO `producto`(descripProducto, cantProducto, costoProducto, idTipoProducto) VALUES (_descripProducto, _cantProducto, _costoProducto, _idTipoProducto);

END$$

DROP PROCEDURE IF EXISTS `spInsertarProveedor`$$
CREATE DEFINER=`id19262540_root`@`localhost` PROCEDURE `spInsertarProveedor` (IN `_nombre` VARCHAR(150), IN `_numeroTelefono` VARCHAR(150), IN `_direccion` VARCHAR(150))  BEGIN

INSERT INTO `proveedor`(nombre, numeroTelefono, direccion) VALUES (_nombre, _numeroTelefono, _direccion);

END$$

DROP PROCEDURE IF EXISTS `spInsertarTipoPro`$$
CREATE DEFINER=`id19262540_root`@`localhost` PROCEDURE `spInsertarTipoPro` (IN `_descripcion` VARCHAR(150))  BEGIN

INSERT INTO `tipo_producto`(descripcion) VALUES (_descripcion);

END$$

DROP PROCEDURE IF EXISTS `spInsertarUsuario`$$
CREATE DEFINER=`id19262540_root`@`localhost` PROCEDURE `spInsertarUsuario` (IN `_nombre` VARCHAR(50), IN `_apellido` VARCHAR(50), IN `_usuario` VARCHAR(150), IN `_contrasena` VARCHAR(150), IN `_idTipoUsuario` INT(2))  BEGIN

INSERT INTO `usuarios`(nombre, apellido, usuario, contrasena, idTipoUsuario) VALUES (_nombre, _apellido, _usuario, _contrasena, _idTipoUsuario);

END$$

DROP PROCEDURE IF EXISTS `spSalidaMercancia`$$
CREATE DEFINER=`id19262540_root`@`localhost` PROCEDURE `spSalidaMercancia` (IN `_idProducto` INT(10), IN `_cantidadSalida` INT(50))  BEGIN

UPDATE `producto` SET cantProducto = cantProducto -_cantidadSalida
WHERE idProducto = _idProducto;

END$$

DROP PROCEDURE IF EXISTS `spSearchAllCliente`$$
CREATE DEFINER=`id19262540_root`@`localhost` PROCEDURE `spSearchAllCliente` ()  BEGIN

SELECT idCliente, nombre, telefono, celular, direccion FROM cliente;

END$$

DROP PROCEDURE IF EXISTS `spSearchAllDetEnt`$$
CREATE DEFINER=`id19262540_root`@`localhost` PROCEDURE `spSearchAllDetEnt` ()  BEGIN

SELECT detalle_entrada.idDetEntrada, detalle_entrada.fechaEntrada, detalle_entrada.cantProEntrada, detalle_entrada.precioEntrada, detalle_entrada.idProveedor, detalle_entrada.idProducto, proveedor.nombre, producto.descripProducto 
FROM detalle_entrada 
INNER JOIN proveedor ON detalle_entrada.idProveedor = proveedor.idProveedor 
INNER JOIN producto ON detalle_entrada.idProducto = producto.idProducto;

END$$

DROP PROCEDURE IF EXISTS `spSearchAllDetSal`$$
CREATE DEFINER=`id19262540_root`@`localhost` PROCEDURE `spSearchAllDetSal` ()  BEGIN

SELECT detalle_salida.idDetSalida, detalle_salida.fechaSalida, detalle_salida.cantidadSalida, detalle_salida.valorTotal, detalle_salida.idCliente, detalle_salida.idProducto, cliente.nombre, producto.descripProducto
FROM detalle_salida
INNER JOIN cliente ON detalle_salida.idCliente = cliente.idCliente
INNER JOIN producto ON detalle_salida.idProducto = producto.idProducto;

END$$

DROP PROCEDURE IF EXISTS `spSearchAllProducto`$$
CREATE DEFINER=`id19262540_root`@`localhost` PROCEDURE `spSearchAllProducto` ()  BEGIN

SELECT producto.idProducto, producto.descripProducto, producto.cantProducto, producto.costoProducto, producto.idTipoProducto, tipo_producto.descripcion 
FROM producto 
INNER JOIN tipo_producto ON producto.idTipoProducto = tipo_producto.idTipoProducto;


END$$

DROP PROCEDURE IF EXISTS `spSearchAllProveedor`$$
CREATE DEFINER=`id19262540_root`@`localhost` PROCEDURE `spSearchAllProveedor` ()  BEGIN

SELECT idProveedor, nombre, numeroTelefono, direccion FROM proveedor;

END$$

DROP PROCEDURE IF EXISTS `spSearchAllTipoPro`$$
CREATE DEFINER=`id19262540_root`@`localhost` PROCEDURE `spSearchAllTipoPro` ()  BEGIN

SELECT idTipoProducto, descripcion FROM tipo_producto;

END$$

DROP PROCEDURE IF EXISTS `spSearchAllTipoUsua`$$
CREATE DEFINER=`id19262540_root`@`localhost` PROCEDURE `spSearchAllTipoUsua` ()  BEGIN

SELECT tipo_usuario.idTipoUsuario, tipo_usuario.descripcion, usuarios.idTipoUsuario
FROM tipo_usuario
INNER JOIN usuarios ON tipo_usuario.idTipoUsuario = usuarios.idTipoUsuario;

END$$

DROP PROCEDURE IF EXISTS `spSearchAllUsuario`$$
CREATE DEFINER=`id19262540_root`@`localhost` PROCEDURE `spSearchAllUsuario` ()  BEGIN

SELECT usuarios.idUsuario, usuarios.nombre, usuarios.apellido, usuarios.usuario, usuarios.contrasena, usuarios.idTipoUsuario, tipo_usuario.descripcion
FROM usuarios
INNER JOIN tipo_usuario ON usuarios.idTipoUsuario = tipo_usuario.idTipoUsuario;

END$$

DROP PROCEDURE IF EXISTS `spUpdateCliente`$$
CREATE DEFINER=`id19262540_root`@`localhost` PROCEDURE `spUpdateCliente` (IN `_idCliente` INT(10), IN `_nombre` VARCHAR(150), IN `_telefono` VARCHAR(50), IN `_celular` VARCHAR(50), IN `_direccion` VARCHAR(150))  BEGIN

UPDATE `cliente` SET nombre = _nombre,
telefono = _telefono,
celular = _celular,
direccion = _direccion
WHERE idCliente = _idCliente;

END$$

DROP PROCEDURE IF EXISTS `spUpdateDetEnt`$$
CREATE DEFINER=`id19262540_root`@`localhost` PROCEDURE `spUpdateDetEnt` (IN `_idDetEntrada` INT(10), IN `_fechaEntrada` DATE, IN `_cantProEntrada` INT(50), IN `_precioEntrada` INT(50), IN `_idProveedor` INT(10), IN `_idProducto` INT(10))  BEGIN

UPDATE `detalle_entrada` SET fechaEntrada = _fechaEntrada,
cantProEntrada = _cantProEntrada,
precioEntrada = _precioEntrada,
idProveedor = _idProveedor,
idProducto = _idProducto
WHERE idDetEntrada = _idDetEntrada;

END$$

DROP PROCEDURE IF EXISTS `spUpdateDetSal`$$
CREATE DEFINER=`id19262540_root`@`localhost` PROCEDURE `spUpdateDetSal` (IN `_idDetSalida` INT(10), IN `_fechaSalida` DATE, IN `_cantidadSalida` INT(50), IN `_valorTotal` INT(50), IN `_idCliente` INT(10), IN `_idProducto` INT(10))  BEGIN

UPDATE `detalle_salida` SET fechaSalida= _fechaSalida,
cantidadSalida= _cantidadSalida,
valorTotal= _valorTotal,
idCliente= _idCliente,
idProducto= _idProducto 
WHERE idDetSalida= _idDetSalida;

END$$

DROP PROCEDURE IF EXISTS `spUpdateProducto`$$
CREATE DEFINER=`id19262540_root`@`localhost` PROCEDURE `spUpdateProducto` (IN `_idProducto` INT(10), IN `_descripProducto` VARCHAR(150), IN `_cantProducto` INT(50), IN `_costoProducto` INT(50), IN `_idTipoProducto` INT(10))  BEGIN

UPDATE `producto` SET descripProducto = _descripProducto,
cantProducto = _cantProducto,
costoProducto = _costoProducto,
idTipoProducto = _idTipoProducto 
WHERE idProducto = _idProducto;

END$$

DROP PROCEDURE IF EXISTS `spUpdateProveedor`$$
CREATE DEFINER=`id19262540_root`@`localhost` PROCEDURE `spUpdateProveedor` (IN `_idProveedor` INT(10), IN `_nombre` VARCHAR(150), IN `_numeroTelefono` VARCHAR(150), IN `_direccion` VARCHAR(150))  BEGIN

UPDATE `proveedor` SET nombre = _nombre,
numeroTelefono = _numeroTelefono,
direccion = _direccion 
WHERE idProveedor = _idProveedor;

END$$

DROP PROCEDURE IF EXISTS `spUpdateTipoPro`$$
CREATE DEFINER=`id19262540_root`@`localhost` PROCEDURE `spUpdateTipoPro` (IN `_idTipoProducto` INT(10), IN `_descripcion` VARCHAR(150))  BEGIN

UPDATE `tipo_producto` SET descripcion = _descripcion
WHERE idTipoProducto = _idTipoProducto;

END$$

DROP PROCEDURE IF EXISTS `spUpdateUsuario`$$
CREATE DEFINER=`id19262540_root`@`localhost` PROCEDURE `spUpdateUsuario` (IN `_idUsuario` INT(10), IN `_nombre` VARCHAR(50), IN `_apellido` VARCHAR(50), IN `_usuario` VARCHAR(150), IN `_contrasena` VARCHAR(150), IN `_idTipoUsuario` INT(2))  BEGIN

UPDATE `usuarios` SET nombre = _nombre,
apellido = _apellido,
usuario = _usuario,
contrasena = _contrasena,
idTipoUsuario = _idTipoUsuario
WHERE idUsuario = _idUsuario;	

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `idCliente` int(10) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `celular` varchar(50) NOT NULL,
  `direccion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `nombre`, `telefono`, `celular`, `direccion`) VALUES
(1, 'Juanalverto', '22929292', '3139292223', 'cl 22 # 34-55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_entrada`
--

DROP TABLE IF EXISTS `detalle_entrada`;
CREATE TABLE `detalle_entrada` (
  `idDetEntrada` int(10) NOT NULL,
  `fechaEntrada` date NOT NULL,
  `cantProEntrada` int(50) NOT NULL,
  `precioEntrada` int(50) NOT NULL,
  `idProveedor` int(10) NOT NULL,
  `idProducto` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_entrada`
--

INSERT INTO `detalle_entrada` (`idDetEntrada`, `fechaEntrada`, `cantProEntrada`, `precioEntrada`, `idProveedor`, `idProducto`) VALUES
(1, '2022-06-28', 80, 9000, 1, 2),
(4, '2022-07-09', 20, 8500, 1, 1),
(5, '2022-07-09', 10, 8000, 1, 1),
(6, '2022-07-11', 100, 8700, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_salida`
--

DROP TABLE IF EXISTS `detalle_salida`;
CREATE TABLE `detalle_salida` (
  `idDetSalida` int(10) NOT NULL,
  `fechaSalida` date NOT NULL,
  `cantidadSalida` int(50) NOT NULL,
  `valorTotal` int(50) NOT NULL,
  `idCliente` int(10) NOT NULL,
  `idProducto` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_salida`
--

INSERT INTO `detalle_salida` (`idDetSalida`, `fechaSalida`, `cantidadSalida`, `valorTotal`, `idCliente`, `idProducto`) VALUES
(1, '2022-06-28', 15, 135000, 1, 2),
(2, '2022-07-11', 20, 140000, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto` (
  `idProducto` int(10) NOT NULL,
  `descripProducto` varchar(150) NOT NULL,
  `cantProducto` int(50) NOT NULL,
  `costoProducto` int(50) NOT NULL,
  `idTipoProducto` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `descripProducto`, `cantProducto`, `costoProducto`, `idTipoProducto`) VALUES
(1, 'Muslos - Friko', 110, 7800, 4),
(2, 'Pechugas - Chickensi', 100, 9607, 1),
(4, 'Sisas', 90, 9000, 5),
(5, 'Perro', 90, 8900, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE `proveedor` (
  `idProveedor` int(10) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `numeroTelefono` varchar(150) NOT NULL,
  `direccion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`idProveedor`, `nombre`, `numeroTelefono`, `direccion`) VALUES
(1, 'Kilosian', '8812133', 'Cl 34 #22 - 645');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

DROP TABLE IF EXISTS `tipo_producto`;
CREATE TABLE `tipo_producto` (
  `idTipoProducto` int(10) NOT NULL,
  `descripcion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_producto`
--

INSERT INTO `tipo_producto` (`idTipoProducto`, `descripcion`) VALUES
(1, 'Pechuga'),
(4, 'Muslo'),
(5, 'Alas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
CREATE TABLE `tipo_usuario` (
  `idTipoUsuario` int(3) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`idTipoUsuario`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `idUsuario` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `usuario` varchar(150) NOT NULL,
  `contrasena` varchar(150) NOT NULL,
  `idTipoUsuario` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombre`, `apellido`, `usuario`, `contrasena`, `idTipoUsuario`) VALUES
(1, 'Samuel', 'Yepes', 'Syepes', '1234', 1),
(2, 'Sebastian', 'Quiceno', 'Demo', '12345', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `detalle_entrada`
--
ALTER TABLE `detalle_entrada`
  ADD PRIMARY KEY (`idDetEntrada`),
  ADD KEY `idProducto` (`idProducto`),
  ADD KEY `idProveedor` (`idProveedor`);

--
-- Indices de la tabla `detalle_salida`
--
ALTER TABLE `detalle_salida`
  ADD PRIMARY KEY (`idDetSalida`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idProducto` (`idProducto`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `idTipoProducto` (`idTipoProducto`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`idProveedor`);

--
-- Indices de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  ADD PRIMARY KEY (`idTipoProducto`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`idTipoUsuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idTipoUsuario` (`idTipoUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalle_entrada`
--
ALTER TABLE `detalle_entrada`
  MODIFY `idDetEntrada` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `detalle_salida`
--
ALTER TABLE `detalle_salida`
  MODIFY `idDetSalida` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `idProveedor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  MODIFY `idTipoProducto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `idTipoUsuario` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_entrada`
--
ALTER TABLE `detalle_entrada`
  ADD CONSTRAINT `detalle_entrada_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`),
  ADD CONSTRAINT `detalle_entrada_ibfk_2` FOREIGN KEY (`idProveedor`) REFERENCES `proveedor` (`idProveedor`);

--
-- Filtros para la tabla `detalle_salida`
--
ALTER TABLE `detalle_salida`
  ADD CONSTRAINT `detalle_salida_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`),
  ADD CONSTRAINT `detalle_salida_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`idTipoProducto`) REFERENCES `tipo_producto` (`idTipoProducto`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idTipoUsuario`) REFERENCES `tipo_usuario` (`idTipoUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
