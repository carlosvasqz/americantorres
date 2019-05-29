-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 17-04-2018 a las 04:09:46
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `americantorres`
--
DROP DATABASE IF EXISTS `americantorres`;
CREATE DATABASE IF NOT EXISTS `americantorres` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `americantorres`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `Id_Articulo` varchar(10) NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `Precio` float(10,2) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Disponible` int(1) NOT NULL,
  `Id_Contenedor` varchar(4) NOT NULL,
  `Id_Categoria` int(11) NOT NULL,
  `Estado` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`Id_Articulo`, `Descripcion`, `Precio`, `Cantidad`, `Disponible`, `Id_Contenedor`, `Id_Categoria`, `Estado`) VALUES
('A-0001', 'Taladro', 1250.00, 1, 1, 'C-01', 1, 'Usado'),
('A-0002', 'Ventana central grande', 5500.00, 6, 1, 'C-01', 1, 'Usado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `Id_Categoria` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`Id_Categoria`, `Nombre`, `Descripcion`) VALUES
(1, 'Herramientas ', 'Herramientas para la construccion'),
(2, 'Cristales', 'Ventanas para el hogar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cierres_diarios`
--

CREATE TABLE `cierres_diarios` (
  `Id_Cierre_Diario` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL,
  `Ventas_dia` double(10,2) NOT NULL,
  `Caja_Base_Dia_Sig` double(10,2) NOT NULL,
  `Coincidio` int(1) NOT NULL,
  `Tipo_Diferencia` int(1) NOT NULL,
  `Diferencia` double(10,2) NOT NULL,
  `Descripcion_Diferencia` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cierres_diarios`
--

INSERT INTO `cierres_diarios` (`Id_Cierre_Diario`, `Fecha`, `Hora`, `Ventas_dia`, `Caja_Base_Dia_Sig`, `Coincidio`, `Tipo_Diferencia`, `Diferencia`, `Descripcion_Diferencia`) VALUES
(10, '2018-04-06', '17:57:18', 5500.00, 1000.00, 0, 1, 87.50, 'Error en Cambio'),
(12, '2018-04-08', '18:46:19', 625.00, 1000.00, 1, 0, 0.00, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cierres_mensuales`
--

CREATE TABLE `cierres_mensuales` (
  `Id_Cierre_Mensual` int(11) NOT NULL,
  `Fecha_Inicial` date NOT NULL,
  `Fecha_Final` date NOT NULL,
  `Fecha_Cierre` date NOT NULL,
  `Hora_Cierre` time NOT NULL,
  `Total_Ventas_Mes` double(10,2) NOT NULL,
  `Total_Serv_Pub` double(10,2) NOT NULL,
  `Total_Planilla` double(10,2) NOT NULL,
  `Utilidad` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenedores`
--

CREATE TABLE `contenedores` (
  `Id_Contenedor` varchar(4) NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `Costo` float(10,2) NOT NULL,
  `Fecha_Ingreso` date NOT NULL,
  `Procedencia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `contenedores`
--

INSERT INTO `contenedores` (`Id_Contenedor`, `Descripcion`, `Costo`, `Fecha_Ingreso`, `Procedencia`) VALUES
('C-01', 'Contenedor Inicial', 1000000.00, '2018-03-01', 'USA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_ventas`
--

CREATE TABLE `detalles_ventas` (
  `Id_Venta` int(11) NOT NULL,
  `Num_Detalle` int(11) NOT NULL,
  `Id_Articulo` varchar(10) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Precio` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalles_ventas`
--

INSERT INTO `detalles_ventas` (`Id_Venta`, `Num_Detalle`, `Id_Articulo`, `Cantidad`, `Precio`) VALUES
(1, 1, 'A-0001', 2, 12.00),
(1, 2, 'A-0002', 2, 12.00),
(2, 1, 'A-0002', 1, 100.00),
(4, 1, 'A-0001', 2, 2500.00),
(4, 2, 'A-0002', 1, 5500.00),
(5, 1, 'A-0002', 1, 5500.00),
(6, 1, 'A-0001', 1, 1250.00),
(7, 1, 'A-0002', 1, 5500.00),
(8, 1, 'A-0001', 1, 1250.00),
(9, 1, 'A-0001', 1, 1250.00),
(10, 1, 'A-0001', 1, 1250.00),
(10, 2, 'A-0002', 1, 5500.00),
(11, 1, 'A-0001', 1, 1250.00),
(11, 2, 'A-0002', 2, 11000.00),
(12, 1, 'A-0001', 2, 2500.00),
(13, 1, 'A-0001', 1, 1250.00),
(13, 2, 'A-0002', 1, 5500.00),
(14, 1, 'A-0001', 1, 1250.00),
(14, 2, 'A-0002', 1, 5500.00),
(15, 1, 'A-0002', 2, 11000.00),
(16, 1, 'A-0002', 2, 11000.00),
(17, 1, 'A-0001', 2, 2500.00),
(18, 1, 'A-0002', 1, 5500.00),
(19, 1, 'A-0002', 1, 5500.00),
(20, 1, 'A-0002', 1, 5500.00),
(21, 1, 'A-0002', 1, 5500.00),
(22, 1, 'A-0002', 1, 5500.00),
(23, 1, 'A-0001', 1, 1250.00),
(24, 1, 'A-0001', 1, 1250.00),
(24, 2, 'A-0002', 1, 5500.00),
(25, 1, 'A-0001', 1, 1250.00),
(25, 2, 'A-0002', 1, 5500.00),
(26, 1, 'A-0001', 1, 1250.00),
(26, 2, 'A-0002', 1, 5500.00),
(27, 1, 'A-0002', 1, 5500.00),
(28, 1, 'A-0002', 1, 5500.00),
(29, 1, 'A-0001', 2, 2500.00),
(30, 1, 'A-0001', 1, 1250.00),
(31, 1, 'A-0001', 1, 1250.00),
(32, 1, 'A-0001', 1, 1250.00),
(33, 1, 'A-0001', 1, 1250.00),
(34, 1, 'A-0001', 1, 1250.00),
(35, 1, 'A-0001', 1, 1250.00),
(36, 1, 'A-0001', 1, 1250.00),
(37, 1, 'A-0002', 1, 5500.00),
(38, 1, 'A-0002', 1, 5500.00),
(39, 1, 'A-0002', 1, 5500.00),
(40, 1, 'A-0002', 1, 5500.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos_servs_pubs`
--

CREATE TABLE `pagos_servs_pubs` (
  `Id_Serv_Pub` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Fecha` date NOT NULL,
  `Monto` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pagos_servs_pubs`
--

INSERT INTO `pagos_servs_pubs` (`Id_Serv_Pub`, `Nombre`, `Fecha`, `Monto`) VALUES
(1, 'Agua', '2018-04-17', 156.50),
(2, 'Electricidad', '2018-04-25', 945.30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id_Usuario` varchar(4) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Contrasenia` varchar(100) NOT NULL,
  `Tipo` varchar(20) NOT NULL,
  `Activo` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id_Usuario`, `Nombre`, `Contrasenia`, `Tipo`, `Activo`) VALUES
('U-01', 'root', 'root', 'Administrador', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `Id_Venta` int(11) NOT NULL,
  `Cliente` varchar(255) NOT NULL,
  `Direccion_Cliente` varchar(255) NOT NULL,
  `Telefono_Cliente` varchar(20) NOT NULL,
  `Id_Usuario` varchar(4) NOT NULL,
  `Descuento` float(10,2) NOT NULL,
  `Fecha` date NOT NULL,
  `Subtotal` double NOT NULL,
  `Total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`Id_Venta`, `Cliente`, `Direccion_Cliente`, `Telefono_Cliente`, `Id_Usuario`, `Descuento`, `Fecha`, `Subtotal`, `Total`) VALUES
(1, 'Jose Luis', '', '', 'U-01', 0.00, '2018-03-18', 0, 0),
(2, 'MariCarmen', '', '', 'U-01', 0.00, '2018-03-19', 0, 0),
(4, 'test', '', '', 'U-01', 500.00, '2018-04-05', 0, 0),
(5, 'Josue Polanco', '', '', 'U-01', 500.00, '2018-04-05', 0, 0),
(6, 'Oscar Pineda', '', '', 'U-01', 62.50, '2018-04-06', 0, 0),
(7, 'asd', '', '', 'U-01', 1100.00, '2018-04-06', 0, 0),
(8, 'Jonathan', '', '', 'U-01', 625.00, '2018-04-08', 0, 0),
(9, 'Riccy Valle', '', '', 'U-01', 250.00, '2018-04-08', 0, 0),
(10, 'Henry', '', '', 'U-01', 750.00, '2018-04-09', 0, 0),
(11, 'test3', '', '', 'U-01', 250.00, '2018-04-09', 0, 0),
(12, 'test4', '', '', 'U-01', 500.00, '2018-04-09', 0, 0),
(13, 'test5', '', '', 'U-01', 0.00, '2018-04-09', 0, 0),
(14, 'Jerry', '', '', 'U-01', 50.00, '2018-04-09', 0, 0),
(15, 'test', 'test', '(121) 2121-2121', 'U-01', 1100.00, '2018-04-16', 11000, 9900),
(16, 'test', 'test', '(121) 2121-2121', 'U-01', 1100.00, '2018-04-16', 11000, 9900),
(17, 'test17', 'test17', '', 'U-01', 500.00, '2018-04-16', 2500, 2000),
(18, 'abc', '', '', 'U-01', 550.00, '2018-04-16', 5500, 4950),
(19, 'xyz', '', '', 'U-01', 10.00, '2018-04-16', 5500, 5490),
(20, 'xyz', '', '', 'U-01', 10.00, '2018-04-16', 5500, 5490),
(21, 'xyz', '', '', 'U-01', 10.00, '2018-04-16', 5500, 5490),
(22, 'tony', '', '', 'U-01', 50.00, '2018-04-16', 5500, 5450),
(23, 'stark', '', '', 'U-01', 0.00, '2018-04-16', 1250, 1250),
(24, 'meza', '', '', 'U-01', 1012.50, '2018-04-16', 6750, 5737.5),
(25, 'torres', '', '', 'U-01', 0.00, '2018-04-16', 6750, 6750),
(26, 'mejia', '', '', 'U-01', 0.00, '2018-04-16', 6750, 6750),
(27, 'holmes', '', '', 'U-01', 0.00, '2018-04-16', 5500, 5500),
(28, 'asddfg', '', '', 'U-01', 0.00, '2018-04-16', 5500, 5500),
(29, 'qwerewrqwer', '', '', 'U-01', 250.00, '2018-04-16', 2500, 2250),
(30, 'mjhgfds', '', '', 'U-01', 0.00, '2018-04-16', 1250, 1250),
(31, 'yrtrtrt', '', '', 'U-01', 0.00, '2018-04-16', 1250, 1250),
(32, 'trtrtrteeweq', '', '', 'U-01', 0.00, '2018-04-16', 1250, 1250),
(33, 'edeswq', '', '', 'U-01', 0.00, '2018-04-16', 1250, 1250),
(34, 'kkldmflk', '', '', 'U-01', 0.00, '2018-04-16', 1250, 1250),
(35, 'xnvmcbbx', '', '', 'U-01', 0.00, '2018-04-16', 1250, 1250),
(36, 'ddsfghdf', '', '', 'U-01', 0.00, '2018-04-16', 1250, 1250),
(37, '1212', '', '', 'U-01', 0.00, '2018-04-16', 5500, 5500),
(38, '121212', '', '', 'U-01', 0.00, '2018-04-16', 5500, 5500),
(39, 'fdfvdsds', '', '', 'U-01', 0.00, '2018-04-16', 5500, 5500),
(40, '121fswrry2tg', '', '', 'U-01', 0.00, '2018-04-16', 5500, 5500);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`Id_Articulo`),
  ADD KEY `Id_Contenedor` (`Id_Contenedor`),
  ADD KEY `Id_Categoria` (`Id_Categoria`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`Id_Categoria`);

--
-- Indices de la tabla `cierres_diarios`
--
ALTER TABLE `cierres_diarios`
  ADD PRIMARY KEY (`Id_Cierre_Diario`);

--
-- Indices de la tabla `cierres_mensuales`
--
ALTER TABLE `cierres_mensuales`
  ADD PRIMARY KEY (`Id_Cierre_Mensual`);

--
-- Indices de la tabla `contenedores`
--
ALTER TABLE `contenedores`
  ADD PRIMARY KEY (`Id_Contenedor`);

--
-- Indices de la tabla `detalles_ventas`
--
ALTER TABLE `detalles_ventas`
  ADD KEY `Id_Articulo` (`Id_Articulo`),
  ADD KEY `Id_Venta` (`Id_Venta`);

--
-- Indices de la tabla `pagos_servs_pubs`
--
ALTER TABLE `pagos_servs_pubs`
  ADD PRIMARY KEY (`Id_Serv_Pub`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id_Usuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`Id_Venta`),
  ADD KEY `Id_Usuario` (`Id_Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `Id_Categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cierres_diarios`
--
ALTER TABLE `cierres_diarios`
  MODIFY `Id_Cierre_Diario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `cierres_mensuales`
--
ALTER TABLE `cierres_mensuales`
  MODIFY `Id_Cierre_Mensual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `Id_Venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `articulos_ibfk_2` FOREIGN KEY (`Id_Contenedor`) REFERENCES `contenedores` (`Id_Contenedor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `articulos_ibfk_3` FOREIGN KEY (`Id_Categoria`) REFERENCES `categorias` (`Id_Categoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalles_ventas`
--
ALTER TABLE `detalles_ventas`
  ADD CONSTRAINT `detalles_ventas_ibfk_1` FOREIGN KEY (`Id_Venta`) REFERENCES `ventas` (`Id_Venta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalles_ventas_ibfk_2` FOREIGN KEY (`Id_Articulo`) REFERENCES `articulos` (`Id_Articulo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuarios` (`Id_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
