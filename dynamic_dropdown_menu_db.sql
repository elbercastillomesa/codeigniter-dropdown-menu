-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-06-2019 a las 23:48:29
-- Versión del servidor: 5.7.26-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.33-0ubuntu0.16.04.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dynamic_dropdown_menu_db`
--
CREATE DATABASE IF NOT EXISTS `dynamic_dropdown_menu_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `dynamic_dropdown_menu_db`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `m_name` varchar(50) NOT NULL,
  `m_url` varchar(100) NOT NULL,
  `m_desc` varchar(255) NOT NULL,
  `m_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`m_id`, `m_name`, `m_url`, `m_desc`, `m_created_at`) VALUES
(1, 'Home', '', '', '2019-06-11 21:24:59'),
(2, 'About', '', '', '2019-06-11 21:24:59'),
(3, 'Contact', '', '', '2019-06-11 22:24:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_item`
--

CREATE TABLE IF NOT EXISTS `menu_item` (
  `m_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `m_id` int(11) NOT NULL,
  `m_item_name` varchar(50) NOT NULL,
  `m_item_url` varchar(100) NOT NULL,
  `m_item_desc` varchar(255) NOT NULL,
  `m_item_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`m_item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `menu_item`
--

INSERT INTO `menu_item` (`m_item_id`, `m_id`, `m_item_name`, `m_item_url`, `m_item_desc`, `m_item_created_at`) VALUES
(1, 1, 'submenu 1-1', '', '', '2019-06-11 21:31:32'),
(2, 1, 'submenu 1-2', '', '', '2019-06-11 21:31:32'),
(3, 1, 'submenu 1-3', '', '', '2019-06-11 21:31:51'),
(4, 2, 'submenu 2-1', '', '', '2019-06-11 21:31:51');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
