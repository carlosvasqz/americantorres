-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 06-04-2018 a las 21:07:07
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

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
  `Disponible` varchar(1) NOT NULL,
  `Id_Contenedor` varchar(4) NOT NULL,
  `Id_Categoria` int(11) NOT NULL,
  `Estado` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `articulos`:
--   `Id_Contenedor`
--       `contenedores` -> `Id_Contenedor`
--   `Id_Categoria`
--       `categorias` -> `Id_Categoria`
--

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`Id_Articulo`, `Descripcion`, `Precio`, `Cantidad`, `Disponible`, `Id_Contenedor`, `Id_Categoria`, `Estado`) VALUES
('A-0001', 'Taladro', 1250.00, 2, 'S', 'C-01', 1, 'Bueno'),
('A-0002', 'Ventana central grande', 5500.00, 1, 'S', 'C-01', 2, 'Bueno');

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
-- RELACIONES PARA LA TABLA `categorias`:
--

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
  `Hora` varchar(20) NOT NULL,
  `Ventas_dia` double(10,2) NOT NULL,
  `Caja_Base_Dia_Sig` double(10,2) NOT NULL,
  `Coincidio` int(1) NOT NULL,
  `Diferencia` double(10,2) NOT NULL,
  `Descripcion_Diferencia` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `cierres_diarios`:
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cierres_mensuales`
--

CREATE TABLE `cierres_mensuales` (
  `Id_Cierre_Mensual` int(11) NOT NULL,
  `Fecha_Inicial` date NOT NULL,
  `Fecha_Final` date NOT NULL,
  `Fecha_Cierre` date NOT NULL,
  `Hora_Cierre` varchar(255) NOT NULL,
  `Total_Ventas_Mes` double(10,2) NOT NULL,
  `Total_Serv_Pub` double(10,2) NOT NULL,
  `Total_Planilla` double(10,2) NOT NULL,
  `Utilidad` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `cierres_mensuales`:
--

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
-- RELACIONES PARA LA TABLA `contenedores`:
--

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
-- RELACIONES PARA LA TABLA `detalles_ventas`:
--   `Id_Venta`
--       `ventas` -> `Id_Venta`
--   `Id_Articulo`
--       `articulos` -> `Id_Articulo`
--

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
(6, 1, 'A-0001', 1, 1250.00);

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
-- RELACIONES PARA LA TABLA `pagos_servs_pubs`:
--

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
-- RELACIONES PARA LA TABLA `usuarios`:
--

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id_Usuario`, `Nombre`, `Contrasenia`, `Tipo`, `Activo`) VALUES
('U-01', 'admin', 'admin', 'Administrador', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `Id_Venta` int(11) NOT NULL,
  `Cliente` varchar(255) NOT NULL,
  `Id_Usuario` varchar(4) NOT NULL,
  `Descuento` float(10,2) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `ventas`:
--   `Id_Usuario`
--       `usuarios` -> `Id_Usuario`
--

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`Id_Venta`, `Cliente`, `Id_Usuario`, `Descuento`, `Fecha`) VALUES
(1, 'Jose Luis', 'U-01', 0.00, '2018-03-18'),
(2, 'MariCarmen', 'U-01', 0.00, '2018-03-19'),
(4, 'test', 'U-01', 500.00, '2018-04-05'),
(5, 'Josue Polanco', 'U-01', 500.00, '2018-04-05'),
(6, 'Oscar Pineda', 'U-01', 62.50, '2018-04-06');

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
  MODIFY `Id_Cierre_Diario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cierres_mensuales`
--
ALTER TABLE `cierres_mensuales`
  MODIFY `Id_Cierre_Mensual` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `Id_Venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
