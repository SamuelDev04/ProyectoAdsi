-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-06-2022 a las 15:31:52
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6
-- Tiempo de generación: 30-06-2022 a las 00:58:50
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_rikopollo`
--

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `spBorrarCliente`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spBorrarCliente` (IN `_idCliente` INT(10))   BEGIN

CREATE DEFINER=`root`@`localhost` PROCEDURE `spBorrarCliente` (IN `_idCliente` INT(4))   BEGIN
DELETE FROM `cliente` WHERE idCliente = _idCliente;

END$$

DROP PROCEDURE IF EXISTS `spBorrarDetEnt`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spBorrarDetEnt` (IN `_idDetEntrada` INT(10))   BEGIN

DELETE FROM `detalle_entrada` WHERE idDetEntrada = _idDetEntrada;

END$$

DROP PROCEDURE IF EXISTS `spBorrarDetSal`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spBorrarDetSal` (IN `_idDetSalida` INT(10))   BEGIN

DELETE FROM `detalle_salida` WHERE idDetSalida = _idDetSalida;

END$$

DROP PROCEDURE IF EXISTS `spBorrarProducto`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spBorrarProducto` (IN `_idProducto` INT(10))   BEGIN

DELETE FROM `producto` WHERE idProducto = _idProducto;

END$$

DROP PROCEDURE IF EXISTS `spBorrarProveedor`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spBorrarProveedor` (IN `_idProveedor ` INT(10))   BEGIN

DELETE FROM `proveedor` WHERE idProveedor = _idProveedor;

END$$

DROP PROCEDURE IF EXISTS `spBorrarTipoPro`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spBorrarTipoPro` (IN `_idTipoProducto ` INT(10))   BEGIN

DELETE FROM `tipo_producto` WHERE idTipoProducto = _idTipoProducto;

END$$

DROP PROCEDURE IF EXISTS `spBorrarUsuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spBorrarUsuario` (IN `_idUsuario` INT(10))   BEGIN

DELETE FROM `usuarios` WHERE idUsuario = _idUsuario;

END$$

DROP PROCEDURE IF EXISTS `spConsultarCliente`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spConsultarCliente` (IN `_idCliente` INT(10))   BEGIN

SELECT idCliente, nombre, telefono, celular, direccion FROM `cliente` WHERE idCliente = _idCliente;

END$$

DROP PROCEDURE IF EXISTS `spConsultarDetEnt`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spConsultarDetEnt` (IN `_idDetEntrada` INT(10))   BEGIN

SELECT idDetEntrada, fechaEntrada, cantProEntrada, precioEntrada, idProveedor, idProducto FROM `detalle_entrada` WHERE idDetEntrada = _idDetEntrada;

END$$

DROP PROCEDURE IF EXISTS `spConsultarDetSal`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spConsultarDetSal` (IN `_idDetSalida` INT(10))   BEGIN

SELECT idDetSalida, fechaSalida, cantidadSalida, valorTotal, idCliente, idProducto FROM `detalle_salida` WHERE idDetSalida = _idDetSalida;

END$$

DROP PROCEDURE IF EXISTS `spConsultarProducto`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spConsultarProducto` (IN `_idProducto` INT(10))   BEGIN

SELECT idProducto, descripProducto, cantProducto, costoProducto, idTipoProducto FROM `producto` WHERE idProducto = _idProducto;

END$$

DROP PROCEDURE IF EXISTS `spConsultarProveedor`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spConsultarProveedor` (IN `_idProveedor` INT(10))   BEGIN

SELECT idProveedor, nombre, numeroTelefono, direccion FROM `proveedor` WHERE idProveedor = _idProveedor;

END$$

DROP PROCEDURE IF EXISTS `spConsultarTipoPro`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spConsultarTipoPro` (IN `_idTipoProducto` INT(10))   BEGIN

SELECT idTipoProducto, descripcion FROM `tipo_producto` WHERE idTipoProducto = _idTipoProducto;

END$$

DROP PROCEDURE IF EXISTS `spConsultarUsuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spConsultarUsuario` (IN `_idUsuario` INT(10))   BEGIN

SELECT idUsuario, nombre, apellido, usuario, contrasena FROM `usuarios` WHERE idUsuario = _idUsuario;

END$$

DROP PROCEDURE IF EXISTS `spInsertarCliente`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertarCliente` (IN `_nombre` VARCHAR(150), IN `_telefono` VARCHAR(50), IN `_celular` VARCHAR(50), IN `_direccion` VARCHAR(150))   BEGIN

