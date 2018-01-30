-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-01-2018 a las 01:00:28
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE IF NOT EXISTS `articulos` (
  `Id_Articulo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Precio` float(10,2) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Disponible` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `Id_Contenedor` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `Id_Categoria` int(11) NOT NULL,
  PRIMARY KEY (`Id_Articulo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `Id_Categoria` int(11) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id_Categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenedores`
--

CREATE TABLE IF NOT EXISTS `contenedores` (
  `Id_Contenedor` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Costo` float NOT NULL,
  `Fecha_Ingreso` date NOT NULL,
  `Procedencia` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id_Contenedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE IF NOT EXISTS `detalle_venta` (
  `Id_Venta` int(11) NOT NULL,
  `Num_Detalle` int(11) NOT NULL,
  `Id_Articulo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Precio` float NOT NULL,
  PRIMARY KEY (`Id_Venta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `Id_Usuario` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Contrasena` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Activo` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id_Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE IF NOT EXISTS `ventas` (
  `Id_Venta` int(11) NOT NULL,
  `Cliente` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Id_Usuario` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `Descuento` float NOT NULL,
  `Fecha` date NOT NULL,
  PRIMARY KEY (`Id_Venta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
