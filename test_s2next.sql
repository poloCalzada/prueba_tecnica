-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 20-01-2022 a las 23:22:14
-- Versión del servidor: 5.7.21
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `test_s2next`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu_padre` int(11) DEFAULT NULL,
  `nombre_menu` varchar(150) NOT NULL,
  `descripcion_menu` varchar(250) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `menus`
--

INSERT INTO `menus` (`id_menu`, `id_menu_padre`, `nombre_menu`, `descripcion_menu`) VALUES
(1, 1, 'Tipos de Archivos', 'Catálogo de archivos'),
(2, 1, 'Profesiones', 'Listado de Profesiones'),
(3, 0, 'Catálogos', 'Lista de Catálogos'),
(4, 2, 'BMW', 'Marca BMW'),
(5, 0, 'Marcas', 'Listado de Marcas de Autos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_padre`
--

DROP TABLE IF EXISTS `menu_padre`;
CREATE TABLE IF NOT EXISTS `menu_padre` (
  `id_menu_padre` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_menu_padre` varchar(150) NOT NULL,
  PRIMARY KEY (`id_menu_padre`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `menu_padre`
--

INSERT INTO `menu_padre` (`id_menu_padre`, `nombre_menu_padre`) VALUES
(1, 'Catálogos'),
(2, 'Marcas');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