INSERT INTO `cliente`(nombre, telefono, celular, direccion) VALUES (_nombre, _telefono, _celular, _direccion);

END$$

DROP PROCEDURE IF EXISTS `spInsertarDetEnt`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertarDetEnt` (IN `_fechaEntrada` DATE, IN `_cantProEntrada` INT(50), IN `_precioEntrada` INT(50), IN `_idProveedor` INT(10), IN `_idProducto` INT(10))   BEGIN

INSERT INTO `detalle_entrada`(fechaEntrada, cantProEntrada, precioEntrada, idProveedor, idProducto) VALUES (_fechaEntrada, _cantProEntrada, _precioEntrada, _idProveedor, _idProducto);

END$$

DROP PROCEDURE IF EXISTS `spInsertarDetSal`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertarDetSal` (IN `_fechaSalida` DATE, IN `_cantidadSalida` INT(50), IN `_valorTotal` INT(50), IN `_idCliente` INT(10), IN `_idProducto` INT(10))   BEGIN

INSERT INTO `detalle_salida`(fechaSalida, cantidadSalida, valorTotal, idCliente, idProducto) VALUES (_fechaSalida, _cantidadSalida, _valorTotal, _idCliente, _idProducto);
CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertarCliente` (IN `_nombre` VARCHAR(150), IN `_celular` VARCHAR(50), IN `_telefono` VARCHAR(50), IN `_direccion` VARCHAR(50))   BEGIN
INSERT INTO cliente (nombre, telefono, celular, direccion)
VALUES (_nombre, _celular, _telefono, _direccion );

END$$

DROP PROCEDURE IF EXISTS `spInsertarProducto`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertarProducto` (IN `_descripProducto` VARCHAR(150), IN `_cantProducto` INT(50), IN `_costoProducto` INT(50), IN `_idTipoProducto` INT(10))   BEGIN

INSERT INTO `producto`(descripProducto, cantProducto, costoProducto, idTipoProducto) VALUES (_descripProducto, _cantProducto, _costoProducto, _idTipoProducto);

END$$

DROP PROCEDURE IF EXISTS `spInsertarProveedor`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertarProveedor` (IN `_nombre` VARCHAR(150), IN `_numeroTelefono` VARCHAR(150), IN `_direccion` VARCHAR(150))   BEGIN

INSERT INTO `proveedor`(nombre, numeroTelefono, direccion) VALUES (_nombre, _numeroTelefono, _direccion);

END$$

DROP PROCEDURE IF EXISTS `spInsertarTipoPro`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertarTipoPro` (IN `_descripcion` VARCHAR(150))   BEGIN

INSERT INTO `tipo_producto`(descripcion) VALUES (_descripcion);

END$$

DROP PROCEDURE IF EXISTS `spInsertarUsuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertarUsuario` (IN `_nombre` VARCHAR(50), IN `_apellido` VARCHAR(50), IN `_usuario` VARCHAR(150), IN `_contrasena` VARCHAR(150))   BEGIN

INSERT INTO `usuarios`(nombre, apellido, usuario, contrasena) VALUES (_nombre, _apellido, _usuario, _contrasena);

END$$

DROP PROCEDURE IF EXISTS `spSearchAllCliente`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spSearchAllCliente` ()   BEGIN

SELECT idCliente, nombre, telefono, celular, direccion FROM cliente;

END$$

DROP PROCEDURE IF EXISTS `spSearchAllDetEnt`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spSearchAllDetEnt` ()   BEGIN

SELECT idDetEntrada, fechaEntrada, cantProEntrada, precioEntrada, idProveedor, idProducto FROM detalle_entrada;

END$$

DROP PROCEDURE IF EXISTS `spSearchAllDetSal`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spSearchAllDetSal` ()   BEGIN

SELECT idDetSalida, fechaSalida, cantidadSalida, valorTotal, idCliente, idProducto FROM detalle_salida;

SELECT * FROM `cliente`;  
END$$

DROP PROCEDURE IF EXISTS `spSearchAllProducto`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spSearchAllProducto` ()   BEGIN

