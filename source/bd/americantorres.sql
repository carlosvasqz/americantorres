-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 31-01-2018 a las 01:19:39
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
-- Creación: 29-01-2018 a las 19:00:55
--

CREATE TABLE `articulos` (
  `Id_Articulo` varchar(10) NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `Precio` float(10,2) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Disponible` varchar(1) NOT NULL,
  `Id_Contenedor` varchar(4) NOT NULL,
  `Id_Categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `articulos`:
--   `Id_Articulo`
--       `detalles_ventas` -> `Id_Articulo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--
-- Creación: 29-01-2018 a las 19:00:56
--

CREATE TABLE `categorias` (
  `Id_Categoria` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `categorias`:
--   `Id_Categoria`
--       `articulos` -> `Id_Categoria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenedores`
--
-- Creación: 29-01-2018 a las 19:00:56
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
--   `Id_Contenedor`
--       `articulos` -> `Id_Contenedor`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_ventas`
--
-- Creación: 29-01-2018 a las 19:00:56
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
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--
-- Creación: 29-01-2018 a las 19:00:56
--

CREATE TABLE `usuarios` (
  `Id_Usuario` varchar(4) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Contrasenia` varchar(100) NOT NULL,
  `Activo` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `usuarios`:
--   `Id_Usuario`
--       `ventas` -> `Id_Usuario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--
-- Creación: 29-01-2018 a las 19:00:57
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
--   `Id_Venta`
--       `detalles_ventas` -> `Id_Venta`
--

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`Id_Articulo`),
  ADD KEY `FK` (`Id_Contenedor`),
  ADD KEY `FK-Categoria` (`Id_Categoria`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`Id_Categoria`);

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
  ADD KEY `Id_Usuario` (`Id_Usuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`Id_Venta`),
  ADD KEY `FK-Usuario` (`Id_Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `Id_Categoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `Id_Venta` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `articulos_ibfk_1` FOREIGN KEY (`Id_Articulo`) REFERENCES `detalles_ventas` (`Id_Articulo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD CONSTRAINT `categorias_ibfk_1` FOREIGN KEY (`Id_Categoria`) REFERENCES `articulos` (`Id_Categoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `contenedores`
--
ALTER TABLE `contenedores`
  ADD CONSTRAINT `contenedores_ibfk_1` FOREIGN KEY (`Id_Contenedor`) REFERENCES `articulos` (`Id_Contenedor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`Id_Usuario`) REFERENCES `ventas` (`Id_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`Id_Venta`) REFERENCES `detalles_ventas` (`Id_Venta`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