SELECT idProducto, descripProducto, cantProducto, costoProducto, idTipoProducto FROM producto;

END$$

DROP PROCEDURE IF EXISTS `spSearchAllProveedor`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spSearchAllProveedor` ()   BEGIN

SELECT idProveedor, nombre, numeroTelefono, direccion FROM proveedor;

END$$

DROP PROCEDURE IF EXISTS `spSearchAllTipoPro`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spSearchAllTipoPro` ()   BEGIN

SELECT idTipoProducto, descripcion FROM tipo_producto;

END$$

DROP PROCEDURE IF EXISTS `spSearchAllUsuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spSearchAllUsuario` ()   BEGIN

SELECT idUsuario, nombre, apellido, usuario, contrasena FROM usuarios;

END$$

DROP PROCEDURE IF EXISTS `spUpdateCliente`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateCliente` (IN `_idCliente` INT(10), IN `_nombre` VARCHAR(150), IN `_telefono` VARCHAR(50), IN `_celular` VARCHAR(50), IN `_direccion` VARCHAR(150))   BEGIN

UPDATE `cliente` SET nombre = _nombre,
telefono = _telefono,
celular = _celular,
direccion = _direccion
WHERE idCliente = _idCliente;

END$$

DROP PROCEDURE IF EXISTS `spUpdateDetEnt`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateDetEnt` (IN `_idDetEntrada` INT(10), IN `_fechaEntrada` DATE, IN `_cantProEntrada` INT(50), IN `_precioEntrada` INT(50), IN `_idProveedor` INT(10), IN `_idProducto` INT(10))   BEGIN

UPDATE `detalle_entrada` SET fechaEntrada = _fechaEntrada,
cantProEntrada = _cantProEntrada,
precioEntrada = _precioEntrada,
idProveedor = _idProveedor,
idProducto = _idProducto
WHERE idDetEntrada = _idDetEntrada;

END$$

DROP PROCEDURE IF EXISTS `spUpdateDetSal`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateDetSal` (IN `_idDetSalida` INT(10), IN `_fechaSalida` DATE, IN `_cantidadSalida` INT(50), IN `_valorTotal` INT(50), IN `_idCliente` INT(10), IN `_idProducto` INT(10))   BEGIN

UPDATE `detalle_salida` SET fechaSalida= _fechaSalida,
cantidadSalida= _cantidadSalida,
valorTotal= _valorTotal,
idCliente= _idCliente,
idProducto= _idProducto 
WHERE idDetSalida= _idDetSalida;

CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateCliente` (IN `_idCliente` INT(4), IN `_nombre` VARCHAR(150), IN `_telefono` VARCHAR(50), IN `_celular` VARCHAR(50), IN `_direccion` VARCHAR(150))   BEGIN
UPDATE cliente SET 
nombre = _nombre, 
telefono = _telefono, 
celular = _celular, 
direccion= _direccion
WHERE 
idCliente = _idCliente;
END$$

DROP PROCEDURE IF EXISTS `spUpdateProducto`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateProducto` (IN `_idProducto` INT(10), IN `_descripProducto` VARCHAR(150), IN `_cantProducto` INT(50), IN `_costoProducto` INT(50), IN `_idTipoProducto` INT(10))   BEGIN

UPDATE `producto` SET descripProducto = _descripProducto,
cantProducto = _cantProducto,
costoProducto = _costoProducto,
idTipoProducto = _idTipoProducto 
WHERE idProducto = _idProducto;

END$$

DROP PROCEDURE IF EXISTS `spUpdateProveedor`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateProveedor` (IN `_idProveedor ` INT(10), IN `_nombre` VARCHAR(150), IN `_numeroTelefono` VARCHAR(150), IN `_direccion` VARCHAR(150))   BEGIN

UPDATE `proveedor` SET nombre = _nombre,
numeroTelefono = _numeroTelefono,
direccion = _direccion 
WHERE idProveedor = _idProveedor;

END$$

DROP PROCEDURE IF EXISTS `spUpdateTipoPro`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateTipoPro` (IN `_idTipoProducto` INT(10), IN `_descripcion` VARCHAR(150))   BEGIN

UPDATE `tipo_producto` SET descripcion = _descripcion
WHERE idTipoProducto = _idTipoProducto;

END$$

DROP PROCEDURE IF EXISTS `spUpdateUsuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateUsuario` (IN `_idUsuario` INT(10), IN `_nombre` VARCHAR(50), IN `_apellido` VARCHAR(50), IN `_usuario` VARCHAR(150), IN `_contrasena` VARCHAR(150))   BEGIN

UPDATE `usuarios` SET nombre = _nombre,
apellido = _apellido,
usuario = _usuario,
contrasena = _contrasena
WHERE idUsuario = _idUsuario;	

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(10) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `celular` varchar(50) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `nombre`, `telefono`, `celular`, `direccion`) VALUES
(1, 'Flufliflaz', '83828222', '313992923', 'CL 24 # 78-211');
(3, 'Lucas', '4758756', '56456846', 'Cra 55A'),
(5, 'maria', '347214545', '56565487', 'cll 35a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_entrada`
--

DROP TABLE IF EXISTS `detalle_entrada`;
CREATE TABLE IF NOT EXISTS `detalle_entrada` (
  `idDetEntrada` int(10) NOT NULL AUTO_INCREMENT,
CREATE TABLE `detalle_entrada` (
  `idDetEntrada` int(10) NOT NULL,
  `fechaEntrada` date NOT NULL,
  `cantProEntrada` int(50) NOT NULL,
  `precioEntrada` int(50) NOT NULL,
  `idProveedor` int(10) NOT NULL,
  `idProducto` int(10) NOT NULL,
  PRIMARY KEY (`idDetEntrada`),
  KEY `idProducto` (`idProducto`),
  KEY `idProveedor` (`idProveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_entrada`
--

INSERT INTO `detalle_entrada` (`idDetEntrada`, `fechaEntrada`, `cantProEntrada`, `precioEntrada`, `idProveedor`, `idProducto`) VALUES
(1, '2022-06-29', 150, 9000, 1, 2);
  `idProducto` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_salida`
--

CREATE TABLE `detalle_salida` (
  `idDetSalida` int(10) NOT NULL,
  `fechaSalida` date NOT NULL,
  `cantidadSalida` int(50) NOT NULL,
  `valorTotal` int(50) NOT NULL,
  `idCliente` int(10) NOT NULL,
  `idProducto` int(10) NOT NULL,
  PRIMARY KEY (`idDetSalida`),
  KEY `idCliente` (`idCliente`),
  KEY `idProducto` (`idProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_salida`
--

INSERT INTO `detalle_salida` (`idDetSalida`, `fechaSalida`, `cantidadSalida`, `valorTotal`, `idCliente`, `idProducto`) VALUES
(1, '2022-06-29', 100, 900000, 1, 2);
  `idProducto` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProducto` int(10) NOT NULL,
  `descripProducto` varchar(150) NOT NULL,
  `cantProducto` int(50) NOT NULL,
  `costoProducto` int(50) NOT NULL,
  `idTipoProducto` int(10) NOT NULL,
  PRIMARY KEY (`idProducto`),
  KEY `idTipoProducto` (`idTipoProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `descripProducto`, `cantProducto`, `costoProducto`, `idTipoProducto`) VALUES
(1, 'Muslos - Friko', 20, 7800, 1),
(2, 'Pechugas - Chickensi', 27, 9607, 1),
(5, 'pollaEspañola', 565555, 55555555, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `idProveedor` int(10) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `numeroTelefono` varchar(150) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  PRIMARY KEY (`idProveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`idProveedor`, `nombre`, `numeroTelefono`, `direccion`) VALUES
(1, 'Juakasksa', '77323112', 'Cl 45 # 45-45');
  `direccion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

CREATE TABLE `tipo_producto` (
  `idTipoProducto` int(10) NOT NULL,
  `descripcion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_producto`
--

INSERT INTO `tipo_producto` (`idTipoProducto`, `descripcion`) VALUES
(1, 'Pechuga');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `usuario` varchar(150) NOT NULL,
  `contrasena` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombre`, `apellido`, `usuario`, `contrasena`) VALUES
(1, 'Samuel', 'Yepes', 'admin', '1234'),
(2, 'Sebastian', 'Quiceno', 'admin2', '12345');

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
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_salida`
--
ALTER TABLE `detalle_salida`
  MODIFY `idDetSalida` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `idProveedor` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  MODIFY `idTipoProducto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
